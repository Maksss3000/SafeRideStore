<?php

namespace application\models;

use application\core\Model;


class OrdersModel extends Model
{

    /**
     * Function get`s all Order`s from Data Base.
     * @return array $orders All Order`s information.
     */
    public function getOrders()
    {
        $statement = $this->db->query("SELECT * FROM  orders");
        $orders = array();
        while ($row =  $statement->fetchObject('application\components\Order'))
            $orders[] = $row;
        return $orders;
    }

    /** 
     * Function get`s all orders between specific Date`s from Data Base . 
     * @param string $sDate Start Date for search.
     * @param string $eDate End Date for search.
     * @return array $orders All Order`s information between specific Date`s.
     */
    public function getOrdersByDate($sDate, $eDate)
    {
        $statement = $this->db->query("SELECT * FROM  orders WHERE  orderDate >= :startDate and orderDate<= STR_TO_DATE(:endDate, '%Y-%m-%d %H:%i:%s')  ", ['startDate' => $sDate, 'endDate' => $eDate]);
        $orders = array();
        while ($row =  $statement->fetchObject('application\components\Order'))
            $orders[] = $row;
        return $orders;
    }

    /**
     * Function get`s customer`s Order`s from Data Base.
     * @param string $userName User Name of Customer.
     * @return array $orders All Order`s information of specific customer.
     */
    public function getOrdersByUserName($userName)
    {
        $statement = $this->db->query("SELECT * FROM  orders WHERE userName=:userName  ", ['userName' => $userName]);
        $orders = array();
        while ($row =  $statement->fetchObject('application\components\Order'))
            $orders[] = $row;
        return $orders;
    }
    public function getOrderById($id)
    {
        $statement = $this->db->query("SELECT * FROM  orders WHERE orderId=:orderId", ["orderId" => $id]);
        return $statement->fetchObject('application\components\Order');
    }
    public function productsInOrder($id)
    {
        $result = $this->db->row("SELECT inStockId FROM  products_in_order WHERE orderId=:orderId", ["orderId" => $id]);
        for ($i = 0; $i < count($result); $i++) {
            $result[$i] = intval($result[$i]['inStockId']);
        }
        return $result;
    }
    public function getProductsInOrder()
    {
        $statement = $this->db->query("SELECT * FROM  orders");
        $orders = array();
        while ($row =  $statement->fetchObject('application\components\Order'))
            $orders[] = $row;
        return $orders;
    }
    public function getOrderProdustsByIds($productsIds)
    {
        $productsIds = $this->prapere($productsIds);
        $placeholders = $productsIds['placeholders'];
        unset($productsIds['placeholders']);
        return $this->db->row("SELECT products.productId,in_stock.inStockId,in_stock.size, in_stock.color,products.productName,products.price,products.category,products.imgPath,products.brand,products_in_order.quantity
                                  FROM in_stock 
                                  INNER JOIN products_in_order ON in_stock.inStockId = products_in_order.inStockId 
                                  INNER JOIN products ON in_stock.productId = products.productId 
                                  AND in_stock.inStockId IN ($placeholders)", $productsIds);
    }
    public function getCustomerByOrder($id)
    {
        $statement = $this->db->query("SELECT * FROM  customers WHERE userName=(SELECT userName FROM orders WHERE orderId=:orderId)", ["orderId" => $id]);
        return $statement->fetchObject('application\components\Customer');
    }
}

<?php

namespace application\models;

use application\core\Model;

class AdminModel extends Model
{
    public function getSalesBymonth($month, $year)
    {
        return  $this->db->column("SELECT SUM(totalAmount) AS monthSalesAmount FROM orders WHERE MONTH(orderDate) = :monthTofind AND YEAR(orderDate) = :yearTofind", ["monthTofind" => $month, "yearTofind" => $year]);
    }
    public function getCustomersBymonth($month, $year)
    {
        return  $this->db->column("SELECT count(*) AS NumberOfCustomers FROM customers WHERE MONTH(addedAt) = :monthTofind AND YEAR(addedAt) = :yearTofind AND role != 'admin'", ["monthTofind" => $month, "yearTofind" => $year]);
    }
    public function getBrands()
    {
        return  $this->db->row("SELECT DISTINCT brand FROM products");
    }
    public function getProductsIds()
    {
        return $this->db->row("SELECT productName,productId FROM  products");
    }
    public function addDiscountByCategory($category, $discount, $percdent)
    {
        $result = $this->db->array("SELECT productId FROM  products WHERE category=:category", ["category" => $category]);
        $this->updateDiscountLoop($result, $discount, $percdent);
    }
    public function addDiscountByBrand($brand, $discount, $percdent)
    {
        $result = $this->db->array("SELECT productId FROM  products WHERE brand=:brand", ["brand" => $brand]);
        $this->updateDiscountLoop($result, $discount, $percdent);
    }

    public function addDiscountProducts($products, $discount, $percdent)
    {
        $this->updateDiscountLoop($products, $discount, $percdent);
    }
    public function updateDiscountLoop($products, $discount, $percdent)
    {
        for ($i = 0; $i < count($products); $i++) {
            if (!$percdent) {
                $price = $this->db->column("SELECT price FROM  products WHERE productId=:productId", ["productId" => $products[$i]]);
                $percentDiscount = $this->getPercentDiscount($price, $discount);
                $this->updateDiscounts($percentDiscount, $products[$i]);
            } else
                $this->updateDiscounts($discount, $products[$i]);
        }
    }

    public function getPercentDiscount($price, $dicount)
    {
        return $dicount * 100 / $price;
    }
    public function updateDiscounts($discount, $id)
    {
        $this->db->query("UPDATE products SET discount = :discount  WHERE productId=:productId", ["discount" => $discount, "productId" => $id]);
    }
    public function getDiscounts()
    {
        $statement = $this->db->query("SELECT * FROM  products  WHERE discount!=0");
        $products = array();
        while ($row =  $statement->fetchObject('application\components\Product'))
            $products[] = $row;
        return $products;
    }
    public function removeDiscount($id)
    {
        $this->db->query("UPDATE products SET discount = 0  WHERE productId=:productId", ["productId" => $id]);
    }
}

<?php

namespace application\models;

use application\components\Product;
use application\core\Model;
use PDO;

class ProductsModel extends Model
{

    /**
     * Function return`s all Products of Specific Sub-Category.
     * @param string $subCategory Specific Sub-Category of product.
     * @return Product 'Return all Products from Data Base by Sub-Category.'
     */
    public function getProductsBySubCategory($subCategory)
    {
        return  $this->db->fetchProduct("SELECT * FROM  products WHERE subCategory=:subCategory", ["subCategory" => $subCategory]);
    }
    /**
     * Function return`s all Product`s of Specific Category.
     * @param string $category Specific Category of product.
     * @return Product 'Return all Products from Data Base by Category.'
     */
    public function getProductsByCategory($category)
    {
        return  $this->db->fetchProduct("SELECT * FROM  products WHERE category=:category", ["category" => $category]);
    }
    /**
     * Function return`s Product from Data Base by specific Id.
     * @param $id Specific product Id to search in Data Base.
     * @return Product $product Specific product from Data Base.
     */
    public function getById($id)
    {
        $statement = $this->db->query("SELECT * FROM  products WHERE productId=:productId ", ["productId" => $id]);
        $product =  $statement->fetchObject('application\components\Product');
        return $product;
    }
    /**
     * Function get`s value(word) and return all Products 
     * with same Name/Category/SubCategoy/Brand like in the value.
     * @param string $value Value to search in Data Base.
     * @return Product All Product`s from Data Base with same value.
     */
    public function getProductsBySearch($value)
    {
        return  $this->db->fetchProduct("SELECT * FROM  products WHERE productName LIKE :value OR brand LIKE :value OR  subCategory LIKE :value OR category LIKE :value", ["value" => '%' . $value . '%']);
    }

    public function getAllProducts()
    {
        return  $this->db->fetchProduct("SELECT * FROM  products");
    }


    /**
     * Function get`s all Product`s Data in Cart.
     * @param array $productsIds Product`s Id`s in specific Custumer Cart.
     * @return  'All products Data of specific customer Cart.
     */
    public function getProdustsDitailsByIds($productsIds)
    {
        $productsIds = $this->prapere($productsIds);
        $placeholders = $productsIds['placeholders'];
        unset($productsIds['placeholders']);
        return  $this->db->row("SELECT in_stock.inStockId,in_stock.size, in_stock.color,products.productName,products.price,products.category,products.imgPath,products.brand,products.discount
                                  FROM in_stock 
                                  INNER JOIN products ON in_stock.productId = products.productId AND inStockId IN ($placeholders)", $productsIds);
    }
    public function getInstockByProductId($id)
    {
        return $this->db->row("SELECT inStockId,size,color,amount FROM  in_stock WHERE productId=:productId ", ["productId" => $id]);
    }
    public function addToStock($id, $size, $color, $amount)
    {
        $this->db->query(
            "INSERT INTO in_stock (productId, size, color, amount) 
                 VALUES (:productId, :size, :color, :amount)",
            ["productId" => $id, "size" => $size, "color" => $color, "amount" => $amount]
        );
        $result = $this->db->row("SELECT inStockId FROM in_stock WHERE productId=:productId And color=:color AND size=:size", ["productId" => $id, "color" => $color, "size" => $size]);
        return  $result[0];
    }
    public function updateStock($id, $size, $color, $amount)
    {
        $this->db->query(
            "UPDATE in_stock
           SET amount = amount + :amount
          WHERE productId=:productId AND size=:size AND color=:color",
            ["productId" => $id, "size" => $size, "color" => $color, "amount" => $amount]
        );
        $result = $this->db->row("SELECT inStockId,amount FROM in_stock WHERE productId=:productId And color=:color AND size=:size", ["productId" => $id, "color" => $color, "size" => $size]);
        if ($result) #if result returned there is only one row 
            return  $result[0];
        return null;
    }
    public function updateStockById($id, $amount)
    {
        $this->db->query("UPDATE in_stock SET amount = :amount  WHERE inStockId=:inStockId", ["inStockId" => $id, "amount" => $amount]);
    }
    public function deleteStockById($id)
    {
        $this->db->query("DELETE FROM in_stock WHERE inStockId=:inStockId", ["inStockId" => $id]);
    }
    public function isStockExists($id, $size, $color)
    {
        $resulat = $this->db->column(
            "SELECT COUNT(*) FROM  in_stock 
             WHERE  productId=:productId AND size=:size AND color=:color",
            ["productId" => $id, "size" => $size, "color" => $color]
        );
        $resulat = intval($resulat);
        if ($resulat > 0)
            return true;
        return false;
    }
    /**
     * Function return`s all available colors of Product from Data Base.
     * @param $id Specific product Id to search in Data Base.
     * @return array $colors Available product colors .
     */
    public function getAvailableColors($id)
    {
        $colors = array();
        $result = $this->db->row("SELECT DISTINCT color FROM in_stock WHERE productId=:productId", ["productId" => $id]);
        for ($i = 0; $i < count($result); $i++) {
            $colors[$i] = $result[$i]['color'];
        }
        return $colors;
    }


    /**
     * Function return`s all available sizes of specific Product with specific Color.
     * @param $id Specific product Id.
     * @param $color Specific Color of Product.
     * @return array $sizes Available product sizes .
     */
    public function getAvailableSizes($id, $color)
    {
        $sizes = array();
        $result = $this->db->row("SELECT DISTINCT size FROM in_stock WHERE productId=:productId AND color=:color", ["productId" => $id, "color" => $color]);
        for ($i = 0; $i < count($result); $i++) {
            $sizes[$i] = $result[$i]['size'];
        }
        return $sizes;
    }

    public function addProduct($product)
    {

        $this->db->query(
            "INSERT INTO products(productId, productName,category,subCategory,price,imgPath,brand) 
                 VALUES (:productId, :productName,:category,:subCategory,:price,:imgPath,:brand)",
            [
                "productId" => $product->getProductId(), "productName" => $product->getProductName(), "category" => $product->getCategory(),
                "subCategory" => $product->getSubCategory(), "price" => $product->getPrice(), "imgPath"  => $product->getImgPath(),
                "brand" => $product->getBrand()
            ]
        );
    }

    public function updateProduct($product, $idToUpdate)
    {
        return  $this->db->query(
            "UPDATE products
             SET productId=:productId,productName=:productName,category=:category,subCategory=:subCategory,price=:price,imgPath=:imgPath,brand=:brand 
             WHERE productId=:oldProdId",
            [
                "productId" => $product->getProductId(), "productName" => $product->getProductName(), "category" => $product->getCategory(),
                "subCategory" => $product->getSubCategory(), "price" => $product->getPrice(),  "imgPath"  => $product->getImgPath(),
                "brand" => $product->getBrand(), "oldProdId" => $idToUpdate
            ]
        );
    }
    public function deleteProduct($productId)
    {
        $this->db->query("DELETE FROM products WHERE productId=:productId", ["productId" => $productId]);
        $this->db->query("DELETE FROM in_stock WHERE productId=:productId", ["productId" => $productId]);
    }
    public function checkId($id)
    {
        return $this->db->column("SELECT COUNT(*) FROM products WHERE productId=:productId ", ["productId" => $id]);
    }

    //Get  Most Selling Product`s(Max-10 product`s).
    public function getTopSelling()
    {
        $productsIds = $this->db->array("SELECT products.productId  FROM products 
                               INNER JOIN in_stock on in_stock.productId = products.productId 
                               INNER JOIN products_in_order on in_stock.inStockId = products_in_order.inStockId
                               GROUP BY products.productId
                               ORDER BY sum(products_in_order.quantity) DESC
                               LIMIT 10");
        return  $this->getProdustsByIds($productsIds);
    }
    /**
     * Function for getting product`s Data by product Id.
     * @param  $productsIds Product`s id`s.
     * @return Product All Product`s with specific Id`s.
     */
    public function getProdustsByIds($productsIds)
    {
        $productsIds = $this->prapere($productsIds);
        $placeholders = $productsIds['placeholders'];
        unset($productsIds['placeholders']);
        return  $this->db->fetchProduct("SELECT * FROM  products WHERE productId IN ($placeholders)", $productsIds);
    }
}

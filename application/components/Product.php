<?php

/**
 * Class Product
 * Entity class for product
 */

namespace application\components;

class Product
{
    protected $productId;
    protected $productName;
    protected $category;
    protected $subCategory;
    protected $price;
    protected $imgPath;
    protected $brand;
    protected $discount;

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getSubCategory()
    {
        return $this->subCategory;
    }

    public function setSubCategory($subCategory)
    {
        $this->subCategory = $subCategory;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getImgPath()
    {
        return $this->imgPath;
    }

    public function setImgPath($imgPath)
    {
        $this->imgPath = $imgPath;
    }
    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }
}

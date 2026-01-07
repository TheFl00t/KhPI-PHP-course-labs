<?php

class Product
{
    public $name;
    public $desc;
    protected $price;

    public function __construct($name, $price, $desc)
    {
        $this->name = $name;
        if ($price > 0) {
            $this->price = $price;
        } else {
            $this->price = 0;
        }
        $this->desc = $desc;
    }

    public function getInfo()
    {
        return "Name: {$this->name} Price: {$this->price} Description: {$this->desc} ";
    }

}

class DiscountedProduct extends Product
{
    public $discount;

    public function __construct($name, $price, $desc, $discount)
    {
        parent::__construct($name, $price, $desc);

        if ($discount > 0 && $discount <= 100) {
            $this->discount = $discount;

        } elseif ($discount > 100) {
            $this->discount = 100;

        } else {
            $this->discount = 0;
        }
    }

    public function getInfo()
    {
        return parent::getInfo() . "Discount: {$this->discount}";
    }

    public function getDiscountedPrice()
    {
        return $this->price - $this->price * ($this->discount / 100);
    }
}

class Category
{
    public $name;
    protected array $products = [];

    public function __construct($name, Product ...$args)
    {
        $this->name = $name;

        foreach ($args as $product) {
            array_push($this->products, $product);
        }
    }

    public function addProduct(Product ...$args)
    {
        foreach ($args as $product) {
            array_push($this->products, $product);
        }
    }

    public function getAllProducts()
    {
        if (empty($this->products))
            return null;

        $all_products = "";

        foreach ($this->products as $product) {
            $all_products .= $product->getInfo() . "<br>";
        }

        return $all_products;
    }

}

$product1 = new Product("Бургер", 130, "Два біфштекси з натуральної яловичини...");
echo $product1->getInfo();
echo "<br>";

$product2 = new DiscountedProduct("Пiцца", 190, "Курка, Соус Альфредо, Моцарела...", 40);
echo $product2->getInfo();
echo "<br>";

$product3 = new DiscountedProduct("Coca-Cola", 45, "Холодний освіжаючий напій...", 10);
echo $product3->getInfo();
echo "<br>";

echo $product3->getDiscountedPrice();
echo "<br>";



$ctg1 = new Category("Food", $product1, $product2);
echo $ctg1->getAllProducts();

$ctg2 = new Category("Drink");
$ctg2->addProduct($product3);
echo $ctg2->getAllProducts();

?>
<?php

require_once './config.php';
require_once './Product.php';
require_once './Category.php';

$product = new Product();

var_dump($product->findAll());

?>
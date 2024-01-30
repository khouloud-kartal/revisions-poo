<?php

require_once './config.php';
require_once './Product.php';
require_once './Category.php';

$product = new Product();

$product = new Product(1, 'T-shirt', ['https://picsun.photos/200/300'], 1000, 'A beautiful T-shirt', 10, new DateTime(), new DateTime(), '6');

$product->create();

$product->setName('T-shirt 234')->setQuantity(24);

?>
<?php

require_once './Product.php';
require_once './Category.php';

$category = new Category(3, 'Test', 'It is a new category', new DateTime(), new DateTime());

$product = new Product(1, 'T-shirt', ['https://picsun.photos/200/300'], 1000, 'A beautiful T-shirt', 10, new DateTime(), new DateTime(), $category->getId());

var_dump($product);

?>
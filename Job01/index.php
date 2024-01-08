<?php

require_once './Product.php';

$product = new Product(1, 'T-shirt', ['https://picsun.photos/200/300'], 1000, 'A beautiful T-shirt', 10, new DateTime(), new DateTime());

var_dump($product, $product->getPhotos());

?>
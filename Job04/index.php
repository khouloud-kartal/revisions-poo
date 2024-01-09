<?php

require_once './config.php';
require_once './Product.php';
require_once './Category.php';


try{
    $conn = getConnection();
    if($conn !== null){
        $request = 'SELECT * FROM product WHERE id = 7';
        $request1 = $conn->prepare($request);
        $request1->execute();
        $result = $request1->fetch(PDO::FETCH_ASSOC);
    }
}catch(PDOException $e){
    echo 'Error:' . $e->getMessage();
}

var_dump($result);

$category = new Category(3, 'Test', 'It is a new category', new DateTime(), new DateTime());

$product = new Product($result['id'], $result['name'], json_decode($result['photos']), $result['price'], $result['description'], $result['quantity'], new DateTime($result['createdAt']), new DateTime($result['updatedAt']), $result['categoryId']);

$product2 = new Product();

?>
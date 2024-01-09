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

$category = new Category(2, 'Test', 'It is a new category', new DateTime(), new DateTime());


var_dump($category->getProducts());

?>
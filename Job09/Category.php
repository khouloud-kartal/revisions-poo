<?php 

require_once './Product.php';
require_once './config.php';


class Category{

    private ?int $id;
    private ?string $name;
    private ?string $description;
    private ?DateTime $createdAt;
    private ?DateTime $updatedAt;

    public function __construct(?int $id = null, ?string $name = null, ?string $description = null, ?DateTime $createdAt = null, ?DateTime $updatedAt = null) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    //////////////////////////////////////////// Getters ///////////////////////////////////////////////
public function getId(){
    return $this->id;
}

public function getName(){
    return $this->name;
}

public function getDescription(){
    return $this->description;
}

public function getCreatedAt(){
    return $this->createdAt;
}

public function getUpdatedAt(){
    return $this->updatedAt;
}

public function getProducts(){

    $conn = getConnection();
    $request = 'SELECT * FROM product WHERE categoryId = :id';
    $request1 = $conn->prepare($request);
    $request1->execute(['id' => $this->id]);
    $result = $request1->fetch(PDO::FETCH_ASSOC);

    if($result != null){
        return new Product($result['id'], $result['name'], json_decode($result['photos']), $result['price'], $result['description'], $result['quantity'], new DateTime($result['createdAt']), new DateTime($result['updatedAt']), $result['categoryId']);
    }else{
        return [];
    }


}

/////////////////////////////////////////////////////// Setters  ////////////////////////////////////////////////////////////////////////
public function setId(int $id){
    $this->id = $id;
}

public function setName(string $name){
    $this->name = $name;
}

public function setDescription(string $description){
    $this->description = $description;
}

public function setCreatedAt(DateTime $createdAt){
    $this->createdAt = $createdAt;
}

public function setUpdatedAt(DateTime $updatedAt){
    $this->updatedAt = $updatedAt;
}


}

?>
<?php

require_once './Category.php';
require_once './config.php';

class Product{

    private ?int $id;
    private ?string $name;
    private ?array $photos;
    private ?int $price;
    private ?string $description;
    private ?int $quantity;
    private ?DateTime $createdAt;
    private ?DateTime $updatedAt;
    private ?int $category_id;

    public function __construct(?int $id = null, ?string $name = null, ?array $photos = null, ?int $price = null, ?string $description = null, ?int $quantity = null, ?DateTime $createdAt = null, ?DateTime $updatedAt = null, ?int $category_id = null){
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->category_id = $category_id;
    }

    public function findOneById(int $id){
        $conn = getConnection();
        $request = 'SELECT * FROM product WHERE id = :id';
        $request1 = $conn->prepare($request);
        $request1->execute(['id' => $id]);
        $result = $request1->fetch(PDO::FETCH_ASSOC);

        if(!$result){
            return false;
        }

        return new Product($result['id'], $result['name'], json_decode($result['photos']), $result['price'], $result['description'], $result['quantity'], new DateTime($result['createdAt']), new DateTime($result['updatedAt']), $result['categoryId']);

    }

    public function findAll(){
        $conn = getConnection();
        $request = 'SELECT * FROM product ';
        $request1 = $conn->prepare($request);
        $request1->execute();
        $results = $request1->fetchAll(PDO::FETCH_ASSOC);

        if(!$results){
            return false;
        }

        $products = [];

        // var_dump($results);

        foreach ($results as $result) {
            $products[] = new Product(
                $result['id'],
                $result['name'],
                json_decode($result['photos']),
                $result['price'],
                $result['description'],
                $result['quantity'],
                new DateTime($result['createdAt']),
                new DateTime($result['updatedAt']),
                $result['category_id']
            );
        }

        var_dump($products);
        return $products;
        
    }


    public function create(){

        if (!$this->name || !$this->photos || !$this->price || !$this->description || !$this->quantity || !$this->category_id) {
            return false;
        }
        $conn = getConnection();

        $request = 'INSERT INTO product (name, photos, price, description, quantity, createdAt, updatedAt, categoryId)
        VALUES (:name, :photos, :price, :description, :quantity, :createdAt, :updatedAt, :category_id)';
        $request1 = $conn->prepare($request);
        
        $product = $request1->execute([
            'name' => $this->name,
            'photos' => json_encode($this->photos),
            'price' => $this->price,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updatedAt->format('Y-m-d H:i:s'),
            'category_id' => $this->category_id
        ]);

        if ($product) {
            $lastInsertId = $conn->lastInsertId();
            $this->setId($lastInsertId);
            return $this;
        } else {
            return false;
        }    
    }

    public function update(){
        $conn = getConnection();

        $request = 'UPDATE ';
    }

    //////////////////////////////////////////// Getters ///////////////////////////////////////////////
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getPhotos(){
        return $this->photos;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function getCreatedAt(){
        return $this->createdAt;
    }

    public function getUpdatedAt(){
        return $this->updatedAt;
    }

    public function getCategoryId(){
        return $this->category_id;
    }

    public function getCategory(){
        $conn = getConnection();
        $request = 'SELECT * FROM category WHERE id = :id';
        $request1 = $conn->prepare($request);
        $request1->execute(['id' => $this->category_id]);
        $result = $request1->fetch(PDO::FETCH_ASSOC);

        return new Category($result['id'], $result['name'], $result['description'], new DateTime($result['createdAt']), new DateTime($result['updatedAt']));
    }

    /////////////////////////////////////////////////////// Setters  ////////////////////////////////////////////////////////////////////////
    public function setId(int $id){
        $this->id = $id;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setPhotos(array $photos){
        $this->photos = $photos;
    }

    public function setPrice(int $price){
        $this->price = $price;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function setQuantity(int $quantity){
        $this->quantity = $quantity;
    }

    public function setCreatedAt(DateTime $createdAt){
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt){
        $this->updatedAt = $updatedAt;
    }

    public function setCategoryId(int $category_id){
        $this->category_id = $category_id;
    }

}


?>
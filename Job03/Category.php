<?php 

    class Category{

        private ?int $id;
        private ?string $name;
        private ?string $description;
        private ?DateTime $createdAt;
        private ?DateTime $updatedAt;

        public function __construct(int $id = null, string $name = null, string $description = null, DateTime $createdAt = null, DateTime $updatedAt = null) {
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
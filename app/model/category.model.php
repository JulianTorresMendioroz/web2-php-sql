<?php 

class CategoryModel {

    private $db;

    public function __construct(){

        require_once 'config_db/db.php';
        $conn = new db();
        $this->db = $conn->connection();

    }

    public function getAllCategories(){

        $query = $this->db->prepare('SELECT * FROM category');

        $query->execute();

        $category = $query->fetchAll(PDO::FETCH_OBJ);

        return $category;
    }
    public function getCategoryBySeason($season = 'verano') {

        $query = $this->db->prepare('SELECT * FROM category WHERE season = ?');
    
        $query->execute([$season]);
    
        $category = $query->fetch(PDO::FETCH_OBJ);
    
        return $category;
    }
    public function getCategoryBySeason($season = 'invierno') {

        $query = $this->db->prepare('SELECT * FROM category WHERE season = ?');
    
        $query->execute([$season]);
    
        $category = $query->fetch(PDO::FETCH_OBJ);
    
        return $category;
    }
    public function deleteCategory($)
    



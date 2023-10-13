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

        $categories = $query->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }
    public function getElementBySeason($season) {

        $query = $this->db->prepare('SELECT * FROM category WHERE season = ?');
        
        $query->execute([$season]);
        
        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $categories;
    }

    public function getCategory($fkProduct) {

        $query = $this->db->prepare('SELECT * FROM category WHERE id == ?');
        
        $query->execute([$fkProduct]);
        
        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $categories;
    }
}   



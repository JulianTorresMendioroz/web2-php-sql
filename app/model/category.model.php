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
    public function getCategoryBySeason($season) {

        $query = $this->db->prepare('SELECT * FROM category WHERE season = ?');
        
        $query->execute([$season]);
        
        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $categories;
    }
   
    public function deleteCategory($id){
        $query=$this->db->prepare('DELETE FROM category WHERE id=?');

        $query->execute([$id]);

        $categories= $query->fetch(PDO::FETCH_OBJ);

        return $categories;
    }
    public function insertCategory($id,$name,$season){

        $query = $this->db->prepare('INSERT INTO category VALUES id=NULL,?,?);

        $query->execute([$id,$name,$season]);

        return $this->db->lastId();
    }
    



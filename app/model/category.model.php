<?php 

require_once 'app/model/model.db.php';

class CategoryModel extends Model  {

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



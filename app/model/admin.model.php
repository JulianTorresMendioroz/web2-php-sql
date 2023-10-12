<?php

class AdminModel
{

    private $db;

    public function __construct()
    {

        require_once 'config_db/db.php';
        $conn = new db();
        $this->db = $conn->connection();
    }

    //PRODUCTOS

    public function getAllProducts()
    {

        $query = $this->db->prepare('SELECT * FROM products');

        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    public function addProduct($img, $name, $description, $price, $fk_category)
    {

        //añadir: poder elegir la categoría a la que pertenecen utilizando un select que muestre el nombre de la misma. 

        $query = $this->db->prepare('INSERT INTO products VALUES(id=NULL,?, ?, ?, ?, ?)');

        $query->execute([$img, $name, $description, $price, $fk_category]);

        //muestro el ultimo id que hay
        return $this->db->lastInsertId();
    }

    public function updatePrice($price)
    {
        //temrinar funcion de update
    }

    public function deleteProductById($id)
    {

        $query = $this->db->prepare('DELETE FROM products WHERE id=?');

        $query->execute([$id]);

        $product = $query->fetch(PDO::FETCH_OBJ);

        return $product;
    }

<<<<<<< HEAD
   
=======
    //CATEGORY
    public function allCategory()
    {

        $query = $this->db->prepare('SELECT * FROM category');

        $query->execute();

        $category = $query->fetchAll(PDO::FETCH_OBJ);

        return $category;
    }
    public function deleteCategoryById($id)
    {

        $query = $this->db->prepare('DELETE FROM category WHERE id=?');

        $query->execute([$id]);

        $category = $query->fetch(PDO::FETCH_OBJ);

        return $category;
    }
    public function addCategory($name, $season)
    {

        //añadir: poder elegir la categoría a la que pertenecen utilizando un select que muestre el nombre de la misma. 

        $query = $this->db->prepare('INSERT INTO category VALUES(id=NULL,?, ?)');

        $query->execute([$name, $season]);
>>>>>>> 521e86da14f1bf704e9fc93ebab47a9a41fde41c

        //muestro el ultimo id que hay
        return $this->db->lastInsertId();
    }
}

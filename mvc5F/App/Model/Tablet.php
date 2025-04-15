<?php
//nel model ci vanno tante classi quante tabelle del db
namespace App\Model;

use PDO;
use Exception;

class Tablet
{
    private PDO $db;
public function __construct($db){
$this->db=$db;
}

//CRUD database
public function showAll(): array{
    $listOfTablet=[];
    $query= 'SELECT * FROM Tablet';
    try{
        $stmt= $this->db->prepare($query);
        $stmt->execute();
        while($product=$stmt->fetch()){
            $listOfTablet[]=$product;
        }
        $stmt->closeCursor();

    }catch(Exception $e){

    }
    return $listOfTablet;
}
}
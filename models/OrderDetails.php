<?php
class OrderDetails{
    private $db;
    function __construct($pdo) {
      $this->db = $pdo;
    }


    function addDetails($flowerId,$oderId,$quantity,$unitPrice){
        $stmt = $this->db->prepare("INSERT INTO oderdetail (flower_id, quantity,unitPice) VALUES (:f, :q, :u) WHERE oder_id=:o" );
        return $stmt->execute(array(
          ':f' => $flowerId,
          ':q' => $quantity,
          ':u' => $unitPrice,
          ':o' => $oderId
        ));
      }
  
}


?>
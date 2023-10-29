<?php
class Emp{
    private $db;
    function __construct($pdo) {
      $this->db = $pdo;
    }

    function add($empName,$userName,$hashPass){
      $stmt = $this->db->prepare("INSERT INTO employee (empName,UserName, Pass) VALUES (:e,:u, :p)");
      return $stmt->execute(array(
        ':e' => $empName,
        ':u' => $userName,
        ':p' => $hashPass
      ));
    }

    function find($userName){
      $sql = "SELECT * from employee WHERE UserName=:u";
      $stmt = $this->db->prepare($sql);
      $stmt-> bindParam(':u',$userName);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // function updateAvata($avata, $userId){
    //   $stmt = $this->db->prepare("UPDATE user set Avata=:avata WHERE Id=:id ");
    //   return $stmt -> execute(array(
    //     ':avata' => $avata,
    //     ':id' => $userId
    //   ));
    // }
}
?>
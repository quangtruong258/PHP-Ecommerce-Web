<?php
class User{
    private $db;
    function __construct($pdo) {
      $this->db = $pdo;
    }

    function add($userName,$email,$hashPass){
      $stmt = $this->db->prepare("INSERT INTO user (UserName, Email,password) VALUES (:u, :e, :p)");
      return $stmt->execute(array(
        ':u' => $userName,
        ':e' => $email,
        ':p' => $hashPass
      ));
    }

    function find($userName){
      $sql = "SELECT * from user WHERE UserName=:u";
      $stmt = $this->db->prepare($sql);
      $stmt-> bindParam(':u',$userName);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

//     function updateAvata($avata, $userId){
//       $stmt = $this->db->prepare("UPDATE user set Avata=:avata WHERE Id=:id ");
//       return $stmt -> execute(array(
//         ':avata' => $avata,
//         ':id' => $userId
//       ));
//     }
 }
?>
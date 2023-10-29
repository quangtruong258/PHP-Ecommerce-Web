<?php
class Order{
    private $db;
    function __construct($pdo) {
      $this->db = $pdo;
    }


    function add($createDay,$total,$userId){
        $stmt = $this->db->prepare("INSERT INTO oder (createDay, total, user_Id) VALUES (:c, :t, :u)");
        return $stmt->execute(array(
          ':c' => $createDay,
          ':t' => $total,
          ':u' => $userId
        ));
      }


      function list_order()
      {
          // $db = new Db();
          // $sql = "SELECT * FROM flower";
          // $result = $db->select_to_array($sql);
          // return $result;
  
          //$stmt = $this->db->prepare("select * from oder");
          $stmt = $this->db->prepare(" SELECT o.oder_id,o.createDay,o.total,u.UserName FROM oder as o, user as u WHERE o.user_Id = u.UserId");
          $stmt->execute();
  
          $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
          return $danhSach;
      }


      function order_today()
      {
          // $db = new Db();
          // $sql = "SELECT * FROM flower";
          // $result = $db->select_to_array($sql);
          // return $result;
  
          //$stmt = $this->db->prepare("select * from oder");
          //$stmt = $this->db->prepare(" SELECT sum(total) as tongngay FROM `oder` WHERE DATE(createDay) = CURDATE() ");
          $stmt = $this->db->prepare(" SELECT * FROM `oder` WHERE DATE(createDay) = CURDATE() ");
          $stmt->execute();
          $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
          return $danhSach;
  
          //$danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
          //return $stmt->fetch(PDO::FETCH_ASSOC);
  
          
      }


      function doanhthuthang()
      {
          // $db = new Db();
          // $sql = "SELECT * FROM flower";
          // $result = $db->select_to_array($sql);
          // return $result;
  
          //$stmt = $this->db->prepare("select * from oder");
          //$stmt = $this->db->prepare(" SELECT sum(total) as tongngay FROM `oder` WHERE DATE(createDay) = CURDATE() ");
          $stmt = $this->db->prepare(" SELECT * FROM `oder` WHERE MONTH(createDay) = MONTH(CURRENT_DATE())");
          $stmt->execute();
          $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
          return $danhSach;
  
          //$danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
          //return $stmt->fetch(PDO::FETCH_ASSOC);
  
          
      }

      function soluongnguoimua()
      {
          // $db = new Db();
          // $sql = "SELECT * FROM flower";
          // $result = $db->select_to_array($sql);
          // return $result;
  
          //$stmt = $this->db->prepare("select * from oder");
          //$stmt = $this->db->prepare(" SELECT sum(total) as tongngay FROM `oder` WHERE DATE(createDay) = CURDATE() ");
          $stmt = $this->db->prepare(" SELECT oder.user_Id, user.UserName FROM oder , user  WHERE oder.user_Id = user.UserId
          GROUP BY (oder.user_Id)");
          $stmt->execute();
          $soluong = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
          return $soluong;
  
          //$danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
          //return $stmt->fetch(PDO::FETCH_ASSOC);
  
          
      }



  
}


?>
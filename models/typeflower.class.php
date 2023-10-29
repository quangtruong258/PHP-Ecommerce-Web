<?php // IDEA
// 
class Typeflower
{
    private $db;


    function __construct($pdo)
    {
        $this->db = $pdo;
    }
    //save
    function save($typeName)
    {
        // $db = new Db();
        // $sql = "INSERT INTO typeofflower(typeName) VALUES ('$this->typeName')";
        // $result = $db->query_execute($sql);
        // return $result;

        $stmt = $this->db->prepare("INSERT INTO typeofflower (typeName) VALUES (:t)");
        return $stmt->execute(array(
          ':t' => $typeName
        ));
    }
    // lấy danh sách loại hoa
     function list_typeflower()
    {
        // $db = new Db();
        // $sql = "SELECT * FROM typeofflower";
        // $result = $db->select_to_array($sql);
        // return $result;
        $stmt = $this->db->prepare("select * from typeofflower");

        $stmt->execute();

        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $danhSach;


    }
    //lấy danh sách hoa theo loại
    // public static function list_color_by_typeflower_id($typeflowerID)
    // {
    //     $db = new Db();
    //     $sql = "SELECT * FROM color WHERE typeflower_id='$typeflowerID'" ;
    //     $result = $db->select_to_array($sql);
    //     return $result;
    // }
}

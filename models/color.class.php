<?php // IDEA

// 
class Color
{
    private $db;
    function __construct($pdo) {
      $this->db = $pdo;
    }

    // lấy danh sách loại sản phẩm
    function list_color()
    {
        // $db = new Db();
        // $sql = "SELECT * FROM color";
        // $result = $db->select_to_array($sql);
        // return $result;
        $stmt = $this->db->prepare("select * from color");

        $stmt->execute();

        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $danhSach;

    }
    //lấy danh sách hoa theo màu
    // public static function list_color_by_color_id($colorID)
    // {
    //     $db = new Db();
    //     $sql = "SELECT * FROM color WHERE color_id='$colorID'" ;
    //     $result = $db->select_to_array($sql);
    //     return $result;
    // }

}
?>
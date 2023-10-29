<?php //IDEA:

// 
class flower
{
    public $flowerID;
    public $flowerName;
    public $colorID;
    public $unit;
    public $price;
    public $available;
    public $flowerPicture;
    public $typeflower_id;
    private $db;

    // cons
    function __construct($pdo)
    {
        // $this->flowerName = $flowerName;
        // $this->colorID = $colorID;
        // $this->unit = $unit;
        // $this->price = $price;
        // $this->available = $available;
        // $this->flowerPicture = $flowerPicture;
        // $this->typeflower_id = $typeflower_id;
        $this->db = $pdo;
    }
    // lưu sản phẩm
    public function save($flowerName,$price, $flowerPicture, $typeflower_id)
    {
        // $filetemp = $this->flowerPicture['tmp_name'];
        // $user_file = $this->flowerPicture['name'];


        // $filetemp = $flowerPicture['tmp_name'];
        // $user_file = $flowerPicture['name'];
        // $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
        // $filepath = "uploads/" . $timestamp . $user_file;
        // if (move_uploaded_file($filetemp, $filepath) == false) {
        //     return false;
        // }



        //end upload file
        // $db = new Db();
        // // adđ product into database
        // $sql = "INSERT INTO flower (flowername, colorID, unit, price, available, flowerPicture, typeflower_id) VALUE
        // ('$this->flowerName', '$this->colorID', '$this->unit', '$this->price', '$this->available', '$filepath', '$this->typeflower_id')";
        // echo $sql;
        // $result = $db->query_execute($sql);
        //return $result;
        $stmt = $this->db->prepare("INSERT INTO flower (flowername, price, flowerPicture, typeflower_id) VALUES (:Flowername, :Price, :FlowerPicture, :Typeflower_id)");

        return $stmt->execute(array(
            ':Flowername' => $flowerName,
            
        
            ':Price' => $price,
            
            ':FlowerPicture' => $flowerPicture,
            ':Typeflower_id' => $typeflower_id
        ));
    }
    // list flower
    function list_flower()
    {
        // $db = new Db();
        // $sql = "SELECT * FROM flower";
        // $result = $db->select_to_array($sql);
        // return $result;

        $stmt = $this->db->prepare("select * from flower");

        $stmt->execute();

        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $danhSach;
    }

    function timkiemhoa($keyword)
    {
        // $db = new Db();
        // $sql = "SELECT * FROM flower";
        // $result = $db->select_to_array($sql);
        // return $result;

        $stmt = $this->db->prepare("SELECT * FROM `flower` WHERE flowerName like '%$keyword%';");

        $stmt->execute();

        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $danhSach;
    }

    // lấy ds sản phẩm theo màu sp
    function list_flower_by_cateid($colorID)
    {
        //     $db = new Db();
        //     $sql = "SELECT * FROM flower WHERE colorID='$colorID'";
        //     $result = $db->select_to_array($sql);
        //     return $result;
        $stmt = $this->db->prepare("select * from flower where colorID='$colorID'");

        $stmt->execute();

        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $danhSach;
    }
    //lấy ds sản phẩm theo loại hoa
    function list_flower_by_typeflower($typeflower_id)
    {
        // $db = new Db();
        // $sql = "SELECT * FROM flower WHERE typeflower_id='$typeflower_id'";
        // $result = $db->select_to_array($sql);
        // return $result;

        $stmt = $this->db->prepare("select * from flower where typeflower_id='$typeflower_id'");

        $stmt->execute();

        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $danhSach;
    }
    //lấy ds hoa cùng loại
    function list_flower_relate($typeflower_id, $id)
    {
        // $db = new Db();
        // $sql = "SELECT * FROM flower WHERE typeflower_id='$typeflower_id' AND flower_id !='$id'";
        // $result = $db->select_to_array($sql);
        // return $result;

        $stmt = $this->db->prepare("select * from flower where typeflower_id='$typeflower_id' AND flower_id !='$id'");

        $stmt->execute();

        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $danhSach;
    }
    // tìm hoa theo id
    function get_flower($id)
    {
        // $db = new Db();
        // $sql = "SELECT * FROM flower WHERE flower_id='$id'";
        // $result = $db->select_to_array($sql);
        // return $result;

        $sql = "SELECT * FROM flower where
      flower_id =:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function update($tenHoa, $giaBan, $maHoa)
    {

        $stmt = $this->db->prepare("UPDATE flower SET 
        flowerName =:tenHoa, price=:giaBan where flower_id=:maHoa");
        return $stmt->execute(array(
            ':tenHoa' => $tenHoa,
            ':giaBan' => $giaBan,
            ':maHoa' => $maHoa
        ));
    }
}

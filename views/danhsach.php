<?php
include_once('views/shares/header.php');

// if (!isset($_GET["typeflower_id"])) {
//     $flowers = flower::list_flower();
// } else {
//     $typeflower = $_GET["typeflower_id"];
//     $flowers = flower::list_flower_by_typeflower($typeflower);
// }
// // $colors = Color::list_color();
// $typeflowers = Typeflower::list_typeflower();
?>
<!-- <div class="col-sm-3">
    <h3>Danh sách loại hoa</h3>
    <ul class="list-group">
        <?php
        // foreach ($danhsachloaihoa as $item) {
        //     echo "<li class = 'list-group-item'><a
        //     href=/DAPHP/list_flower.php?typeflower_id=" . $item["typeflower_id"] . ">" . $item["typeName"] . "</a></li>";
        // } ?>
    </ul>
</div> -->
<div class="container text-center">
    <h3>Danh sách hoa cửa hàng</h3><br />
    <div class="row row-cols-4">
        <?php
        //...design
        foreach ($danhsach as $item) {
        ?>
            <div class="col-md-3">
                <a href="?r=xemchitiet&mahoa=<?= $item['flower_id'] ?>"> <img src="<?php echo "../DAPHP/" . $item["flowerPicture"]; ?>" class="img-responsive" style="width: 100%;" alt="Image"></a>
                <p class="text-danger"><?php echo $item["flowerName"]; ?></p>
                <p class="text-info"><?php echo number_format($item["price"], 0, ",", ".") ?> VND</p>

            </div>
        <?php } ?>
    </div>

</div>
<?php include_once("views/shares/footer.php"); ?>
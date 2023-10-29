<?php
session_start();
include_once('views/shares/header.php');
?>



<div class="container text-center">
    <h3>Danh sách hoa tìm được</h3><br />
    <div class="row row-cols-4">
        <?php
        //...design
        foreach ($danhsachtimkiem as $item) {
        ?>
            <div class="col-md-3">
                <a href="?r=xemchitiet&mahoa=<?= $item['flower_id'] ?>"> <img src="<?php echo "../DAPHP/" . $item["flowerPicture"]; ?>" class="img-responsive" style="width: 100%;" alt="Image"></a>
                <p class="text-danger"><?php echo $item["flowerName"]; ?></p>
                <p class="text-info"><?php echo number_format($item["price"], 0, ",", ".") ?> VND</p>

            </div>
        <?php } ?>
    </div>

</div>
<?php
include_once('views/shares/footer.php');
?>
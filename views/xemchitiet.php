<?php include_once("views/shares/header.php"); ?>

<div class="container text-center">

<div class="col-sm-9 panel panel-default text-center">
    <!-- <div class="col-sm-3 panel panel-danger">
        <h3 class="panel-heading">Loại Hoa </h3>
        <ul class="list-group">
            <?php
            // foreach ($typeflower as $item) {
            //     echo "<li class='list-group-item'><a
            //     href=/DA_manguonmo/list_flower.php?typeflower_id=" . $item["typeflower_id"] . ">" . $item["typeName"] . "</a></li>";
            // } 
            ?>
        </ul>
    </div> -->
    <div class="panel-heading">
        <h3 class="card-title">Chi tiết hoa</h3>

        <!-- Multi Columns Form -->
        <!-- <form class="row" action="?r=xemchitiet&mahoa=<?php echo $flower['flower_id'] ?>"> -->
            <div class="row">
                <div class="col-sm-6">
                    <img src="<?php echo "../DAPHP/" . $flower["flowerPicture"]; ?>" class="img-responsive" style="width:35%,height=20%" alt="Image">
                </div>
                <div class="col-sm-6">
                    <!-- in thong tin chi tiet san pham-->
                    <div style="padding-left:10px">
                        <h3 class="text-info">
                            <?php echo $flower["flowerName"]; ?>
                        </h3>
                        <p>
                            Giá: <?php echo number_format($flower["price"], 0, ",", ".") ?> VND
                        </p>

                        <p>
                            <a href="?r=addcart2&mahoa=<?= $flower['flower_id'] ?>"> <button type="button" class="btn  btn-danger">Mua Hàng</button> </a>
                        </p>
                    </div>
                </div>
            </div>

            

        <!-- </form> -->

        <h3 class="panel-heading"> Hoa cùng loại</h3>
            <div class="row">
                <?php
                foreach ($hoacungloai as $item) {
                ?>
                    <div class="col-sm-4">
                        <a href="?r=xemchitiet&mahoa=<?= $item['flower_id'] ?>">
                            <img src="<?php echo "../DAPHP/" . $item["flowerPicture"]; ?>" class="img-responsive" style="width:100%" alt="Image">
                        </a>
                        <p class="text-danger"><?php echo $item["flowerName"]; ?> </p>
                        <p class="text-ingo"><?php echo number_format($item["price"], 0, ",", ".") ?> VND</p>
                        <!-- <p>
                            <a href="./shopping_flow.php?id=<?= $item['flower_id'] ?>"> <button type="button" class="btn  btn-danger">Mua Hàng</button> </a>
                        </p> -->
                    </div>
                <?php   } ?>
            </div>
    </div><!-- End Multi Columns Form -->

</div>

</div>




<?php include_once("views/shares/footer.php"); ?>
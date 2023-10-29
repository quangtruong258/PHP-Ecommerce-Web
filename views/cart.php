<?php if (!isset($_SESSION)) {
  session_start();
} ?>
<?php include_once("views/shares/header.php"); ?>
<!-- thong tin trong shopping cart-->
<div class="container text-center">
  <!-- <div class="col-sm-3">
        <h3>Danh mục</h3>
        <ul class = "list-group">
            <?php
            // foreach($cates as $items){
            //     echo"<li class ='list-group-item'><a
            //     href=/LAB_03/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a></li>";

            // }
            ?>
        </ul>
    </div> -->
  <div>
  <a href="?r=empty-cart" class="btn btn-sm btn-danger mt-2">Empty Cart</a>
    <h3>Thông tin giỏ hàng</h3> <br>
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Tên sản phẩm</th>
          <th>Hình ảnh</th>
          <th>Số lượng</th>
          <th>Đơn giá</th>
          <th>Thành tiền</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total_monney = 0;
        if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0) {
          foreach ($_SESSION['cart_items'] as $item) {
            
            // $id = $item['pro_id'];
            // //$flower = flower::get_flower($id);
            // $flow = reset($flower);
            $total_monney += $item["unit"] * $flower["price"];
            echo "<tr><td>" . $flower["flowerName"] . "</td><td><img style='width:90px; height:80px' src=" . $flower["flowerPicture"] . "
                       /></td><td>" . $item["unit"] . "</td><td>" . number_format($flower["price"], 0, ",", ".") . "</td><td>" . number_format($item["unit"] * $flower["price"]) . "</td></tr>";
          }
          echo "<tr> <td colspan=5><p clas='text-right text-danger'>Tổng tiền: " . number_format($total_monney, 0, ",", ".") . "</p></td> </tr>";
          echo "<tr> 
                        <td colspan=3>
                        <p clas='text-right'>
                        <a href='?r=danhsach'><button type='button' class'btn btn-primary'>Tiếp tục mua
                        hàng</button></a>
                        </p>
                        </td>
                        <td colspan=2>
                        <p class= 'text-right'><button type='button' class='btn btn-success'>Thanh 
                        toán
                        </button>
                        </p>
                        </td>
                        </tr>";
        } else {
          echo "Không có sản phẩm nào trong giỏ hàng!";
        }

        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- hien thi shopping cart-->

<?php include_once("views/shares/footer.php"); ?>
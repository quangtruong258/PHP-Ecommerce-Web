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

        <h3>Thông tin giỏ hàng</h3> <br>

        <form method="post" action="?r=ordercomplete">


            <table class="table table-condensed text-center">
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
                    $total_money = 0;
                    if (isset($_SESSION['cart_items'])) {
                        $i = 1;
                        foreach ($_SESSION['cart_items'] as $item) {

                            // $id = $item['pro_id'];
                            // //$flower = flower::get_flower($id);
                            // $flow = reset($flower);
                            $total_money += $item["qty"] * $item["dongia"];
                            echo "
                        <tr><td>" . $item["tenhoa"] . "</td>
                        <td><img style='width:90px; height:80px' src=" . $item["anh"] . "
                       /></td>
                        <td>
                           
                        </td>
                        <td>" . $item["qty"] . "</td>
                        <td>" . number_format($item["dongia"], 0, ",", ".") . "</td>
                        <td>" . number_format($item["qty"] * $item["dongia"]) . "</td></tr>";
                        }
                        $_SESSION['total_money'] = $total_money;
                        echo "<tr> <td colspan=5><p clas='text-right text-danger'>Tổng tiền: " . number_format($total_money, 0, ",", ".") . "</p></td> </tr>";

                        echo "<tr> 
                        <td colspan=3>
                        <p clas='text-right'>
                        <a href='?r=danhsach'><button type='button' class'btn btn-primary'>Tiếp tục mua
                        hàng</button></a>
                        </p>
                        </td>
                        <td colspan=2>
                       
                        <a href='?r=ordercomplete'  class= 'text-right'><button type='submit' class='btn btn-success'>Thanh 
                        toán
                        </button>
                        <a href='?r=empty-cart' class='btn btn-sm btn-danger mt-2'>Empty Cart</a>
                        </p>
                        </td>
                        </tr>";
                    } else {
                        echo "Không có sản phẩm nào trong giỏ hàng!";
                    }

                    ?>
                </tbody>


            </table>
        </form>


            <h4>Phương thức thanh toán</h4>

            <form method="POST" enctype="application/x-www-form-urlencoded" action="views/xulithanhtoanmomo.php">
                <input type="submit" name="momo" value="Thanh toán MOMO QR CODE" class="btn btn-danger">

            </form>

            <!-- <form method="POST" enctype="application/x-www-form-urlencoded" action="views/xulithanhtoanmomo_atm.php">
                <input type="submit" name="momo" value="Thanh toán MOMO ATM" class="btn btn-danger">

            </form> -->


            











            <!-- <div class="form-group">

                <label for="mssv">MSSV:</label>

                <input type="text" class="form-control" name="mssv" placeholder="Nhập MSSV">

            </div> -->
            <br></br>


        </form>







    </div>
</div>

<!-- hien thi shopping cart-->

<?php include_once("views/shares/footer.php"); ?>
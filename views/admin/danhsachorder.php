<?php
session_start();
include_once('views/shares/admin/header.php');
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Trang Chủ</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?r=admin">Home</a></li>
        <li class="breadcrumb-item active">Quản lý đơn đặt hàng</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Danh sách đơn đặt hàng</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Mã đơn đặt hàng</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Giá trị đơn hàng</th>
            <th scope="col">Người mua</th>
            
            <?php
            if(isset($_SESSION['userId'])){
            ?>
              <th scope="col">EDIT</th>
            <!-- <th scope="col">DELETE</th> -->
              <?php
            }
            // else{
            //   echo "<td>ADD TO CART</td>";
            // }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($danhsach as $item) {
            echo "<tr>";
            echo "<td scope='row'>" . $item['oder_id'] . "</td>";
            echo "<td scope='row'>" . $item['createDay'] . "</td>";
            echo "<td scope='row'>" . number_format($item["total"],3, ",", ".") . "</td>";
            echo "<td scope='row'>" . $item['UserName'] . "</td>";

            //echo "<td scope='row'>" "<img src=" '../DAPHP/' . $item['flowerPicture'] . "</td>";
            if(isset($_SESSION['userId'])){
                ?>
            <!-- //echo "<td><a href ='?r=delete&masophieu= " . $item['MaSoPhieu'] . "'>DELETE</a></td>"; -->
            <td><a href ="?r=admin/quanlyhoa/edit&mahoa=<?php echo $item['oder_id'] ?>">EDIT</a></td>
            <?php
            }
            else{
              //echo "<td> <a class='btn btn-info' href='?r=add-cart&masophieu=".$item['MaSoPhieu'] ."'> ADD TO CART </a></td>";
              
            }
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
      <!-- End Table with stripped rows -->
    </div>
  </div>
</main> 
<?php
include_once('views/shares/admin/footer.php');
?>
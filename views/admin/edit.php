<?php
session_start();
include_once('views/shares/admin/header.php');
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Trang chủ</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Chỉnh sửa thông tin hoa </h5>

    <!-- Multi Columns Form -->
    <form class="row g-3" method="post" action="?r=admin/quanlyhoa/edit&mahoa=<?php echo $editHoa['flower_id'] ?>">
      <div class="col-md-12">
        <label for="tenhoa" class="form-label">Tên hoa </label>
        <input value="<?php echo $editHoa['flowerName'] ?>" name="tenhoa" type="text" class="form-control" id="tenhoa">
      </div>
      <div class="col-md-12">
        <label for="giaban" class="form-label">Giá bán </label>
        <input value="<?php echo number_format($editHoa["price"], 0, ",", ".") ?>" name="giaban" type="text" class="form-control" id="giaban">
      </div>
      <button type="submit" class="btn btn-primary">Cập Nhật</button>
      </div>
  </form><!-- End Multi Columns Form -->

</div>
</div>
</main>

<?php
include_once('views/shares/admin/footer.php');
?>
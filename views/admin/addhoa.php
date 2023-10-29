<?php

include_once('views/shares/admin/header.php');
?>

<main id="main" class="main">
<body>
	<div class="container">

		<h1>Thêm hoa</h1>

		<form method="post" action="?r=admin/quanlyhoa/themhoa" enctype="multipart/form-data">

			<div class="form-group">

				<label for="tenhoa">Tên hoa</label>

				<input type="text" class="form-control" name="tenhoa" placeholder="Nhập tên hoa">

			</div>

			<div class="form-group">

				<label for="giaban">Giá bán</label>

				<input type="text" class="form-control" name="giaban" placeholder="Nhập giá bán">

			</div>

			<div class="form-group">

				<label for="anhhoa">Chọn ảnh</label>
                <input type="file" class="form-control" name="anhhoa" id="anhhoa">
				<!-- <input type="text" class="form-control" name="chuyennganh" placeholder="Nhập chuyên ngành"> -->

			</div>

			<div class="form-group">

				<label for="loai">Loại hoa</label>

				<input type="text" class="form-control" name="loai" placeholder="Nhập loại hoa">

			</div>
			<br></br>
			<button type="submit" class="btn btn-primary">Thêm</button>

		</form>

	</div>

</body>
</main>


<?php

include_once('views/shares/admin/header.php');
?>
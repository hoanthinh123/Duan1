<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="section-title text-center">
				<h2 class="title pb-4 text-dark text-capitalize">
					Chi Tiết Đơn Hàng
				</h2>
			</div>
		</div>
		<div class="col-12">
			<ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
				<li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
				<li class="breadcrumb-item active" aria-current="page">
					Chi tiết đơn hàng
				</li>
			</ol>
		</div>
	</div>
</div>
</nav>

<div class="containers">
	<?php
	extract($taikhoan);
	?>

	<form action="" method="POST">
		<main>
			<!-- start thông ting người nhận -->
			<div class="form-checkout">
				<h2>Thông tin người nhận</h2>

				<label for="name">Tên người nhận :</label>
				<input type="text" value="<?= $hoten ?>" name="ten_nguoinhan" required>

				<label for="address">Địa chỉ giao hàng:</label>
				<input type="text" value="<?= $diachi ?>" name="diachi_nguoinhan" required></input>

				<label for="name">Email : </label>
				<input type="text" value="<?= $email ?>" name="email_nguoinhan" required>

				<label for="name">Số điện thoại </label>
				<input type="number" value="<?= $sdt ?>" name="sdt_nguoinhan" required>



				<label class="lb">Phương thức thanh toán:</label>
				<div class="nut_radio">
					<input type="radio" class="ip" name="id_pttt" value="1" checked=""> Thanh toán khi giao hàng (COD) <br> <br>
					<input type="radio" class="ip" name="id_pttt" value="2"> Thanh toán bằng VNPAY
				</div>


				<label for="address">Ghi chú :</label>
				<textarea id="address" name="ghichu" rows="4" placeholder="Ghi chú về đơn hàng của bạn, ví dụ ghi chú bí mật khi giao hàng." ></textarea> <br> <br>

				<button type="submit" name="hoantatdathang">Xác nhận đặt hàng</button>

			</div>
			<!-- End phần thông tin người nhận -->
			<!-- Phần sản phẩm -->
			<div class="product">
				<h2>Đơn hàng của bạn</h2>
				<hr>
				<table class="table table-borderless">
					<thead>
						<tr>
							<th>Tên sản phẩm</th>
							<th></th>
							<th> Giá</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($listsanpham as $sp) :
						?>
							<tr>
								<td><?= $sp['tensp'] . " - " . $sp['thetich'] ?></td>
								<td><?= "x" . $sp['soluong'] . "   "; ?></td>
								<td><?= number_format($sp['gia'] * $sp['soluong'], 0, ",", ".") . " <u>đ</u>" ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<hr>
				<p><strong>Vận chuyển :</strong> Miễn phí vận chuyển</p>
				<p><strong>Thành tiền :</strong> <?= number_format($tong_gia_don_hang, 0, ",", ".") . " <u>đ</u>" ?></p>
				<input type="hidden" name="gia" value="<?= $sp['gia'] ?>">
				<input type="hidden" name="tongtien" value="<?= $tong_gia_don_hang ?>">


			</div>
		</main>
	</form>

	<!-- End phẩn sản phẩm -->
</div>

<style>
	body {
		font-family: Arial, sans-serif, ;
		margin: 0;
		padding: 0;


	}

	p {
		margin-bottom: 25px;
	}

	main {
		max-width: 1400px;
		margin: 20px auto;
		background-color: #fff;
		padding: 20px;
		border-radius: 8px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		display: grid;
		grid-template-columns: repeat(2, 1fr);
		grid-gap: 20px;
	}

	.product {
		height: auto;
		padding: 20px;
		border: 1px solid #ccc;
		border-radius: 5px;
		background: #f6f6f6;
	}

	.form-checkout {
		padding: 20px;
		border: 1px solid #ccc;
		border-radius: 8px;
	}

	label {
		font-weight: bold;
	}

	input[type="text"],
	input[type="number"],
	textarea {
		width: 100%;
		padding: 10px;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	button {
		background-color: #5a5ac9;
		color: #fff;
		border: none;
		padding: 10px 20px;
		border-radius: 4px;
		cursor: pointer;
	}

	button:hover {
		background-color: #555;
	}

	.nut_radio {
		width: 100%;
		padding: 20px;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}
</style>
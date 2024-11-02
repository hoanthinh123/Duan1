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
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="table-responsive">
        <div class="col-12" style="border:1px solid #333; border-radius: 5px; background: #e9ecef; font-weight: bold ; margin-bottom: 20px;">
          <p>Tên người nhận : <td scope="col"><?= $ttdonhang['ten_nguoinhan'] ?? "" ?></td>
          </p>
          <p>Email : <td scope="col"><?= $ttdonhang['email_nguoinhan'] ?? "" ?></td>
          </p>
          <p>Số người nhận : <td scope="col"><?= $ttdonhang['sdt_nguoinhan'] ?? "" ?></td>
          </p>
          <p>Ngày đặt hàng : <td scope="col"><?=date("d/m/Y", strtotime($ttdonhang['ngaydat']))??""?></td>

          </p>
          <p>Phương thức thanh toán : <td scope="col"><?= $ttdonhang['pttt'] ?? "" ?></td>
          </p>
          <p>Tổng tiền đặt hàng : <td scope="col"><?= number_format($ttdonhang['tongtien'], 0, ",", ".") . "<u>đ</u>" ?? "" ?></td>
          </p>
          <p>Đã thanh toán : <td scope="col"><?= number_format($ttdonhang['tongtien_dathanhtoan'], 0, ",", ".") . "<u>đ</u>" ?? "" ?></td>
          </p>
          <p>Số tiền cần phải thanh toán : <td scope="col"><?= number_format($ttdonhang['tongtien'] - $ttdonhang['tongtien_dathanhtoan'], 0, ",", ".") . "<u>đ</u>" ?? "" ?></td>
          </p>
          <p>Địa chỉ : <td scope="col" colspan="2"><?= $ttdonhang['diachi_nguoinhan'] ?? "" ?></td>
          </p>
          <p>Ghi chú : <td scope="col" colspan="2"><?= $ttdonhang['ghichu'] ?? "" ?></td>
          </p>
        </div>
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th class="text-center" scope="col">#</th>
              <th class="text-center" scope="col">Tên sản phẩm</th>
              <th class="text-center" scope="col">Hình ảnh</th>
              <th class="text-center" scope="col">Dung tích</th>
              <th class="text-center" scope="col">Giá tiền</th>
              <th class="text-center" scope="col">Số lượng</th>
              <th class="text-center" scope="col">Thành tiền</th>

            </tr>
            <?php
            foreach ($list_dhct as $key => $dhct) :
              extract($dhct);
            ?>
              <tr>
                <td class="text-center" scope="row">
                  <?= $key + 1 ?? "" ?>
                </td>
                <td class="text-center" scope="row">
                  <?= $tensp ?? "" ?>
                </td>
                <td class="text-center" scope="row">
                  <img src="upload/<?= $hinh ?? "" ?>" alt="" width="80px">
                </td>
                <td class="text-center" scope="row">
                  <?= $thetich ?? "" ?>
                </td>
                <td class="text-center" scope="row">
                  <?= number_format($gia, 0, ",", ".") . "<u>đ</u>" ?? "" ?>
                </td>
                <td class="text-center" scope="row">
                  <?= $soluong ?? "" ?>
                </td>
                <td class="text-center" scope="row">
                  <?php $giatien = $soluong * $gia ?>
                  <?= number_format($giatien, 0, ",", ".") . "<u>đ</u>" ?? "" ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
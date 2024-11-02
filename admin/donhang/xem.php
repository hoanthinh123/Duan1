<section class="tieude">
    <h4><a href="?act=homedonhang" style="text-decoration: none; color: #000;">Danh sách đơn hàng</a> / Thông tin đơn hàng</h4>
    <div class="lich">
        <div id="days"></div>
        <div id="dates"></div>
        <div class="gach">-</div>
        <div id="times"></div>
    </div>
    <script>
        window.onload = setInterval(clock, 1000);

        function clock() {
            var d = new Date();
            var date = d.getDate();
            var month = d.getMonth();
            var montharr = ["/1", "/2", "/3", "/4", "/5", "/6", "/7", "/8", "/9", "/10", "/11", "/12"];
            month = montharr[month];
            var year = d.getFullYear();
            var day = d.getDay();
            var dayarr = ["Chủ Nhật, ", "Thứ 2, ", "Thứ 3, ", "Thứ 4, ", "Thứ 5, ", "Thứ 6, ", "Thứ 7, "];
            day = dayarr[day];
            var hour = d.getHours();
            var min = d.getMinutes();
            var sec = d.getSeconds();
            document.getElementById("days").innerHTML = day + " ";
            document.getElementById("dates").innerHTML = date + "" + month + "/" + year;
            document.getElementById("times").innerHTML = hour + " giờ " + min + " phút " + sec + " giây";
        }
    </script>
</section>
<section class="danhmuc">
    <style>
        .chitietdonhang {
            width: 50%;
        }

        .list {
            padding: 10px 20px;
            margin: 10px 20px;
            font-size: 20px;
            background: white;
            width: 1365px;


        }

        .list li {
            list-style-type: none;
            padding: 0;
            margin: 10px 20px;
        }

        .list p {
            padding: 0;
            margin: 0;
        }
    </style>
    <div class="chitietdonhang" style="width:50%;padding:20px">
        
        <ul class="list"><section class="them"> Thông tin đơn hàng</section>
            <li><b>Tên người nhận:</b><?= " " . $ttdonhang['ten_nguoinhan'] ?? "" ?></li>
            <li><b>Email:</b><?= " " . $ttdonhang['email_nguoinhan'] ?? "" ?></li>
            <li><b>Số điện thoại:</b><?= " " . $ttdonhang['sdt_nguoinhan'] ?? "" ?></li>
            <li><b>Ngày đặt hàng:</b><?= " " . date("d/m/Y", strtotime($ttdonhang['ngaydat'])) ?? "" ?></li>
            <li><b>Phương thức thanh toán:</b><?= " " . $ttdonhang['pttt'] ?? "" ?></li>
            <li><b>Tổng tiền đơn hàng:</b><?= " " . number_format($ttdonhang['tongtien'], 0, ",", ".") . "<u>đ</u>" ?? "" ?></li>
            <li><b>Đã thanh toán:</b><?= " " . number_format($ttdonhang['tongtien_dathanhtoan'], 0, ",", ".") . "<u>đ</u>" ?? "" ?></li>
            <li><b>Số tiền còn phải thanh toán:</b><?= " " . number_format($ttdonhang['tongtien'] - $ttdonhang['tongtien_dathanhtoan'], 0, ",", ".") . "<u>đ</u>" ?? "" ?></li>
            <li><b>Địa chỉ:</b></li>
            <li><?= $ttdonhang['diachi_nguoinhan'] ?? "" ?></li>
            <li><b>Ghi chú:</b></li>
            <li><?= $ttdonhang['ghichu'] ?? "" ?></li>
        </ul>
    </div>
    <section class="danhsach">

    <form action="" method="post" enctype="multipart/form-data">
        <table style="background: white;">
            <tr>
                <th>#</th>
                <th>Tên Sản Phẩm</th>
                <th>Hình Ảnh</th>
                <th>Dung tích</th>
                <th>Số lượng</th>
                <th>Giá Tiền</th>
            </tr>
            <?php
            foreach ($list_dhct as  $key => $dhct) :
                extract($dhct);
            ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $tensp ?></td>
                    <td><img src="../upload/<?= $hinh ?>" alt="" width="80px"></td>
                    <td><?= $thetich ?></td>
                    <td><?= $soluong ?></td>
                    <?php $giatien = $soluong * $gia ?>
                    <td><?= number_format($giatien, 0, ",", ".") . "<u>đ</u>" ?></td>
                </tr>
            <?php endforeach; ?>
        </table></section>
        <div class="nut" style="margin: 20px 40px;">
            <a href="?act=homedonhang"><input type="button" value="Danh Sách đơn hàng" name=""></a>
        </div>
    </form>

</section><br>
</section>
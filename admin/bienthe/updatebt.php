<section class="tieude">
    <h4><a href="#" style="text-decoration: none; color: #000;">Danh sách biến thể</a> / Cập nhập biến thể</h4>
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
    <section class="them"> Cập nhập biến thể</section>
    <section class="taodm">
        <form action="index.php?act=capnhapbt" method="post">
            <div class="css">
                <div class="dm">
                    <p>Tên sản phẩm</p> <br>
                    <input class="form-control" type="text" name="tensp" value="<?= $tensp ?>" disabled style='background:#EDF5FF'>
                </div>
                <div class="dm">
                    <p>Thể tích </p> <br>
                    <input class="form-control" type="text" disabled name="thetich" value="<?=$thetich?>"  style='background:#EDF5FF'>
                </div>
                <div class="dm">
                    <p>Giá</p> <br>
                    <input type="text" name="gia" value="<?= $gia ?>" placeholder="Nhập Tên Danh Mục">
                </div>
                <div class="dm">
                    <p>Số lượng</p> <br>
                    <input type="text" name="soluong" value="<?= $soluong ?>" placeholder="Nhập Tên Danh Mục">
                </div>
            </div>
            <div class="nut">
                <input type="hidden" name="id_sanpham" value="<?= $id_sanpham ?>">
                <input type="hidden" name="id_thetich" value="<?= $id_thetich ?>">
                <input type="hidden" name="id" value="<?= $id_sp_tt ?>">
                <input type="submit" name="capnhap" value="Cập nhập">
                <a href="index.php?act=homebienthe&id_sanpham=<?=$id_sanpham?>"><input type="button" value="Danh Sách" name="" id=""></a>
            </div>
        </form>
    </section><br>
</section>
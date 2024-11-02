<section class="tieude">
  <h4><a href="danhmuc.html" style="text-decoration: none; color: #000;">Danh sách biến thể</a> / Thêm mới biến thể</h4>
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
  <section class="them"> Tạo mới biến thể</section>
  <section class="taodm">
    <form action="?act=addbienthe" method="post">
      <div class="css">
        <div class="dm">
          <p>Tên sản phẩm</p> <br>
          <input type="text" name="tensp" value="<?= $sanpham['tensp'] ?>" disabled style="background: white;">
        </div>
        <div class="dm">
          <p>Thể tích </p> <br>
          <select class="form-control" style=" width: 300px;
    padding: 15px 2px;
    border-radius: 5px;
    border: none;" name="id_thetich">
            <?php foreach ($listthetich as $thetich) : ?>
              <option value="<?= $thetich['id'] ?>" <?php
                                                  foreach ($check_thetich as $tt) {
                                                    echo $thetich['id'] != $tt['id_thetich'] ? '' : "disabled style='background:#EDF5FF'";
                                                  }
                                                  ?>>
                <?= $thetich['thetich'] ?>
              </option>
            <?php endforeach ?>
          </select><br>
          <?= $error['id_thetich'] ?? "" ?>

        </div>
        <div class="dm">
          <p>Giá</p> <br>
          <input type="text" name="gia" placeholder="Nhập Tên Danh Mục"><br><?= $error['gia'] ?? "" ?>
        </div>

        <div class="dm">
          <p>Số lượng</p> <br>
          <input type="text" name="soluong" placeholder="Nhập Tên Danh Mục"><br>
          <?= $error['soluong'] ?? "" ?>
        </div>
      </div>
      <div class="ghichu" style="margin-bottom:10px; color:#000">
        <span>*Không thể thêm thể tích mà sản phẩm đã có trước đó.</span>
      </div>
      <div class="nut">

        <input type="hidden" name="id_sanpham" value="<?= $sanpham['id'] ?>">
        <input type="submit" name="themmoi" value="Thêm mới">
        <a href="index.php?act=homebienthe&id_sanpham=<?= $sanpham['id'] ?? "" ?>"><input type="button" value="Danh Sách" name=""></a>
      </div>
    </form>
  </section><br>
</section>
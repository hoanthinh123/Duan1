<?php
        if (is_array($taikhoan)) {
            extract($taikhoan);
        }
    
?>
<section class="tieude">
            <h4><a href="index.php?act=hometaikhoan"  style="text-decoration: none; color: #000;">Danh sách tài khoản</a> / Cập nhập tài khoản</h4>
            <div class="lich">
                <div id="days"></div>
                <div id="dates"></div>
                <div class="gach">-</div>
                <div id="times"></div>
          </div>
          <script>
            window.onload = setInterval(clock,1000);
            function clock()
            {
            var d = new Date();
            var date = d.getDate();
            var month = d.getMonth();
            var montharr =["/1","/2","/3","/4","/5","/6","/7","/8","/9","/10","/11","/12"];
            month=montharr[month];
            var year = d.getFullYear();
            var day = d.getDay();
            var dayarr =["Chủ Nhật, ","Thứ 2, ","Thứ 3, ","Thứ 4, ","Thứ 5, ","Thứ 6, ","Thứ 7, "];
            day=dayarr[day];
            var hour =d.getHours();
            var min = d.getMinutes();
            var sec = d.getSeconds();
            document.getElementById("days").innerHTML=day+" ";
            document.getElementById("dates").innerHTML=date+""+month+"/"+year;
            document.getElementById("times").innerHTML=hour+" giờ "+min+" phút "+sec+" giây";
            }
            </script>
        </section>
        <section class="danhmuc">
            <section class="them"> Cập nhập tài khoản</section>
            <section class="taotk">
                <form action="index.php?act=updatetk" method="post">
                <div class="dm">
                   <p>Tên đăng nhập</p>  <br>
                    <input type="text" name="hoten" value="<?= $hoten?>"   style="background: white;">
                </div>
                <div class="dm">
                    <p>Email </p>  <br>
                    <input type="email" name="email" value="<?= $email?>">
                </div>
                <div class="dm">
                    <p>Số điện thoại </p>  <br>
                    <input type="tel" name="sdt" value="<?= $sdt?>" >
                </div>
                <div class="dm">
                    <p>Mật khẩu </p>  <br>
                    <input type="text" name="matkhau" value="<?= $matkhau?>" >
                </div>
                <div class="dm">
                    <p>Địa chỉ </p>  <br>
                    <input type="text" name="diachi"  value="<?= $diachi?>">
                </div>
                <div class="dmmoi gach">
                    <p>Vai trò </p>  <br>
                    <input type="radio" value="1" name="vaitro"  <?=$vaitro==1?"checked":""?>> Admin <br><br>
                    <input type="radio" value="0" name="vaitro"  <?=$vaitro==0?"checked":""?>> Người dùng
                </div>
                <div class="nut">
                    <input type="hidden" name="id" value="<?= $id ?>" >
                    <input type="submit" name="capnhap"  value="Cập nhập">
                    <a href="index.php?act=hometaikhoan"><input type="button" value="Danh Sách" name="" ></a>
                </div>
                <?php
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                ?>
                </form>
            </section><br>
        </section>
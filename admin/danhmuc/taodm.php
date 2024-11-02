<section class="tieude">
            <h4><a href="index.php?act=homedanhmuc"  style="text-decoration: none; color: #000;">Danh sách danh mục</a> / Thêm mới danh mục</h4>
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
            <section class="them"> Tạo mới danh mục</section>
            <section class="taodm">
                <form action="index.php?act=taodm" method="post">
                <div class="dm">
                   <p>Mã danh mục</p>  <br>
                    <input type="text" name="id"  disabled placeholder="Tăng dần !" style="background: white;">
                </div>
                <div class="dm">
                    <p>Tên danh mục </p>  <br>
                    <input type="text" name="tendm" required placeholder="Nhập Tên Danh Mục">
                </div>
                <div class="dm">
                    <p>Nội dung danh mục </p>  <br>
                    <input type="text" name="noidungdm" required placeholder="Nhập Nội Dung">
                </div>
                <div class="nut">
                    <input type="submit" name="themmoi"  value="Thêm mới">
                    <a href="index.php?act=homedanhmuc"><input type="button" value="Danh Sách" name="" id=""></a>
                </div>
                <?php 
                   if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                ?>
                </form>
            </section><br>
        </section>
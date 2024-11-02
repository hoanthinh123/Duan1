<section class="tieude">
            <h4><a href="?act=homesanpham"  style="text-decoration: none; color: #000;">Danh sách sản phẩm</a> / Thêm mới sản phẩm</h4>
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
            <section class="them"> Thêm mới sản phẩm</section>
            <section class="taotk">
                <form action="index.php?act=taosp" method="post" enctype="multipart/form-data">
                <div class="dm">
                   <p>Tên Sản Phẩm</p>  <br>
                    <input type="text" name="tensp"  required placeholder="Nhập tên sản phẩm" style="background: white;">
                </div>
                
                
                <div class="dm">
                    <p>Danh Mục </p>  <br>
                    <select style="width: 60%; height: 40px;font-size: 20px;line-height: 40px;text-align: center;border-radius: 3px;border:none;" name="id_danhmuc" >
                       <option >Tất cả</option>
                       <?php
                            foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                echo '<option value='.$id.'>'.$tendm.'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="anh">
                    <p>Hình Ảnh </p>  <br>
                    <input type="file" name="hinh"  required >
                </div>
                <div class="anhmoi">
                    <p>Mô tả </p>  <br>
                    <textarea type="text"  name="mota"  required ></textarea>
                </div>
                <div class="nut">
                    <input type="submit" name="themmoi"  value="Thêm mới">
                    <a href="?act=homesanpham"><input type="button" value="Danh Sách" name="" ></a>
                </div>
                <?php 
                   if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                ?>
                </form>
            </section><br>
        </section>
<section class="tieude">
            <h3>Danh sách tài khoản</h3>
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
            <section class="themmoi"><a href="index.php?act=taotaikhoan"><i class="fa-solid fa-plus"></i> Tạo mới tài khoản</a></section>
            <section class="danhsach">
                <section class="from">
                <form action="index.php?act=hometaikhoan" method="post">
                    <input type="text" name="kyw" placeholder="Tìm Kiếm Tên Tài Khoản ...">
                    <select name="vaitro">
                        <option value="1" selected>Admin</option>
                        <option value="0" selected>Người dùng</option>
                        <option value="" selected>Tất cả</option>
                    </select>
                    <input type="submit" name="listok" value="OK">
                </form>
            </section>
                <form action="" method="post">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Tên Tài Khoản</th>
                        <th>Email</th>
                        <th>Mật Khẩu</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Vai trò</th>
                        <th>Chức Năng</th>
                    </tr>
                    <?php
                            foreach ($listtaikhoan as $tk) {
                                
                                extract($tk);
                                $suatk = "index.php?act=suatk&id=" . $id;
                                $xoatk = "index.php?act=xoatk&id=" . $id;
                                $thongbao = "'"."Bạn có muốn xóa tài khoản:".$hoten."'";
                                if($vaitro==1){
                                    $vaitro="Admin";
                                }else{
                                    $vaitro="Người dùng";
                                }
                                echo 
                                '<tr>
                                <td>'. $id.'</td>
                                <td>'.$hoten.' </td>
                                <td>'.$email.'</td>
                                <td>'. $matkhau .'</td>
                                <td>'. $sdt .'</td>
                                <td>'. $diachi .'</td>
                                <td> '.$vaitro .'</td>
                                
                                <td>
                        
                                <a href="'.$suatk.'"><i class="fa-solid fa-pen-to-square" style="background: rgb(241, 241, 143);color: rgb(110, 110, 6);font-weight: 700;"></i></a><a href="'.$xoatk.'" onclick = "return confirm('.$thongbao.')"><i class="fa-regular fa-trash-can" style="background: rgb(237, 144, 144);color: rgb(125, 4, 4); font-weight: 700;"></i></a>                        
                                </td>
                                </tr>';
                                
                                
                            }
                            ?>
                    <!-- <tr>
                        <td>1</td>
                        <td>hoanthinh</td>
                        <td>hoanthinh311@gmail.com</td>
                        <td>123456</td>
                        <td>0963743496</td>
                        <td >Đội 5, Quảng Yên, Yên Sơn Quốc Oai</td>
                        <td >Admin</td>
                        <td><a href="?act=suatk"><i class="fa-solid fa-pen-to-square" style="background: rgb(241, 241, 143);color: rgb(110, 110, 6);font-weight: 700;"></i></a><a href=""onclick="return confirm('Bạn Có muốn Xóa không ?')"><i class="fa-regular fa-trash-can" style="background: rgb(237, 144, 144);color: rgb(125, 4, 4); font-weight: 700;"></i></a></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>hoanthinh</td>
                        <td>hoanthinh311@gmail.com</td>
                        <td>123456</td>
                        <td>0963743496</td>
                        <td >Đội 5, Quảng Yên, Yên Sơn Quốc Oai</td>
                        <td >Admin</td>
                        <td><a href="?act=suatk"><i class="fa-solid fa-pen-to-square" style="background: rgb(241, 241, 143);color: rgb(110, 110, 6);font-weight: 700;"></i></a><a href=""onclick="return confirm('Bạn Có muốn Xóa không ?')"><i class="fa-regular fa-trash-can" style="background: rgb(237, 144, 144);color: rgb(125, 4, 4); font-weight: 700;"></i></a></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>hoanthinh</td>
                        <td>hoanthinh311@gmail.com</td>
                        <td>123456</td>
                        <td>0963743496</td>
                        <td >Đội 5, Quảng Yên, Yên Sơn Quốc Oai</td>
                        <td >Admin</td>
                        <td><a href="?act=suatk"><i class="fa-solid fa-pen-to-square" style="background: rgb(241, 241, 143);color: rgb(110, 110, 6);font-weight: 700;"></i></a><a href=""onclick="return confirm('Bạn Có muốn Xóa không ?')"><i class="fa-regular fa-trash-can" style="background: rgb(237, 144, 144);color: rgb(125, 4, 4); font-weight: 700;"></i></a></td>
                    </tr> -->
                   
                </table>
                </form>
            </section><br>
        </section>
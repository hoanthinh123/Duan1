<section class="tieude">
            <h3>Danh sách bình luận</h3>
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
            <br>
            <section class="danhsach">
                <form action="" method="post">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Nội Dung Bình Luận</th>
                        <th>Tên Người Dùng</th>
                        <th>Ngày Bình Luận</th>
                        <th>Chức Năng</th>
                    </tr>
                    <?php
                                    foreach ($listbinhluan as $binhluan):
                                        extract($binhluan);
                                        $xoabl = "index.php?act=xoabl&id=" . $id;
                                    
                                ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $tensp ?></td>
                        <td><?= $noidung ?></td>
                        <td><?= $hoten ?></td>
                        <td><?= $ngaybinhluan ?></td>
                        <td><a href="<?= $xoabl ?>" onclick="return confirm('Bạn Có muốn Xóa không ?')"><i class="fa-regular fa-trash-can" style="background: rgb(237, 144, 144);color: rgb(125, 4, 4); font-weight: 700;"></i></a></td>
                    </tr>
                    <?php endforeach;?>

                </table></form>
            </section><br>
        </section>
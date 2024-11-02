<section class="tieude">

    <h4><a href="?act=homesanpham" style="text-decoration: none; color: #000;">Danh sách sản phẩm</a> / Biến thể sản phẩm</h4>
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
        .bienthe {
            padding: 10px 0 0 20px;
            margin: 10px;
        }

        ul li {
            list-style: none;
        }

        .bienthe img {
            margin: 10px;
        }

        h3 {
            margin-bottom: 10px;
        }

        h4 {
            margin-bottom: 10px;
        }
    </style>
    <div class="bienthe">
        <div style="display: flex;">

        <h3>Tên sản phẩm: </h3> <p style="margin-left: 10px; font-size: 20px; font-weight: 600;"><?= $sanpham['tensp'] ?? '' ?></p></div>
        <ul class="list">
            <h3>Mô tả :</h3><p style="font-size: 15px;"><?= $sanpham['mota'] ?? "" ?></p><br>
            <li>
                <h3>Hình ảnh:</h3>
            </li>
        </ul>
        <img src="../upload/<?= $sanpham['hinh'] ?? "" ?>" alt="" width="260px" height="260px">
    </div>
    <section class="themmoi"><a href="?act=addbienthe&id_sanpham=<?= $sanpham['id'] ?? "" ?>"><i class="fa-solid fa-plus"></i> thêm biến thể sản phẩm</a></section>
    <section class="danhsach">
        <form action="" method="post">
            <table>

                <tr>
                    <th>#</th>
                    <th>Thể Tích</th>
                    <th>số Lượng</th>
                    <th>Tình trạng</th>
                    <th>Giá tiền</th>
                    <th>Trạng thái</th>
                    <th>Chức Năng</th>

                </tr>
                <?php
                foreach ($listsanpham_thetich as $sp_tt) :
                    extract($sp_tt);
                    $suabienthe = "index.php?act=suabt&id_bienthe=$id";
                    $xoabienthe = "index.php?act=xoabt&id_sanpham=$id_sanpham&id_bienthe=$id";
                    $restorebienthe = "index.php?act=khoiphucbt&id_sanpham=$id_sanpham&id_bienthe=$id";
                    $themmoibienthe ="index.php?act=addbienthe&id_sanpham=$id";
                    if(check_thetich_in_sanpham($id)==3){
                        $themmoibienthe="";
                        $thongbao = "alert('Sản phẩm đã đủ biến thể, không thể thêm!')";
                    }
                ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $thetich ?></td>
                        <td><?= $soluong ?></td>
                        <td><style>
                                .bg-success{
                                padding: 10px 15px;
                                background: rgb(134, 244, 134);
                                border-radius: 5px;
                                color: rgb(13, 93, 13);
                                font-weight: 600;
                            }
                            .bg-danger {
                                padding: 10px 15px;
                                border-radius: 5px;
                                background-color: rgb(229, 97, 97);
                                color: rgb(111, 10, 10);
                                
                                font-weight: 600;
                            }
                            </style>
                            <span class="trangthai <?= $soluong > 0 ? "bg-success" : "bg-danger"; ?>"  >
                                <?= $soluong > 0 ? "Còn Hàng" : "Hết Hàng"; ?>
                            </span>
                            
                        </td>
                        <td><?= number_format($gia, 0, ",", ".") . "<u>đ</u>" ?></td>
                        <td><?= $trangthai == 1 ? "Hiển Thị" : "Ẩn" ?></td>

                        <td>
                            <a href="<?= $suabienthe ?>"><i class="fa-solid fa-pen-to-square" style="background: rgb(241, 241, 143);color: rgb(110, 110, 6);font-weight: 700;"  ></i></a>
                            <?php if ($trangthai == 1) {  ?>
                                <a href="<?= $xoabienthe ?>"><i  class="fa-regular fa-trash-can" style="background: rgb(237, 144, 144);color: rgb(125, 4, 4); font-weight: 700;"></i></a>
                            <?php } else { ?>
                                <a href="<?= $restorebienthe ?>"><i class="fa-regular fa-trash-can" style="background: rgb(195, 233, 100); color: rgb(125, 4, 4); font-weight: 700;" ></i></a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
            <!-- <tr>
                    <td>1</td>
                    <td>50ml</td>
                    <td>56</td>
                    <td>
                        <div class="trangthai" style="padding: 10px 15px; background: rgb(134, 244, 134); border-radius:5px;color:rgb(13, 93, 13);font-weight: 600; ">
                            Còn hàng
                        </div>
                    </td>
                    <td>5000</td>
                    <td>hiển thị</td>
                    <td><a href=""><i class="fa-regular fa-trash-can" style="background: rgb(237, 144, 144);color: rgb(125, 4, 4); font-weight: 700;"></i></a><a href=""><i class="fa-solid fa-pen-to-square" style="background: rgb(241, 241, 143);color: rgb(110, 110, 6);font-weight: 700;"></i></a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>50ml</td>
                    <td>56</td>
                    <td>
                        <div class="trangthai" style="padding: 10px 15px; background: rgb(134, 244, 134); border-radius:5px;color:rgb(13, 93, 13);font-weight: 600; ">
                            Còn hàng
                        </div>
                    </td>
                    <td>5000</td>
                    <td>hiển thị</td>
                    <td><a href=""><i class="fa-regular fa-trash-can" style="background: rgb(237, 144, 144);color: rgb(125, 4, 4); font-weight: 700;"></i></a><a href=""><i class="fa-solid fa-pen-to-square" style="background: rgb(241, 241, 143);color: rgb(110, 110, 6);font-weight: 700;"></i></a></td>
                </tr> -->

            <div class="nut">
                <a href="?act=homesanpham"><input style="margin: 10px 20px;" type="button" value="Danh Sách sản phẩm" name="" id=""></a>
            </div>
        </form>
    </section><br>
</section>
</section>
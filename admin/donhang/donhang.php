<section class="tieude">
    <h3>Đơn hàng</h3>
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
    <br>
    <section class="danhsach">
        <section class="from">
            <form action="" method="post" enctype="multipart/form-data">
                <select name="id_trangthai" class="listtrangthai">
                    <option value="">Tất Cả</option>
                    <option value="1">Chờ xử lý</option>
                    <option value="2">Đã xác nhận</option>
                    <option value="3">Đang vận chuyển</option>
                    <option value="4">Đã hoàn thành</option>
                    <option value="5">Hủy</option>
                </select>
                <input type="submit" name="listok" value="OK" class="donhang">
            </form>
        </section>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>#</th>
                    <th>Người nhận</th>
                    <th>Phương thức thanh toán</th>
                    <th style="width: 15%;">Trạng thái</th>
                    <th>Ngày đặt</th>
                    <th>Tổng Tiền</th>
                    <th>Chức Năng</th>
                </tr>
                <?php
                foreach ($list_dh as $dh) :
                    extract($dh);
                    $dhct = "index.php?act=chitietdonhang&id_donhang=$id";
                    $thaydoi_ttdh = "index.php?act=suadonhang&id_donhang=$id";
                    $huy = "";
                ?>
                    <tr>
                        <style>
                            .bg-xacnhan {
                                padding: 10px 15px;
                                background: rgb(134, 244, 134);
                                border-radius: 5px;
                                color: rgb(13, 93, 13);
                                font-weight: 600;
                            }

                            .bg-info {
                                padding: 10px 15px;
                                background: yellow;
                                border-radius: 5px;
                                color: rgb(82, 82, 13);
                                ;
                                font-weight: 600;
                            }

                            .bg-warning {
                                padding: 10px 15px;
                                background: rgb(203, 155, 224);
                                border-radius: 5px;
                                color: rgb(112, 12, 154);
                                font-weight: 600;
                            }

                            .bg-success {
                                padding: 10px 15px;
                                border-radius: 5px;
                                background-color: rgba(255, 69, 0, 0.2);
                                color: rgba(255, 69, 0, 0.7);
                                ;
                                font-weight: 600;
                            }

                            .bg-danger {
                                padding: 10px 15px;
                                border-radius: 5px;
                                background-color: rgb(229, 97, 97);
                                color: rgb(111, 10, 10);
                                ;
                                font-weight: 600;
                            }
                        </style>
                        <td><?= $id ?></td>
                        <td><?= $ten_nguoinhan ?></td>
                        <td><?= $pttt ?></td>
                        <?php
                        $class_ttdh = "";
                        switch ($trangthaidonhang) {
                            case 'Chờ xử lý':
                                $class_ttdh = "bg-info";
                                break;
                            case 'Đã xác nhận';
                                $class_ttdh = "bg-xacnhan";
                                break;
                            case 'Đang vận chuyển':
                                $class_ttdh = "bg-warning";
                                break;
                            case 'Đã hoàn thành':
                                $class_ttdh = "bg-success";
                                break;
                            case 'Đã hủy':
                                $class_ttdh = "bg-danger";
                                break;
                        } ?>
                        <td><span class="badge <?= $class_ttdh ?>"><?= $trangthaidonhang ?></span></td>
                        <td><?= date("d/m/Y", strtotime($ngaydat)) ?></td>
                        <td><?= number_format($tongtien, 0, ",", ".") . "<u>đ</u>" ?></td>
                        <td><a href="<?= $thaydoi_ttdh ?>"><i class="fa-solid fa-pen-to-square" style="background: rgb(241, 241, 143);color: rgb(110, 110, 6);font-weight: 700;"></i></a><a href="<?= $dhct ?>"><i class="fa-regular fa-eye"></i></a></td>
                    </tr><?php endforeach; ?>

            </table>

        </form>
    </section><br>
</section>
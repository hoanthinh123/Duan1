<section class="tieude">
    <h3>Danh sách danh mục</h3>
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
    <section class="themmoi"><a href="?act=taodm"><i class="fa-solid fa-plus"></i> Tạo mới danh mục</a></section>
    <section class="danhsach">
        <form action="" method="post">
            <table>
                <tr>
                    <th>#</th>
                    <th>Tên Danh Mục</th>
                    <th>Nội Dung</th>
                    <th>Chức Năng</th>
                </tr>
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    $suadm = "index.php?act=suadm&id=" .$id;
                    $xoadm = "index.php?act=xoadm&id=" .$id;
                    $thongbaoxoa= "'"."Bạn có muốn xóa: ".$tendm."'";
                    echo ' <tr>
                                    <td>' . $id . '</td>
                                    <td>' . $tendm . '</td>
                                    <td>' . $noidungdm . '</td>
                                    <td><a href="'.$suadm.'"><i class="fa-solid fa-pen-to-square" style="background: rgb(241, 241, 143);color: rgb(110, 110, 6);font-weight: 700;"></i></a><a href="'.$xoadm.'" onclick = "return confirm('.$thongbaoxoa.')" ><i class="fa-regular fa-trash-can" style="background: rgb(237, 144, 144);color: rgb(125, 4, 4); font-weight: 700;"></i></a></td>
                                    </tr>';
                }

                ?>
            </table>
        </form>
    </section><br>
</section>
</section>
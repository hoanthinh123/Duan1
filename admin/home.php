<section class="tieude">
    <h1>Chào mừng bạn đã tới trang Admin</h1>
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
    <section class="themmoi" style="margin-left:15px ;"><h2 style="font-weight: bolder;"> Thống kê tổng doanh thu trong năm</h2></section>

<section class="danhsach">

    <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="row element-button">
                    </div>
                    <div class="row" style="width: 900px;display: grid;grid-template-columns: 900px 300px;gap: 30px;">
                        <div class="form-group col-md-8">
                        <div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <canvas id="lineChart"></canvas>

                            <?php
                            $rows = doanhthutheothang();

                            if ($rows) {
                                // Tạo mảng để chứa dữ liệu
                                $data = [];

                                foreach ($rows as $row) {
                                    $data[] = [
                                        'thang' => $row['thang'],
                                        'doanhThu' => $row['tongDoanhThu']
                                    ];
                                }
                                usort($data, function ($a, $b) {
                                    return $a['thang'] - $b['thang'];
                                });
                            }
                            ?>
                            <script>
                                var ctxL = document.getElementById("lineChart").getContext('2d');

                                var hasData = <?php echo isset($data) && !empty($data) ? 'true' : 'false'; ?>;

                                if (hasData) {
                                    var labels = <?php echo json_encode(array_column($data, 'thang')); ?>;

                                    var doanhThu = <?php echo json_encode(array_column($data, 'doanhThu')); ?>;

                                    var myLineChart = new Chart(ctxL, {
                                        type: 'line',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: "Doanh thu (đ)",
                                                data: doanhThu,
                                                backgroundColor: ['rgba(105, 0, 132, .2)'],
                                                borderColor: ['rgba(200, 99, 132, .7)'],
                                                borderWidth: 2
                                            }]
                                        },
                                        options: {
                                            responsive: true
                                        }
                                    });
                                }
                            </script>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                            <table>
                                <tr>
                                    <th>Tháng</th>
                                    <th>Số lượng sản phẩm</th>
                                    <br>
                                </tr>
                                <?php
                                    foreach ($rows as $dt):
                                    extract($dt);
                                ?>
                                    <tr>
                                        <td><?=$thang?></td>
                                        <td><?=number_format($tongDoanhThu,0,',','.')."<u>đ</u>"??""?></td>
                                    </tr>
                                    
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div> 
                </div>  
            </div> 
        </div>    
</section><br>
</section>

</section>
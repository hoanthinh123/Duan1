<section class="tieude">
            <h4><a href="?act=homedonhang"  style="text-decoration: none; color: #000;">Danh sách đơn hàng</a> / Sửa đơn hàng</h4>
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
            <section class="them"> Sửa đơn hàng</section>
            <section class="taotk">
                <form action="index.php?act=capnhapdonhang" method="post" enctype="multipart/form-data">
                <div class="dm">
                   <p>Người nhận</p>  <br>
                   <input type="text" value="<?=$ten_nguoinhan??""?>" disabled   style="background: white;">
                </div>
                <div class="dm">
                   <p>Ngày đặt</p>  <br>
                    <input type="text" value="<?=$ngaydat??""?>" disabled   style="background: white;">
                </div>
                 <div class="dm">
                   <p>Tổng tiền</p>  <br>
                    <input type="text" value="<?=number_format($tongtien,0,',','.')."đ"??""?>" disabled   style="background: white;">
                </div> 
                <div class="dm">
                   <p>Phương thức thanh toán</p>  <br>
                    <input type="text"value="<?=$pttt??""?>" disabled   style="background: white;">
                </div>
                <div class="form-group col-md-3">
        <label class="control-label">Trạng thái đơn hàng</label><br>
        <div class="radio-group">
            <?php foreach ($listtrangthai as $trangthai): ?>
                <label class="radio-label">
                  <?php 
                    $style="";
                    // if($id_pttt==2&&$trangthai['id']==1){
                    //   $style="display:none";
                    // }
                  ?>
                    <input type="radio" name="id_trangthai" style="<?=$style?>" value="<?=$trangthai['id']?>" class="radio-input" <?=$trangthai['id']==$id_trangthai?"checked":""?>>
                    <div class="custom-radio" style="<?=$style?>" ></div>
                    <span id="radio-label-text" style="<?=$style?>" ><?=$trangthai['trangthaidonhang']?></span>
                </label>
            <?php endforeach ?> 
        </div>
    </div>
                <style>
      input[disabled] {
      color: rgba(255, 69, 0, 0.6); /* Màu chữ cho input disabled */
      /* Các thuộc tính khác nếu cần thiết */
      font-weight:bold;
      font-size:16px;
    }
    .radio-group {
        display: flex;
        flex-direction: column;
    }

    .radio-label {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .radio-input {
        display: none;
    }

    .custom-radio {
        position: relative;
        cursor: pointer;
        width: 20px; /* Adjust the size of the custom radio button */
        height: 20px; /* Adjust the size of the custom radio button */
        border: 2px solid #3498db; /* Change the border color as desired */
        border-radius: 50%;
        transition: background-color 0.3s, border-color 0.3s; /* Add a smooth transition effect */
    }

    .radio-input:checked + .custom-radio {
        background-color: #3498db; /* Change the background color when the radio button is checked */
        border-color: #267abf; /* Change the border color for the checked state */
    }

    #radio-label-text {
        font-size: 16px; /* Adjust the font size as needed */
        margin-left: 10px; /* Adjust the spacing between the radio button and label */
    }
</style>
    
               
                <div class="nut">
                <input type="hidden" name="id_donhang" value="<?=$id?>">
                    <input type="submit" name="capnhap"  value="Cập nhập">
                    <a href="?act=homedonhang"><input type="button" value="Danh Sách" name="" ></a>
                </div>
                </form>
            </section><br>
        </section>
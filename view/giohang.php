<div class="category-banner-container">
        <div class="category-banner">
            <div class="container">
                <!-- Cửa hàng -->

                <!-- breadcrumb-section start -->
                <nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title text-center">
                                    <h2 class="title pb-4 text-dark text-capitalize">
                                        <img src="assets/images/demoes/demo23/logo.png" alt="Porto Logo" width="113" height="48">
                                    </h2>
                                </div>
                            </div>
                            <div class="col-12">
                                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Giỏ hàng
                                        <?= $namedm ?? "" ?>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </nav>

                <style>
                    /* form {
                        /* display: flex;
                        align-items: center; */
                     */

                    .search-input {
                        margin-left: 10px;
                        border: 2px solid #fff;
                    }
                </style>
            </div>
        </div>
    </div>


<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="section-title text-center">
        <h2 class="title pb-4 text-dark text-capitalize">
        Các Sản Phẩm Trong Giỏ Hàng
        </h2>
      </div>
    </div>
    <div class="col-12">
      <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">
         Giỏ Hàng
        </li>
      </ol>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="table-responsive">
      <form action="index.php?act=thanhtoan" method="post">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th class="text-center" scope="col">#</th>
              <th class="text-center" scope="col">Tên sản phẩm</th>
              <th class="text-center" scope="col">Hình ảnh</th>
              <th class="text-center" scope="col">Thể tích</th>
              <th class="text-center" scope="col">Tổng kho</th>
              <th class="text-center" scope="col">Giá tiền</th>
              <th class="text-center" scope="col">Số lượng</th>
              <th class="text-center" scope="col">Thành tiền</th>
              <th class="text-center" scope="col">Chức năng</th>
              <th class="text-center" scope="col">Thanh toán</th>
            </tr>
          </thead>
            <tbody id="order-cart"><?php 
              foreach($listgiohang as $giohang):
                extract($giohang);
             ?>
                <tr>
                    <td><input type="checkbox" name="id_giohang[]" class="checkbox" value="<?=$id?>" checked></td>
                    <td><?=$tensp?></td>
                    <td>
                    <img src="upload/<?=$hinh?>" alt="img"  style="width: 200px; height: 200px;"/>
                    </td>
                    <td><?=$thetich?></td>
                    <td><?=$conlai?></td>
                    <td><?=number_format($gia,0,",",".")."<u>đ</u>"?></td>
                    <td>
                    <input id="soluong_<?=$id?>" type="number" min="1" max="<?=$conlai?>" step="1" value="<?=$soluong?>" oninput="updateSoLuong(<?=$id?>,<?=$conlai?>)" />
                    </td>
                    <td> <?=number_format($gia*$soluong,0,",",".")."<u>đ</u>"?></td>
                    <td>
                    <a href="index.php?act=xoagiohang&id_giohang=<?=$id?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này chứ ?')">
                    <span class="trash"><i class="fas fa-trash-alt"></i> </span>
                    </a>
                    </td>
                    <td>
                    <a href="index.php?act=thanhtoan&id_giohang=<?=$id?>" class="btn btn-dark btn--lg">Đặt Hàng</a>
                    </td>
                    <div style="color:red;font-size:17px"><?=$_COOKIE['thongbao']??""?></div>


                </tr><?php endforeach ?>
            </tbody>
        </table>
        <?php 
       $link ="index.php?act=thanhtoan";
      if(empty($listgiohang)){
        $link="";
        $thongbao ="alert('Bạn chưa có sản phẩm nào trong giỏ hàng')";
      }
    ?>
    <div class="Place-order mt-25" style="text-align:right">
      <input type="submit" onclick="<?=$thongbao??""?>" class="btn btn--lg btn-primary my-2 my-sm-0" name="dathangdachon" value="Đặt Hàng">
    </div>
        
              
      </div></form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script >
  function updateSoLuong(id,conlai){
    let newSoLuong =$('#soluong_'+id).val();
    if(newSoLuong<=0){
      newSoLuong=1;
    }
    if(newSoLuong>=conlai){
      newSoLuong=conlai;
    }
    $.ajax({
      type:'POST',
      url:'view/update-cart.php',
      data:{
        id:id,
        soluong:newSoLuong
      },
      success: function(response){
        $.post('view/cart-new.php',function(data){
          $('#order-cart').html(data);
        })
      },
      error: function (error) {
        console.error('Error:', error);
      }
    });
  }
</script>
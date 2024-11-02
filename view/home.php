<!-- Phần slide -->
<main class="main">
    <section class="intro-section mb-3" style="background: #f5f6f8;"style="width: 2000px;height: 650px;">
        <div class="home-slider slide-animate owl-carousel owl-theme" style="color: #f5f6f8;" data-owl-options="{
                        'nav': false,
                        'responsive': {
                            '1440': {
                                'nav': true
                            }
                        }
                    }">
            <div class="home-slide home-slide-1 banner" style="width: 1500px;">
                <img class="slide-bg" src="assets/images/demoes/demo23/slider/banner2.png" alt="slider image" style="width: 1500px;height: 650px;" >

                <div class="banner-layer banner-layer-middle banner-layer-left">
                    <div class="container-fluid">
                        <div class="appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                            <h2 class="font-weight-light ls-10 text-primary" >Bộ sưu tập nước hoa!</h2>
                            <a href="index.php" class="btn btn-link"style="color: white;"><i>Xem nước hoa của chúng tôi</i><i class="icon-right-open-big" ></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-slide home-slide-2 banner" style="width: 1500px;">
                <img class="slide-bg" src="assets/images/demoes/demo23/slider/bannerdiii.jpg" alt="slider image" style="width: 1480px;height: 650px;">

                <div class="banner-layer banner-layer-middle banner-layer-right w-100">
                    <div class="container-fluid">
                        <div class=" appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200" style="margin-left: 1100px;" >
                            <h2 class="font-weight-light ls-10 text-primary">Bộ sưu tập!</h2>
                            <a href="index.php" class="btn btn-link" style="color: white;"><i>Xem nước hoa của chúng tôi</i><i class="icon-right-open-big" ></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
        <!-- End phần slide -->

    </section>
    <?php
    $list_danhmuc = loadall_danhmuc();
    ?>
    <?php foreach ($list_danhmuc as $dm) { ?>
        <section class="welcome-section">
            <div class="container">

                <!-- Phần tiêu đề -->
                <h2 class="section-title text-center text-uppercase appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200"><?= $dm['tendm'] ?>
                </h2>
                <p class="section-description text-center mb-3 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="400"><?= $dm['noidungdm'] ?>
                </p>
                <!-- End phần tiêu đề -->

                <!-- Phần sản phẩm -->
                <div class="row ">
                    <?php
                        $listspnew = top4_sanphamnew_in_danhmuc($dm['id']);
                        foreach ($listspnew as $spnew) :
                    ?>
                    <div class="col-6 col-md-4 col-xl-3">
                        <div class="product-default inner-quickview inner-icon">
                                <figure>    
                                    <a href="?act=product&id_sanpham=<?= $spnew['id'] ?>">

                                        <img src="upload/<?= $spnew['hinh'] ?>" style="height:275px;object-fit: cover; " alt="product">

                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="?act=product&id_sanpham=<?= $spnew['id'] ?>" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <!-- <a href="?act=product&id_sanpham=<?= $spnew['id'] ?>" class="btn-quickview" title="Chi tiết"><i class="icon-magnifier"  ></i> Chi tiết</a> -->
                                </figure>
                                <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#" class="product-category">Loại</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                </div>
                                    <h3 class="product-title">
                                        <a href="?act=product&id_sanpham=<?= $spnew['id'] ?>"><?= $spnew['tensp'] ?></a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:90%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>


                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <?php
                                        $gia = number_format($spnew['giamin'], 0, ",", ".") . " - " . number_format($spnew['giamax'], 0, ",", ".");
                                        if ($spnew['giamin'] == $spnew['giamax']) {
                                            $gia = number_format($spnew['giamin'], 0, ",", ".");
                                        }
                                        $gia .= " <u>đ</u>";
                                        ?>
                                        <span class="product-price"><?= $gia ?></span>
                                    </div><!-- End phần giá -->
                                </div><!-- End .product-details -->
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <!-- Enh phần sản phẩm -->
                </div>




            </div>
        </section>




    <?php } ?>
</main>
<!-- End .main -->
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/porto_ecommerce/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2024 06:46:18 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Nhóm 10-Dự Án 1</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->


<!-- 
    <script>
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800', 'Poppins:200,300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Nanum+Brush+Script:400,700,800' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script> -->

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/demo23.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
</head>

<body>
    <div class="page-wrapper">
        <div class="top-notice font2">
            <div class="container-fluid text-center text-dark">
                <i class="icon-shipping align-middle"></i><b class="text-uppercase">Miễn phí vận chuyển</b>&nbsp;đối với đơn hàng từ $30 trở lên,
                Code:&nbsp;<b class="text-uppercase">Nhóm 10</b>&nbsp;| Hạn chế áp dụng.&nbsp;<a href="?act=shop" class="text-dark">Xem tất cả ưu đãi</a>
            </div>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div>

        <header class="header">
            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
                <div class="container-fluid">
                    <div class="header-left d-none d-lg-flex">
                        <div class="header-dropdown">
                            <a href="#">USD</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">Việt Nam Đồng</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="header-dropdown">
                            <a href="#"><i class="flag-us flag"></i>ENG</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#"><i class="flag-us flag mr-2"></i>Việt Nam</a>
                                    </li>
                                    <li><a href="#"><i class="flag-fr flag mr-2"></i>English</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div>
                    </div>

                    <div class="header-center ml-0 ml-lg-auto">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="index.php" class="logo">
                            <img src="assets/images/demoes/demo23/logo.png" alt="Porto Logo" width="113" height="48">
                        </a>
                    </div>

                    <div class="header-right">
                        <a href="?act=dangnhap" class="header-icon d-lg-block d-none">
                            <div class="header-user">
                                <i class="icon-user-2"></i>
                                <?php
                                if (isset($_SESSION['taikhoan'])) {
                                    extract($_SESSION['taikhoan']);
                                ?>
                                    <div class="header-userinfo">
                                        <span class="d-inline-block font2 line-height-1">Xin chào !</span>
                                        <h4 class="mb-0"><?= $hoten; ?> </h4>
                                    </div>


                                <?php } else {  ?>
                                    <div class="header-userinfo">
                                        <span class="d-inline-block font2 line-height-1">Xin chào !</span>
                                        <h4 class="mb-0"> My account</h4>
                                    </div>
                                <?php  } ?>
                            </div>
                        </a>


                        <a href="?act=giohang" class="header-icon">
                            <i class="minicart-icon"></i>
                        </a>

                        <!-- End phần đầu header -->

                        <div class="header-search header-search-popup header-search-category text-right d-flex d-lg-none">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i><span>Tìm kiếm</span></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="I'm searching for..." required>
                                    <div class="select-custom">

                                    </div><!-- End .select-custom -->
                                    <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>
                </div>
            </div>

            <div class="header-bottom sticky-header" data-sticky-options="{'mobile': false}">
                <div class="container-fluid">
                    <div class="header-left d-flex">
                        <nav class="main-nav">
                            <ul class="menu">
                                <li><a href="index.php?act=thoat" title="Thoát">Thoát</a></li>
                                <li><a href="?act=shop" title="Mua hàng">Mua hàng</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-center w-auto">
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="active">
                                    <a href="index.php" title="Trang chủ">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="?act=shop">Sản phẩm</a>
                                    <style>
                                        .megamenu li a:hover{
                                                background: #ccc;
                                        }
                                    </style>
                                    <ul class="megamenu megamenu-fixed-width megamenu-3cols" style="width: 350px;">
                                        <?php foreach ($listdm as $dm) : ?>
                                            <li><a href="index.php?act=shop&iddm=<?= $dm['id'] ?>">
                                                    <?= $dm['tendm'] ?>
                                                </a></li>
                                        <?php endforeach; ?>
                                    </ul>


                                </li>
                                <li class="d-none d-xl-block">
                                    <a href="?act=gioithieu" title="Giới thiệu">Giới thiệu</a>

                                </li>

                                <li><a href="?act=blog" title="Liên hệ">Liên hệ</a></li>

                            </ul>
                        </nav>
                    </div>
                    <div class="header-right d-flex pr-0">
                        <div class="header-search header-search-popup header-search-category text-right">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier mr-2"></i><span>Tìm kiếm</span></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q1" placeholder="Tìm kiếm sản phẩm..." required>

                                    <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>
                </div>
            </div>
        </header><!-- End .header -->
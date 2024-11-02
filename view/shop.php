<main class="main">
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
                                        Cửa Hàng
                                        <?= $namedm ?? "" ?>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </nav>

                <style>
                    form {
                        display: flex;
                        align-items: center;
                    }

                    .search-input {
                        margin-left: 10px;
                        border: 2px solid #fff;
                    }
                </style>
            </div>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div>
    </nav>

    <div class="container">
        <div class="rowmoi">
            <div class="col-lg-9 main-content">
                <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                    <div class="toolbox-left">
                        <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2">
                                </path>
                                <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                <path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                            </svg>
                            <span>Filter</span>
                        </a>

                        <div class="toolbox-item toolbox-sort">
                            <label>Sắp xếp theo:</label>
                            <div class="select-custom">
                                <select name="orderby" class="form-control">
                                    <option value="menu_order" selected="selected">Mức độ liên quan</option>
                                    <option value="popularity">Tên từ A đến Z</option>
                                    <option value="rating">Tên từ Z đến A</option>
                                    <option value="date">Gía tăng dần</option>
                                    <option value="price">Gía giảm dần</option>

                                </select>
                            </div><!-- End .select-custom -->


                        </div><!-- End .toolbox-item -->
                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-right">

                    </div><!-- End .toolbox-item -->

                    <div class="toolbox-item layout-modes">
                        <a href="?act=shop" class="layout-btn btn-grid active" title="Grid">
                            <i class="icon-mode-grid"></i>
                        </a>
                        <a href="?act=category-list" class="layout-btn btn-list" title="List">
                            <i class="icon-mode-list"></i>
                        </a>
                    </div><!-- End .layout-modes -->
            </div><!-- End .toolbox-right -->
            </nav>
           
                <div class="row">
            <?php
            foreach ($listsp as $sp) :
                extract($sp);
            ?>
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="?act=product&id_sanpham=<?= $sp['id'] ?>">
                                    <img src="upload/<?= $hinh ?>" style="height:275px;object-fit: cover; " alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                </div>
                                <!-- <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="icon-magnifier" style="font-weight: 700;"></i> Chi tiết</a> -->
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#" class="product-category">Loại</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="?act=product&id_sanpham=<?= $sp['id'] ?>"> <?= $tensp ?></a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <?php
                                    $gia = number_format($giamin, 0, ",", ".") . " - " . number_format($giamax, 0, ",", ".");
                                    if ($giamin == $giamax) {
                                        $gia = number_format($giamin, 0, ",", ".");
                                    }
                                    $gia .= "<u>đ</u>";
                                    ?>
                                    <span class="product-price"> <?= $gia ?></span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div><!-- End .col-lg-3 -->
 <?php
 
            endforeach;
            ?>
                </div><!-- End .row -->
           
            <nav class="toolbox toolbox-pagination">


                <ul class="pagination toolbox-item">
                    <li class="page-item disabled">
                        <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><span class="page-link">...</span></li>
                    <li class="page-item">
                        <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div><!-- End .col-lg-9 -->

        <div class="sidebar-overlay"></div>
        <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">

        </aside><!-- End .col-lg-3 -->
    </div><!-- End .row -->
    </div><!-- End .container -->
</main><!-- End .main -->
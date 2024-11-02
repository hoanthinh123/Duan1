    <main class="main">
        <div class="category-banner-container bg-gray">

        </div>

        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="?act=shop">Shop</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-9 order-lg-1">
                    <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                        <div class="toolbox-left">
                            <a href="#" class="sidebar-toggle">
                                <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                    <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                    <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                    <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
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
                            <!-- End .toolbox-item -->
                        </div>
                        <!-- End .toolbox-left -->

                        <div class="toolbox-right">

                            <!-- End .toolbox-item -->

                            <div class="toolbox-item layout-modes">
                                <a href="?act=shop" class="layout-btn btn-grid" title="Grid">
                                    <i class="icon-mode-grid"></i>
                                </a>
                                <a href="?act=category-list" class="layout-btn btn-list active" title="List">
                                    <i class="icon-mode-list"></i>
                                </a>
                            </div>
                            <!-- End .layout-modes -->
                        </div>
                        <!-- End .toolbox-right -->
                    </nav>

                    <div class="row pb-4">
                        <!-- foreach  -->
                        <?php
                        foreach ($listsp as $sp) :
                            extract($sp);
                        ?>
                            <div class="moi">
                                <div class="col-sm-12 col-6 product-default left-details product-list mb-2">
                                    <figure>
                                        <a href="?act=product&id_sanpham=<?= $sp['id'] ?>" style="background: #ccc;">
                                            <img src="upload/<?= $hinh ?>" style="width: 275px; height:275px;object-fit: cover;border-radius: 5px; " alt="product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="#  " class="product-category">Loại</a>
                                        </div>
                                        <h3 class="product-title"> <a href="?act=product&id_sanpham=<?= $sp['id'] ?>"> <?= $tensp ?>
                                            </a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->
                                        <p class="product-description"> <?= $mota ?>
                                        </p>
                                        <div class="price-box">
                                            <?php
                                            $gia = number_format($giamin, 0, ",", ".") . " - " . number_format($giamax, 0, ",", ".");
                                            if ($giamin == $giamax) {
                                                $gia = number_format($giamin, 0, ",", ".");
                                            }
                                            $gia .= "<u>đ</u>";
                                            ?>
                                            <span class="product-price"> <?= $gia ?>
                                            </span>
                                        </div>
                                        <!-- End .price-box -->
                                        <div class="product" style="margin-top: 10px;">
                                            <a href="?act=product&id_sanpham=<?= $sp['id'] ?>" style=" border-radius: 5px; background: black; color:white; padding:15px; font-weight: 700; " class=  "product-type-simple">
                                                <i class="icon-shopping-cart"></i>
                                                <span>Xem chi tiết sản phẩm </span>
                                            </a>
                                        </div>

                                        <!-- CSS cho phẩn xem chi tiết sản phảm -->
                                       <style>
                                        .product-type-simple span:hover{
                                            
                                            color:#ccc;
                                        }
                                        /* .product{
                                            border-radius: 5px;
                                        } */
                                       </style>
                                        <!-- End CSS cho phẩn xem chi tiết sản phảm -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!-- end -->
                    </div>

                    <nav class="toolbox toolbox-pagination">

                        <!-- End .toolbox-item -->

                        <ul class="pagination toolbox-item">
                            <li class="page-item disabled">
                                <a class="page-link page-link-btn" href="#">
                                    <i class="icon-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <span class="page-link">...</span>
                            </li>
                            <li class="page-item">
                                <a class="page-link page-link-btn" href="#">
                                    <i class="icon-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- End .col-lg-9 -->

                <div class="sidebar-overlay"></div>

                <!-- End .col-lg-3 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->

        <div class="mb-4"></div>
        <!-- margin -->
    </main>
    <!-- End .main -->
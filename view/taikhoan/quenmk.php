<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Quên mật khẩu
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>Quên mật khẩu</h1>
        </div>
    </div>

    <div class="container reset-password-container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="feature-box border-top-primary" style="margin: 10px 0;">
                    <div class="feature-box-content">
                        <form class="mb-0" action="index.php?act=quenmk" method="post">
                            <p>
                                Quên mật khẩu? Vui lòng nhập tên người dùng hoặc địa chỉ email của bạn. Bạn sẽ nhận được liên kết để tạo mật khẩu mới qua email.

                            </p>
                            <div class="form-group mb-0">
                                <label for="reset-email" class="font-weight-normal">Email</label>
                                <input type="email" class="form-control" id="reset-email" name="email" required placeholder="Nhập email..." />
                            </div>

                            <div class="form-footer mb-0">
                                <a href="?act=dangnhap">Bấm vào đây để đăng nhập</a>

                                <button type="submit" value="1" name="guiemail" class="btn btn-md btn-primary form-footer-right font-weight-normal text-transform-none mr-0">
                                    Cập nhật mật khẩu
                                </button>
                            </div>

                        </form>
                        <h5 style="color: red;">
                        <?php
                        if (isset($thongbao) && ($thongbao != ""))
                            echo $thongbao;
                        ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- End .main -->
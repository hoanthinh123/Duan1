<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Cập nhập tài khoản
                        </li>
                    </ol>
                </div>
            </nav>
            <br>
            <h1>Cập nhập tài khoản</h1>
        </div>
    </div>
    <div class="container">
        <div class="login-box">
            <style>
                body {
                    margin: 0;
                    padding: 0;
                    font-family: Arial, sans-serif;
                    background: #f4f4f4;
                }

                .container {
                    display: flex;
                    justify-content: center;
                    align-items: center;

                }

                .login-box,
                .register-box {
                    width: 600px;
                    padding: 40px;
                    background: #fff;
                    border-radius: 10px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                    margin: 10px 0;
                }

                h2 {
                    margin: 0 0 20px;
                    padding: 0;
                    color: #333;
                    text-align: center;
                }

                .textbox {
                    position: relative;
                    margin-bottom: 30px;
                }

                .textbox input {
                    width: 100%;
                    padding: 10px;
                    background: #f0f0f0;
                    border: none;
                    outline: none;
                    border-radius: 5px;
                }

                .btn {
                    width: 100%;
                    padding: 10px;
                    background: #007bff;
                    border: none;
                    border-radius: 5px;
                    color: #fff;
                    cursor: pointer;
                }

                .btn:hover {
                    background: #0056b3;
                }

                .bottom-text {
                    margin-top: 20px;
                    text-align: center;
                    font-size: 16px;
                    cursor: pointer;
                    transition: font-size 0.3s ease;
                }

                .bottom-text a {
                    text-decoration: none;
                    color: #007bff;
                }

                .bottom-text a:hover {
                    color: red;
                    font-size: 18px;
                    text-decoration: underline;
                }

                li {
                    list-style: none;
                }

                li a:hover {
                    text-decoration: underline;
                    color: #000;
                }

                .textboxmk {
                    position: relative;
                    margin-bottom: 30px;
                }

                .textboxmk input {
                    width: 100%;
                    padding: 10px;
                    background: #f0f0f0;
                    border: none;
                    outline: none;
                    border-radius: 5px 0 0 5px;
                }

                .momk button {
                    width: 40px;
                    height: 40px;
                    line-height: 10px;
                    text-align: center;
                    background: #f0f0f0;
                    border-radius: 0 5px 5px 0;
                    color: #000;

                }
            </style>
            <h2>Cập Nhập</h2>
            <?php
            if (isset($_SESSION['taikhoan']) && (is_array($_SESSION['taikhoan']))) {
                extract($_SESSION['taikhoan']);
            }
            ?>
            <form action="index.php?act=capnhaptk" method="POST">
                <div class="textbox">
                    <h4>Tên đăng nhập</h4>
                    <input type="text" name="hoten" value="<?= $hoten ?>" placeholder="Nhập tên đăng nhập">
                </div>
                <div class="textbox">
                    <h4>Email</h4>
                    <input type="email" name="email" value="<?= $email ?>" placeholder="Nhập email">
                </div>
                <div class="textbox">
                    <h4>Số điện thoại</h4>
                    <input type="text" name="sdt" value="<?= $sdt ?>" placeholder="Nhập số điện thoại">
                </div>
                <div class="textboxmk">
                    <h4>Mật khẩu</h4>
                    <div class="momk" style="display: flex;">
                        <input type="password" name="matkhau" id="ipnPassword" value="<?= $matkhau ?>" placeholder="Nhập mật khẩu">
                        <button class="btn btn-outline-secondary" type="button" id="btnPassword" class="mk">
                            <span class="fas fa-eye"></span>
                        </button>
                    </div>
                    <script>
                        const ipnElement = document.querySelector('#ipnPassword')
                        const btnElement = document.querySelector('#btnPassword')

                        // step 2
                        btnElement.addEventListener('click', function() {
                            // step 3
                            const currentType = ipnElement.getAttribute('type')
                            // step 4
                            ipnElement.setAttribute(
                                'type',
                                currentType === 'password' ? 'text' : 'password'
                            )
                        })
                    </script>
                </div>
                <div class="textbox">
                    <h4>Địa chỉ</h4>

                    <input type="text" name="diachi" value="<?= $diachi ?>" placeholder="Nhập địa chỉ">
                </div>
                <input type="hidden" name="id" value="<?= $id ?>">
                <button type="submit" class="btn" name="capnhat" value="1">Cập nhập</button><br><br>
                <button type="reset" class="btn" value="1">Nhập lại</button>
            </form>
            <div class="bottom-text">
                Về trang tài khoản <a href="?act=dangnhap">Đăng nhập</a>
            </div>
            

        </div>
    </div>

</main><!-- End .main -->
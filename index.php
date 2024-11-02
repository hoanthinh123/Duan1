<?php
ob_start();
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/thetich.php";
include "model/binhluan.php";
include "model/giohang.php";
include "model/donhang.php";
include "global.php";



if (isset($taikhoan['id'])) {
    $id_user = $taikhoan['id'];
}
$listtaikhoan = loadall_taikhoan();
$listdm = loadall_danhmuc();
$listsanpham = loadall_sanpham("", "");
include_once "view/header.php";
if (isset($_GET['act']) && $_GET['act'] != "") {
    switch ($_GET['act']) {
        case 'home':
            include_once "view/home.php";
            break;
            /**
             * ***** Đăng nhập đăng ký
             */
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $matkhau = $_POST['matkhau'];
                $xacnhan_matkhau = $_POST['xacnhan_matkhau'];
                $checkemail = checkemail_dangky($email);
                // var_dump($typeEmail);
                $error = [];
                // validate email: bat buoc nhap, email dung dinh dang, email ton tai
                if (empty($email)) {
                    $error['email'] = 'Email không được để trống';
                } else {
                    if (!empty($checkemail)) {
                        $error['email'] = 'Email này đã tồn tại vui lòng nhập email khác';
                    }
                }
                // validate hoten
                if (empty($hoten)) {
                    $error['hoten'] = 'Họ và tên không được để trống';
                }

                if (empty(trim($matkhau))) {
                    $error['matkhau'] = 'Mật khẩu không được để trống';
                }

                if ($matkhau !== $xacnhan_matkhau) {
                    $error['xacnhan_matkhau'] = 'Xác nhận mật khẩu không trùng khớp';
                }

                if (empty($error)) {
                    insert_taikhoan($hoten, $email, $matkhau);
                    $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập để thực hiện chức năng bình luận hoặc đặt hàng!";
                }
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $hoten = $_POST['hoten'];
                $matkhau = $_POST['matkhau'];
                $check_user = check_user($hoten, $matkhau);
                if (is_array($check_user)) {
                    $_SESSION['taikhoan'] = $check_user;
                } else {
                    $thongbao = "Tài khoản không tồn tại vui lòng đăng nhập lại hoặc đăng ký";
                }

                $error = [];
                if (empty($hoten)) {
                    $error['hoten'] = "Họ tên không được để trống";
                } else if ($hoten !== $check_user) {
                    $error['hoten'] = "Tên người dùng không tồn tại vui lòng nhập lại ";
                }
                if (empty($matkhau)) {
                    $error['matkhau'] = "Mật khẩu không được để trống";
                } else if ($matkhau !== $check_user) {
                    $error['matkhau'] = "Mật khẩu không trùng khớp";
                }
            }
            include 'view/taikhoan/login.php';
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];

                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là " . $checkemail['matkhau'];
                } else {
                    $thongbao = "Email này không tồn tại!";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'capnhaptk':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $matkhau = $_POST['matkhau'];
                $diachi = $_POST['diachi'];
                $id = $_POST['id'];
                edit_taikhoan($id, $hoten, $email, $sdt, $matkhau, $diachi);
                $_SESSION['taikhoan'] = check_user($hoten, $matkhau);
            }
            include 'view/taikhoan/capnhap.php';
            break;
        case 'thoat':
            session_unset();
            include "view/taikhoan/login.php";
            break;
        case "productDentail":
            //code
            break;
        case "shop":
            // gán trước nếu không có đỡ lỗi dòng 30
            $iddm = 0;
            $loc = "";
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
                $namedm = " In " . check_name_danhmuc($iddm);
            }
            // chức năng xắp xếp
            // if (isset($_GET['loc']) && $_GET['loc'] != "") {
            //     $loc = $_GET['loc'];
            // }
            // $kyw = "";
            // if (isset($_POST['kyw'])) {
            //     $kyw = $_POST['kyw'];
            // }
            $listsp = loadall_sanpham_thetich_chitiet($iddm);

            include_once "view/shop.php";
            break;
        
            break;
        case "category-list":
            $listsp = loadall_sanpham_thetich_chitiet("", "", "");

            include_once "view/category-list.php";
            break;
        case "product":
            if(isset($_POST['guibinhluan'])) {
                extract($_POST);
                insert_binhluan($id_sanpham, $noidung);
            }
            if(isset($_GET['id_sanpham']) && ($_GET['id_sanpham'] > 0)) {
                $id_sanpham = $_GET['id_sanpham'];
                $onesp = loadone_sanpham($id_sanpham);
    
                $binhluan = loadall_binhluan($_GET['id_sanpham']);
                $sp_tt = loadall_sanpham_thetich_view($id_sanpham);
                $thetich_in_sanpham = load_thetich_in_sanpham($id_sanpham);
                $danhmuc = check_danhmuc($id_sanpham);
                $name_dm = $danhmuc['tendm'];
                $iddm = $danhmuc['id'];
                $hinhanh = hinhanh_sanpham($id_sanpham);
                $splq = cac_sp_lienquan($iddm, $id_sanpham);
            }
            //them vào giỏ hàng
            if(isset($_POST['themgiohang'])) {
                extract($_POST);
                //kiểm tra người dùng đăng nhập hay chưa nếu chưua thì yêu cầu đăng nhập 
                if(isset($taikhoan['id'])) {
                    // check xem sản phẩm này đã có trong giỏ hàng chưa , nếu đã có thì + thêm số lượng
                    $check = check_giohang($id_sanpham_thetich, $taikhoan['id']);
                    $tongkho = check_tongkho($id_sanpham_thetich);
                    if(is_array($check)) {
                        $soluong += $check['soluong'];
                        if($soluong >= $tongkho) {
                            $soluong = $tongkho;
                        }
                        update_giohang($soluong, $check['id']);
                    } else {
                        insert_giohang($id_sanpham_thetich, $soluong, $taikhoan['id']);
                    }
                    setcookie("thongbaotgh", "Bạn đã thêm vào giỏ hàng thành công", time() + 10);
                    // header("Location:index.php?act=product&id_sanpham=$id_sanpham");
                } else {
                    include "view/yeucaudangnhap.php";
                }
               
            }
            if(isset($taikhoan['id'])) {
            //lấy số lượng và id-sanpham-bienthe người dùng muốn đặt hàng ngay
            if(isset($_POST['dathangngay'])) {
                
                $soluong = $_POST['soluong'];
                $id_sanpham_thetich = $_POST['id_sanpham_thetich'];
                header("Location:index.php?act=thanhtoan&id_sanpham_thetich=$id_sanpham_thetich&soluong=$soluong");
            }
        } else {
            include "view/yeucaudangnhap.php";
        }
            include_once "view/product.php";
            break;
            case "giohang":
                if(isset($taikhoan['id'])) {
                    $listgiohang = loadall_giohang($taikhoan['id']);
                    include_once "view/giohang.php";
                } else {
                    include "view/yeucaudangnhap.php";
                }
                break;
                case 'xoagiohang':
                    if(isset($_GET['id_giohang']) && $_GET['id_giohang'] > 0) {
                        $id_giohang = $_GET['id_giohang'];
                        delete_giohang($id_giohang);
                        header("location:index.php?act=giohang");
                    }
                    break;
                    case 'thanhtoan':
                        if(empty($taikhoan)) {
                            include "view/yeucaudangnhap.php";
                            die();
                        }
                        if(isset($_POST['dathangdachon'])) {
                            if(empty($_POST['id_giohang'])) {
                                header("location:index.php?act=giohang");
                                setcookie('thongbao', "**Bạn chưa chọn sản phẩm nào", time());
                                die;
                            }
                            $id_giohang = $_POST['id_giohang'];
                            $_SESSION['listsanpham'] = $listsanpham = load_giohang_duocchon($id_giohang, $taikhoan['id']);
                            $_SESSION['tongtiendonhang']=$tong_gia_don_hang = tong_gia_don_hang($taikhoan['id'], $id_giohang);
                        }
                        if(isset($_SESSION['listsanpham'])&&isset($_SESSION['tongtiendonhang'])) {
                            $listsanpham = $_SESSION['listsanpham'];
                            $tong_gia_don_hang=$_SESSION['tongtiendonhang'];
                        }
                        //mua tất cả sp trong giỏ hàng
                        $id_giohang='';
                        $listsanpham =loadall_giohang($taikhoan['id']);
                        //mua 1 sản phẩm trong giỏ hàng
                        if(isset($_GET['id_giohang']) && $_GET['id_giohang']) {
                            $listsanpham = mua1_giohang($taikhoan['id'], $_GET['id_giohang']);
                            $id_giohang = $_GET['id_giohang'];
                            $tong_gia_don_hang = tong_gia_don_hang($taikhoan['id'], $id_giohang);
                        }
            
                        //Đặt hàng ngay ở đơn hàng chi tiết
                        if(isset($_GET['id_sanpham_thetich']) && isset($_GET['soluong'])) {
                            $id_sanpham_thetich = $_GET['id_sanpham_thetich'];
                            $sptt_muangay = check_gia_ten_thetich_in_sp_tt($id_sanpham_thetich);
                            $gia = $sptt_muangay['gia']; //  Để lưu vào dtb bảng đơn hàng chi tiết
                            $tensp = $sptt_muangay['tensp'];  //  Để hiển thị  ở trang checkout (thanh toán)
                            $thetich = $sptt_muangay['thetich'];  //  Để hiển thị  ở trang checkout (thanh toán)
                            $soluong = $_GET['soluong'];   //  Để lưu vào dtb bảng đơn hàng chi tiết
                            $listsanpham = [[
                                'id_sanpham_thetich' => $id_sanpham_thetich,
                                'soluong' => $soluong,
                                'gia' => $gia,
                                'tensp' => $tensp,
                                'thetich' => $thetich,
                                'id' => '' // dòng 156 delete giỏ hàng , do mua ngay không thêm vào giỏ hàng nên đặt id là null
                            ]];
                            $tong_gia_don_hang = $gia * $soluong; //  Để lưu vào dtb bảng đơn hàng chi tiết
                        }
                        if(empty($listsanpham)) {
                            header("location:index.php");
                        }
                        ///bấm nút đặt hàng
                        if(isset($_POST['hoantatdathang'])) {
                            
                            print_r($_POST);
                            print_r($listsanpham);
                            extract($_POST);
                            echo "$id_pttt <br> $tongtien <br> ". $taikhoan['id'];
                            $checkid = insert_donhang($taikhoan['id'], $ten_nguoinhan, $email_nguoinhan, $sdt_nguoinhan, $diachi_nguoinhan, $id_pttt, $tongtien, $ghichu,0 );
                            $id_donhang = $checkid;
                            foreach($listsanpham as $sp) {
                                extract($sp);
                                insert_donhangchitiet($id_donhang, $id_sanpham_thetich, $soluong, $gia);
                                ///sau khi đặt hàng thành công thì xóa giỏ hàng
                                delete_giohang($id_giohang);
                            }
                            if(isset($_SESSION['listsanpham'])) {
                                unset($_SESSION['listsanpham']);
                            }
                            if($_POST['id_pttt'] == 2) {
                                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                                $vnp_Returnurl = "http://localhost/duan1/index.php?act=camon&id=$checkid";
                                $vnp_TmnCode = "U196OP1P"; //Mã website tại VNPAY 
                                $vnp_HashSecret = "NIQUZAGTOZJLDHSOEDFENLQTZOUTUWOW"; //Chuỗi bí mật
                                $vnp_TxnRef = $checkid; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                                $vnp_OrderInfo = "Thông tin mua hàng";
                                $vnp_OrderType = "billpayment";
                                $vnp_Amount = $tong_gia_don_hang * 100;
                                $vnp_Locale = "vn";
                                $vnp_BankCode = "";
                                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                                //Add Params of 2.0.1 Version
                                $inputData = array(
                                    "vnp_Version" => "2.1.0",
                                    "vnp_TmnCode" => $vnp_TmnCode,
                                    "vnp_Amount" => $vnp_Amount,
                                    "vnp_Command" => "pay",
                                    "vnp_CreateDate" => date('YmdHis'),
                                    "vnp_CurrCode" => "VND",
                                    "vnp_IpAddr" => $vnp_IpAddr,
                                    "vnp_Locale" => $vnp_Locale,
                                    "vnp_OrderInfo" => $vnp_OrderInfo,
                                    "vnp_OrderType" => $vnp_OrderType,
                                    "vnp_ReturnUrl" => $vnp_Returnurl,
                                    "vnp_TxnRef" => $vnp_TxnRef,
                                    //
                                    // "vnp_Bill_ten_nguoinhan" =>$ten_nguoinhan,
                                    // "vnp_Bill_email_nguoinhan"=>$email_nguoinhan,
                                    // "vnp_Bill_diachi_nguoinhan" =>$diachi_nguoinhan,
                                    // "vnp_Bill_pttt"=>$pttt,
                                    // "vnp_Bill_ghichu"=>$ghichu
                                );
            
                                if(isset($vnp_BankCode) && $vnp_BankCode != "") {
                                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                                }
                                if(isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                                    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                                }
                                //var_dump($inputData);
                                ksort($inputData);
                                $query = "";
                                $i = 0;
                                $hashdata = "";
                                foreach($inputData as $key => $value) {
                                    if($i == 1) {
                                        $hashdata .= '&'.urlencode($key)."=".urlencode($value);
                                    } else {
                                        $hashdata .= urlencode($key)."=".urlencode($value);
                                        $i = 1;
                                    }
                                    $query .= urlencode($key)."=".urlencode($value).'&';
                                }
            
                                $vnp_Url = $vnp_Url."?".$query;
                                if(isset($vnp_HashSecret)) {
                                    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                                    $vnp_Url .= 'vnp_SecureHash='.$vnpSecureHash;
                                }
                                $returnData = array('code' => '00'
                                    , 'message' => 'success'
                                    , 'data' => $vnp_Url);
                                if(isset($_POST['id_pttt'])) {
                                    header('Location: '.$vnp_Url);
                                    die();
                                } else {
                                    echo json_encode($returnData);
                                }
                            }
                            if ($_POST['id_pttt'] == 1) {
                                header("location: http://localhost/duan1/index.php?act=camon");
                            }
                            // chuyển đến trang đơn hàng của bạn
                            header("location: index.php?act=camon");
                        }
            
                        include "view/checkout.php";
                        break;
                        case "camon":
                            if(isset($_GET['id'])) {
                                $id_donhang = $_GET['id'];
                                $listdonhang = loadall_donhang($taikhoan['id']);
                                
                            }
                            include_once "order-complete.php";
                            break;
        case "donhangcuaban":
            $listdonhang = loadall_donhang($taikhoan['id']);
        
            include_once "view/donhangcuaban.php";
            break;
            case 'chitietdonhang':
                if(isset($_GET['id_donhang'])) {
                    $id_donhang = $_GET['id_donhang'];
                    $ttdonhang = loadone_donhang($taikhoan['id'], $id_donhang);
                    $list_dhct = loadall_donhangchitiet($id_donhang, $taikhoan['id']);
                }
                include_once 'view/chitietdonhang.php';
                break;
        case "blog":
            include_once "view/blog.php";
            break;
        case "gioithieu":
            include_once "view/gioithieu.php";
            break;
        default:
            ///
            echo "<h1>Fooder not file 404</h1>";
            break;
    }
} else {
    include_once "view/home.php";
}
include_once "view/footer.php";
exit();
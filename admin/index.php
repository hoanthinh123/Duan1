<?php
session_start();
if (isset($_SESSION['taikhoan']) && ($_SESSION['taikhoan']['vaitro'] == 1)) {
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/thongke.php";
    include "../model/taikhoan.php";
    include "../model/thetich.php";
    include "../model/binhluan.php";
    include "../model/donhang.php";





    include "header.php";


    if (isset($_GET['act']) && ($_GET['act'] != "")) {
        switch ($_GET['act']) {
            case 'homedanhmuc':
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/danhmuc.php";
                break;
                /* controller danh mục */

            case 'xoadm':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/danhmuc.php";
                break;
            case 'taodm':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tendm = $_POST['tendm'];
                    $noidungdm = $_POST['noidungdm'];
                    insert_danhmuc($tendm, $noidungdm);
                    $thongbao = "Them thanh cong";
                }
                include "danhmuc/taodm.php";
                break;
            case 'suadm':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $sql = "select * from danhmuc where id=" . $_GET['id'];
                    $dm = pdo_query_one($sql);
                }
                include "danhmuc/update.php";
                break;
            case 'updatedm':
                if (isset($_POST['capnhap']) && ($_POST['capnhap'])) {
                    $tendm = $_POST['tendm'];
                    $noidungdm = $_POST['noidungdm'];
                    $id = $_POST['id'];
                    update_danhmuc($id, $tendm, $noidungdm);
                    $thongbao = "cap nhat thanh cong";
                }
                $sql = "select * from danhmuc order by id desc";
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/danhmuc.php";
                break;

                /* controller sản phẩm */

            case 'homesanpham':
                $listdanhmuc = loadall_danhmuc();
                $kyw = "";
                $iddm = 0;
                if (isset($_POST['listok']) && ($_POST['listok'])) {
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                }
                $listsanpham = loadall_sanpham($kyw, $iddm);
                include "sanpham/sanpham.php";
                break;
            case 'taosp':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $id_danhmuc = $_POST['id_danhmuc'];
                    $tensp = $_POST['tensp'];
                    $mota = $_POST['mota'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                    }
                    insert_sanpham($tensp, $hinh, $mota, $id_danhmuc);
                    $thongbao = "Them thanh cong";
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/taosp.php";
                break;
            case 'xoasp':
                if (isset($_GET['id_sanpham']) && ($_GET['id_sanpham'] > 0)) {
                    delete_sanpham($_GET['id_sanpham']);
                }
                $listsanpham = loadall_sanpham("", "");
                include "sanpham/sanpham.php";
                break;
            case 'suasp':
                if (isset($_GET['id_sanpham']) && ($_GET['id_sanpham'] > 0)) {
                    $sanpham = loadone_sanpham($_GET['id_sanpham']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/update.php";
                break;
            case 'updatesp':
                if (isset($_POST['capnhap']) && ($_POST['capnhap'])) {
                    $id_danhmuc = $_POST['id_danhmuc'];
                    $id = $_POST['id'];
                    $tensp = $_POST['tensp'];
                    $mota = $_POST['mota'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                    }
                    update_sanpham($id, $tensp, $hinh, $mota, $id_danhmuc);
                    $thongbao = "cap nhat thanh cong";
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham("", "");
                include "sanpham/sanpham.php";
                break;
                /**
                 * 
                 * /////// Biến thể
                 * 
                 */

            case 'homebienthe':
                $id_sanpham = $_GET['id_sanpham'];
                $sanpham = loadone_sanpham($id_sanpham);
                $listsanpham_thetich = loadall_sanpham_thetich($id_sanpham);

                include "bienthe/bienthe.php";
                break;

            case 'addbienthe':
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $id_sanpham = $_GET['id_sanpham'];
                } else {
                    $id_sanpham = $_POST['id_sanpham'];
                }
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $id_sanpham = $_POST['id_sanpham'];
                    $gia = $_POST['gia'];
                    $soluong = $_POST['soluong'];
                    if (isset($_POST['id_thetich'])) {
                        $id_thetich = $_POST['id_thetich'];
                    }

                    // validate
                    $error = [];
                    if (empty(trim($gia))) {
                        $error['gia'] = "Giá không được để trống";
                    }
                    if (empty(trim($soluong))) {
                        $error['soluong'] = "Số lượng không được để trống";
                    }

                    if (empty($id_thetich)) {
                        $error['id_thetich'] = 'Vui lòng chọn thể tích';
                    }
                    if (empty($error)) {
                        echo 'cmm';
                        insert_sanpham_thetich($id_sanpham, $id_thetich, $gia, $soluong);
                        header("location:index.php?act=homebienthe&id_sanpham=$id_sanpham");
                    }
                }
                $sanpham = loadone_sanpham($id_sanpham);
                $check_thetich = check_thetich($id_sanpham);
                $listthetich = loadall_thetich();
                include "bienthe/add.php";
                break;
            case "xoabt":
                if (isset($_GET['id_bienthe']) && ($_GET['id_bienthe'] > 0)) {
                    delete_sanpham_thetich($_GET['id_bienthe']);
                }
                $id_sanpham = $_GET['id_sanpham'];
                header("location:index.php?act=homebienthe&id_sanpham=$id_sanpham");
                break;
            case "khoiphucbt":
                if (isset($_GET['id_bienthe']) && ($_GET['id_bienthe'] > 0)) {
                    restore_sanpham_thetich($_GET['id_bienthe']);
                }
                $id_sanpham = $_GET['id_sanpham'];
                header("location:index.php?act=homebienthe&id_sanpham=$id_sanpham");
                break;
            case 'suabt':
                if (isset($_GET['id_bienthe']) && $_GET['id_bienthe'] > 0) {
                    $sanpham_thetich = loadone_sanpham_thetich($_GET['id_bienthe']);
                    extract($sanpham_thetich);
                }
                include "bienthe/updatebt.php";
                break;
            case 'capnhapbt':
                if (isset($_POST['capnhap']) && ($_POST['capnhap'])) {
                    extract($_POST);
                    update_sanpham_thetich($id, $id_sanpham, $id_thetich, $gia, $soluong);
                    header("location:index.php?act=homebienthe&id_sanpham=$id_sanpham");
                }
                break;


                /* controller tài khoản */

            case 'hometaikhoan':
                $kyw = "";
                $vaitro = "";
                if (isset($_POST['listok']) && ($_POST['listok'])) {
                    $kyw = $_POST['kyw'];
                    $vaitro = $_POST['vaitro'];
                }
                $listtaikhoan = loadall_taikhoantk($kyw, $vaitro);
                include "taikhoan/taikhoan.php";
                break;
            case 'taotaikhoan':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $hoten = $_POST['hoten'];
                    $email = $_POST['email'];
                    $sdt = $_POST['sdt'];
                    $diachi = $_POST['diachi'];
                    $matkhau = $_POST['matkhau'];
                    $vaitro = $_POST['vaitro'];
                    insert_taikhoan_admin($hoten, $email, $sdt, $matkhau, $diachi, $vaitro);
                    $thongbao = "Them thanh cong";
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/taotaikhoan.php";
                break;
            case 'xoatk':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_taikhoan($_GET['id']);
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/taikhoan.php";
                break;
            case 'suatk':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $taikhoan = loadone_taikhoan($_GET['id']);
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/update.php";
                break;
            case 'updatetk':
                if (isset($_POST['capnhap']) && ($_POST['capnhap'])) {
                    $id = $_POST['id'];
                    $hoten = $_POST['hoten'];
                    $email = $_POST['email'];
                    $sdt = $_POST['sdt'];
                    $matkhau = $_POST['matkhau'];
                    $diachi = $_POST['diachi'];
                    $vaitro = $_POST['vaitro'];
                    // extract($taikhoan);
                    update_taikhoan($id, $hoten, $email, $sdt, $matkhau, $diachi, $vaitro);
                    $thongbao = 'Cập nhật tài khoản thành công';
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/taikhoan.php";
                break;

                /**  Quản lý đơn hàng */

            case 'homedonhang':
                $id_trangthai = "";
                if (isset($_POST['listok']) && $_POST['listok'] != "") {
                    $id_trangthai = $_POST['id_trangthai'];
                }
                $list_dh = loadall_donhang_admin($id_trangthai);
                include "donhang/donhang.php";
                break;

            case "chitietdonhang":
                if (isset($_GET['id_donhang'])) {
                    $id_donhang = $_GET['id_donhang'];
                    $ttdonhang = loadone_donhang_admin($id_donhang);
                    $list_dhct = loadall_donhangchitiet_admin($id_donhang);
                }
                include "donhang/xem.php";
                break;
            case 'suadonhang':
                if(isset($_GET['id_donhang'])&&($_GET['id_donhang']>0)){
                    $donhang = loadone_donhang_admin($_GET['id_donhang']);
                    extract($donhang);
                    $listtrangthai= loadall_trangthaidonhang();
                  }            
                include 'donhang/update.php';
                break;
                case "capnhapdonhang":
                    if(isset($_POST['id_trangthai'])){
                      $id_trangthai=$_POST['id_trangthai'];
                      $id_donhang=$_POST['id_donhang'];
                      update_donhang($id_trangthai,$id_donhang,0);
                      header('location: http://localhost/duan1/admin/index.php?act=homedonhang');
                    }       
                   
                    
                    break;
            case "bieudothongke":
                $listthongke = thongke();
                // $rows = doanhthutheothang();
                include "thongke/bieudothongke.php";
                break;
                /** Bình luận */
            case 'homebinhluan':
                $listbinhluan = loadall_binhluan(0);
                include "binhluan/binhluan.php";
                break;
            case "xoabl":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {

                    delete_binhluan($_GET['id']);
                }
                $listbinhluan = loadall_binhluan(0);
                include "binhluan/binhluan.php";
                break;

            default:
                # code...
                break;
        }
    } else {
        include "home.php";
    }
    include "footer.php";
} else {
    echo '<div style="margin:120px 30%">
          <img src="da4242" alt="">
          <h1 style="font-size:170px;padding 0;margin:0;">504</h1>
          <h2>Bạn không có quyền truy cập trang web này</h2>
          <a href="../index.php">Quay lại tại đây</a>
      </div>';
}

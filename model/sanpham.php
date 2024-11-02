<?php
function insert_sanpham($tensp, $hinh, $mota, $id_danhmuc)
{
    $sql = "insert into sanpham(tensp,hinh,mota,id_danhmuc) values('$tensp','$hinh','$mota','$id_danhmuc')";
    pdo_execute($sql);
}
// function loadall_sanpham(){
//     $sql = "select sp.*, dm.tendm from sanpham as sp
//     inner join danhmuc as dm on dm.madm=sp.madm";
//     $sql.=" order by masp desc";
//     $tintuc = pdo_query($sql);
//     return $tintuc;
// }

function loadall_sanpham($kyw, $iddm = 0)
{
    $sql = "SELECT sanpham.id,sanpham_thetich.id as id_bienthe ,sanpham.tensp as tensp ,danhmuc.tendm as tendm,hinh,mota,soluong ,gia,sum(soluong) as tongsoluong ,max(gia) as giamax,min(gia) as giamin from sanpham
        left join sanpham_thetich on sanpham.id = sanpham_thetich.id_sanpham  
        left join thetich on thetich.id = sanpham_thetich.id_thetich
        join danhmuc on sanpham.id_danhmuc = danhmuc.id ";
    if ($iddm > 0) {
        $sql .= " where id_danhmuc=$iddm";
    }
    if ($kyw != "") {
        $sql .= " where sanpham.tensp like '%$kyw%'";
    }
    $sql .= " group by sanpham.id order by sanpham.id asc ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
// function loadall_sanphammoi($kyw="",$madm=0){
//     $sql = "select sp.*, dm.tendm from sanpham as sp
//     inner join danhmuc as dm on dm.madm=sp.madm";
//     if($kyw!=""){
//         $sql.=" and sp.tensp like '%".$kyw."%'";
//     }
//     if($madm > 0){
//         $sql.=" and dm.madm = '".$madm."'";
//     }
//     $sql.=" order by masp desc";
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }

function delete_sanpham($id)
{
    $sql = "delete from sanpham where id=" . $id;
    pdo_execute($sql);
}
function loadone_sanpham($id)
{
    $sql = "select * from sanpham where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_sanpham($id, $tensp, $hinh, $mota, $iddm)
{
    $sql = "update sanpham set tensp = '$tensp' , mota = '$mota', id_danhmuc = $iddm";
    if ($hinh != '') {
        $sql .= ",hinh = '$hinh'";
    }
    $sql .= " where id = $id ";

    pdo_execute($sql);
}
function check_thetich_in_sanpham($id)
{
    $sql = "select count(*) tongthetich from sanpham_thetich
        where id =$id";
    $sp = pdo_query_one($sql);
    return $sp['tongthetich'];
}
function loadall_sanpham_thetich($id_sanpham)
{
    $sql = "SELECT sanpham_thetich.id, sanpham.id as idsp ,sanpham_thetich.id_thetich,sanpham.tensp ,hinh ,mota,thetich,soluong ,gia,trangthai ,danhmuc.tendm as tendm from sanpham_thetich
                join thetich on thetich.id = sanpham_thetich.id_thetich
                join sanpham on sanpham.id = sanpham_thetich.id_sanpham
                join danhmuc on danhmuc.id = sanpham.id_danhmuc
                where sanpham_thetich.id_sanpham = $id_sanpham ";
    $listchitiet = pdo_query($sql);
    return $listchitiet;
}
function insert_sanpham_thetich($id_sanpham, $id_thetich, $gia, $soluong)
{
    $sql = "INSERT INTO sanpham_thetich(id_sanpham, id_thetich, gia, soluong) VALUES ($id_sanpham, $id_thetich, $gia , $soluong)";
    pdo_execute($sql);
}
function update_sanpham_thetich($id, $id_sanpham, $id_thetich, $gia, $soluong)
{
    $sql = "update sanpham_thetich set id_sanpham = $id_sanpham , id_thetich= $id_thetich , gia = $gia , soluong = $soluong where id = $id";
    pdo_execute($sql);
}
function delete_sanpham_thetich($id)
{
    $sql = "update sanpham_thetich set trangthai = 2 where id = $id";
    pdo_execute($sql);
}
function restore_sanpham_thetich($id)
{
    $sql = "update sanpham_thetich set trangthai = 1 where id = $id";
    pdo_execute($sql);
}
function loadone_sanpham_thetich($id)
{
    $sql = "select *,sanpham_thetich.id as id_sp_tt,tensp,thetich,gia,soluong from sanpham_thetich 
        join thetich on thetich.id = sanpham_thetich.id_thetich
        join sanpham on sanpham.id =sanpham_thetich.id_sanpham
        where sanpham_thetich.id = $id ";
    $sp_tt = pdo_query_one($sql);
    return $sp_tt;
}
function top4_sanphamnew_in_danhmuc($id_danhmuc)
{
    $sql = "SELECT noidungdm,sanpham.id ,sanpham.tensp as tensp ,danhmuc.tendm as tendm,hinh,soluong ,gia,sum(soluong) as tongsoluong ,max(gia) as giamax,min(gia) as giamin from sanpham
        left join sanpham_thetich on sanpham.id = sanpham_thetich.id_sanpham  
        left join thetich on thetich.id = sanpham_thetich.id_thetich
        join danhmuc on sanpham.id_danhmuc = danhmuc.id
        where id_danhmuc = $id_danhmuc and trangthai = 1
        group by sanpham.id
        order by sanpham.id desc     
        limit 4 ";
    $spnew = pdo_query($sql);
    return $spnew;
}
function loadall_sanpham_thetich_chitiet($iddm = 0)
{
    $sql = "SELECT noidungdm,sanpham.id ,sanpham.tensp as tensp ,danhmuc.tendm as tendm,hinh,mota,soluong ,gia,sum(soluong) as tongsoluong ,max(gia) as giamax,min(gia) as giamin from sanpham
        left join sanpham_thetich on sanpham.id = sanpham_thetich.id_sanpham  
        left join thetich on thetich.id = sanpham_thetich.id_thetich
        join danhmuc on sanpham.id_danhmuc = danhmuc.id
        where trangthai = 1 ";
    if ($iddm > 0) {
        $sql .= " and id_danhmuc =$iddm";
    }
    $sql .= " group by sanpham.id";
    $spnew = pdo_query($sql);
    return $spnew;
}
function loadall_sanpham_thetich_view($id_sanpham)
{
    $sql = "SELECT sanpham_thetich.id, sanpham.id as idsp ,sanpham_thetich.id_thetich,sanpham.tensp ,hinh ,thetich,soluong ,gia,trangthai ,danhmuc.tendm  ,mota from sanpham_thetich
        join thetich on thetich.id = sanpham_thetich.id_thetich
        join sanpham on sanpham.id = sanpham_thetich.id_sanpham
        join danhmuc on danhmuc.id = sanpham.id_danhmuc
        where sanpham_thetich.id_sanpham = $id_sanpham and trangthai =1";
        $listchitiet = pdo_query($sql);
    return $listchitiet;
}
function load_thetich_in_sanpham($id)
{
    $sql = "select sanpham_thetich.id, thetich,gia from sanpham_thetich 
        join thetich on thetich.id = sanpham_thetich.id_thetich
        where id_sanpham = $id and trangthai =1";
    $thetich = pdo_query($sql);
    return $thetich;
}
function hinhanh_sanpham($id_sanpham)
{
    $sql = "SELECT hinh FROM  sanpham 
        WHERE sanpham.id = $id_sanpham";
    $hinh = pdo_query_one($sql);
    return $hinh['hinh'];
}
function cac_sp_lienquan($iddm,$id_sanpham){
    $sql = "SELECT noidungdm,sanpham.id ,sanpham.tensp as tensp ,danhmuc.tendm as tendm,hinh, soluong ,gia,sum(soluong) as tongsoluong ,max(gia) as giamax,min(gia) as giamin from sanpham
    left join sanpham_thetich on sanpham.id = sanpham_thetich.id_sanpham  
    left join thetich on thetich.id = sanpham_thetich.id_thetich
    join danhmuc on sanpham.id_danhmuc = danhmuc.id
    where id_danhmuc = $iddm and trangthai = 1 and sanpham.id <> $id_sanpham
    group by sanpham.id
    order by sanpham.id asc ";
    $splq = pdo_query($sql);
    return $splq;
}
 //tổng kho của 1 biến thể
 function check_tongkho($id_sanpham_thetich){
    $sql = "select soluong from sanpham_thetich";
    $tongkho = pdo_query_one($sql);
    return $tongkho['soluong'];  
}function tongsanpham(){
    $sql = "select sum(soluong) as tongsp from sanpham_thetich";
    $tongsp = pdo_query_one($sql);
    return $tongsp['tongsp'];
}
function sanphamsaphet(){
    $sql = "select count(*) as tongspsaphet from sanpham_thetich
    where soluong <=10 ";
    $sp = pdo_query_one($sql);
    return $sp['tongspsaphet'];
}
function check_gia_ten_thetich_in_sp_tt($id_sanpham_thetich){
    $sql = "SELECT gia,tensp,thetich from sanpham_thetich
    join sanpham on sanpham_thetich.id_sanpham = sanpham.id
    join thetich on sanpham_thetich.id_thetich =thetich.id
    where sanpham_thetich.id=$id_sanpham_thetich";
    $sptt = pdo_query_one($sql);
    return $sptt;
}
?>
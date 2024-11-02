<?php
function thongke(){
    $sql = "SELECT danhmuc.tendm as tendm,count(sanpham.id_danhmuc) as count_sp FROM sanpham INNER JOIN danhmuc ON sanpham.id_danhmuc=danhmuc.id GROUP BY sanpham.id_danhmuc";
    return pdo_query($sql);
}

function doanhthutheothang()
{
    $sql = "SELECT 
        MONTH(ngaydat) AS thang, 
        YEAR(ngaydat) AS nam, 
        SUM(tongtien) AS tongDoanhThu
    FROM donhang 
    where id_trangthai=4
    GROUP BY thang, nam
    ORDER BY nam DESC, thang asC";
    return pdo_query($sql);
}
?>
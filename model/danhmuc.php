<?php
    function insert_danhmuc($tendm,$noidungdm){
        $sql="insert into danhmuc(tendm,noidungdm) values('$tendm','$noidungdm')";
        pdo_execute($sql);
    }
    function delete_danhmuc($id){
        $sql="delete from danhmuc where id=".$id;
        pdo_execute($sql);
    }   
    function loadall_danhmuc(){
        $sql = "select * from danhmuc order by id desc";
        $listdanhmuc = pdo_query($sql);
        return $listdanhmuc;
    }
    function update_danhmuc($id,$tendm,$noidungdm){
        $sql = "update danhmuc set tendm ='".$tendm."',noidungdm='".$noidungdm."' where id=" .$id;
        pdo_execute($sql);
    }
    function check_name_danhmuc($iddm){
        $sql = "SELECT tendm FROM  danhmuc where id = $iddm";
        $tdm = pdo_query_one($sql);
        return $tdm['tendm'];
    }
    function check_danhmuc($id_sanpham){
        $sql = "SELECT danhmuc.id ,danhmuc.tendm FROM  sanpham 
        join danhmuc on sanpham.id_danhmuc =danhmuc.id
        WHERE sanpham.id = $id_sanpham";
        $dm = pdo_query_one($sql);
        return $dm;
    }
?>
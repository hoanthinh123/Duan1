<?php
function loadall_taikhoantk($kyw,$vaitro)
{
    $sql = "SELECT * FROM taikhoan";
    if($kyw!=""){
        $sql .= " Where hoten like '%$kyw%'";
    }
    if($vaitro!=""){
        $sql .=" Where vaitro =$vaitro";
    }
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function loadall_taikhoan()
{
    $sql = "SELECT * FROM taikhoan";
    
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function insert_taikhoan_admin($hoten,$email,$sdt,$matkhau,$diachi,$vaitro){
    $sql = "INSERT INTO taikhoan(hoten,email,sdt,matkhau,diachi,vaitro) VALUES('$hoten','$email','$sdt','$matkhau','$diachi','$vaitro') ";
    pdo_execute($sql);
}
function delete_taikhoan($id){
    $sql = "delete from taikhoan where id=".$id;
    pdo_execute($sql);
}
function loadone_taikhoan($id){
    $sql="select * from taikhoan where id=" .$id;
    $tk= pdo_query_one($sql);
    return $tk;
}
function update_taikhoan($id, $hoten, $email, $sdt, $matkhau, $diachi, $vaitro)
{
    $sql = "update taikhoan set hoten ='".$hoten."',email='".$email."',sdt='".$sdt."',matkhau='".$matkhau."',diachi='".$diachi."',vaitro='".$vaitro."' where id=" .$id;

    pdo_execute($sql);
}
function insert_taikhoan($hoten, $email, $matkhau)
{
    $sql = "INSERT INTO taikhoan(hoten,email,matkhau) values('$hoten','$email','$matkhau')";
    pdo_execute($sql);
}
function checkemail_dangky($email){
    $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
    $checkmail_dangky = pdo_query($sql);
    return $checkmail_dangky;    
}
function edit_taikhoan($id, $hoten, $email, $sdt, $matkhau, $diachi)
{
    $sql = "UPDATE taikhoan SET hoten='$hoten' ,email='$email',
     sdt='$sdt', matkhau='$matkhau',diachi= '$diachi' WHERE id=".$id;
    pdo_execute($sql);
}
function check_user($hoten ,$matkhau)
{
    $sql = "SELECT * FROM taikhoan WHERE hoten='".$hoten."' AND matkhau='".$matkhau."'";
    $user = pdo_query_one($sql);
    return $user;
}
function checkemail($email){
    $sql="select * from taikhoan where email='".$email."' ";
    $sp=pdo_query_one($sql);
    return $sp;
}

?>
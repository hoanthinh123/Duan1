<?php session_start();
     include "../global.php";
     include "../model/giohang.php";
     include "../model/taikhoan.php";
     include "../model/pdo.php";
    $listgiohang =loadall_giohang($taikhoan['id']);
    foreach($listgiohang as $giohang):
        extract($giohang);
?> 
            <tr>
                    <td><input type="checkbox" name="id_giohang[]" class="checkbox" value="<?=$id?>" checked></td>
                    <td><?=$tensp?></td>
                    <td>
                    <img src="upload/<?=$hinh?>" alt="img"  style="width: 200px; height: 200px;"/>
                    </td>
                    <td><?=$thetich?></td>
                    <td><?=$conlai?></td>
                    <td><?=number_format($gia,0,",",".")."<u>đ</u>"?></td>
                    <td>
                    <input id="soluong_<?=$id?>" type="number" min="1" max="<?=$conlai?>" step="1" value="<?=$soluong?>" oninput="updateSoLuong(<?=$id?>,<?=$conlai?>)"  />
                    </td>
                    <td> <?=number_format($gia*$soluong,0,",",".")."<u>đ</u>"?></td>
                    <td>
                    <a href="index.php?act=xoagiohang&id_giohang=<?=$id?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này chứ ?')">
                    <span class="trash"><i class="fas fa-trash-alt"></i> </span>
                    </a>
                    </td>
                    <td>
                    <a href="index.php?act=thanhtoan&id_giohang=<?=$id?>" class="btn btn-dark btn--lg">Đặt Hàng</a>
                    </td>
                    

                </tr>
<?php endforeach ?>
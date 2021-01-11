<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    include_once './Model/Khuyenmai.php';
    $KhuyenMai = new Khuyenmai();
    $ValueKhuyenMai = $KhuyenMai->queryChuongTrinhKhuyenMai();
    $ID = $_GET['Id'];
?>                 
    <div class="container-fluid">
       <form action="?Action=ApDungKhuyenMai" method="post">
            <input type="hidden" name="SPCT_Id" value="<?php echo $ID;?>">
            <h2>Các khuyến mãi:</h2>
            <select name="KhuyenMai_Id">
                <?php foreach($ValueKhuyenMai as $ValueKhuyenMais) {?>
                    <option value="<?php echo $ValueKhuyenMais['KhuyenMai_Id'];?>" ><?php echo $ValueKhuyenMais['LoaiKhuyenMai'];?></option>
                <?php } ?>
            </select>
            <input type="datetime-local" name="NgayBatDau" required>
            <input type="datetime-local" name="NgayKetThuc" requỉred>
            <button class="btn btn-warning" type="submit" name="apdungkhuyenmai" value="apdungkhuyenmai">Áp dụng khuyến mãi</button>
        </form>  
    </div>
    </div>
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<?php
include('./include/Scripts_Upload_Img.php');
include('./include/Scripts_Uoload_SP.php');
include('./include/Scripts_Update_Stt.php');
include_once './Admin/EndHead.php';

?>

                                                    
                                                    
                                                    
                                                    
                                                    
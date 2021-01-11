<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    $ID = $_GET['Id'];
?>                 
    <div class="container-fluid">
       <form action="?Action=ChinhSuaSanPham" method="post">
            <input type="hidden" name="SPCT_Id" value="<?php echo $ID;?>">
            <h2>Tên sản phẩm:</h2>
            <input type="text" name="TenSPCT">
            <h2>Đơn giá mới:</h2>
            <input type="number" name="DonGia">
            <h2>Số lượng mới:</h2>
            <input type="number" name="SoLuong">
            <button class="btn btn-warning" type="submit" name="chinhsua" value="chinhsua">Chinh sua san pham</button>
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

                                                    
                                                    
                                                    
                                                    
                                                    
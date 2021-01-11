<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    $ID = $_GET['Id'];
?>                 
    <div class="container-fluid">
       <form action="?Action=SuaKhuyenMai" method="post">
            <input type="hidden" name="KhuyenMai_Id" value="<?php echo $ID;?>">
            <h2>Tên khuyến mãi:</h2>
            <input type="text" name="LoaiKhuyenMai">
            <h2>Phần trăm khuyến mãi:</h2>
            <input type="number" name="PhanTramKhuyenMai">
            <button class="btn btn-warning" type="submit" name="suakhuyenmai" value="suakhuyenmai">Sửa khuyến mãi</button>
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

                                                    
                                                    
                                                    
                                                    
                                                    
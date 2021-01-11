<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    $ID = $_GET['Id'];
?>                 
    <div class="container-fluid">
       <form action="?Action=ThemNoiDungSP" method="post">
            <input type="hidden" name="SPCT_Id" value="<?php echo $ID;?>">
            <h2>Nội dung 1:</h2>
            <input type="text" name="NoiDung_1">
            <h2>Nội dung 2:</h2>
            <input type="text" name="NoiDung_2">
            <h2>Nội dung 3:</h2>
            <input type="text" name="NoiDung_3">
            <h2>Nội dung 4:</h2>
            <input type="text" name="NoiDung_4">
            
            <button class="btn btn-warning" type="submit" name="themnoidung" value="themnoidung">Thêm nội dung cho sản phẩm</button>
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

                                                    
                                                    
                                                    
                                                    
                                                    
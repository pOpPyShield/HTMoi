<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    $ID = $_GET['Id'];
?>                 
    <div class="container-fluid">
       <form action="?Action=ChinhSuaThongTin" method="post">
            <input type="hidden" name="SPCT_Id" value="<?php echo $ID;?>">
            <h2>Hãng:</h2>
            <input type="text" name="Hang">
            <h2>Hệ điều hành:</h2>
            <input type="Text" name="HeDieuHanh">
            <h2>Chip:</h2>
            <input type="Text" name="Chip">
            <h2>Màn hình:</h2>
            <input type="Text" name="ManHinh">
            <h2>Ram:</h2>
            <input type="Text" name="Ram">
            <button class="btn btn-warning" type="submit" name="chinhsuaTT" value="chinhsua">Chinh sua san pham</button>
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

                                                    
                                                    
                                                    
                                                    
                                                    
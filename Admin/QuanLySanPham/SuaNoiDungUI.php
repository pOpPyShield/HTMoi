<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    include_once './Model/NoiDungChiTietSP.php';
    $NoiDungChiTietSP = new NoiDungChiTiet();
    $ID = $_GET['Id'];
    $NoiDung = $NoiDungChiTietSP->getNoiDungTheoID($ID);
?>          
    <?php 
        echo "<pre>";
        print_r($NoiDung);
        echo "</pre>";
    ?>
    
    <div class="container-fluid">
       <form action="?Action=SuaNoiDungSP" method="post">
            <input type="hidden" name="SPCT_Id" value="<?php echo $ID;?>">
            <?php 
                if(!isset($NoiDung['NoiDung_1'])) {
            ?>
                    <h2>Nội dung chưa được thêm: <input type="text" name="NoiDung_1" value="Không có nội dung ở đây" readonly></h2>
            <?php        
                } else {
            ?>
                    
                    <h2>Nội dung đã được thêm: <input type="text" name="NoiDung_1" value="<?php echo $NoiDung['NoiDung_1'];?>" readonly></h2>
                    <h2>Thay đổi nội dung 1:</h2>
                    <input type="text" name="NoiDung_1">
            <?php 
                }
            ?>  
            <?php 
                if(!isset($NoiDung['NoiDung_2'])) {
            ?>
                    <h2>Nội dung chưa được thêm: <input type="text" name="NoiDung_2" value="Không có nội dung ở đây" readonly></h2>
            <?php        
                } else {
            ?>
                    
                    <h2>Nội dung đã được thêm: <input type="text" name="NoiDung_2" value="<?php echo $NoiDung['NoiDung_2'];?>" readonly></h2>
                    <h2>Thay đổi nội dung 2:</h2>
                    <input type="text" name="NoiDung_2">
            <?php 
                }
            ?> 
            <?php 
                if(!isset($NoiDung['NoiDung_3'])) {
            ?>
                    <h2>Nội dung chưa được thêm: <input type="text" name="NoiDung_3" value="Không có nội dung ở đây" readonly></h2>
            <?php        
                } else {
            ?>
                    
                    <h2>Nội dung đã được thêm: <input type="text" name="NoiDung_3" value="<?php echo $NoiDung['NoiDung_3'];?>" readonly></h2>
                    <h2>Thay đổi nội dung 3:</h2>
                    <input type="text" name="NoiDung_3">
            <?php 
                }
            ?> 
            <?php 
                if(!isset($NoiDung['NoiDung_4'])) {
            ?>
                    <h2>Nội dung chưa được thêm: <input type="text" name="NoiDung_4" value="Không có nội dung ở đây" readonly></h2>
            <?php        
                } else {
            ?>
                    
                    <h2>Nội dung đã được thêm: <input type="text" name="NoiDung_4" value="<?php echo $NoiDung['NoiDung_4'];?>" readonly></h2>
                    <h2>Thay đổi nội dung 4:</h2>
                    <input type="text" name="NoiDung_4">
            <?php 
                }
            ?> 
            
            <button class="btn btn-warning" type="submit" name="suanoidung" value="suanoidung">Sửa nội dung cho sản phẩm</button>
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

                                                    
                                                    
                                                    
                                                    
                                                    
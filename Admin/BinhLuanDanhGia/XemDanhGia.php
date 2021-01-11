<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    include_once './Model/KhachHang.php';
    include_once './Model/NoiDungChiTietSP.php';
    include_once './Model/QuerySP.php';
    $ManageOrder = new KhachHang();
    $HinhAnh = new NoiDungChiTiet();
    $SPCT_Id = new QuerySP();
    $SPCT_Id_Query = $SPCT_Id->layRaIDSPCT();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page heading -->
    <h1 class="h3 mb-2 text-gray-800">Xem đánh giá</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Xem đánh giá
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sản phẩm ID</th>
                            <th>Id người dùng</th>
                            <th>Người dùng đánh giá</th>
                            <th>Số đánh giá của sản phẩm</th>
                            <th>Ngay danh gia</th>
                            
                            <th>Xóa đánh giá của người dùng</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sản phẩm ID</th>
                            <th>Id người dùng</th>
                            <th>Người dùng đánh giá</th>
                            <th>Số đánh giá của sản phẩm</th>
                            <th>Ngay danh gia</th>
                            
                            <th>Xóa đánh giá của người dùng</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($SPCT_Id_Query as $SPCT_Id_Querys) {?>
                             <tr>
                                
                                        <td><?php echo $SPCT_Id_Querys['SPCT_Id'];?></td>
                                        <?php 

                                            $DanhGia = $HinhAnh->hienThiDanhGia();
                                            
                                        ?>
                                        
                                        <td>
                                        <?php 
                                            foreach($DanhGia as $DanhGias) {
                                        ?>
                                                <?php 
                                                    if($DanhGias['SPCT_Id'] == $SPCT_Id_Querys['SPCT_Id']){
                                                        echo $DanhGias['KhachHang_Id'].",";
                                                    } else {
                                                        echo "";
                                                    }
                                                ?>
                                        <?php 
                                            }
                                        ?>
                                        </td>
                                        <td>
                                        <?php 
                                            foreach($DanhGia as $DanhGias) {
                                        ?>
                                                <?php 
                                                    if($DanhGias['SPCT_Id'] == $SPCT_Id_Querys['SPCT_Id']){
                                                        echo $DanhGias['SoSao']. ",";
                                                    } else {
                                                        echo "";
                                                    }
                                                ?>
                                        <?php 
                                            }
                                        ?>
                                        </td>
                                        <td>
                                            <?php $DemSoCot = $HinhAnh->demSoCotCuaSPCT($SPCT_Id_Querys['SPCT_Id'])[0]; 
                                                   if($DemSoCot == 0) {
                                                        $DemSoCot = "Chua co danh gia";
                                            ?>
                                                        <p><?php echo $DemSoCot;?></p>
                                            <?php 
                                                   } else {
                                            ?>
                                                        <p><?php echo $DemSoCot;?></p>
                                            <?php
                                                   }
                                            ?>
                                        </td>
                                        <td>
                                        <?php 
                                            foreach($DanhGia as $DanhGias) {
                                        ?>
                                                <?php 
                                                    if($DanhGias['SPCT_Id'] == $SPCT_Id_Querys['SPCT_Id']){
                                                        echo $DanhGias['NgayRate'].","; 
                                                    } else {
                                                        echo "";
                                                    }
                                                
                                                ?>
                                        <?php 
                                            }
                                        ?>
                                        </td>
                                        
                                        
                                        <td>
                                            <form action="?Action=XoaDanhGia" method="POST">
                                                <input type="hidden" name="SPCT_Id" value="<?php echo $SPCT_Id_Querys['SPCT_Id'];?>">
                                                <select id="cars" name="IdNguoiDung">
                                                    <?php foreach($DanhGia as $DanhGias) {
                                                        if($DanhGias['SPCT_Id'] == $SPCT_Id_Querys['SPCT_Id']) {    
                                                    ?>
                                                            <option value="<?= $DanhGias['KhachHang_Id'];?>"><?= $DanhGias['KhachHang_Id'];?></option>
                                                    <?php } ?>
                                                            
                                                    <?php 
                                                         } ?>
                                                </select>
                                                <button class="btn btn-warning" name="xoaDanhGia" value="xoaDanhGiaDi">Xoa</button>
                                            </form>
                                        </td>
                                
                            </tr>
                        
                            <?php } ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
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
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php
include('./include/Scripts_Upload_Img.php');
include('./include/Scripts_Uoload_SP.php');
include('./include/Scripts_Update_Stt.php');
include_once './Admin/EndHead.php';

?>
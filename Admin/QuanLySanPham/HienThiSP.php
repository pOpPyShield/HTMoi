<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    include_once './Model/NoiDungChiTietSP.php';
    include_once './Model/QuerySP.php';
    include_once './Model/DMSP.php';

    $SPCT = new QuerySP();
    $DMSP = new DMSP();
    $ThongTinchiTiet = new NoiDungChiTiet();
    $HMTDM = $DMSP->GetHMTDM();
    $SPCT->queryTableSPCT();
    $DisplaySPCT = $SPCT->getQuerySanPhamChiTiet();
    $SPCT->queryTableImageSPCT();
    $ImageSPCT = $SPCT->getQueryTableHinhAnhSPCT();
    $ArrayImage = array();
    foreach ($ImageSPCT as $ImageSPCTs) {
        $ArrayImage[] = $ImageSPCTs['SPCT_Id'];
    }
    
    
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page heading -->
    <h1 class="h3 mb-2 text-gray-800">Hiển thị sản phẩm lên trang chủ</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Hiển thị sản phẩm lên trang chủ
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Nội dung sản phẩm</th>
                            <th>Thông tin chi tiết</th>
                            <th>Hiển thị</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Nội dung sản phẩm</th>
                            <th>Thông tin chi tiết</th>
                            <th>Hiển thị</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($DisplaySPCT as $DisplaySPCTs) { ?>
                            <tr>
                                <td><?php echo $DisplaySPCTs['TenSPCT']; ?></td>
                                <?php if(in_array($DisplaySPCTs['SPCT_Id'], $ArrayImage)) {
                                        foreach ($ImageSPCT as $ImageSPCTs) {
                                            if ($ImageSPCTs['SPCT_Id'] == $DisplaySPCTs['SPCT_Id']) {
                                ?>
                                                <td><img style="width: 150px;" src="/HT-Electronics/Public/ImageSPCT/<?php echo $ImageSPCTs['Full']; ?>" alt="SPCT IMG"></td>
                                <?php       } 
                                        } //End for each $ImageSPCT
                                ?>
                                        
                            
                        <?php         } else { ?>
                                        <td>Chua co hinh anh
                                            <a href="?Action=SanPhamAdmin">Them hinh anh</a>
                                        </td>
                                        
                        <?php
                                      }
                        ?>
                        <?php 
                                    $NoiDungQuery = $ThongTinchiTiet->getNoiDungTheoID($DisplaySPCTs['SPCT_Id']);
                                    if(!$NoiDungQuery) {
                        ?>
                                        <td>Chưa có
                                            <a href="?Action=ThemNoiDung&Id=<?php echo $DisplaySPCTs['SPCT_Id'];?>"><button class="btn btn-success">Thêm nội dung</button></a>
                                        </td>
                                        
                        <?php
                                    } else {
                        ?>

                                        <td>
                                            Đã có 
                                            <a href="?Action=ThemXoaChinhSuaND"><button class="btn btn-warning">Xem nội dung</button></a>
                                        </td>
                        <?php 
                                    }
                        ?>
                        <?php 
                                    $ThongTinChiTietHienThi = $ThongTinchiTiet->HienThiNoiDungSPCT($DisplaySPCTs['SPCT_Id']);
                                    if(!$ThongTinChiTietHienThi) {
                        ?>
                                        <td>
                                            Chưa có
                                            <a href="?Action=ThemThongTin&Id=<?php echo $DisplaySPCTs['SPCT_Id'];?>"><button class="btn btn-success">Thêm thông tin</button></a>
                                        </td>
                        <?php 
                                    } else {
                        ?>
                                        <td>
                                            Đã có 
                                            <a href="?Action=ThemXoaChinhSuaTTCT"><button class="btn btn-warning">Xem thông tin</button></a>
                                        </td>
                        <?php  
                                    }
                        ?>
                        <?php if ($DisplaySPCTs['Status'] == 0) { ?>
                                        <td>Chua active
                                            <form action="?Action=Activesp" method="POST">
                                                <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCTs['SPCT_Id']; ?>">
                                                <input type="hidden" name="Value" value="1">
                                                <button type="submit" name="Update" value="UpdateSPCTStt" class="btn btn-success">Active San pham</button>
                                            </form>
                                        </td>

                        <?php } else { ?>
                                        <td>Da Active
                                            <form action="?Action=Activesp" method="POST">
                                                <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCTs['SPCT_Id']; ?>">
                                                <input type="hidden" name="Value" value="0">
                                                <button type="submit" name="Update" value="UpdateSPCTStt" class="btn btn-danger">Deactive San pham</button>
                                            </form>
                                        </td>
                        <?php } ?>          
                            </tr>
                        <?php
                            } //End for each $DisplaySPCT
                        ?>
                            
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

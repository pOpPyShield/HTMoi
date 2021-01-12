<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    include_once './Model/QuerySP.php';
    include_once './Model/DMSP.php';
    include_once './Model/NoiDungChiTietSP.php';
    $SPCT = new QuerySP();
    $DMSP = new DMSP();
    $NoiDungChiTietSP = new NoiDungChiTiet();
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
    <h1 class="h3 mb-2 text-gray-800">Thông tin chi tiết của sản phẩm</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Thêm, xóa, chỉnh sửa thông tin chi tiết
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Hãng</th>
                            <th>Hệ điều hành</th>
                            <th>Chip</th>
                            <th>Màn hình</th>
                            <th>Ram</th>
                            <th>Chỉnh sửa thông tin</th>
                            <th>Xóa thông tin</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Hãng</th>
                            <th>Hệ điều hành</th>
                            <th>Chip</th>
                            <th>Màn hình</th>
                            <th>Ram</th>
                            <th>Chỉnh sửa thông tin</th>
                            <th>Xóa thông tin</th>
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
                                                <td><img style="width: 150px;" src="/HTMoi/Public/ImageSPCT/<?php echo $ImageSPCTs['Full']; ?>" alt="SPCT IMG"></td>
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
                                    $NoiDungQuery = $NoiDungChiTietSP->HienThiNoiDungSPCT($DisplaySPCTs['SPCT_Id']);
                                    if(!$NoiDungQuery) {
                        ?>
                                        <td>Chưa có</td>
                                        <td>Chưa có</td>
                                        <td>Chưa có</td>
                                        <td>Chưa có</td>
                                        <td>Chưa có</td>
                                        <!-- Hiển thị form thêm thông tin và get Id của sản phẩm -->
                                        <td><a href="?Action=ThemThongTin&Id=<?php echo $DisplaySPCTs['SPCT_Id'];?>"><button class="btn btn-success">Thêm thông tin</button></a></td>
                                        
                        <?php
                                    } else {
                        ?>

                                        <td><?php echo $NoiDungQuery['Hang']; ?></td>
                                        <td><?php echo $NoiDungQuery['HeDieuHanh']; ?></td>
                                        <td><?php echo $NoiDungQuery['Chip']; ?></td>
                                        <td><?php echo $NoiDungQuery['ManHinh']; ?></td>
                                        <td><?php echo $NoiDungQuery['Ram']; ?></td>
                                        <!-- Hien thi form chỉnh sửa thông tin và get Id của sản phẩm -->
                                        <td><a href="?Action=ChinhSuaThongTinUI&Id=<?php echo $DisplaySPCTs['SPCT_Id'];?>"><button class="btn btn-warning">Sửa thông tin</button></a></td>
                        <?php 
                                    }
                        ?>
                                        <td>
                                            <form action="?Action=XoaThongTin" method="post">
                                                <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCTs['SPCT_Id'];?>">
                                                <button class="btn btn-danger"type="submit" name="xoathongtin" value="xoathongtin">Xóa thông tin</button>
                                            </form>
                                        </td>      
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
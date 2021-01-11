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
    <h1 class="h3 mb-2 text-gray-800">Nội dung</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Thêm, xóa, chỉnh sửa nội dung
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Nội dung 1</th>
                            <th>Nội dung 2</th>
                            <th>Nội dung 3</th>
                            <th>Nội dung 4</th>
                            <th>hành động </th>
                            <th>Xóa nội dung</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Nội dung 1</th>
                            <th>Nội dung 2</th>
                            <th>Nội dung 3</th>
                            <th>Nội dung 4</th>
                            <th>hành động </th>
                            <th>Xóa nội dung</th>
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
                                        <td>Chưa có</td>
                                        <td>Chưa có</td>
                                        <td>Chưa có</td>
                                        <td>Chưa có</td>
                                        
                                        <!-- Hiển thị form thêm thông tin và get Id của sản phẩm -->
                                        <td><a href="?Action=ThemNoiDung&Id=<?php echo $DisplaySPCTs['SPCT_Id'];?>"><button class="btn btn-success">Thêm nội dung</button></a></td>
                                        
                        <?php
                                    } else {
                        ?>

                                        <td><?php echo $NoiDungQuery['NoiDung_1']; ?></td>
                                        <td><?php echo $NoiDungQuery['NoiDung_2']; ?></td>
                                        <td><?php echo $NoiDungQuery['NoiDung_3']; ?></td>
                                        <td><?php echo $NoiDungQuery['NoiDung_4']; ?></td>
                                        <!-- Hien thi form chỉnh sửa thông tin và get Id của sản phẩm -->
                                        <td><a href="?Action=ChinhSuaNoiDung&Id=<?php echo $DisplaySPCTs['SPCT_Id'];?>"><button class="btn btn-warning">Sửa nội dung</button></a></td>
                        <?php 
                                    }
                        ?>
                                        <td>
                                            <form action="?Action=XoaNoiDung" method="post">
                                                <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCTs['SPCT_Id'];?>">
                                                <button class="btn btn-danger"type="submit" name="xoanoidung" value="xoanoidung">Xóa nội dung</button>
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

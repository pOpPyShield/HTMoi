<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    include_once './Model/QuerySP.php';
    include_once './Model/DMSP.php';

    $SPCT = new QuerySP();
    $DMSP = new DMSP();
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
    <h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Thêm, xóa, chỉnh sửa sản phẩm
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số Lượng</th>
                            <th>Hình ảnh</th>
                            <th>Thêm hình ảnh</th>
                            <th>Chỉnh sửa sản phẩm</th>
                            <th>Xóa sản phẩm</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số Lượng</th>
                            <th>Hình ảnh</th>
                            <th>Thêm hình ảnh</th>
                            <th>Chỉnh sửa sản phẩm</th>
                            <th>Xóa sản phẩm</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($DisplaySPCT as $DisplaySPCTs) { ?>
                            <tr>
                                <td><?php echo $DisplaySPCTs['TenSPCT']; ?></td>
                                <td><?php echo number_format($DisplaySPCTs['DonGia']); ?></td>
                                <td><?php echo $DisplaySPCTs['SoLuong']; ?></td>
                                <td>
                                <?php if(in_array($DisplaySPCTs['SPCT_Id'], $ArrayImage)) {
                                        foreach ($ImageSPCT as $ImageSPCTs) {
                                            if ($ImageSPCTs['SPCT_Id'] == $DisplaySPCTs['SPCT_Id']) {
                                ?>
                                                <img style="width: 150px;" src="/HT-Electronics/Public/ImageSPCT/<?php echo $ImageSPCTs['Full']; ?>" alt="SPCT IMG">
                                <?php       } 
                                        } //End for each $ImageSPCT
                                ?>
                                </td>
                                        <td>
                                            <form action="?Action=uploadhinhanhcuasanpham" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="TenSP" value="<?php echo $DisplaySPCTs['TenSPCT']; ?>">
                                                <input type="file" name="file">
                                                <button class="btn btn-success" type="submit" name="SubmitHinhAnh" value="SubmitImageSanPham" class="btn btn-success">Them Hinh anh</button>
                                            </form>
                                        </td>
                            
                        <?php         } else { ?>
                                        <td>Chua co hinh anh</td>
                                        <td>
                                            <form action="?Action=uploadhinhanhcuasanpham" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="TenSP" value="<?php echo $DisplaySPCTs['TenSPCT']; ?>">
                                                <input type="file" name="file">
                                                <button class="btn btn-danger" type="submit" name="SubmitHinhAnh" value="SubmitImageSanPham" class="btn btn-success">Them Hinh anh</button>
                                            </form>       
                                        </td>
                        <?php
                                      }
                        ?>
                                        <td>
                                            <a href="?Action=ChinhSuaSanPham_UI&Id=<?php echo $DisplaySPCTs['SPCT_Id'];?>"><button class="btn btn-warning">Chỉnh sửa sản phẩm</button></a>
                                        </td>

                                        <td>
                                            <form action="?Action=RemoveSP" method="POST">
                                                <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCTs['SPCT_Id'];?>">
                                                <button class="btn btn-danger" type="submit" name="RemoveSP" value="Xoa">Xoa san pham</button>
                                            </form>
                                        </td>
                            </tr>
                        <?php
                            } //End for each $DisplaySPCT
                        ?>
                            
                    </tbody>
                </table>
                <button class="btn btn-success" data-toggle="modal" data-target="#themsanphammoi">Them san pham moi</button>
                <div class="modal fade" role="dialog" id="themsanphammoi">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Them hinh anh vao</h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <form action="?Action=uploadsanpham" method="POST">
                                    <h2>TenSPCT</h2>
                                    <input type="text" name="TenSPCT">
                                    <h2>Hang may tinh danh muc</h2>
                                    <select name="TenHMTDM">
                                    <?php foreach($HMTDM as $HMTDMs) {?>
                                            <option value="<?php echo $HMTDMs['TenHMTDM'];?>"><?php echo $HMTDMs['TenHMTDM'];?></option>
                                    <?php } ?>
                                    </select>
                                    <h2>Don gia</h2>
                                    <input type="number" name="DonGia">
                                    <h2>So luong</h2>
                                    <input type="number" name="SoLuong">
                                    <button type="submit" name="SubmitTTSP" value="SubmitTTSP">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
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
<?php include_once 'Head.php';
include_once 'SlideBar.php';
include_once 'TopBar.php';
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

    <!--Quản lý sản phẩm -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>TenSPCT</th>
                            <th>DonGia</th>
                            <th>SoLuong</th>
                            <th>HinhAnh</th>
                            <th>Them Hinh anh</th>
                            <th>Status</th>
                            <th>Update status</th>
                            <th>Xoa san pham</th>
                            <th>Chinh sua san pham</th>
                            <th>Them thong tin ki thuat</th>
                            <th>Sua thong tin ki thuat</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>TenSPCT</th>
                            <th>DonGia</th>
                            <th>SoLuong</th>
                            <th>HinhAnh</th>
                            <th>Them Hinh anh</th>
                            <th>Status</th>
                            <th>Update status</th>
                            <th>Xoa san pham</th>
                            <th>Chinh sua san pham</th>
                            <th>Them thong tin ki thuat</th>
                            <th>Sua thong tin ki thuat</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($DisplaySPCT as $DisplaySPCTs) { ?>
                            <tr>
                                <td><?php echo $DisplaySPCTs['TenSPCT']; ?></td>
                                <td><?php echo $DisplaySPCTs['DonGia']; ?></td>
                                <td><?php echo $DisplaySPCTs['SoLuong']; ?></td>
                                
                                <?php
                                if (in_array($DisplaySPCTs['SPCT_Id'], $ArrayImage)) {
                                    
                                    foreach ($ImageSPCT as $ImageSPCTs) {
                                        if ($ImageSPCTs['SPCT_Id'] == $DisplaySPCTs['SPCT_Id']) {
                                ?>
                                            <td><img style="width: 150px;" src="/HT-Electronics/Public/ImageSPCT/<?php echo $ImageSPCTs['Full']; ?>" alt="SPCT IMG"></td>

                                <?php
                                        }
                                    }
                                ?>
                                    <td>
                                        <form action="?Action=uploadhinhanhcuasanpham" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="TenSP" value="<?php echo $DisplaySPCTs['TenSPCT']; ?>">
                                            <input type="file" name="file">
                                            <button class="btn btn-success" type="submit" name="SubmitHinhAnh" value="SubmitImageSanPham" class="btn btn-success">Them Hinh anh</button>
                                        </form>
                                    </td>
                                <?php
                                } else {
                                ?>
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
                                <?php if ($DisplaySPCTs['Status'] == 0) { ?>
                                    <td>Chua active</td>
                                    <td>
                                        <form action="?Action=ActiveSP" method="POST">
                                            <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCTs['SPCT_Id'];?>">
                                            <input type="hidden" name="Value" value="1">
                                            <button class="btn btn-success" type="submit" name="Update" value="UpdateSPCTStt">Active San pham</button>
                                        </form>
                                    </td>

                                <?php } else { ?>
                                            <td>Da Active</td>
                                            <td>
                                                <form action="?Action=ActiveSP" method="POST">
                                                    <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCTs['SPCT_Id'];?>">
                                                    <input type="hidden" name="Value" value="0">
                                                    <button class="btn btn-danger" type="submit" name="Update" value="UpdateSPCTStt">DeActive San pham</button>
                                                </form>
                                            </td>
                                <?php } ?>
                                <td>
                                    <form action="?Action=RemoveSP" method="POST">
                                        <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCTs['SPCT_Id'];?>">
                                        <button class="btn btn-danger" type="submit" name="RemoveSP" value="Xoa">Xoa san pham</button>
                                    </form>
                                    
                            
                                </td>
                                <td>
                                    <!--<button class="btn btn-warning" data-toggle="modal" data-target="#ChinhSuaSanPham">Chinh sua san pham</button>
                                    <div class="modal fade" role="dialog" id="ChinhSuaSanPham">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Chinh sua san pham</h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>-->
                                
                            <div class="modal-body">
                                <form action="?Action=ChinhSuaSanPham" method="post">
                                    <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCTs['SPCT_Id']?>">
                                    <h2>Ten SPCT:</h2>
                                    <input type="text" name="TenSPCT">
                                    <h2>Don Gia:</h2>
                                    <input type="number" name="DonGia">
                                    <h2>So Luong:</h2>
                                    <input type="number" name="SoLuong">
                                    <button class="btn btn-warning" type="submit" name="chinhsua" value="chinhsua">Chinh sua san pham</button>
                                </form>
                            </div>
                        <!--
                        </div>
                    </div>

                </div>-->
                                </td>
                                <td><button class="btn btn-success">Them thong tin ki thuat</button></td>
                                <td><button class="btn btn-warning">Sua thong tin ki thuat</button></td>
                            </tr>
                        <?php
                        }
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
include_once 'EndHead.php';

?>
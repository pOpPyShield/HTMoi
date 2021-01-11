<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    include_once './Model/QuerySP.php';
    include_once './Model/DMSP.php';
    include_once './Model/Khuyenmai.php';
    $KhuyenMai = new Khuyenmai();
    $ValueApDung = $KhuyenMai->queryApDungKhuyenMaiTable();
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
    $ArrayApDung = array();
    foreach($ValueApDung as $ValueApDungs) {
        $ArrayApDung[] = $ValueApDungs['SPCT_Id'];
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
                            <th>Hình ảnh</th>
                            <th>Áp dụng khuyến mãi</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Áp dụng khuyến mãi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($DisplaySPCT as $DisplaySPCTs) { ?>
                            <tr>
                                <td><?php echo $DisplaySPCTs['TenSPCT']; ?></td>
                                
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
                    
                            
                        <?php         } else { ?>
                                        <td>Chua co hinh anh
                                            <a href="?Action=SanPhamAdmin"><button class="btn btn-success">Thêm hình ảnh</button></a>
                                        </td>
                                        
                        <?php
                                      }
                        ?>  
                        <?php 
                                if(in_array($DisplaySPCTs['SPCT_Id'], $ArrayApDung)) {
                                    foreach ($ValueApDung as $ValueApDungs) {
                                        if ($ValueApDungs['SPCT_Id'] == $DisplaySPCTs['SPCT_Id']) {
                                        
                        ?>
                                            <td>Đã áp dụng chương trình khuyến mãi
                        <?php 
                                            if($ValueApDungs['Status'] == 1) {
                        ?>
                                                <form action="?Action=TatApDungCtrinh" method="post">
                                                    <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCTs['SPCT_Id'];?>">
                                                    <input type="hidden" name="Status" value="0">
                                                    <button type="submit" name="TatApDungKM" value="TatApDungKM" class="btn btn-danger">Tắt áp dụng khuyến mãi</button>
                                                </form>
                        <?php 
                                            } else {
                        ?>
                                                <form action="?Action=BatCtrinhKM" method="post">
                                                    <input type="hidden" name="SPCT_Id" value="<?php echo $DisplaySPCTs['SPCT_Id'];?>">
                                                    <input type="hidden" name="Status" value="1">
                                                    <button type="submit" name="BatApDungKM" value="BatApDungKM" class="btn btn-success">Bật áp dụng khuyến mãi</button>
                                                </form>
                        <?php 
                                            }
                        ?>
                                            </td>      
                        <?php
                                        }
                                    }
                                } else {
                        ?>              
                                        <td>
                                            <a href="?Action=ApDungChuongTrinhKM_UI&Id=<?php echo $DisplaySPCTs['SPCT_Id'];?>"><button class="btn btn-success">Áp dụng chương trình khuyến mãi</button></a>
                                        </td>
                        <?php 
                                } 
                        ?>
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
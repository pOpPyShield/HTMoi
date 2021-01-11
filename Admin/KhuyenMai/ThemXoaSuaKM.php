<?php 
    include_once './Admin/Head.php';
    include_once './Admin/SlideBar.php';
    include_once './Admin/TopBar.php';
    include_once './Model/Khuyenmai.php';
    $ChuongTrinhKhuyenMai = new Khuyenmai();
    $Value = $ChuongTrinhKhuyenMai->queryChuongTrinhKhuyenMai();
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page heading -->
    <h1 class="h3 mb-2 text-gray-800">Khuyến mãi</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Thêm, xóa, sửa khuyến mãi
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên khuyến mãi</th>
                            <th>Phần trăm khuyến mãi</th>
                            <th>Xóa khuyến mãi</th>
                            <th>Sửa khuyến mãi</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên khuyến mãi</th>
                            <th>Phần trăm khuyến mãi</th>
                            <th>Xóa khuyến mãi</th>
                            <th>Sửa khuyến mãi</th>
                            
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($Value as $Values) {?>
                             <tr>
                                <td><?php echo $Values['LoaiKhuyenMai'];?></td>
                                <td><?php echo $Values['PhanTramKhuyenMai'];?></td>
                                <td>
                                    <form action="?Action=XoaKhuyenMai" method="post">
                                        <input type="hidden" name="KhuyenMai_Id" value="<?php echo $Values['KhuyenMai_Id'];?>">
                                        <button class="btn btn-danger"type="submit" name="xoakhuyenmai" value="xoakhuyenmai">Xóa khuyến mãi</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="?Action=ChinhSuaKhuyenMai_UI&Id=<?php echo $Values['KhuyenMai_Id'];?>"><button class="btn btn-warning">Sửa khuyến mãi</button></a>
                                </td>
                            </tr>
                        <?php }?>
                            
                    </tbody>
                </table>
                <a href="?Action=ThemKhuyenMai_UI"><button class="btn btn-warning">Thêm khuyến mãi</button></a>
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
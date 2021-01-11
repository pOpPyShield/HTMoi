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
    <h1 class="h3 mb-2 text-gray-800">Xem, xóa bình luận</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Xem và xóa bình luận
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sản phẩm ID</th>
                            <th>Id nguoi dung</th>
                            <th>Nội dung comment</th>
                            <th>Ngày giờ</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sản phẩm ID</th>
                            <th>Id người dùng</th>
                            <th>Nội dung comment</th>
                            <th>Ngày giờ</th>
                            <th>Xóa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($SPCT_Id_Query as $SPCT_Id_Querys) {?>
                             <tr>
                                
                                        <td><?php echo $SPCT_Id_Querys['SPCT_Id'];?></td>
                                        <?php //Hien thi noi dung comment va ngay gio theo spct_id

                                            $Comment = $HinhAnh->hienThiComment($SPCT_Id_Querys['SPCT_Id']);
                                            
                                        ?>
                                        
                                        <td>
                                        <?php 
                                            foreach($Comment as $Comments) {
                                        ?>
                                                <?php 
                                                        echo $Comments['KhachHang_Id'].",";
                                                
                                                ?>
                                        <?php 
                                            }
                                        ?>
                                        </td>
                                        <td>
                                        <?php 
                                            foreach($Comment as $Comments) {
                                        ?>
                                                <?php 
                                                        echo $Comments['Noidungbinhluan']. ",";
                                                
                                                ?>
                                        <?php 
                                            }
                                        ?>
                                        </td>
                                        <td>
                                        <?php 
                                            foreach($Comment as $Comments) {
                                        ?>
                                                <?php 
                                                        echo $Comments['NgayGio'].","; 
                                                
                                                ?>
                                        <?php 
                                            }
                                        ?>
                                        </td>
                                        <td>
                                            <form action="?Action=XoaBinhLuan" method="POST">
                                                <input type="hidden" name="SPCT_Id" value="<?php echo $SPCT_Id_Querys['SPCT_Id'];?>">
                                                <select id="cars" name="IdNguoiDung">
                                                    <?php foreach($Comment as $Comments) {?>
                                                    <option value="<?= $Comments['KhachHang_Id'];?>"><?= $Comments['KhachHang_Id'];?></option>
                                                    <?php }?>
                                                </select>
                                                <button class="btn btn-warning" name="xoacomment" value="xoacommentdi">Xoa</button>
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
<?php include_once "./View/Head.php";?>
<?php include_once "./View/Header.php";?>
<?php include_once './Model/QuerySP.php';?>
    <section class="laptop-dell">
        <div class="container">
            <h3 class="">Asus</h3>
            <?php 
                
                    $CheckTenHMTDM = $_GET['Action'];
                    
                    $QuerySP = new QuerySP();
                    $QuerySP->findIDForHMTDM($CheckTenHMTDM);
                    $QuerySP->DisplayProductForID();
                    $SanPham = $QuerySP->getDisplayProduct();
            ?>
            <?php foreach($SanPham as $SanPhams) {?>
                        <?php 
                                $QuerySP->queryTableImageSPCTTID($SanPhams['SPCT_Id']);  
                                $HinhAnhSanPham = $QuerySP->getImageSource();
                                $RowCount = $QuerySP->getRowCount();
                                if($RowCount > 0) {
                        ?>
                                    <div class="box-product">
                                            <div class="box-product__img">
                                                <a href="?Action=ChiTietSanPham&Id=<?php echo $SanPhams['SPCT_Id'];?>"><img src="Public/ImageSPCT/<?php echo $HinhAnhSanPham['Full'];?>" class="d-block w-100" alt="<?php echo $Sanphams['TenSPCT'];?>"></a>
                                            </div>
                            <?php 
                                } else { 
                            ?>
                                    <h1>Chua co hinh anh</h1>
                            <?php 
                                }
                            ?>
                                        <div class="box-product__detail">
                                            <a href="?Action=ChiTietSanPham&Id=<?php echo $SanPhams['SPCT_Id'];?>" class="box-product__detail--name"><?php echo $SanPhams['TenSPCT'];?></a>
                                            <div class="box-product__detail--start">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <?php if($StatusApDungKhuyenMai['Status'] == 1 AND $SanPhams['SPCT_Id'] == $StatusApDungKhuyenMai['SPCT_Id']) {
                            $KieuKhuyenMai = $QuerySP->checkKieuKhuyenMai($StatusApDungKhuyenMai['KhuyenMai_Id']);
                            $TenKhuyenMai = $KieuKhuyenMai['LoaiKhuyenMai'];
                            $PhanTramKhuyenMai = $KieuKhuyenMai['PhanTramKhuyenMai'] / 100;
                            $DonGiaSanPhamKhuyenMai = $SanPhams['DonGia'] * $PhanTramKhuyenMai;
                ?>
                    <del class="font-box-product-old"><?php echo $SanPhams['DonGia']; ?>₫</del>
                    <div class="box-product__detail--price-new"><?php echo$DonGiaSanPhamKhuyenMai;?></div>
                    <div><h1>Chuong trinh giam gia: <?php echo $TenKhuyenMai;?></h1></div>

                <?php } else {?>
                    <div class="box-product__detail--price-new"><?php echo $SanPhams['DonGia']; ?>₫</div>
                <?php }?>
                                        </div>
                                    </div>
            <?php } ?>
        </div>
    </section>



<?php include_once "./View/Footer.php";?>
<?php include_once "./View/EndHead.php"; ?>
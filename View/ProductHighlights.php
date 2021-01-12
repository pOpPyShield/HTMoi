<?php
include_once './Model/QuerySP.php';
include_once './Model/Khuyenmai.php';
$Query = new QuerySP();
$KhuyenMai = new Khuyenmai();
$StoreSPRating = $Query->timKiemSanPhamCoRating();
$SPCT_Id = array();
for ($i = 0; $i < count($StoreSPRating); $i++) {
    $SPCT_Id[$i] = $StoreSPRating[$i]['SPCT_Id'];
}


?>
<section class="product-highlights">
    <!-- ProductHighlights.php-->
    <div class="container">
        <div class="product-new-name">
            <h3 class="margin-bottom-small product-new-name__text">Sản phẩm nổi bật</h3>
        </div>
        <div class="row">
            <?php foreach ($SPCT_Id as $SPCT_Ids) {
                $StoreApDungKhuyenMai = $Query->checkKhuyenMai($SPCT_Ids);
                $QuerySPCT = $Query->layRaThongTinSPCT($SPCT_Ids);
                $QueryHinh = $Query->layRaHinHAnhSPCT($SPCT_Ids);
            ?>
                <div class="col-6 col-lg-3">
                    <div class="box">
                        <div class="box__add-to-card">
                            <a href="?Action=ChiTietSanPham&Id=<?php echo $QuerySPCT['SPCT_Id']; ?>" class="box__add-to-card--text">Thêm vào giỏ hàng</a>
                        </div>
                        <div class="box__img">
                            <a href="?Action=ChiTietSanPham&Id=<?php echo $QuerySPCT['SPCT_Id']; ?>"><img src="/HTMoi/Public/ImageSPCT/<?php echo $QueryHinh['Full']; ?>" class="d-block w-100" alt="new-product-1"></a>
                        </div>
                        <div class="box__detail">
                            <div class="box__detail--name">
                                <a href="?Action=ChiTietSanPham&Id=<?php echo $QuerySPCT['SPCT_Id']; ?>" class="font-default"><?php echo $QuerySPCT['TenSPCT']; ?></a>
                            </div>
                            <div class="box__detail--start">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <?php
                            if (!empty($StoreApDungKhuyenMai)) {
                                $StoreValueKhuyenMai = $Query->checkKieuKhuyenMai($StoreApDungKhuyenMai['KhuyenMai_Id']);
                                $PhanTramKhuyenMai = $StoreValueKhuyenMai['PhanTramKhuyenMai'] / 100;
                                $DonGiaKhuyenMai = $QuerySPCT['DonGia'] * $PhanTramKhuyenMai;
                            ?>
                                <div class="box__detail--price"><?php echo number_format($DonGiaKhuyenMai); ?>₫</div>
                        </div>
                    </div>
                </div>
            <?php
                            } else {
            ?>
                <div class="box__detail--price"><?php echo number_format($QuerySPCT['DonGia']); ?>₫</div>
        </div>
    </div>
    </div>
<?php
                            }
                        }
?>




</div>
</div>
</section>
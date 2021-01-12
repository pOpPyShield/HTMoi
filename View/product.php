<?php include_once 'Head.php'; ?>
<?php include_once 'Header.php'; ?>

<div id="content">
    <a onClick="openSlideMenu()">
        <i class="fas fa-bars detail-openMenu"></i>
    </a>
</div>
<div class="category-product" id="menu">
    <a class="category-product__close" onClick="closeSlideMenu()">
        <i class="fas fa-times"></i>
    </a>
    <h2 class="category-product__name">San Pham</h2>
    <div class="category-product-title">
        <?php
        include_once './Model/DMSP.php';
        $DMSP_Obj = new DMSP();
        $DMSP = $DMSP_Obj->GetDMSP();
        $HMTDM = $DMSP_Obj->GetHMTDM();
        ?>
        <?php
        foreach ($DMSP as $DMSPs) {
        ?>
            <h3 class='font-p adt-left-title'><?php echo $DMSPs['DMSP']; ?></h1>
                <ul class="adt-left-title">
                    <?php
                    //Loop into child of DMSP
                    foreach ($HMTDM as $HMTDMs) {
                        if ($HMTDMs['DMSP_Id'] == $DMSPs['DMSP_Id']) {
                    ?>
                            <li class="adt-left__group"><a href="?Action=<?php echo $HMTDMs['TenHMTDM']; ?>" class="adt-left__link"><?php echo $HMTDMs['TenHMTDM']; ?></a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            <?php
        }
            ?>
    </div>
</div>
<section class="product">
    <div class="row product__row-screen">
        <div class="col-3 col-md-2">
            <div class="product-option">
                <div class="product-option__price">
                    <h4 class="product-option__price--name">Chọn mức giá</h4>
                    <ul class="product-option-list">
                        <li class="product-option-group"><a class="product-option-group__link product-option-group__link--price" href="?Action=SearchMucGia&QR=15">Dưới 15 triệu</a></li>
                        <li class="product-option-group"><a class="product-option-group__link product-option-group__link--price" href="?Action=SearchMucGia&QR=15-20">15 - 20 triệu</a></li>
                        <li class="product-option-group"><a class="product-option-group__link product-option-group__link--price" href="?Action=SearchMucGia&QR=20-25">20 - 25 triệu</a></li>
                        <li class="product-option-group"><a class="product-option-group__link product-option-group__link--price" href="?Action=SearchMucGia&QR=25-30">25 - 30 triệu</a></li>
                        <li class="product-option-group"><a class="product-option-group__link product-option-group__link--price" href="?Action=SearchMucGia&QR=30">Trên 30 triệu</a></li>
                    </ul>
                </div>
                <div class="product-option__start">
                    <h4 class="product-option__price--name">Chọn mức đánh giá </h4>
                    <ul class="product-option-list">
                        <li class="product-option-group"><a href="?Action=ChonDanhGia&DanhGia=75" class="product-option-group__link product-option-group__link--start">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </a></li>
                        <li class="product-option-group"><a href="?Action=ChonDanhGia&DanhGia=50" class="product-option-group__link product-option-group__link--start">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </a></li>
                        <li class="product-option-group"><a href="?Action=ChonDanhGia&DanhGia=25" class="product-option-group__link product-option-group__link--start">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </a></li>
                        <li class="product-option-group"><a href="?Action=ChonDanhGia&DanhGia=0" class="product-option-group__link product-option-group__link--start">
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-9 col-md-10">
            <div class="product-name">
                <h2 class="product-name__text--1">Loptop, Pc-gaming, Linh kiện điện tử</h2>
                <span class="product-name__text--2">Mua máy tính xách tay, máy tính để bàn, màn hình, máy tính bảng, PC chơi game, ổ cứng và bộ lưu trữ, phụ kiện, v.v.</span>
            </div>
            <div class="row product__row">
                <!-----1----->
                <?php include_once './Model/QuerySP.php';
                include_once './Model/NoiDungChiTietSP.php';
                $QueryProductPage = new QuerySP();
                $Rate = new NoiDungChiTiet();
                $ValueStore = $QueryProductPage->layRaSanPhamRanDom();
                for ($i = 0; $i < count($ValueStore); $i++) {
                    $TongSoSao = $Rate->tinhTongSoSaoCuaSanPham($ValueStore[$i]['SPCT_Id'])[0];
                    $SoNguoiRate = $Rate->demSoCotCuaSPCT($ValueStore[$i]['SPCT_Id'])[0];
                    $HinhAnh = $QueryProductPage->layRaHinHAnhSPCT($ValueStore[$i]['SPCT_Id']);
                ?>
                    <div class="col-4">
                        <div class="box__img">
                            <a href="?Action=ChiTietSanPham&Id=<?php echo $ValueStore[$i]['SPCT_Id']; ?>"><img src="/HTMoi/Public/ImageSPCT/<?php echo $HinhAnh['Full']; ?>" class="d-block h-75 w-75" alt="new-product-1"></a>
                        </div>
                        <div class="box__detail">
                            <div class="box__detail--name">
                                <a href="?Action=ChiTietSanPham&Id=<?php echo $ValueStore[$i]['SPCT_Id']; ?>" class="font-default"><?php echo $ValueStore[$i]['TenSPCT']; ?></a>
                            </div>
                            <div class="box__detail--start">
                                <?php if ($SoNguoiRate == 0) {
                                    $Final = "Chưa có đánh giá";
                                ?>
                                    <p><?php echo $Final; ?></p>
                                <?php } else {
                                    $Score1 = $TongSoSao / $SoNguoiRate;
                                    $Final = $Score1 / 20;
                                ?>
                            
                                    <p class="box__detail--start--rating"><i class="fas fa-star"></i>+<?php echo $Final; ?></p>
                                    <p class="box__detail--start--rating">|| <?php echo $SoNguoiRate; ?> người</p>

                                <?php } ?>
                            </div>
                            <?php
                            $KhuyenMai = $QueryProductPage->checkKhuyenMai($ValueStore[$i]['SPCT_Id']);
                            $SoKhuyenMai = $QueryProductPage->checkKieuKhuyenMai($KhuyenMai['KhuyenMai_Id']);
                            $PhanTramKhuyenMai1 = $SoKhuyenMai['PhanTramKhuyenMai'] / 100;

                            $DonGiaMoi1 = $ValueStore[$i]['DonGia'] * $PhanTramKhuyenMai1;
                            if (empty($KhuyenMai)) {
                            ?>
                                <div class="box__detail--price"><?php echo number_format($ValueStore[$i]['DonGia']); ?>đ</div>
                            <?php
                            } else {
                            ?>
                                <div class="box__detail--price"><?php echo number_format($DonGiaMoi1); ?>đ</div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!-----1----->
                <?php
                }

                ?>


            </div>
        </div>
    </div>
</section>
<script src="/HTMoi/Public/js/slide-left.js"></script>
<?php include_once 'Footer.php'; ?>
<?php include_once 'EndHead.php'; ?>
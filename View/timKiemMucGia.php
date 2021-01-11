<?php 
    include_once './Model/QuerySP.php';
    $QueryQR = new QuerySP();
    $DanhGia = $_GET['DanhGia'];
    switch($DanhGia) {
        case "0":
            $limit = 25;
            $StoreSoSao = $QueryQR->layTheoSoSao($DanhGia, $limit);
            break;
        case "25": 
            $limit = 50;
            $StoreSoSao = $QueryQR->layTheoSoSao($DanhGia, $limit);
            break;
        case "50": 
            $limit = 75;
            $StoreSoSao = $QueryQR->layTheoSoSao($DanhGia, $limit);
            break;
        case "75": 
            $limit = 100;
            $StoreSoSao = $QueryQR->layTheoSoSao($DanhGia, $limit);
            break;
        default: 
            break;
    }
    
    
   
?>
<?php include_once 'Head.php';?>
<?php include_once 'Header.php';?>

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
                      <li class="product-option-group"><a class="product-option-group__link product-option-group__link--price" href="?Action=SearchMucGia&QR=15+20">15 - 20 triệu</a></li>
                      <li class="product-option-group"><a class="product-option-group__link product-option-group__link--price" href="?Action=SearchMucGia&QR=20+25">20 - 25 triệu</a></li>  
                      <li class="product-option-group"><a class="product-option-group__link product-option-group__link--price" href="?Action=SearchMucGia&QR=25+30">25 - 30 triệu</a></li>  
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
                    if(!empty($StoreSoSao)) {
                      for($i = 0; $i<count($StoreSoSao); $i++) {
                        $TongSoSao = $Rate->tinhTongSoSaoCuaSanPham($StoreSoSao[$i]['SPCT_Id'])[0];
                        $SoNguoiRate = $Rate->demSoCotCuaSPCT($StoreSoSao[$i]['SPCT_Id'])[0];
                        $HinhAnh = $QueryProductPage->layRaHinHAnhSPCT($StoreSoSao[$i]['SPCT_Id']);
                        $layRaThongTinSPCT = $QueryProductPage->layRaThongTinSPCT($StoreSoSao[$i]['SPCT_Id']);
                ?>
                        <div class="col-4">
                            <div class="box__img">
                                <a href="?Action=ChiTietSanPham&Id=<?php echo $StoreSoSao[$i]['SPCT_Id'];?>"><img src="/HT-Electronics/Public/ImageSPCT/<?php echo $HinhAnh['Full'];?>" class="d-block h-75 w-75" alt="new-product-1"></a>
                            </div>
                            <div class="box__detail">
                                <div class="box__detail--name">
                                    <a href="?Action=ChiTietSanPham&Id=<?php echo $StoreSoSao[$i]['SPCT_Id'];?>" class="font-default"><?php echo $layRaThongTinSPCT['TenSPCT'];?></a>
                                </div>
                                <div class="box__detail--start">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <?php if($SoNguoiRate == 0) {
                                            $Final = "Chua co so sao";    
                                    ?>
                                            <p>So rate: <?php echo $Final;?></p>
                                    <?php } else {
                                                $Score1 = $TongSoSao / $SoNguoiRate;
                                                $Final = $Score1 / 20;
                                    ?>
                                                <p>So rate:<?php echo $SoNguoiRate;?>+</p>
                                                <p>So sao: <?php echo $Final;?></p>
                                    <?php } ?>
                                </div>
                                <?php 
                                    $KhuyenMai = $QueryProductPage->checkKhuyenMai($StoreSoSao[$i]['SPCT_Id']);
                                    $SoKhuyenMai = $QueryProductPage->checkKieuKhuyenMai($KhuyenMai['KhuyenMai_Id']);
                                    $PhanTramKhuyenMai1 = $SoKhuyenMai['PhanTramKhuyenMai'] / 100;
                                    
                                    $DonGiaMoi1 = $layRaThongTinSPCT['DonGia'] * $PhanTramKhuyenMai1;
                                    if(empty($KhuyenMai)) {
                                ?>
                                        <div class="box__detail--price"><?php echo number_format($layRaThongTinSPCT['DonGia']);?></div>
                                <?php 
                                    } else {
                                ?>
                                        <div class="box__detail--price"><?php echo number_format($DonGiaMoi1);?></div>
                                <?php 
                                    }
                                ?>
                            </div>
                        </div>
                        <!-----1----->
                <?php 
                      }
                    } else {
                ?>
                        <h1>Khong tim thay san pham</h1>
                <?php
                    }
                
                ?>
                
                
            </div>
        </div>
    </div>
</section>
<script src="/HT-Electronics/Public/js/slide-left.js"></script>
<?php include_once 'Footer.php';?>
<?php include_once 'EndHead.php';?>
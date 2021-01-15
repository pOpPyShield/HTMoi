<?php include_once 'View/Head.php'; ?>
<?php include_once 'View/Header.php'; ?>
<?php $SPCT_Id = $_GET['Id'];
    include_once './Model/NoiDungChiTietSP.php';
    include_once './Model/KhachHang.php';
    include_once './Model/KhachHang.php';
    include_once './Model/QuerySP.php';
    $NoiDungSP = new NoiDungChiTiet();
    $BinhLuan = new KhachHang();
    $KiemTraKhuyenMai = new QuerySP();
    $KiemTraComment = $BinhLuan->kiemtraComment($SPCT_Id);  
                       
?>
<section class="detail-product">
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
    <div class="detail">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="detail__img">
                        <div class="detail__img-big">
                            <?php $Image = $NoiDungSP->HienThiHinhAnhSPCT($SPCT_Id);
                            ?>
                            <img src="/HTMoi/Public/ImageSPCT/<?php echo $Image['Full'];?>" class="d-block w-100" alt="" id="ProductImg">
                        </div>
                        <div class="detail__img-small">
                            <ul class="detail-list">
                                <li class="detail-list__group">
                                    <img src="./Public/img/new-product-4.jpg" class="d-block w-100 small-img" alt="">
                                </li>
                                <li class="detail-list__group">
                                    <img src="./Public/img/new-product-3.jpg" class="d-block w-100 small-img" alt="">
                                </li>
                                <li class="detail-list__group">
                                    <img src="./Public/img/new-product-2.jpg" class="d-block w-100 small-img" alt="">
                                </li>
                                <li class="detail-list__group">
                                    <img src="./Public/img/new-product-1.jpg" class="d-block w-100 small-img" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="detail-name-evaluate">
                        <?php $TenSPCT = $NoiDungSP->HienThiTenSPCT($SPCT_Id);
                            
                        ?>
                        <span class="detail-name-evaluate__name">
                            <?php echo $TenSPCT['TenSPCT'];?>
                        </span>
                        <div class="box-product__detail--start">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <?php  $Tong = $NoiDungSP->tinhTongSoSaoCuaSanPham($SPCT_Id)[0];
                                    $DemSoCot = $NoiDungSP->demSoCotCuaSPCT($SPCT_Id)[0];
                                    if($DemSoCot == 0) {
                                        $DemSoCot = "Chua co danh gia";
                                        $Final = "Chua co so sao";
                            ?>
                                        <p><?php echo $DemSoCot;?></p>
                                        <p>So sao: <?php echo $Final;?></p>
                            <?php 
                                    } else {
                                        $Score1 = $Tong / $DemSoCot;
                                        $Final = $Score1 / 20;
                            ?>
                                        <p><?php echo $DemSoCot;?>+</p>
                                        <p>So sao: <?php echo $Final;?></p>
                            <?php 
                                    }
                                    
                            ?>

                            
                        </div>
                    </div>
                    <div class="detail-parameter">
                        <div class="detail-parameter-left">
                            <ul class="detail-parameter-left__list">
                                <li class="detail-parameter-left__group">Hãng</li>
                                <li class="detail-parameter-left__group">Hệ điều hành</li>
                                <li class="detail-parameter-left__group">Chip</li>
                                <li class="detail-parameter-left__group">Màn hình</li>
                                <li class="detail-parameter-left__group">Ram</li>
                            </ul>
                        </div>
                        <div class="detail-parameter-right">
                            <?php $NoiDungSPCT = $NoiDungSP->HienThiNoiDungSPCT($SPCT_Id);
                                  if($NoiDungSPCT) {
                            ?>
                                        <ul class="detail-parameter-right__list">
                                            <li class="detail-parameter-right__group"><?php echo $NoiDungSPCT['Hang'];?></li>
                                            <li class="detail-parameter-right__group"><?php echo $NoiDungSPCT['HeDieuHanh'];?></li>
                                            <li class="detail-parameter-right__group"><?php echo $NoiDungSPCT['Chip'];?></li>
                                            <li class="detail-parameter-right__group"><?php echo $NoiDungSPCT['ManHinh'];?></li>
                                            <li class="detail-parameter-right__group"><?php echo $NoiDungSPCT['Ram'];?></li>
                                        </ul>
                            <?php
                                  } else {
                            ?>
                                        <ul class="detail-parameter-right__list">
                                            <li class="detail-parameter-right__group">Chưa có</li>
                                            <li class="detail-parameter-right__group">Chưa có</li>
                                            <li class="detail-parameter-right__group">Chưa có</li>
                                            <li class="detail-parameter-right__group">Chưa có</li>
                                            <li class="detail-parameter-right__group">Chưa có</li>
                                        </ul>
                            <?php
                                  } 
                            ?>
                        </div>
                    </div>
                    <div class="detail-price">
                        <?php $GiaSPCT = $NoiDungSP->HienThigiaSPCT($SPCT_Id); 
                              $CheckKhuyenMai = $KiemTraKhuyenMai->checkKhuyenMai($SPCT_Id);
                              $KieuKhuyenMai = $KiemTraKhuyenMai->checkKieuKhuyenMai($CheckKhuyenMai['KhuyenMai_Id']);
                              $TenKhuyenMai = $KieuKhuyenMai['LoaiKhuyenMai'];
                              $PhanTramKhuyenMai = $KieuKhuyenMai['PhanTramKhuyenMai'] / 100;
                              $DonGiaKhuyenMai = $GiaSPCT['DonGia'] * $PhanTramKhuyenMai;
                              
                              if(!empty($CheckKhuyenMai)) {                              
                        ?>
                                    <p>Khuyen mai dang duoc ap dung: <?php echo $TenKhuyenMai;?></p>
                                    <del class="detail-price__old"><?php echo $GiaSPCT['DonGia'];?></del>
                                    <div class="detail-price__promotional" id="price"><?php echo number_format($DonGiaKhuyenMai);?></div>
                        <?php } else {?>
                                    <div class="detail-price__promotional" id="price"><?php echo number_format($GiaSPCT['DonGia']);?></div>
                        <?php } ?>    
                        
                    </div>
                    
                    <div class="detail-order">
                        <form action="?Action=AddToCart" method="post">
                            
                            <input type="number" name="quantity_SP" min="1" max="10" id="quantity">
                            
                            <input type="hidden" name="id_sp" value="<?php echo $SPCT_Id;?>">
                            <input type="hidden" name="ten_sp" value="<?php echo $TenSPCT['TenSPCT'];?>">
                            <input type="hidden" name="gia" value="<?php if(!empty($CheckKhuyenMai)) {
                                                                            echo $DonGiaKhuyenMai;
                                                                        } else {
                                                                            echo $GiaSPCT['DonGia'];
                                                                        }?>">
                            <button type="submit" name="ThemVaoGio" value="ThemSanPham" class="form__btn form__btn--add-to-card">Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                    <?php $NoiDungTheoID = $NoiDungSP->getNoiDungTheoID($SPCT_Id)?>
                    <div class="description">
                        <h3 class="description__name">Mô tả sản phẩm</h3>
                        <ul class="description-product">
                            <?php if(!$NoiDungTheoID) {?>
                                <li class="description-product__list">Không có mô tả sản phẩm </li>
                            <?php } else { ?>
                                <li class="description-product__list"><?php echo $NoiDungTheoID['NoiDung_1'];?></li>
                                <li class="description-product__list"><?php echo $NoiDungTheoID['NoiDung_2'];?></li>
                                <li class="description-product__list"><?php echo $NoiDungTheoID['NoiDung_3'];?></li>
                                <li class="description-product__list"><?php echo $NoiDungTheoID['NoiDung_4'];?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-product-similar">
        <div class="detail-product-similar__name">
            <h3 class="detail-product-similar__name--text">Sản phẩm tương tự</h3>
        </div>
        <div id="carouselExampleControls" class="carousel slide" style="padding: 2rem 3rem; box-shadow: none;" data-wrap="false" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                    <?php 
                        $StoreSanPhamTuongTu = $KiemTraKhuyenMai->layRaTenTuongTu($TenSPCT['TenSPCT'], $GiaSPCT['DonGia']);
                        
                    if(!empty($StoreSanPhamTuongTu)) {
                        for($i=0;$i<count($StoreSanPhamTuongTu);$i++) {
                            if($StoreSanPhamTuongTu[$i]['SPCT_Id'] == $SPCT_Id) {
                                continue;
                            }
                            //echo $StoreSanPhamTuongTus['SPCT_Id'];
                            
                            $LayRaHinhAnh = $KiemTraKhuyenMai->layRaHinHAnhSPCT($StoreSanPhamTuongTu[$i]['SPCT_Id']);
                            $KhuyenMai = $KiemTraKhuyenMai->checkKhuyenMai($StoreSanPhamTuongTu[$i]['SPCT_Id']);
                            $SoKhuyenMai = $KiemTraKhuyenMai->checkKieuKhuyenMai($KhuyenMai['KhuyenMai_Id']);
                            $PhanTramKhuyenMai1 = $SoKhuyenMai['PhanTramKhuyenMai'] / 100;
                            
                            $DonGiaMoi1 = $StoreSanPhamTuongTu[$i]['DonGia'] * $PhanTramKhuyenMai1;
                    ?>
                        <div class="col-lg-2">
                            <div class="box">
                                <div class="box__img">
                                    <a href="?Action=ChiTietSanPham&Id=<?php echo $StoreSanPhamTuongTu[$i]['SPCT_Id'];?>"><img src="/HTMoi/Public/ImageSPCT/<?php echo $LayRaHinhAnh['Full'];?>" class="d-block w-100" alt="new-product-1"></a>
                                </div>
                                <div class="box__detail">
                                    <div class="box__detail--name">
                                        <a href="?Action=ChiTietSanPham&Id=<?php echo $StoreSanPhamTuongTu[$i]['SPCT_Id'];?>" class="font-default"><?php echo $StoreSanPhamTuongTu[$i]['TenSPCT']?></a>
                                    </div>
                                    <div class="box__detail--start">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <?php if(empty($KhuyenMai)) {?>
                                        <div class="box__detail--price"><?php echo number_format($StoreSanPhamTuongTu[$i]['DonGia']);?></div>
                                    <?php } else {?>
                                        <div class="box__detail--price"><?php echo number_format($DonGiaMoi1);?></div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    <?php 
                        }
                    } else {
                    ?>
                        <div class="col-lg-2">
                            <h1>Khong co san pham tuong tu</h1>
                        </div>
                    <?php
                    }
                    
                    ?>
                       
                        
                    </div>
                </div>
                
                        
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" style="max-width: 0rem;" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" style="margin-left: 3rem; background-color: black; padding: 2rem 1.5rem;" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" style="max-width: 0rem;" role="button" data-slide="next">
                <span class="carousel-control-next-icon" style="margin-left: -3rem;background-color: black; padding: 2rem 1.5rem;" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    <div class="container">
    <?php 
            if(isset($_SESSION['KhachHang_Id'])) {
                    $ArrayDonHang = $BinhLuan->timKiemIdDonHang($_SESSION['KhachHang_Id']);
                    $SPCT_ID_Array = array();
            
                    for($i=0;$i<count($ArrayDonHang);$i++) {
                        $SPCT_ID_Array = $BinhLuan->timKiemSpctId($ArrayDonHang[$i]['DiaChi_Id']);
                    }
                    $CombindSPCT_Id = array();
                    for($i=0; $i<count($SPCT_ID_Array);$i++) {
                        $CombindSPCT_Id[0][$i] = $SPCT_ID_Array[$i][0];
                    }
                    $TimKiemSoSao = $BinhLuan->timKiemSoSao($_SESSION['KhachHang_Id']);
                    $ArraySPCT_IDRAte = array();
                    $ArrayKhachHang_Rate = array();
                    for($i = 0; $i<count($TimKiemSoSao); $i++) {
                        $ArraySPCT_IDRAte[0][$i] = $TimKiemSoSao[$i]['SPCT_Id'];
                    }
                    for($i=0;$i<count($TimKiemSoSao); $i++) {
                        $ArrayKhachHang_Rate[0][$i] = $TimKiemSoSao[$i]['KhachHang_Id'];
                    }
                    
                    if(empty($CombindSPCT_Id)) {
                ?>
                            <a href="?Action=Login">Ban phai mua san pham nay truoc khi comment hoac danh gia</a>
        
                <?php 
                    } elseif(isset($_SESSION['UserName']) AND in_array($SPCT_Id, $CombindSPCT_Id[0])) {
                ?>  
                            <div class="opinion">
            <div class="opinion-rating">
                <?php if(in_array($_SESSION['KhachHang_Id'], $ArrayKhachHang_Rate[0]) AND in_array($SPCT_Id, $ArraySPCT_IDRAte[0])) {?>
                        <h2>Ban da danh gia san pham nay roi</h2>
                <?php } else {?>
                        
                        <h3>Đánh giá sản phẩm</h3>
                            <div class="star-widget u-margin-bottom-small">
                                <form action="?Action=ratingDetail" method="POST">
                                    <input type="radio" name="rate" id="rate-5" value="100">
                                    <label for="rate-5" class="fas fa-star"></label>
                                    <input type="radio" name="rate" id="rate-4" value="75">
                                    <label for="rate-4" class="fas fa-star"></label>
                                    <input type="radio" name="rate" id="rate-3" value="50">
                                    <label for="rate-3" class="fas fa-star"></label>
                                    <input type="radio" name="rate" id="rate-2" value="25">
                                    <label for="rate-2" class="fas fa-star"></label>
                                    <input type="radio" name="rate" id="rate-1" value="0">
                                    <label for="rate-1" class="fas fa-star"></label>
                                    <input type="hidden" name="SPCT_Id" value="<?php echo $SPCT_Id;?>">
                                    <input type="hidden" name="KhachHang_Id" value="<?php echo $_SESSION['KhachHang_Id'];?>">
                                    <input type="hidden" name="Datetimee" value="<?php echo date("F j, Y, g:i a");?>">
                                    <button type="submit" name="buttonRate" class="btn btn-success" value="Rating product">Submit</button>
                                </form>
                            </div>
                    <?php } ?>
            </div>
                <?php 
                    
                    $ArrayKhachHang_Comment = array();
                    for($i = 0; $i<count($KiemTraComment); $i++) {
                        $ArrayKhachHang_Comment[0][$i] = $KiemTraComment[$i]['KhachHang_Id'];
                    }
                    $ArraySPCT_Id_Comment = array();
                    for($i = 0; $i<count($KiemTraComment); $i++) {
                        $ArraySPCT_Id_Comment[0][$i] = $KiemTraComment[$i]['SPCT_Id'];
                    }
                    
                if(empty($ArrayKhachHang_Comment) AND empty($ArraySPCT_Id_Comment) ) {?>
                    <div class="opinion-comment">
                            <h3 class="u-margin-bottom-small">Bình luận</h3>
                            <form action="?Action=BinhLuanDetail" method="POST">
                                <div class="form-group">
                                    <h1><?php echo $_SESSION['UserName'];?></h1>
                                    <input type="hidden" name="IdKhachHang" value="<?php echo $_SESSION['KhachHang_Id'];?>">
                                    <input type="hidden" name="Datetimee" value="<?php echo date("F j, Y, g:i a");?>">
                                    <input type="hidden" name="SPCT_Id" value="<?php echo $SPCT_Id;?>">
                                </div>
                                <br>
                                <div class="form-group">
                                    <textarea type="text" name="BinhLuanKhachHang" class="form-control" style="height: 10rem;" placeholder="Nhập bình luận..."></textarea>
                                </div>
                                <button type="submit" class="form__btn" name="BinhLuan" value="KhachHangBinhLuan">Bình luận</button>
                            </form>
                    </div>
                <?php } elseif(in_array($_SESSION['KhachHang_Id'], $ArrayKhachHang_Comment[0]) AND in_array($SPCT_Id, $ArraySPCT_Id_Comment[0])) {?>
                             <h2>Ban da comment san pham nay roi</h2>
                            
                            
                <?php } ?>
             
            </div>
                            
                <?php        
                    } else {
                ?> 
                        <a href="?Action=Login">Ban phai mua san pham nay truoc khi comment hoac danh gia</a>
                <?php 
                    }
                    $HienThiComment = $NoiDungSP->hienThiComment($SPCT_Id);
                    foreach($HienThiComment as $HienThiComments) {
                ?>
                        <h2><?php echo $UserName = $NoiDungSP->layRaUserName($_SESSION['KhachHang_Id'])[0];;?></h2>
                        <p><?php echo $HienThiComments['Noidungbinhluan']; ?></p>
                        <p>Ngay gio comment: <?php echo $HienThiComments['NgayGio'];?></p>
                        <form action="?Action=XoaComment" method="POST">
                            <input type="hidden" name="SPCT_Id" value="<?php echo $SPCT_Id;?>">
                            <input type="hidden" name="KhachHang_Id" value="<?php echo $_SESSION['KhachHang_Id'];?>">
                            <button class="btn btn-danger" name="XoaComment" value="XoaComment">Xoa Comment</button>                            
                        </form>
                <?php 
                    }
                 } else {
                ?>
                    <a href="?Action=Login">Ban phai mua san pham nay truoc khi comment hoac danh gia</a>
                <?php     
                 } 
                ?>  
    </div>
</section>
<script src="./Public/js/slide-left.js"></script>
<?php include_once 'View/Footer.php'; ?>
<?php include_once 'View/EndHead.php'; ?>
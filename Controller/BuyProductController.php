<?php 
    include_once './Model/KhachHang.php';
    include_once './Model/Session.php';
    class BuyProductController {

        public function themVaoGioHang($Post, $id_sp, $gia, $ten_sp, $quantity) {
            if($quantity == null ) {
                $quantity = 1;
            }
            
            if(isset($Post)) {
                if(!isset($_SESSION['UserName'])) {
                    echo "<script>alert('Login first');
                            window.location.href='/HTMoi/?Action=Login';
                        
                        </script>";
                } else {
                    if(isset($_SESSION['cart']))
                    {
                    
                        $myitems = array_column($_SESSION['cart'], 'ten_sp');
                        if(in_array($_POST['ten_sp'], $myitems)) {
                            echo "<script>alert('The item already have in cart');
                                window.location.href='/HTMoi/';
                        
                            </script>";
                        
                        } else {
                            $count = count($_SESSION['cart']);
                            $_SESSION['cart'][$count] = array('id_sp' => $id_sp, 'gia' => $gia, 'ten_sp' => $ten_sp, 'quantity_SP' => $quantity);
                            echo "<script>window.location.href='/HTMoi/'</script>";
                        }
                    
                    } else 
                    {
                        $_SESSION['cart'][0] = array('id_sp' => $id_sp, 'gia' => $gia, 'ten_sp' => $ten_sp, 'quantity_SP' => $quantity);
                        echo "<script>window.location.href='/HTMoi/'</script>";
                    }
                }
                
                
                
            }
        }

        public function xoaGiohang($Post, $ten_sp) {
            if(isset($Post)) {
                foreach($_SESSION['cart'] as $key=>$value) {
                    if($value['ten_sp'] == $ten_sp) {
                        unset($_SESSION['cart'][$key]);
                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                        echo "<script>
                            alert('Item removed');
                            window.location.href='/HTMoi/?Action=GioHang';
                        </script>";
                    } 
                }
            }
        }

        public function muahang($Post, $type_delivery) {
            $SessionDelivery = new Session();
            if(isset($Post)) {
                $SessionDelivery->SetSession("Delivery_type", $type_delivery);
                echo "<script>
                    window.location.href='/HTMoi/?Action=CheckOut';
                
                </script>";
            }
        }

        

        public function xuLyCheckOutKhongCard($Post,$UserId, $Fullname, $Email, $Address, $City, $Quan, $SoDienThoai, $ThanhToan_Name, $ThanhTien, $SameAddr, $ArrayMaSP = array(), $ArrayQuantity = array()) {
            $KhachHangXuLyCheckOut = new KhachHang();
            $xuLyCheckOutKhongCardSession = new Session();
            $ThanhToan_Id = $KhachHangXuLyCheckOut->timKiemThanhToan($ThanhToan_Name)[0];
            if(!isset($SameAddr)) {
                $Status = 0;
            } else {
                $Status = 1;
            }
            if(isset($Post)) {
                $KhachHangXuLyCheckOut->muaHang($UserId,$Fullname, $Email, $Address, $City, $Quan, $SoDienThoai, $ThanhToan_Id, $ThanhTien, $Status);
                $DiaChi_Id = $KhachHangXuLyCheckOut->layRaDiaChiGiaoHangDuaTrenUserID($UserId);
                $countArray = count($DiaChi_Id);
                $Element = $countArray - 1;
                for($i = 0; $i <sizeof($ArrayMaSP); $i++) {
                    $KhachHangXuLyCheckOut->themVaoGioHangCheckOut($ArrayMaSP[$i], 
                                                                   $DiaChi_Id[$Element]['DiaChi_Id'], 
                                                                   $ArrayQuantity[$i]);
                    
                }
                unset($_SESSION['cart']);
                $xuLyCheckOutKhongCardSession->SetSession("Status", "Success");
                $xuLyCheckOutKhongCardSession->SetSession("Status_Code", "success");
                header("Location: ./?Action=processcheckoutsuccess");
                exit();
            } else {
                header("Location: ./?Action=error");
                exit();
            }

        }

        public function xuLyCheckOutCard($Post,$UserId, $Fullname, $Email, $Address, $City, $Quan, $SoDienThoai, $ThanhToan_Name, $ThanhTien, $SameAddr, $ArrayMaSP = array(), $ArrayQuantity = array(),$cardname, $cardnumber, $expmonth, $expyear, $cvv) {
            $KhachHangXuLyCheckOut = new KhachHang();
            $xuLyCheckOutKhongCardSession = new Session();
            $ThanhToan_Id = $KhachHangXuLyCheckOut->timKiemThanhToan($ThanhToan_Name)[0];
            if(!isset($SameAddr)) {
                $Status = 0;
            } else {
                $Status = 1;
            }
            if(isset($Post)) {
                $KhachHangXuLyCheckOut->muaHang($UserId,$Fullname, $Email, $Address, $City, $Quan, $SoDienThoai, $ThanhToan_Id, $ThanhTien, $Status);
                $DiaChi_Id = $KhachHangXuLyCheckOut->layRaDiaChiGiaoHangDuaTrenUserID($UserId)[0];
                for($i = 0; $i <sizeof($ArrayMaSP); $i++) {
                    $KhachHangXuLyCheckOut->themVaoGioHangCheckOut($ArrayMaSP[$i], 
                                                                   $DiaChi_Id, 
                                                                   $ArrayQuantity[$i]);
                    
                }
                $KhachHangXuLyCheckOut->themVaoCreditCard($UserId, $cardname, $cardnumber, $expmonth, $expyear, $cvv);
                unset($_SESSION['cart']);
                $xuLyCheckOutKhongCardSession->SetSession("Status", "Success");
                $xuLyCheckOutKhongCardSession->SetSession("Status_Code", "success");
                header("Location: ./?Action=processcheckoutsuccess");
                exit();
            } else {
                header("Location: ./?Action=error");
                exit();
            }
            
        }

        public function comment($Submit, $KhachHang_Id, $SPCT_Id, $NoiDungBinhLuan, $NgayGio) {
            $Comment = new KhachHang();
            $Location = "Location: ./?Action=ChiTietSanPham&Id=".$SPCT_Id;
            if(isset($Submit)) {
                $Comment->comment($KhachHang_Id, $SPCT_Id, $NoiDungBinhLuan, $NgayGio);
                header($Location);
            } else {
                header("Location: ./?Action=error");
                exit();
            }
        }

        public function rate($Submit, $KhachHang_Id, $SPCT_Id, $SoSao, $NgayRate) {
            $Rate = new KhachHang();
            $Location = "Location: ./?Action=ChiTietSanPham&Id=".$SPCT_Id;
            if(isset($Submit)) {
                $Rate->rate($KhachHang_Id, $SPCT_Id, $SoSao, $NgayRate);
                header($Location);
            } else {
                header("Location: ./?Action=error");
                exit();
            }
        }

        public function xoaComment($Submit, $KhachHang_Id, $SPCT_Id) {
            $xoaComment = new KhachHang();
            $Location = "Location: ./?Action=ChiTietSanPham&Id=".$SPCT_Id;
            if(isset($Submit)) {
                $xoaComment->xoaComment($KhachHang_Id);
                header($Location);
            } else {
                header("Location: ./?Action=error");
                exit();
            }
        }

        public function timKiemMucGia($QR) {
            $explodeee = explode("-", $QR);
            if(count($explodeee) == 1) {
                
            }
        }
            
    }


?>
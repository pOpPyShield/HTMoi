<?php 

    include_once 'ConnectDB.php';
    class QuerySP extends Db{
        private $QuerySanPhamChiTiet;
        private $SPCT_Id;
        private $QueryTableHinhAnhSPCT;
        private $HMTDM_Id;
        private $DisplayProduct;
        private $ImageSource;
        private $RowCount;
        public function getRowCount() {
            return $this->RowCount;
        }
        public function getImageSource() {
            return $this->ImageSource;
        }
        public function getDisplayProduct() {
            return $this->DisplayProduct;
        }
        public function getQuerySanPhamChiTiet() {
            return $this->QuerySanPhamChiTiet;
        }
        public function getQueryTableHinhAnhSPCT() {
            return $this->QueryTableHinhAnhSPCT;
        }
        public function queryTableSPCT() {
            $QueryTableSPCT = $this->_pdo->prepare("SELECT * FROM sanphamchitietcuahang");
            $QueryTableSPCT->execute();
            $this->QuerySanPhamChiTiet = $QueryTableSPCT->fetchAll();
            $QueryTableSPCT->closeCursor();
        }
        public function queryTableImageSPCT() {
            $QueryTableImageSPCT = $this->_pdo->prepare("SELECT * FROM hinhanhsanphamchitiet");
            $QueryTableImageSPCT->execute();
            $this->QueryTableHinhAnhSPCT = $QueryTableImageSPCT->fetchAll();
            $QueryTableImageSPCT->closeCursor();
        }
        //Query hinh anh cua san pham theo SPCT_Id
        public function queryTableImageSPCTTID($SPCT_Id) {
            $TimKiemHinhAnhTheoSPCT_ID = $this->_pdo->prepare("SELECT * FROM hinhanhsanphamchitiet WHERE SPCT_Id = ?");
            $TimKiemHinhAnhTheoSPCT_ID->bindParam(1, $SPCT_Id);
            $TimKiemHinhAnhTheoSPCT_ID->execute();
            $this->ImageSource = $TimKiemHinhAnhTheoSPCT_ID->fetch();
            $this->RowCount = $TimKiemHinhAnhTheoSPCT_ID->rowCount();
            $TimKiemHinhAnhTheoSPCT_ID->closeCursor();
        }
        //Tim kiem SPCT_Id bang ten
        public function findIdForSPCT($Name) {
            $FindIdForSPCT = $this->_pdo->prepare("SELECT SPCT_Id FROM sanphamchitietcuahang WHERE TenSPCT = ?");
            $FindIdForSPCT->bindParam(1, $Name);
            $FindIdForSPCT->execute();
            $this->SPCT_Id = $FindIdForSPCT->fetch();
            $FindIdForSPCT->closeCursor();
        }
        //Update trang thai cua san pham
        public function updateStatus($SPCT_Id, $Value) {
            $UpadteSPCTTableFromId = $this->_pdo->prepare("UPDATE sanphamchitietcuahang SET Status = ? WHERE SPCT_Id = ?");
            $UpadteSPCTTableFromId->bindParam(1, $Value);
            $UpadteSPCTTableFromId->bindParam(2, $SPCT_Id);
            $UpadteSPCTTableFromId->execute();
            $UpadteSPCTTableFromId->closeCursor();
            return 1;
        }
        //Tim kiem HMTDM_Id qua $TenHMTDM
        public function findIDForHMTDM($TenHMTDM) {
            $TimKiemTheoTen = $this->_pdo->prepare("SELECT HMTDM_Id FROM hangmaytinhcuadanhmuc WHERE TenHMTDM = ?");
            $TimKiemTheoTen->bindParam(1, $TenHMTDM);
            $TimKiemTheoTen->execute();
            $this->HMTDM_Id = $TimKiemTheoTen->fetch();
            $TimKiemTheoTen->closeCursor();
            return 1;
        }
        //Hien thi san pham theo HMTDM_Id
        public function DisplayProductForID() {
            $HienThiSanPhamTheoId = $this->_pdo->prepare("SELECT * FROM sanphamchitietcuahang WHERE HMTDM_Id = ?");
            $HienThiSanPhamTheoId->bindParam(1, $this->HMTDM_Id['HMTDM_Id']);
            $HienThiSanPhamTheoId->execute();
            $this->DisplayProduct = $HienThiSanPhamTheoId->fetchAll();
            $HienThiSanPhamTheoId->closeCursor();
        }
        //Uplaod hinh anh cho san pham
        public function uploadImg($ImageSubmit) {
            $fileName = $ImageSubmit['name'];
            $fileSize = $ImageSubmit['size'];
            $fileType = $ImageSubmit['type'];
            $fileError = $ImageSubmit['error'];
            $fileTmpName = $ImageSubmit['tmp_name'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg' , 'jpeg' , 'png');
            if(in_array($fileActualExt, $allowed)) {
                if($fileError == 0) {
                    if($fileSize<1000000) {
                        $fileNameNew = "SPCT". $this->SPCT_Id['SPCT_Id'] .$fileExt[0]."." .$fileActualExt;
                        $fileDestination = './Public/ImageSPCT/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        // Set status
                        $ImgName1 = $fileExt[0];
                        $st = $this->_pdo->prepare('INSERT INTO hinhanhsanphamchitiet(SPCT_Id, Name, Type, Full) VALUES (?, ?, ?, ?)');
                        $st->bindParam(1, $this->SPCT_Id['SPCT_Id']);
                        $st->bindParam(2, $ImgName1);
                        $st->bindParam(3, $fileActualExt);
                        $st->bindParam(4, $fileNameNew);
                        $st->execute();
                        $st->closeCursor();
                        return 1;
                    }
                    else {
                        return 0;
                    }
                }
            }
        }
        
        public function xoaSanPham($SPCT_Id) {
            $XoaSanPham = $this->_pdo->prepare("DELETE FROM sanphamchitietcuahang WHERE SPCT_Id = ?");
            $XoaSanPham->bindParam(1, $SPCT_Id);
            $XoaSanPham->execute();
            $XoaSanPham->closeCursor();
            return $XoaSanPham;
        }

        public function updateSP($SPCT_Id, $TenSPCT, $DonGia, $SoLuong) {
            $UpdateSP = $this->_pdo->prepare("UPDATE sanphamchitietcuahang SET TenSPCT = ?, DonGia = ?, SoLuong = ? WHERE SPCT_Id = ?");
            $UpdateSP->bindParam(1, $TenSPCT);
            $UpdateSP->bindParam(2, $DonGia);
            $UpdateSP->bindParam(3, $SoLuong);
            $UpdateSP->bindParam(4, $SPCT_Id);
            if($UpdateSP->execute()) {
                return 1;
            } else {
                return 0;
            }
            $UpdateSP->closeCursor();
            
        }

        public function layRaIDSPCT() {
            $LayRaIDSPCT = $this->_pdo->prepare("SELECT SPCT_Id FROM sanphamchitietcuahang");
            $LayRaIDSPCT->execute();
            $StoreValue = $LayRaIDSPCT->fetchAll();
            $LayRaIDSPCT->closeCursor();
            return $StoreValue;
        }
        public function checkKhuyenMai($SPCT_Id) {
            $checkKhuyenMai = $this->_pdo->prepare("SELECT * FROM apdungkhuyenmai WHERE SPCT_Id = ?");
            $checkKhuyenMai->bindParam(1, $SPCT_Id);
            $checkKhuyenMai->execute();
            $StoreValue = $checkKhuyenMai->fetch();
            $checkKhuyenMai->closeCursor();
            return $StoreValue;
        }

        public function checkKieuKhuyenMai($KhuyenMai_Id) {
            $checkKieuKhuyenMai = $this->_pdo->prepare("SELECT * FROM chuongtrinhkhuyenmai WHERE KhuyenMai_Id = ?");
            $checkKieuKhuyenMai->bindParam(1, $KhuyenMai_Id);
            $checkKieuKhuyenMai->execute();
            $StoreValue= $checkKieuKhuyenMai->fetch();
            $checkKieuKhuyenMai->closeCursor();
            return $StoreValue;
        }

        public function timKiemSanPhamCoRating() {
            $timKiemSanPhamCoRatingCao = $this->_pdo->prepare("SELECT * FROM danhgia");
            $timKiemSanPhamCoRatingCao->execute();
            $StoreValue =$timKiemSanPhamCoRatingCao->fetchAll();
            $timKiemSanPhamCoRatingCao->closeCursor();
            return $StoreValue;
        }

        public function layRaHinhAnhTenGiaSanPham($SPCT_Id) {
            $layRaHinhAnhTenGiaSanPham = $this->_pdo->prepare("SELECT TenSPCT, DonGia, HMTDM_Id FROM sanphamchitietcuahang WHERE SPCT_Id = ?");
            $layRaHinhAnhTenGiaSanPham->bindParam(1, $SPCT_Id);
            $layRaHinhAnhTenGiaSanPham->execute();
            $StoreValue = $layRaHinhAnhTenGiaSanPham->fetch();
            $layRaHinhAnhTenGiaSanPham->closeCursor();
            return $StoreValue;
        }

        public function layRaTenHMTDM($HMTDM_Id) {
            $layRaTenHMTDM = $this->_pdo->prepare("SELECT TenHMTDM FROM hangmaytinhcuadanhmuc WHERE HMTDM_Id = ?"); 
            $layRaTenHMTDM->bindParam(1, $HMTDM_Id);
            $layRaTenHMTDM->execute();
            $StoreValue = $layRaTenHMTDM->fetch();
            return $StoreValue;
        }

        public function layRaThongTinSPCT($SPCT_Id) {
            $layRaThongTinSPCT = $this->_pdo->prepare("SELECT * FROM sanphamchitietcuahang WHERE SPCT_ID = ?");
            $layRaThongTinSPCT->bindParam(1, $SPCT_Id);
            $layRaThongTinSPCT->execute();
            $StoreValue = $layRaThongTinSPCT->fetch();
            $layRaThongTinSPCT->closeCursor();
            return $StoreValue;
        }

        public function layRaHinHAnhSPCT($SPCT_Id) {
            $layRaHinhAnhSPCT = $this->_pdo->prepare("SELECT Full from hinhanhsanphamchitiet WHERE SPCT_Id = ?");
            $layRaHinhAnhSPCT->bindParam(1, $SPCT_Id);
            $layRaHinhAnhSPCT->execute();
            $StoreValue= $layRaHinhAnhSPCT->fetch();
            $layRaHinhAnhSPCT->closeCursor();
            return $StoreValue;
        }

        public function layRaTenTuongTu($TenSPCT, $DonGia) {
            $TenSPCTz = "%".$TenSPCT."%";
            $DonGiaz = "%".$DonGia."%";
            $layRaTenTuongTu = $this->_pdo->prepare("SELECT * FROM sanphamchitietcuahang WHERE TenSPCT LIKE :tenspct OR DonGia LIKE :dongia");
            $layRaTenTuongTu->bindValue(':tenspct', $TenSPCTz);
            $layRaTenTuongTu->bindValue(':dongia', $DonGiaz);
            $layRaTenTuongTu->execute();
            $StoreValue = $layRaTenTuongTu->fetchAll();
            $layRaTenTuongTu->closeCursor();
            return $StoreValue;
            
        }

        public function layRaSanPhamRanDom() {
            $layRaSanPhamRandom =$this->_pdo->prepare("SELECT * FROM sanphamchitietcuahang ORDER BY RAND() LIMIT 10");
            $layRaSanPhamRandom->execute();
            $StoreValue = $layRaSanPhamRandom->fetchAll();
            $layRaSanPhamRandom->closeCursor();
            return $StoreValue;
        }

        public function layTheoMucGia($Dau, $QR) {
            $QueryStatement = "SELECT * FROM 'sanphamchitietcuahang' WHERE DonGia ".$Dau." ? ";
            return $QueryStatement;
            //$layTheoMucGia = $this->_pdo->prepare($QueryStatement);
            //$layTheoMucGia->bindParam(1, $QR);
            //$layTheoMucGia->execute();
            //$StoreValue = $layTheoMucGia->fetchAll();
            //$layTheoMucGia->closeCursor();
            //return $StoreValue;
        }

        public function layTheoMucGia2Var($ArrayMucGia1, $ArrayMucGia2) {
            $QueryStatement = "SELECT * FROM 'sanphamchitietcuahang' WHERE DonGia BETWEEN ".$ArrayMucGia1." AND ".$ArrayMucGia2;
            return $QueryStatement;
            //$layTheoMucGia = $this->_pdo->prepare($QueryStatement);
            //$layTheoMucGia->execute();
            //$StoreValue = $layTheoMucGia->fetchAll();
            //$layTheoMucGia->closeCursor();
            //return $StoreValue;
        }
        public function layTheoSoSao($SoSao, $limit) {
            $QueryStatement = $this->_pdo->prepare("SELECT * FROM danhgia WHERE SoSao BETWEEN ? AND ?");
            $QueryStatement->bindParam(1, $SoSao);
            $QueryStatement->bindParam(2, $limit);
            $QueryStatement->execute();
            $StoreValue = $QueryStatement->fetchAll();
            $QueryStatement->closeCursor();
            return $StoreValue;
        }
    }


?>
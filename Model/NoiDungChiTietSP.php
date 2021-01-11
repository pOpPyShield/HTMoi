<?php 

    include_once 'ConnectDB.php';
    class NoiDungChiTiet extends Db{
        private $SPCT_Id;
        private $RowCount;
        public function __construct()
        {
            parent::__construct();
        }
        public function getSPCT_Id() {
            return $this->SPCT_Id;
        }
        public function getRowCount() {
            return $this->RowCount;
        }
        public function timSPCTId($TenSanPham) {
            $TimSPCTID = $this->_pdo->prepare("SELECT SPCT_Id FROM sanphamchitietcuahang WHERE TenSPCT = ?");
            $TimSPCTID->bindParam(1, $TenSanPham);
            $TimSPCTID->execute();
            $Value = $TimSPCTID->fetch();
            $this->SPCT_Id = $Value['SPCT_Id'];
            $this->RowCount = $TimSPCTID->rowCount();
            $TimSPCTID->closeCursor();
            return 1;
        }
        public function themVaoBangNoiDungSPCT($SPCT_Id, $Hang, $HeDieuHanh,$Chip, $ManHinh, $Ram) {
            $ThemVaoBangNoiDung = $this->_pdo->prepare("INSERT INTO noidungsanphamchitiet(SPCT_Id, Hang, HeDieuHanh, Chip, ManHinh, Ram) VALUES (?, ?, ?,?,?,?)");
            $ThemVaoBangNoiDung->bindParam(1, $SPCT_Id);
            $ThemVaoBangNoiDung->bindParam(2, $Hang);
            $ThemVaoBangNoiDung->bindParam(3, $HeDieuHanh);
            $ThemVaoBangNoiDung->bindParam(4, $Chip);
            $ThemVaoBangNoiDung->bindParam(5, $ManHinh);
            $ThemVaoBangNoiDung->bindParam(6, $Ram);
            $ThemVaoBangNoiDung->execute();
            $ThemVaoBangNoiDung->closeCursor();
            return 1;
        }
        //Get Action
        public function HienThiNoiDungSPCT($SPCT_Id) {
            $HienThiNoiDungSPCT = $this->_pdo->prepare("SELECT * FROM noidungsanphamchitiet WHERE SPCT_Id = ?");
            $HienThiNoiDungSPCT->bindParam(1, $SPCT_Id);
            $HienThiNoiDungSPCT->execute();
            $StoreValue = $HienThiNoiDungSPCT->fetch();
            $HienThiNoiDungSPCT->closeCursor();
            return $StoreValue;
        }

        public function HienThiHinhAnhSPCT($SPCT_Id) {
            $HienThiHinhAnhSPCT = $this->_pdo->prepare("SELECT Full FROM hinhanhsanphamchitiet WHERE SPCT_Id = ?");
            $HienThiHinhAnhSPCT->bindParam(1, $SPCT_Id);
            $HienThiHinhAnhSPCT->execute();
            $StoreValue = $HienThiHinhAnhSPCT->fetch();
            $HienThiHinhAnhSPCT->closeCursor();
            return $StoreValue;
        }

        public function HienThiTenSPCT($SPCT_Id) {
            $HienThiTenSPCT = $this->_pdo->prepare("SELECT TenSPCT FROM sanphamchitietcuahang WHERE SPCT_Id = ?");
            $HienThiTenSPCT->bindParam(1, $SPCT_Id);
            $HienThiTenSPCT->execute();
            $StoreValue = $HienThiTenSPCT->fetch();
            $HienThiTenSPCT->closeCursor();
            return $StoreValue;
        }

        public function HienThigiaSPCT($SPCT_Id) {
            $HienThiGiaSPCT = $this->_pdo->prepare("SELECT DonGia FROM sanphamchitietcuahang WHERE SPCT_Id = ?");
            $HienThiGiaSPCT->bindParam(1, $SPCT_Id);
            $HienThiGiaSPCT->execute();
            $StoreValue = $HienThiGiaSPCT->fetch();
            $HienThiGiaSPCT->closeCursor();
            return $StoreValue;
        }

        public function themNoiDungTheoID($SPCT_Id, $NoiDung_1, $NoiDung_2, $NoiDung_3, $NoiDung_4) {
            $ThemNoiDungTheoId = $this->_pdo->prepare("INSERT INTO noidungtheoid(SPCT_Id, NoiDung_1, NoiDung_2, NoiDung_3, NoiDung_4) VALUES (?, ?, ?, ?, ?)");
            $ThemNoiDungTheoId->bindParam(1, $SPCT_Id);
            $ThemNoiDungTheoId->bindParam(2, $NoiDung_1);
            $ThemNoiDungTheoId->bindParam(3, $NoiDung_2);
            $ThemNoiDungTheoId->bindParam(4, $NoiDung_3);
            $ThemNoiDungTheoId->bindParam(5, $NoiDung_4);
            $ThemNoiDungTheoId->execute();
            $ThemNoiDungTheoId->closeCursor();
            return 1;
        }

        public function getNoiDungTheoID($SPCT_Id) {
            $GetNoiDungTheoID = $this->_pdo->prepare("SELECT * FROM noidungtheoid WHERE SPCT_Id = ?");
            $GetNoiDungTheoID->bindParam(1, $SPCT_Id);
            $GetNoiDungTheoID->execute();
            $StoreValue = $GetNoiDungTheoID->fetch();
            $GetNoiDungTheoID->closeCursor();
            return $StoreValue;
        }

        public function xoaNoiDungSP($SPCT_Id) {
            $XoaSanPham = $this->_pdo->prepare("DELETE FROM noidungtheoid WHERE SPCT_Id = ?");
            $XoaSanPham->bindParam(1, $SPCT_Id);
            $XoaSanPham->execute();
            $XoaSanPham->closeCursor();
            return 1;
        }

        public function suaNoiDungSP($SPCT_Id, $NoiDung_1, $NoiDung_2, $NoiDung_3, $NoiDung_4) {
            $suaNoiDungSP = $this->_pdo->prepare("UPDATE noidungtheoid SET NoiDung_1 = ?, NoiDung_2 = ?, NoiDung_3 = ?, NoiDung_4 = ? WHERE SPCT_Id = ?");
            $suaNoiDungSP->bindParam(1, $NoiDung_1);
            $suaNoiDungSP->bindParam(2, $NoiDung_2);
            $suaNoiDungSP->bindParam(3, $NoiDung_3);
            $suaNoiDungSP->bindParam(4, $NoiDung_4);
            $suaNoiDungSP->bindParam(5, $SPCT_Id);
            $suaNoiDungSP->execute();
            $suaNoiDungSP->closeCursor();
            return 1;
        }

        public function hienThiComment($SPCT_Id) {
            $hienThiComment = $this->_pdo->prepare("SELECT * FROM binhluan WHERE SPCT_Id = ?");
            $hienThiComment->bindParam(1, $SPCT_Id);
            $hienThiComment->execute();
            $StoreValue = $hienThiComment->fetchAll();
            $hienThiComment->closeCursor();
            return $StoreValue;
        }

        public function layRaUserName($KhachHang_Id) {
            $layRaUserName = $this->_pdo->prepare("SELECT UserName from khachhang WHERE KhachHang_Id = ?");
            $layRaUserName->bindParam(1, $KhachHang_Id);
            $layRaUserName->execute();
            $StoreUserName = $layRaUserName->fetch();
            $layRaUserName->closeCursor();
            return $StoreUserName;
        }

        public function tinhTongSoSaoCuaSanPham($SPCT_Id) {
            $tinhTongSoSaoCuaSanPham =$this->_pdo->prepare("SELECT SUM(SoSao) TongSaoCuaSP FROM danhgia WHERE SPCT_Id = ?");
            $tinhTongSoSaoCuaSanPham->bindParam(1, $SPCT_Id);
            $tinhTongSoSaoCuaSanPham->execute();
            $StoreTong = $tinhTongSoSaoCuaSanPham->fetch();
            $tinhTongSoSaoCuaSanPham->closeCursor();
            return $StoreTong;
        }

        public function demSoCotCuaSPCT($SPCT_Id) {
            $demSoCotCuaSPCt = $this->_pdo->prepare("SELECT COUNT(SoSao)FROM danhgia WHERE SPCT_Id = ?");
            $demSoCotCuaSPCt->bindParam(1, $SPCT_Id);
            $demSoCotCuaSPCt->execute();
            $StoreTong = $demSoCotCuaSPCt->fetch();
            $demSoCotCuaSPCt->closeCursor();
            return $StoreTong;
        }

        public function hienThiDanhGia() {
            $hienThiDanhGia = $this->_pdo->prepare("SELECT * FROM danhgia");
            $hienThiDanhGia->execute();
            $StoreValue = $hienThiDanhGia->fetchAll();
            $hienThiDanhGia->closeCursor();
            return $StoreValue;
        }
    }

?>
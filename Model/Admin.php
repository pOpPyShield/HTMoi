<?php 
    require_once 'ConnectDb.php';
    class Admin extends Db {
        public function __construct()
        {
            parent::__construct();
        }

        public function DuyetVaHuyDon($DiaChi_Id, $Value){
            $DuyetDon = $this->_pdo->prepare("UPDATE diachigiaohang SET status_don = ? WHERE DiaChi_Id = ?");
            $DuyetDon->bindParam(1, $Value);
            $DuyetDon->bindParam(2, $DiaChi_Id);
            $DuyetDon->execute();
            $DuyetDon->closeCursor();
            return $DuyetDon;
        }

        public function hienThiDonTrenHome($Id) {
            $hienThiDonTrenHome = $this->_pdo->prepare("SELECT COUNT(*) FROM diachigiaohang WHERE status_don = ?");
            $hienThiDonTrenHome->bindParam(1, $Id);
            $hienThiDonTrenHome->execute();
            $StoreValue = $hienThiDonTrenHome->fetch();
            $hienThiDonTrenHome->closeCursor();
            return $StoreValue;
        }

        public function hienThiSoTienKiemDuoc() {
            $hienThiSoTienKiemDuoc = $this->_pdo->prepare("SELECT SUM(ThanhTien) FROM diachigiaohang WHERE status_don = 1");
            $hienThiSoTienKiemDuoc->execute();
            $StoreValue = $hienThiSoTienKiemDuoc->fetch();
            $hienThiSoTienKiemDuoc->closeCursor();
            return $StoreValue;
        }

        public function hienThiTenNguoiDungDaDuyetDon() {
            $hienThiTenNguoiDungDaDuyetDon = $this->_pdo->prepare("SELECT UserName FROM diachigiaohang WHERE status_don = 1");
            $hienThiTenNguoiDungDaDuyetDon->execute();
            $StoreValue = $hienThiTenNguoiDungDaDuyetDon->fetch();
            $hienThiTenNguoiDungDaDuyetDon->closeCursor();
            return $StoreValue;
        }

        public function xoaComment($SPCT_Id, $KhachHang_Id) {
            $xoaComment = $this->_pdo->prepare("DELETE FROM binhluan WHERE SPCT_Id = ? AND KhachHang_Id = ?");
            $xoaComment->bindParam(1, $SPCT_Id);
            $xoaComment->bindParam(2, $KhachHang_Id);
            $xoaComment->execute();
            $xoaComment->closeCursor();
            return $xoaComment;
        }

        public function xoaDanhGia($SPCT_Id, $KhachHang_Id) {
            $XoaDanhGia = $this->_pdo->prepare("DELETE FROM danhgia WHERE SPCT_Id = ? AND KhachHang_Id = ?");
            $XoaDanhGia->bindParam(1, $SPCT_Id);
            $XoaDanhGia->bindParam(2, $KhachHang_Id);
            $XoaDanhGia->execute();
            $XoaDanhGia->closeCursor();
            return $XoaDanhGia;
        }

        public function chinhSuaThongTinChiTiet($SPCT_Id, $Hang, $HeDieuHanh, $Chip, $ManHinh, $Ram) {
            $chinhSuaThongTinChiTiet = $this->_pdo->prepare("UPDATE noidungsanphamchitiet SET Hang= ? , HeDieuHanh = ?, Chip= ?, ManHinh = ?, Ram = ? WHERE SPCT_Id = ?");
            $chinhSuaThongTinChiTiet->bindParam(1, $Hang);
            $chinhSuaThongTinChiTiet->bindParam(2, $HeDieuHanh);
            $chinhSuaThongTinChiTiet->bindParam(3, $Chip);
            $chinhSuaThongTinChiTiet->bindParam(4, $ManHinh);
            $chinhSuaThongTinChiTiet->bindParam(5, $Ram);
            $chinhSuaThongTinChiTiet->bindParam(6, $SPCT_Id);
            $chinhSuaThongTinChiTiet->execute();
            $chinhSuaThongTinChiTiet->closeCursor();
            return $chinhSuaThongTinChiTiet;
        }

        public function layThongTinDiaChiGiaoHang($DiaChi_Id) {
            $layThongTinDiaChiGiaoHang = $this->_pdo->prepare("SELECT * FROM diachigiaohang WHERE DiaChi_Id = ?");
            $layThongTinDiaChiGiaoHang->bindParam(1, $DiaChi_Id);
            $layThongTinDiaChiGiaoHang->execute();
            $StoreValue = $layThongTinDiaChiGiaoHang->fetch();
            $layThongTinDiaChiGiaoHang->closeCursor();
            return $StoreValue;
        }

        public function layThongTinGioHang($DiaChi_Id) {
            $LayThongTinGiohang = $this->_pdo->prepare("SELECT * FROM giohang WHERE DiaChi_Id = ?");
            $LayThongTinGiohang->bindParam(1, $DiaChi_Id);
            $LayThongTinGiohang->execute();
            $StoreValue = $LayThongTinGiohang->fetchAll();
            $LayThongTinGiohang->closeCursor();
            return $StoreValue;
        }

        public function layTenSPCT($SPCT_Id) {
            $LayTenSPCT = $this->_pdo->prepare("SELECT TenSPCT FROM sanphamchitietcuahang WHERE SPCT_Id = ?");
            $LayTenSPCT->bindParam(1, $SPCT_Id);
            $LayTenSPCT->execute();
            $StoreValue = $LayTenSPCT->fetch();
            $LayTenSPCT->closeCursor();
            return $StoreValue;
        }
    }
?>
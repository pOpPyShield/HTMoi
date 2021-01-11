<?php 
    include_once('ConnectDB.php');
    class Khuyenmai extends Db{
        private $LoaiKhuyenMai;
        private $PhanTramKhuyenMai; 
        private $RowCount;
        public function __construct(){
            parent::__construct();
        }
        public function getRowCount() {
            return $this->RowCount;
        }
        public function setLoaiKhuyenMai($LoaiKhuyenMai) {
            $this->LoaiKhuyenMai = $LoaiKhuyenMai;
        }

        public function setPhanTramKhuyenMai($PhanTramKhuyenMai) {
            $this->PhanTramKhuyenMai = $PhanTramKhuyenMai; 
        }

        public function InsertChuongTrinhKhuyenMai() {
            $InsertTableChuongTrinhKhuyenMai = $this->_pdo->prepare("INSERT INTO chuongtrinhkhuyenmai(LoaiKhuyenMai, PhanTramKhuyenMai) VALUES (?, ?)");
            $InsertTableChuongTrinhKhuyenMai->bindParam(1, $this->LoaiKhuyenMai);
            $InsertTableChuongTrinhKhuyenMai->bindParam(2, $this->PhanTramKhuyenMai);
            $InsertTableChuongTrinhKhuyenMai->execute();
            $InsertTableChuongTrinhKhuyenMai->closeCursor();
            return $InsertTableChuongTrinhKhuyenMai;
        }
        //Tim kiem trong apdung khuyen mai table
        public function find_SPCTID_TrongApDungKhuyenMai($SPCT_Id) {
            $TimKiemSPCTId = $this->_pdo->prepare("SELECT * FROM chuongtrinhkhuyenmai WHERE SPCT_Id = ?");
            $TimKiemSPCTId->bindParam(1, $SPCT_Id);
            $TimKiemSPCTId->execute();
            $this->RowCount = $TimKiemSPCTId->rowCount();
            $TimKiemSPCTId->closeCursor();
        }
        //Danh cho input nhap vao
        public function find_KhuyenMaiID_QuaTen($NameKhuyenMai) {
            $TimKiemKhuyenMaiId = $this->_pdo->prepare("SELECT * FROM chuongtrinhkhuyenmai WHERE LoaiKhuyenMai = ?");
            $TimKiemKhuyenMaiId->bindParam(1, $NameKhuyenMai);
            $TimKiemKhuyenMaiId->execute();
            $StoreValue = $TimKiemKhuyenMaiId->fetch();
            $TimKiemKhuyenMaiId->closeCursor();
            return $StoreValue;
        }

        //Lay ra gia tri trong chuong trinh khuyen mai 
        public function queryApDungKhuyenMaiTable() {
            $TimKiemKhuyenMaiId = $this->_pdo->prepare("SELECT * FROM apdungkhuyenmai");
            $TimKiemKhuyenMaiId->execute();
            $StoreValue = $TimKiemKhuyenMaiId->fetchAll();
            $TimKiemKhuyenMaiId->closeCursor();
            return $StoreValue;
        }
        //Tim Kiem SPCT_Id thong qua ham tim id qua ten san pham 
        public function ApDungLoaiKhuyenMaiChoSanPham($KhuyenMai_Id, $SPCT_Id, $NgayBatDau, $NgayKetThuc) {
            $ApDungKhuyenMaiChoSanPham = $this->_pdo->prepare("INSERT INTO apdungkhuyenmai(KhuyenMai_Id, SPCT_Id, NgayBatDau, NgayKetThuc) VALUES (?, ?, ?, ?)");
            $ApDungKhuyenMaiChoSanPham->bindParam(1, $KhuyenMai_Id);
            $ApDungKhuyenMaiChoSanPham->bindParam(2, $SPCT_Id);
            $ApDungKhuyenMaiChoSanPham->bindParam(3, $NgayBatDau);
            $ApDungKhuyenMaiChoSanPham->bindParam(4, $NgayKetThuc);
            $ApDungKhuyenMaiChoSanPham->execute();
            $ApDungKhuyenMaiChoSanPham->closeCursor();
            return $ApDungKhuyenMaiChoSanPham;
        }

        public function queryChuongTrinhKhuyenMai() {
            $QueryChuongTrinhKhuyenmai = $this->_pdo->prepare("SELECT * FROM chuongtrinhkhuyenmai");
            $QueryChuongTrinhKhuyenmai->execute();
            $Storevalue = $QueryChuongTrinhKhuyenmai->fetchAll();
            $QueryChuongTrinhKhuyenmai->closeCursor();
            return $Storevalue;
        }

        public function suaChuongTrinhKhuyenMai($KhuyenMaiId, $LoaiKhuyenMai, $PhanTramKhuyenMai) {
            $SuaChuongTrinhKhuyenMai = $this->_pdo->prepare("UPDATE chuongtrinhkhuyenmai SET LoaiKhuyenMai = ?, PhanTramKhuyenMai = ?  WHERE KhuyenMai_Id = ?");
            $SuaChuongTrinhKhuyenMai->bindParam(1, $LoaiKhuyenMai);
            $SuaChuongTrinhKhuyenMai->bindParam(2, $PhanTramKhuyenMai);
            $SuaChuongTrinhKhuyenMai->bindParam(3, $KhuyenMaiId);
            $SuaChuongTrinhKhuyenMai->execute();
            $SuaChuongTrinhKhuyenMai->closeCursor();
            return $SuaChuongTrinhKhuyenMai;
            
        }

        public function xoaChuongTrinhKhuyenMai($KhuyenMai_Id) {
            $XoaKhuyenMai = $this->_pdo->prepare("DELETE FROM chuongtrinhkhuyenmai WHERE KhuyenMai_Id = ?");
            $XoaKhuyenMai->bindParam(1, $KhuyenMai_Id);
            $XoaKhuyenMai->execute();
            $XoaKhuyenMai->closeCursor();
            return $XoaKhuyenMai;
        }

        public function timTenChuongTrinhKhuyenMai($KhuyenMai_Id) {
            $TimTenCtrinhkhuyenmai = $this->_pdo->prepare("SELECT LoaiKhuyenMai FROM chuongtrinhkhuyenmai WHERE KhuyenMai_Id = ?");
            $TimTenCtrinhkhuyenmai->bindParam(1, $KhuyenMai_Id);
            $TimTenCtrinhkhuyenmai->execute();
            $StoreValue = $TimTenCtrinhkhuyenmai->fetch();
            $TimTenCtrinhkhuyenmai->closeCursor();
            return $StoreValue;
        }

        public function tatCtrinhKM($SPCT_Id, $Status) {
            $TatCtrinhKM = $this->_pdo->prepare("UPDATE apdungkhuyenmai SET Status = ? WHERE SPCT_Id = ?");
            $TatCtrinhKM->bindParam(1, $Status);
            $TatCtrinhKM->bindParam(2, $SPCT_Id);
            $TatCtrinhKM->execute();
            $TatCtrinhKM->closeCursor();
            return $TatCtrinhKM;
        }

        public function batCtrinhKM($SPCT_Id, $Status) {
            $batCtrinhKM = $this->_pdo->prepare("UPDATE apdungkhuyenmai SET Status = ? WHERE SPCT_Id = ?");
            $batCtrinhKM->bindParam(1, $Status);
            $batCtrinhKM->bindParam(2, $SPCT_Id);
            $batCtrinhKM->execute();
            $batCtrinhKM->closeCursor();
            return $batCtrinhKM;
        }
    }

?>
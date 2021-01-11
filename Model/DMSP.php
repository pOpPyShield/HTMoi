<?php 
    include_once 'ConnectDB.php';
    class DMSP extends Db{
        private $DMSP= array();
        private $HMTDM = array();
        public function __construct()
        {
            parent::__construct();
        }
        public function GetDMSP() {
            $QueryDanhMucSanPham = $this->_pdo->prepare("SELECT * FROM danhmucsanpham ORDER BY DMSP_Id ASC");
            $QueryDanhMucSanPham->execute();
            $this->DMSP = $QueryDanhMucSanPham->fetchAll();
            $QueryDanhMucSanPham->closeCursor();
            return $this->DMSP;
        }
        public function GetHMTDM() {
            $QueryHangMayTinhDanhMuc = $this->_pdo->prepare("SELECT * FROM hangmaytinhcuadanhmuc ORDER BY HMTDM_Id ASC");
            $QueryHangMayTinhDanhMuc->execute();
            $this->HMTDM= $QueryHangMayTinhDanhMuc->fetchAll();
            $QueryHangMayTinhDanhMuc->closeCursor();
            return $this->HMTDM;
        }

    }

?>
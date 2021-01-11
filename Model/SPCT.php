<?php 

    include_once 'ConnectDB.php';
    class SPCT extends Db {
        private $NameInputSPCT;
        private $DonGia;
        private $SoLuong;
        private $HMTDMName;
        public function __construct($NameInputSPCT, $DonGia, $SoLuong, $HMTDMName) 
        {
            parent::__construct();
            $this->NameInputSPCT = $NameInputSPCT;
            $this->DonGia = $DonGia;
            $this->SoLuong = $SoLuong;
            $this->HMTDMName = $HMTDMName;
        }

        public function upload() {
            $UploadSPCT = $this->_pdo->prepare("INSERT INTO sanphamchitietcuahang(TenSPCT, HMTDM_Id, DonGia, SoLuong) VALUES (?, ?, ?, ?)");
            $UploadSPCT->bindParam(1, $this->NameInputSPCT);
            $UploadSPCT->bindParam(2, $this->_result['HMTDM_Id']);
            $UploadSPCT->bindParam(3, $this->DonGia);
            $UploadSPCT->bindParam(4, $this->SoLuong);
            $UploadSPCT->execute();
            $UploadSPCT->closeCursor();
            return 1;
        }

        public function find_id() {
            $FindIDHMTDMName = $this->_pdo->prepare("SELECT HMTDM_Id FROM hangmaytinhcuadanhmuc WHERE TenHMTDM = ?");
            $FindIDHMTDMName->bindParam(1, $this->HMTDMName);
            $FindIDHMTDMName->execute();
            $this->_result = $FindIDHMTDMName->fetch();
            $FindIDHMTDMName->closeCursor();
            return 1;
        }
        
        public function uploadImg($SPCT_Id, $ImageSubmit) {
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
                        $fileNameNew = "SPCT". $SPCT_Id .$fileExt[0]."." .$fileActualExt;
                        $fileDestination = '/HT-Electronics/Public/ImageSPCT/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        // Set status
                        $ImgName1 = $fileExt[0];
                        $st = $this->_pdo->prepare('INSERT INTO hinhanhsanphamchitiet(SPCT_Id, Name, Type) VALUES (?, ?, ?)');
                        $st->bindParam(1, $SPCT_Id);
                        $st->bindParam(2, $ImgName1);
                        $st->bindParam(3, $fileActualExt);
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
    }

?>
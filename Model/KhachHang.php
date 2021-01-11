<?php 
    require_once 'ConnectDb.php';
    class KhachHang extends Db{
        private $username = '';
        private $password = '';
        private $_userID;
        private $_imgName;
        private $_imgType;
        private $_resultUserReg;
        private $_typeDelive;
        public function __construct()
        {
            parent::__construct();
        }
        //Set type delivery 
        public function SetTypeDelive($typeDelive) {
            $this->_typeDelive = $typeDelive;
        }

        public function GetTypeDelive() {
            return $this->_typeDelive;
        }
        //Set $username.
        public function SetUsrName($Username) {
            $this->username = $Username;
        }
        //Get $username.
        public function GetUserName() {
            return $this->username;
        }
        //Set $password.
        public function SetPassword($Password) {
            $this->password = $Password;
        }
        //Get $password.
        public function GetPassword() {
            return $this->password;
        }
        //Get $_userID.
        public function GetUsrId() {
            return $this->_userID;
        }
        //Get $_imgName.
        public function GetImgName() {
            return $this->_imgName;
        }
        //Get $_imgType.
        public function GetImgType() {
            return $this->_imgType;
        }
        //Get $_resultUserReg, result of query reg use for update img of user.
        public function GetResultUsrReg() {
            return $this->_resultUserReg;
        }
        //Get $_result, result of query login, use to check role column.
        public function GetResultLogin($Column) {
            return $this->_result[$Column];
        }
        //                      This part for register and login user
        /** -------------------------------------------------------------------------------------------- */
        //Register user method
        public function Register($Email) {
            //Hash the password before execute statement
            $PasswordHash = password_hash($this->password, PASSWORD_BCRYPT);
            $RoleUser = 0;
            //Statement to insert to khachhang table
            $StatementAddUser = $this->_pdo->prepare("INSERT INTO khachhang(UserName, Password, Email, Role) VALUES (?, ?, ?, ?)");
            $StatementAddUser->bindParam(1, $this->username);
            $StatementAddUser->bindParam(2, $PasswordHash);
            $StatementAddUser->bindParam(3, $Email);
            $StatementAddUser->bindParam(4, $RoleUser);
            //Execute success
            if($StatementAddUser->execute()) {
                $StatementAddUser->closeCursor();
                //Select user with UserName
                $StatementSelectUser = $this->_pdo->prepare("SELECT * FROM khachhang where UserName = ?");
                $StatementSelectUser->bindParam(1, $this->username);
                $StatementSelectUser->execute();
                $this->_resultUserReg = $StatementSelectUser->fetch();
                $StatementSelectUser->closeCursor();
                //Set $_userID to insert to profile img table
                $this->_userID = $this->_resultUserReg['KhachHang_Id'];
                $NameOfImage = 'DefaultImg';
                $StatusOfImage = 0;
                $TypeOfImage = 'jpg';
                //Insert Into table profileimg
                $StatementAddProfileImg = $this->_pdo->prepare("INSERT INTO profileimg(KhachHang_Id, NameImg, Status, Type) VALUES (?, ?, ?, ?)");
                $StatementAddProfileImg->bindParam(1, $this->_userID);
                $StatementAddProfileImg->bindParam(2, $NameOfImage);
                $StatementAddProfileImg->bindParam(3, $StatusOfImage);
                $StatementAddProfileImg->bindParam(4, $TypeOfImage);
                $StatementAddProfileImg->execute();
                $StatementAddProfileImg->closeCursor();
                return 1;
            }
            return 0;
        }
        //Login User method.
        public function Login() {
            //Statement select user from khachhang table
            $StatementSelectUser = $this->_pdo->prepare("SELECT* FROM khachhang WHERE UserName=?");
            $StatementSelectUser->bindParam(1, $this->username);
            $StatementSelectUser->execute();
            //Check the result if have result 
            if($StatementSelectUser->rowCount() == 1) {
                $this->_result = $StatementSelectUser->fetch();
                $StatementSelectUser->closeCursor();
                if(password_verify($this->password, $this->_result['Password'])) {
                    $this->username = $this->_result['UserName'];
                    return 1;
                }
            }
            return 0;
        }
        //Check Img user
        public function CheckImg($UserId) {
            $StatementSelectUser = $this->_pdo->prepare("SELECT * FROM profileimg WHERE KhachHang_Id = ?");
            $StatementSelectUser->bindParam(1, $UserId);
            $StatementSelectUser->execute();
            $this->_result = $StatementSelectUser->fetch();
            $StatementSelectUser->closeCursor();
            $this->_imgType = $this->_result['Type'];
            $this->_imgName = $this->_result['NameImg'];
            if($this->_result['Status'] == 1) {
                 $this->_userID = $UserId;
                 return true;
            }
            return false;
        }
        /**------------------------------------------------End login and register user --------------------------------- */

         //           This part for process checkout
        /**     ----------------------------------------------------         */
        public function muaHang($UserId, $FullName, $Email, $Address, $City, $Quan, $SoDienThoai, $ThanhToan_Id, $ThanhTien, $SameAddr) {
            $MuaHangStatement = $this->_pdo->prepare("INSERT INTO diachigiaohang(
                                                                        KhachHang_Id, 
                                                                        Ten,
                                                                        DiaChi, 
                                                                        City, 
                                                                        Quan, 
                                                                        Sdt, 
                                                                        Email, 
                                                                        ThanhToan_Id, 
                                                                        ThanhTien,
                                                                        SameAddr 
                                                                        ) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $MuaHangStatement->bindParam(1, $UserId);
            $MuaHangStatement->bindParam(2, $FullName);
            $MuaHangStatement->bindParam(3, $Address);
            $MuaHangStatement->bindParam(4, $City);
            $MuaHangStatement->bindParam(5, $Quan);
            $MuaHangStatement->bindParam(6, $SoDienThoai);
            $MuaHangStatement->bindParam(7, $Email);
            $MuaHangStatement->bindParam(8, $ThanhToan_Id);
            $MuaHangStatement->bindParam(9, $ThanhTien);
            $MuaHangStatement->bindParam(10, $SameAddr);
            $MuaHangStatement->execute();
            $MuaHangStatement->closeCursor();
            return $MuaHangStatement;
        }

        public function timKiemThanhToan($ThanhToan_Name) {
            $TimKiemThanhToan = $this->_pdo->prepare("SELECT ThanhToan_Id FROM thanhtoan WHERE KieuThanhToan = ?");
            $TimKiemThanhToan->bindParam(1, $ThanhToan_Name);
            $TimKiemThanhToan->execute();
            $StoreValue = $TimKiemThanhToan->fetch();
            $TimKiemThanhToan->closeCursor();
            return $StoreValue;
        }

        public function themVaoGioHangCheckOut($SPCT_Id, $DiaChi_Id, $SoLuong) {
            
                $ThemVaoGiohangCheckOut = $this->_pdo->prepare("INSERT INTO giohang(SPCT_Id, DiaChi_Id, SoLuong) VALUES (?, ?, ?)");
                $ThemVaoGiohangCheckOut->bindParam(1, $SPCT_Id);
                $ThemVaoGiohangCheckOut->bindParam(2, $DiaChi_Id);
                $ThemVaoGiohangCheckOut->bindParam(3, $SoLuong);
                $ThemVaoGiohangCheckOut->execute();
                $ThemVaoGiohangCheckOut->closeCursor();
                return 1;
           
        }
        
        public function layRaDiaChiGiaoHangDuaTrenUserID($UserId) {
            $layRaDiachiGiaoHangDuaTrenUserId = $this->_pdo->prepare("SELECT DiaChi_Id FROM diachigiaohang WHERE KhachHang_Id = ?");
            $layRaDiachiGiaoHangDuaTrenUserId->bindParam(1, $UserId);
            $layRaDiachiGiaoHangDuaTrenUserId->execute();
            $StoreValue = $layRaDiachiGiaoHangDuaTrenUserId->fetchAll();
            $layRaDiachiGiaoHangDuaTrenUserId->closeCursor();
            return $StoreValue;
        }

        public function themVaoCreditCard($UserID, $cardname, $cardnumber, $expmonth, $expyear, $ccv) {
                $ThemVaoCreditCard = $this->_pdo->prepare("INSERT INTO creditcard(KhachHang_Id, cardname, cardnumber, expmonth, expyear,ccv) VALUES(?, ?, ?, ?, ?, ?)");
                $ThemVaoCreditCard->bindParam(1, $UserID);
                $ThemVaoCreditCard->bindParam(2, $cardname);
                $ThemVaoCreditCard->bindParam(3, $cardnumber);
                $ThemVaoCreditCard->bindParam(4, $expmonth);
                $ThemVaoCreditCard->bindParam(5, $expyear);
                $ThemVaoCreditCard->bindParam(6, $ccv);
                $ThemVaoCreditCard->execute();
                $ThemVaoCreditCard->closeCursor();
                return $ThemVaoCreditCard;
        }
        /**------------------------------End process checkout ------------------------------------ */

        //           This part for manage order for admin
        /**     ----------------------------------------------------         */
        public function layRaDiaChiGiaoHang() {
            $layRaDiachiGiaoHang = $this->_pdo->prepare("SELECT * FROM diachigiaohang");
            $layRaDiachiGiaoHang->execute();
            $StoreValue = $layRaDiachiGiaoHang->fetchAll();
            $layRaDiachiGiaoHang->closeCursor();
            return $StoreValue;
        }
        
        public function layTenCuaNguoiDung($UserId) {
            $LayTenCuaNguoiDung = $this->_pdo->prepare("SELECT UserName FROM khachhang WHERE KhachHang_Id = ?");
            $LayTenCuaNguoiDung->bindParam(1, $UserId);
            $LayTenCuaNguoiDung->execute();
            $StoreValue = $LayTenCuaNguoiDung->fetch();
            $LayTenCuaNguoiDung->closeCursor();
            return $StoreValue;
        }

        //public function layGioHang($UserId) {
            //$layGioHang = $this->_pdo->prepare("SELECT * FROM giohang WHERE KhachHang_Id = ?");
            //$layGioHang->bindParam(1, $UserID);
            //$layGioHang->execute();
            //$StoreValue= $layGioHang->fetchAll();
            //$layGioHang->closeCursor();
            //return $StoreValue;
        //}

        public function timKiemKieuThanhToan($ThanhToan_Id) {
            $TimKiemKieuThanhToan = $this->_pdo->prepare("SELECT KieuThanhToan FROM thanhtoan WHERE ThanhToan_Id = ?");
            $TimKiemKieuThanhToan->bindParam(1, $ThanhToan_Id);
            $TimKiemKieuThanhToan->execute();
            $StoreValue = $TimKiemKieuThanhToan->fetch();
            $TimKiemKieuThanhToan->closeCursor();
            return $StoreValue;
        }

        public function layGioHang() {
            $LayGiohang = $this->_pdo->prepare("SELECT * FROM giohang");
            $LayGiohang->execute();
            $StoreValue = $LayGiohang->fetchAll();
            $LayGiohang->closeCursor();
            return $StoreValue;
        }

        public function timKiemIdDonHang($KhachHang_Id) {
            $timKiemIdDonHang = $this->_pdo->prepare("SELECT DiaChi_Id FROM diachigiaohang WHERE status_don = 1 AND KhachHang_Id = ?");
            $timKiemIdDonHang->bindParam(1, $KhachHang_Id);
            $timKiemIdDonHang->execute();
            $StoreValue = $timKiemIdDonHang->fetchAll();
            $timKiemIdDonHang->closeCursor();
            return $StoreValue;
        }

        public function timKiemSpctId($DiaChi_Id) {
            $timKiemSPCTID = $this->_pdo->prepare("SELECT SPCT_Id FROM giohang WHERE DiaChi_Id = ?");
            $timKiemSPCTID->bindParam(1, $DiaChi_Id);
            $timKiemSPCTID->execute();
            $StoreValue = $timKiemSPCTID->fetchAll();
            $timKiemSPCTID->closeCursor();
            return $StoreValue;
        }

        public function comment($KhachHang_Id, $SPCT_Id, $NoiDungBinhLuan, $NgayGio) {
            $Comment = $this->_pdo->prepare("INSERT INTO binhluan(KhachHang_Id, SPCT_Id, Noidungbinhluan, NgayGio) VALUES (?, ?, ?, ?)");
            $Comment->bindParam(1, $KhachHang_Id);
            $Comment->bindParam(2, $SPCT_Id);
            $Comment->bindParam(3, $NoiDungBinhLuan);
            $Comment->bindParam(4, $NgayGio);
            $Comment->execute();
            $Comment->closeCursor();
            return $Comment;
        }

        public function kiemtraComment($SPCT_ID) {
            $Comment = $this->_pdo->prepare("SELECT * FROM binhluan WHERE SPCT_Id = ?");
            $Comment->bindParam(1, $SPCT_ID);
            $Comment->execute();
            $StoreValue = $Comment->fetchAll();
            $Comment->closeCursor();
            return $StoreValue;
        }

        public function rate($KhachHang_Id, $SPCT_ID, $SoSao, $NgayRate) {
            $rate = $this->_pdo->prepare("INSERT INTO danhgia(KhachHang_Id, SPCT_Id, SoSao, NgayRate) VALUES(?, ?, ?, ?)");
            $rate->bindParam(1, $KhachHang_Id);
            $rate->bindParam(2, $SPCT_ID);
            $rate->bindParam(3, $SoSao);
            $rate->bindParam(4, $NgayRate);
            $rate->execute();
            $rate->closeCursor();
            return $rate;
        }

        public function timKiemSoSao($KhachHang_Id) {
            $timKiemSoSao = $this->_pdo->prepare("SELECT * FROM danhgia WHERE KhachHang_Id = ?");
            $timKiemSoSao->bindParam(1, $KhachHang_Id);
            $timKiemSoSao->execute();
            $StoreValue = $timKiemSoSao->fetchAll();
            $timKiemSoSao->closeCursor();
            return $StoreValue;
        }

        public function xoaComment($KhachHang_Id) {
            $xoaComment = $this->_pdo->prepare("DELETE FROM binhluan WHERE KhachHang_Id = ?");
            $xoaComment->bindParam(1, $KhachHang_Id);
            $xoaComment->execute();
            $xoaComment->closeCursor();
            return $xoaComment;
        }
        //Chua Thanh cong
        public function timKiemSanPham($TenSP) {
            $TimKiemSanPham = $this->_pdo->prepare("SELECT * FROM sanphamchitietcuahang WHERE TenSPCT like ? OR ");
        }
    }
?>
<?php 
    include_once './Model/KhachHang.php';
    include_once './Model/Session.php';
    include_once './Sanitizie/Sanitizie.php';
    class LoginController {
        public function Login($UserNameInput, $Password, $ValuePost) {
            $SessionUser = new Session();
            if(isset($ValuePost)) {
                //Change this
                $UserNameAfterClean = clean($UserNameInput);
                $PasswordAfterClean = clean($Password);
                //Create khachhang obj
                $KhachHangObj = new KhachHang();
                $KhachHangObj->SetUsrName($UserNameAfterClean);
                $KhachHangObj->SetPassword($PasswordAfterClean);
                if($KhachHangObj->Login()) {
                    $SessionUser->SetSession("UserName",$KhachHangObj->GetUserName());
                    $SessionUser->SetSession("KhachHang_Id", $KhachHangObj->GetResultLogin("KhachHang_Id"));
                    $RoleUser = $KhachHangObj->GetResultLogin("Role");
                    $SessionUser->SetSession("Role", $RoleUser);
                    if($RoleUser == 0) {
                        $SessionUser->SetSession("Login_Status", "Login Success");
                        $SessionUser->SetSession("Login_Status_Code", "success");
                        header('Location: ./?Action=Home');
                    } else {
                        $SessionUser->SetSession("Login_Status", "Login Success");
                        $SessionUser->SetSession("Login_Status_Code", "success");
                        header('Location: ./?Action=Admin');
                    }
                } else {
                    unset($_SESSION['UserName']);
                    $SessionUser->SetSession("Login_Status", "Password or username wrong");
                    $SessionUser->SetSession("Login_Status_Code", "warning");
                    header("Location: ./?Action=Login");
                }
            }
        }
    }
?>
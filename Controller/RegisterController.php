<?php 
    include_once './Model/KhachHang.php';
    include_once './Sanitizie/Sanitizie.php';
    include_once './Model/Session.php';
    class RegisterController {
        public function RegisterUser($UserName, $Email, $Password, $ValueReg) {
            $SessionUser = new Session();
            if(isset($ValueReg)) {
                $UserNameAfterClean = clean($UserName);
                $PasswordAfterClean = clean($Password);
                $EmailAfterClean = clean($Email);
                $UserRegisterObj = new KhachHang();
                $UserRegisterObj->SetUsrName($UserNameAfterClean);
                $UserRegisterObj->SetPassword($PasswordAfterClean);
                if($UserRegisterObj->Register($EmailAfterClean)) {
                    $SessionUser->SetSession("Login_Status", "Register success");
                    $SessionUser->SetSession("Login_Status_Code", "success");
                    header("Location: ./?Action=Login"); 
                } else {
                    $SessionUser->SetSession("Login_Status", "Register failed");
                    $SessionUser->SetSession("Login_Status_Code", "error");
                    header("Location: ./?Action=Register");
                }
            }
        }
    }

?>

    <?php
        $DiaChi_Id =$_GET['DC_Id'];
        
        include_once './Model/Admin.php';
        use PHPMailer\PHPMailer\PHPMailer;
        require_once 'PhpMailer/PHPMailer-master/src/PHPMailer.php';
        require_once 'PhpMailer/PHPMailer-master/src/SMTP.php';
        require_once 'PhpMailer/PHPMailer-master/src/Exception.php';
        $message = "<html>
                    <body>
                        <h1>Mail From HT-Electronics shop - Thanks for buying</h1>
                        <p>Đơn hàng #". $DiaChi_Id . "của bạn đã được duyệt thành công</p>
                    </body>
                    </html>";
        
        $Mail =new PHPMailer();
        $GuiMail = new Admin();
        $Email = $GuiMail->layThongTinDiaChiGiaoHang($DiaChi_Id)['Email'];
        $Mail->isSMTP();
        $Mail->SMTPAuth = true;
        $Mail->Host = 'smtp.gmail.com';
        $Mail->Username = 'bqhuy.19it4@vku.udn.vn';
        $Mail->Password = '';
        $Mail->SMTPSecure = 'tls';
        $Mail->Port = 25;
        $Mail->isHTML(true);
        $Mail->SetFrom("no-reply@HT-Electronics.org");
        $Mail->Subject = 'Don Hang Cua Ban Da Duoc Xac Nhan';
        $Mail->msgHTML($message);
        $mail->CharSet="utf-8";
        $Mail->addAddress($Email);
        if($Mail->send()) {
            header("Location: ./?Action=XemVaDuyetDon");
            exit();
        } else {
            header("Location: ./?Action=XemVaDuyetDon");
            echo "Faile: " . $Mail->ErrorInfo;
            //exit();
        }
     ?>

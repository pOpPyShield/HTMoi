<?php 
    session_start();    
    include_once './Controller/LoginController.php';
    include_once './Controller/RegisterController.php';
    include_once './Controller/AdminController.php';
    include_once './Controller/BuyProductController.php';
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $actView = isset($_GET['Action']) ? $_GET['Action'] : "Home";
    switch ($actView) {
        case "Home": 
            require_once './View/Home.php';
            break;
        case "Product": 
            require_once './View/product.php';
            break;
        case "Login":
            require_once './View/Login.php';
            break;
        case "Register": 
            require_once './View/Register.php';
            break;
        case "logUserIn": 
            $UserNameInputLogin = $_POST['TenDangNhap'];
            $PasswordInputLogin = $_POST['MatKhau'];
            $SubmitFormLogin  = $_POST['SubmitLogin'];
            $LoginController = new LoginController();
            $LoginController->Login($UserNameInputLogin, $PasswordInputLogin, $SubmitFormLogin);
            break;
        case "regUserIn": 
            $UserNameInputRegister = $_POST['TenDangKy'];
            $EmailInputRegister = $_POST['Email'];
            $PasswordInputRegister = $_POST['MatKhauDangKy'];
            $SubmitFormRegister = $_POST['Register'];
            $RegisterController = new RegisterController();
            $RegisterController->RegisterUser($UserNameInputRegister, $EmailInputRegister, $PasswordInputRegister, $SubmitFormRegister);
            break;
        case "Logout": 
            include_once './Controller/Logout.php';
            break;
        case "Admin": 
            include_once './Admin/Home.php';
            break;
        case "SanPhamAdmin": 
            include_once './Admin/QuanLySanPham/ThemXoaChinhSuaSP.php';
            break;
        case "ChinhSuaSanPham_UI": 
            include_once './Admin/QuanLySanPham/ChinhSuaSanPhamUI.php';
            break;
        case "uploadsanpham": 
            $TenSPCT = $_POST['TenSPCT'];
            $TenHMTDM = $_POST['TenHMTDM'];
            $DonGia = $_POST['DonGia'];
            $SoLuong = $_POST['SoLuong'];
            $ValueSubmit = $_POST['SubmitTTSP'];
            $AdminController = new AdminController();
            $AdminController->UploadTTSP($TenSPCT, $TenHMTDM, $DonGia, $SoLuong, $ValueSubmit);
            break;
        case "uploadhinhanhcuasanpham": 
            $Image = $_FILES['file'];
            $TenSP = $_POST['TenSP'];
            $ValueSubmit = $_POST['SubmitHinhAnh'];    
            $AdminController = new AdminController();
            $AdminController->UploadHinhAnh($TenSP, $ValueSubmit, $Image);
            break;
        case "ActiveSP": 
            $SPCT_Id = $_POST['SPCT_Id'];
            $Value = $_POST['Value'];
            $ValueUpload = $_POST['Update'];
            $AdminController = new AdminController();
            $AdminController->UploadStatusCuaSanPham($SPCT_Id,$Value, $ValueUpload);
            break;
        case "RemoveSP": 
            $SPCT_Id = $_POST['SPCT_Id'];
            $Value = $_POST['RemoveSP'];
            $AdminController = new AdminController();
            $AdminController->xoaSanPham($SPCT_Id, $Value);
            break;
        case "ChinhSuaSanPham": 
            $SPCT_Id = $_POST['SPCT_Id'];
            $TenSPCT = $_POST['TenSPCT'];
            $DonGia = $_POST['DonGia'];
            $SoLuong = $_POST['SoLuong'];
            $ValueSubmit = $_POST['chinhsua'];
            $AdminController = new AdminController();
            $AdminController->updateThongTinSanPham($SPCT_Id, $TenSPCT, $SoLuong, $DonGia,$ValueSubmit);
            break;
        case "ThemXoaChinhSuaTTCT": 
            include_once './Admin/QuanLySanPham/ThemXoaChinhSuaTTCT.php';
            break;
        case "ThemThongTin":
            include_once './Admin/QuanLySanPham/ThemThongTin.php';
            break;
        case "ThemThongTinSanPham": 
            $SPCT_Id = $_POST['SPCT_Id'];
            $Hang = $_POST['Hang'];
            $HeDieuHanh = $_POST['HeDieuhanh'];
            $Chip = $_POST['Chip'];
            $ManHinh = $_POST['ManHinh'];
            $Ram = $_POST['Ram'];
            $ValueSubmit = $_POST['themthongtin'];
            $ThemThongTinSanPham = new AdminController();
            $ThemThongTinSanPham->uploadThongTinSP($SPCT_Id, $Hang, $HeDieuHanh, $Chip, $ManHinh, $Ram, $ValueSubmit);
            break;
        case "ChinhSuaThongTin": 
            $ChinhSuaThongTinSubmit = $_POST['chinhsuaTT'];
            $SPCT_Id = $_POST['SPCT_Id'];
            $Hang = $_POST['Hang'];
            $HeDieuHanh = $_POST['HeDieuHanh'];
            $Chip = $_POST['Chip'];
            $ManHinh = $_POST['ManHinh'];
            $Ram = $_POST['Ram'];
            $ChinhSuaThongTinChiTiet = new AdminController();
            $ChinhSuaThongTinChiTiet->suaThongTinChiTiet($ChinhSuaThongTinSubmit, $Hang, $HeDieuHanh, $Chip, $ManHinh, $Ram, $SPCT_Id);
            break;
        case "ChinhSuaThongTinUI": 
            include_once './Admin/QuanLySanPham/ChinhSuaThongTin.php';
            break;
        case "ThemXoaChinhSuaND":
            include_once './Admin/QuanLySanPham/ThemXoaChinhSuaNoiDung.php'; 
            break;
        case "ThemNoiDung": 
            include_once './Admin/QuanLySanPham/ThemNoiDungUI.php';
            break;
        case "ThemNoiDungSP": 
            $SPCT_Id = $_POST['SPCT_Id'];
            $NoiDung_1 = $_POST['NoiDung_1'];
            $NoiDung_2 = $_POST['NoiDung_2'];
            $NoiDung_3 = $_POST['NoiDung_3'];
            $NoiDung_4 = $_POST['NoiDung_4'];
            $ValueSubmit = $_POST['themnoidung'];
            $AdminController = new AdminController();
            $AdminController->themNoiDungSP($SPCT_Id, $NoiDung_1, $NoiDung_2, $NoiDung_3, $NoiDung_4, $ValueSubmit);
            break;
        case "XoaNoiDung":
            $SPCT_Id = $_POST['SPCT_Id'];
            $ValueSubmit = $_POST['xoanoidung'];
            $AdminController = new AdminController();
            $AdminController->xoaNoiDungSP($SPCT_Id, $ValueSubmit);
            break;
        case "ChinhSuaNoiDung":
            include_once './Admin/QuanLySanPham/SuaNoiDungUI.php';
            break;
        case "SuaNoiDungSP": 
            $SPCT_Id = $_POST['SPCT_Id'];
            $NoiDung_1 = $_POST['NoiDung_1'];
            $NoiDung_2 = $_POST['NoiDung_2'];
            $NoiDung_3 = $_POST['NoiDung_3'];
            $NoiDung_4 = $_POST['NoiDung_4'];
            $ValueSubmit = $_POST['suanoidung'];
            $AdminController = new AdminController();
            $AdminController->suaNoiDungSP($SPCT_Id, $NoiDung_1, $NoiDung_2, $NoiDung_3, $NoiDung_4, $ValueSubmit);
            break;
        case "ThemXoaSuaKhuyenMai":
            include_once './Admin/KhuyenMai/ThemXoaSuaKM.php'; 
            break;
        case "ChinhSuaKhuyenMai_UI": 
            include_once './Admin/KhuyenMai/SuaKhuyenMai.php';
            break;
        case "SuaKhuyenMai":
            $KhuyenMai_Id = $_POST['KhuyenMai_Id'];
            $LoaiKhuyenMai = $_POST['LoaiKhuyenMai'];
            $PhanTramKhuyenMai = $_POST['PhanTramKhuyenMai'];
            $ValueSubmit = $_POST['suakhuyenmai'];
            $AdminController = new AdminController();
            $AdminController->suaChuongTrinhKM($KhuyenMai_Id, $LoaiKhuyenMai, $PhanTramKhuyenMai, $ValueSubmit);
            break;
        case "XoaKhuyenMai": 
            $KhuyenMai_Id = $_POST['KhuyenMai_Id'];
            $ValueSubmit = $_POST['xoakhuyenmai'];
            $AdminController = new AdminController();
            $AdminController->xoaChuongTrinhKM($KhuyenMai_Id, $ValueSubmit);
            break;
        case "ThemKhuyenMai_UI": 
            include_once './Admin/KhuyenMai/ThemKhuyenMai.php';
            break;
        case "ThemKhuyenMai":
            $LoaiKhuyenMai = $_POST['LoaiKhuyenMai'];
            $PhanTramKhuyenMai = $_POST['PhanTramKhuyenMai'];
            $ValueSubmit = $_POST['themkhuyenmai'];
            $AdminController = new AdminController();
            $AdminController->UploadTTKhuyenMai($LoaiKhuyenMai, $PhanTramKhuyenMai, $ValueSubmit);
            break;
        case "ApDungKM":
            include_once './Admin/KhuyenMai/ApDungKhuyenMai.php'; 
            break;
        case "ApDungChuongTrinhKM_UI":
            include_once './Admin/KhuyenMai/ApDungChuongTrinhKM_UI.php';
            break;
        case "ApDungKhuyenMai": 
            $SPCT_Id = $_POST['SPCT_Id'];
            $KhuyenMai_Id = $_POST['KhuyenMai_Id'];
            $NgayBatDau = $_POST['NgayBatDau'];
            $NgayKetThuc = $_POST['NgayKetThuc'];
            $ValueSubmit = $_POST['apdungkhuyenmai'];
            $AdminController = new AdminController();
            $AdminController->SetKhuyenMaiChoSanPham($KhuyenMai_Id,$SPCT_Id, $NgayBatDau, $NgayKetThuc, $ValueSubmit);
            break;
        case "TatApDungCtrinh": 
            $SPCT_Id = $_POST['SPCT_Id'];
            $Status = $_POST['Status'];
            $ValueSubmit = $_POST['TatApDungKM'];
            $AdminController = new AdminController();
            $AdminController->tatCtrinhKM($SPCT_Id, $Status, $ValueSubmit);
            break;
        case "BatCtrinhKM": 
            $Status = $_POST['Status'];
            $SPCT_Id = $_POST['SPCT_Id'];
            $ValueSubmit = $_POST['BatApDungKM'];
            $AdminController = new AdminController();
            $AdminController->batCtrinhKM($SPCT_Id, $Status, $ValueSubmit);
            break;
        case "HienThiSanPham": 
            include_once './Admin/QuanLySanPham/HienThiSP.php';
            break;
        case "Dell": 
            include_once './View/Dell/Laptop-Dell/laptop-dell.php';
            break;
        case "Asus": 
            include_once './View/Asus/Laptop-Asus/laptop-asus.php';
            break;
        case "Lenovo": 
            include_once './View/Lenovo/Laptop-Lenovo/laptop-lenovo.php';
            break;
        case "Macbook": 
            include_once './View/Macbook/Laptop-Macbook/laptop-macbook.php';
            break;
        case "PC-Asus": 
            include_once './View/Asus/PC-Asus/pc-asus.php';
            break;
        case "PC-Dell": 
            include_once './View/Dell/PC-Dell/pc-dell.php';
        case "PC-Lenovo": 
            include_once './View/Lenovo/PC-Lenovo/pc-lenovo.php';
            break;
        case "PC-Macbook": 
            include_once './View/Macbook/PC-Macbook/pc-macbook.php';
            break;
        case "Ram": 
            include_once './View/LinhKien/Ram/ram.php';
            break;
        case "Rom": 
            include_once './View/LinhKien/Rom/rom.php';
            break;
        case "BoMach": 
            include_once './View/LinhKien/BoMach/bomach.php';
            break;
        case "DeToaNhiet": 
            include_once './View/LinhKien/DeToaNhiet/detoanhiet.php';
            break;
        case "ChiTietSanPham": 
            include_once './View/DetailProduct.php';
            break;
        case "GioHang": 
            include_once './View/MyCart.php';
            break;
        case "AddToCart": 
            $Post = $_POST['ThemVaoGio'];
            $id_sp = $_POST['id_sp'];
            $ten_sp = $_POST['ten_sp'];
            $gia_sp = $_POST['gia'];
            $Quantity = $_POST['quantity_SP'];
            $AddTocart = new BuyProductController();
            $AddTocart->themVaoGioHang($Post, $id_sp, $gia_sp, $ten_sp, $Quantity);
            break;
        case "removeProduct":
            $Post = $_POST['Remove_Item'];
            $ten_sp = $_POST['ten_sp'];
            $RemoveCart = new BuyProductController();
            $RemoveCart->xoaGiohang($Post, $ten_sp);
            break;
        case "Purchase_UI":
            $TypePurchase = $_POST['flexRadioDefault'];
            $Submit = $_POST['MakePurchase'];
            $PurchaseProduct = new BuyProductController();
            $PurchaseProduct->muahang($Submit, $TypePurchase);
            break;
        case "CheckOut":
            include_once './View/checkout.php';
            break;
        case "DoCheckOutCard": 
            //Get all information need for handle checkout process
            $KhachHangCheckOutController = new BuyProductController();
            //Thong tin chung
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $PhoneNumber = $_POST['PhoneNumber'];
            $city = $_POST['calc_shipping_provinces'];
            $quan = $_POST['Quan'];
            $Address = $_POST['Address'];
            $UserId = $_POST['UserId'];
            $Submit = $_POST['DoCheckOut'];
            $sameadr = $_POST['sameadr'];
            //Check kieu thanh toan
            $resultSP = $_POST['resultSP'];
            $resultquantity = $_POST['resultquantity'];
            $cdelivery = $_POST['cdelivery'];
            $Thanhtien = $_POST['ThanhTien'];
            
            //Thong tin card
            $cardname = $_POST['cardname'];
            $cardnumber = $_POST['cardnumber'];
            $expmonth = $_POST['expmonth'];
            $expyear = $_POST['expyear'];
            $cvv = $_POST['ccv'];
            $KhachHangCheckOutController->xuLyCheckOutCard($Submit,$UserId, $fullname, $email, $Address, $city, $quan, $PhoneNumber, $cdelivery, $Thanhtien, $sameadr, $resultSP, $resultquantity,$cardname, $cardnumber, $expmonth, $expyear, $cvv);
            break;
        case "DoCheckOutNoCard": 
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $PhoneNumber = $_POST['PhoneNumber'];
            $city = $_POST['calc_shipping_provinces'];
            $quan = $_POST['Quan'];
            $Address = $_POST['Address'];
            $UserId = $_POST['UserId'];
            $Submit = $_POST['DoCheckOut'];
            $sameadr = $_POST['sameadr'];
            //Check kieu thanh toan
            $cdelivery = $_POST['cdelivery'];
            $Thanhtien = $_POST['ThanhTien'];
            $resultSP = $_POST['resultSP'];
            $resultquantity = $_POST['resultquantity'];
        
            $KhachHangMua = new BuyProductController();
            $KhachHangMua->xuLyCheckOutKhongCard($Submit,$UserId, $fullname, $email, $Address, $city, $quan, $PhoneNumber, $cdelivery, $Thanhtien, $sameadr, $resultSP, $resultquantity);
            break;
        case "processcheckoutsuccess": 
            include_once './View/success.php';
            break;
        case "error": 
            include_once './View/error.php';
            break;
        case "XemVaDuyetDon":
            include_once './Admin/QuanLyDonHang/XemVaDuyetDon.php';
            break;
        case "DuyetDon":
            $DiaChi_Id = $_POST['DiaChi_Id'];
            $Value = $_POST['Duyet'];
            $ValueSubmit = $_POST['DuyetDon'];
            
            $DuyetDon = new AdminController();
            $DuyetDon->sendMail($DiaChi_Id, $ValueSubmit, $Value);
            break;
        case "SendMail":
            include_once './Admin/QuanLyDonHang/sendMail.php';
            break;
        case "DeSendMail": 
            include_once './Admin/QuanLyDonHang/DeSendMail.php';
            break;
        case "HuyDon": 
            $DiaChi_Id = $_POST['DiaChi_Id'];
            $Value = $_POST['Huy'];
            $ValueSubmit = $_POST['HuyDon'];
            $KhachHang_Id = $_POST['KhachHang_Id'];
            $HuyDon = new AdminController();
            $HuyDon->sendMail($DiaChi_Id, $ValueSubmit, $Value);
            break;
        //Chua thanh cong
        case "generateReport":
            $ExportExcelSubmit = $_POST['export_excel']; 
            $dateExport = $_POST['dateExport'];
            $GenerateReport = new AdminController();
            $GenerateReport->generateReport($ExportExcelSubmit, $dateExport);
            break;
        case "BinhLuanDetail": 
            $BinhLuanSubmit = $_POST['BinhLuan'];
            $DateComment = $_POST['Datetimee'];
            $IdKhachHang = $_POST['IdKhachHang'];
            $SPCT_Id = $_POST['SPCT_Id'];
            $NoiDungBinhLuan = $_POST['BinhLuanKhachHang'];
            $BinhLuanController = new BuyProductController();
            $BinhLuanController->comment($BinhLuanSubmit, $IdKhachHang, $SPCT_Id, $NoiDungBinhLuan, $DateComment);
            break;
        case "ratingDetail": 
            $RatingSubmit = $_POST['buttonRate'];
            $SPCT_Id = $_POST['SPCT_Id'];
            $KhachHang_Id = $_POST['KhachHang_Id'];
            $rate = $_POST['rate'];
            $RateDatetimee = $_POST['Datetimee'];
            $RateSanPham = new BuyProductController();
            $RateSanPham->rate($RatingSubmit, $KhachHang_Id, $SPCT_Id, $rate, $RateDatetimee);
            break;
        case "XoaComment": 
            $KhachHang_Id = $_POST['KhachHang_Id'];
            $SubmitXoa = $_POST['XoaComment'];
            $SPCT_Id = $_POST['SPCT_Id'];
            $XoaComment = new BuyProductController();
            $XoaComment->xoaComment($SubmitXoa, $KhachHang_Id, $SPCT_Id);
            break;
        case "XemXoaBinhLuan":
            include_once './Admin/BinhLuanDanhGia/XemXoaBinhLuan.php'; 
            break;
        case "XoaBinhLuan": 
            $SPCT_Id = $_POST['SPCT_Id'];
            $IdNguoiDung = $_POST['IdNguoiDung'];
            $xoacommentSubmit = $_POST['xoacomment'];
            $XoaCommentNguoiDung = new AdminController();
            $XoaCommentNguoiDung->xoaCommentDiEm($xoacommentSubmit, $SPCT_Id, $IdNguoiDung);
            break;
        case "XoaDanhGia":
            $SPCT_Id = $_POST['SPCT_Id'];
            $IdNguoiDung = $_POST['IdNguoiDung'];
            $XoaDanhGiaSumit = $_POST['xoaDanhGia'];
            $XoaDanhGiaNguoiDung = new AdminController();
            $XoaDanhGiaNguoiDung->xoaDanhGiaDiEm($XoaDanhGiaSumit, $IdNguoiDung, $SPCT_Id);
            break;
        case "XemXoaDanhGia":
            include_once './Admin/BinhLuanDanhGia/XemDanhGia.php'; 
            break;
        case "TimKiemSanPham":
            include_once './View/ResultFind.php'; 
            break; 
            
        case "SearchMucGia": 
            include_once './View/timKiemTheoTien.php';
            break;
        //case "productPage": 
            //include_once './View/product.php';
            //break;
        case "ChonDanhGia":
            include_once './View/timKiemMucGia.php';
            break;
        default: 
            break;
    }
?>
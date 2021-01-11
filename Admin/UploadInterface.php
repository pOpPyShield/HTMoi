<?php include_once './View/Head.php';?>


    <h1>Upload SPCT</h1>
    <form action="?Action=Admin&Actionsp=uploadthongtinsanpham" method="POST">
        <h2>TenSPCT</h2>
        <input type="text" name="TenSPCT">
        <h2>Ten Hang may tinh danh muc</h2>
        <input type="text" name="TenHMTDM">
        <h2>Don gia</h2>
        <input type="number" name="DonGia">
        <h2>So luong</h2>
        <input type="number" name="SoLuong">
        <button type="submit" name="SubmitTTSP" value="SubmitTTSP">Upload</button>
    </form>





<?php include_once './View/Footer.php'; ?>
<?php include_once './View/EndHead.php';?>
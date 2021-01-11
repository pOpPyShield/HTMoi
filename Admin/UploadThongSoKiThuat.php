<?php include_once './View/Head.php'; ?>


    <form action="?Action=Admin&Actionsp=uploadthongsosp" method="post">
        <h1>Ten San pham: </h1>
        <input type="text" name="TenSanPham">
        <h1>Hang: </h1>
        <input type="text" name="Hang">
        <h1>He Dieu Hanh: </h1>
        <input type="text" name="HeDieuHanh">
        <h1>Chip:</h1>
        <input type="text" name="Chip">
        <h1>Man Hinh: </h1>
        <input type="text" name="ManHinh">
        <h1>Ram:</h1>
        <input type="text" name="Ram">
        <button type="submit" name="SubmitThongSo" value="SubmitThongSoKiThuat">Upload</button>
    </form>


<?php include_once './View/Footer.php'; ?>
<?php include_once './View/EndHead.php'; ?>
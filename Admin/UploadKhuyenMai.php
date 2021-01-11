<?php include_once './View/Head.php';?>

    <form action="?Action=Admin&Actionsp=UploadTTKM" method="post">

        <h1>Loai Khuyen Mai: </h1>
        <input type="text" name="LoaiKhuyenMai">
        <h1>Phan Tram Khuyen Mai:</h1>
        <input type="text" name="PhanTramKhuyenMai">
        <button type="submit" name="ValueSubmit" value="SubmitTTKM">Submit TT khuyen mai.</button>
    </form>

<?php include_once './View/Footer.php'; ?>
<?php include_once './View/EndHead.php';?>
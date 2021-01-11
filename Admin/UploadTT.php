<?php 

    if(isset($_GET['UploadTT'])) {
        $UploadTT = $_GET['UploadTT'];
        switch($UploadTT) {
            case "success": 
                echo "<script>alert('Success');</script>";
                break;
            case "failed": 
                echo "<script>alert('Failed');</script>";
                break;
            default: 
                break;
        }
    }

?>
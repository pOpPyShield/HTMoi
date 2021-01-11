<?php 
    if($_SESSION['Role'] == 1 && $_SESSION['UserName']) {
        include_once 'Head.php';
        include_once 'SlideBar.php';
        include_once 'Contentwrapper.php';
        include_once 'Logout.php';
        include_once 'EndHead.php';
    } else {
        header("Location: ./?Action=error");
        exit();
    }

?>
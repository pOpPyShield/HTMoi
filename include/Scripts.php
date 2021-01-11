<script src="/HT-Electronics/Public/js/sweetalert.min.js"></script>
<?php

if (isset($_SESSION['Login_Status']) && $_SESSION['Login_Status'] != '') {
?>
    <script>
        swal({
            title: "<?php echo $_SESSION['Login_Status']; ?>",
            icon: "<?php echo $_SESSION['Login_Status_Code']; ?>",
            button: "Ok",

        });
    </script>
<?php

    unset($_SESSION['Login_Status']);
    unset($_SESSION['Login_Status_Code']);
}

?>


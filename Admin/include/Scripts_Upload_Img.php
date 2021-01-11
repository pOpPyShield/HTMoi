<script src="/HT-Electronics/Public/js/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['Status_HinhAnh']) && $_SESSION['Status_HinhAnh'] != '') {
?>
    <script>
        swal({
            title: "<?php echo $_SESSION['Status_HinhAnh']; ?>",
            icon: "<?php echo $_SESSION['Status_Code']; ?>",
            button: "Ok",

        });
    </script>
<?php

    unset($_SESSION['Status_HinhAnh']);
    unset($_SESSION['Status_Code']);
}

?>
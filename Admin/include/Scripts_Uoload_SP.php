<script src="/HT-Electronics/Public/js/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['Upload_status']) && $_SESSION['Upload_status'] != '') {
?>
    <script>
        swal({
            title: "<?php echo $_SESSION['Upload_status']; ?>",
            icon: "<?php echo $_SESSION['Upload_Code']; ?>",
            button: "Ok",

        });
    </script>
<?php

    unset($_SESSION['Status_HinhAnh']);
    unset($_SESSION['Status_Code']);
}

?>
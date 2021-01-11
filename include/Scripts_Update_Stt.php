<script src="/HT-Electronics/Public/js/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['Status']) && $_SESSION['Status'] != '') {
?>
    <script>
        swal({
            title: "<?php echo $_SESSION['Status']; ?>",
            icon: "<?php echo $_SESSION['Status_Code']; ?>",
            button: "Ok",

        });
    </script>
<?php

    unset($_SESSION['Status']);
    unset($_SESSION['Status_Code']);
}

?>
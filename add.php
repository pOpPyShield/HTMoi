<?php 
    if(isset($_POST['ThemVaoGio'])) {
        if(!isset($_SESSION['UserName'])) {
            echo "<script>alert('Login first');
                    window.location.href='/HT-Electronics/?Action=Login';
                
                </script>";
        } else {
            if(isset($_SESSION['cart']))
            {
            
                $myitems = array_column($_SESSION['cart'], 'ten_sp');
                if(in_array($_POST['ten_sp'], $myitems)) {
                    echo "<script>alert('The item already have in cart');
                        window.location.href='/HT-Electronics/';
                
                    </script>";
                
                } else {
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('id_sp' => $_POST['id_sp'], 'gia' => $_POST['gia'], 'ten_sp' => $_POST['ten_sp'], 'quantity_SP' => $_POST['quantity_SP']);
                }
            
            } else 
            {
                $_SESSION['cart'][0] = array('id_sp' => $_POST['id_sp'], 'gia' => $_POST['gia'], 'ten_sp' => $_POST['ten_sp'], 'quantity_SP' => $_POST['quantity_SP']);
            }
        }

        
    }
?>
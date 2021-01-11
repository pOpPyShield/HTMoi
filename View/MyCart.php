<?php include_once 'Head.php'?>
<header class="header" id="header"> <!-- Header.php -->
        <div class="header__logo-box">
            <img src="Public/img/new.png" alt="Logo" class="header__logo">
        </div>
        <ul class="header-content u-center-text">
            <li class="header-content__group"><a href="?Action=Home" class="header-content__link header-content__link--home">Trang chủ</a></li>
            <li class="header-content__group"><a href="?Action=productPage" class="header-content__link">Sản phẩm</a></li>
            <?php 
                if(isset($_SESSION['UserName'])) {
            ?>
            
                    <li class="header-content__group header-content__group-login">
                    <!--Style Username-logout-->
                    <?php 
                    include_once './Model/KhachHang.php';
                    $ImgCheckObj = new KhachHang();
                    if($ImgCheckObj->CheckImg($_SESSION['KhachHang_Id']) == true) {
                        echo '<img class="header-content__link--img header-content__group-user" src="Public/ImageUser/profile'. $ImgCheckObj->getUsrID() . $ImgCheckObj->getImgName() . '.' . $ImgCheckObj->getImgType().'">';
                    } else {
                        echo '<img class="header-content__link--img header-content__group-user" src="Public/ImageUser/profile'. $ImgCheckObj->getImgName() .'.'. $ImgCheckObj->getImgType().'">';
                    }
                    ?>
                        <?php echo '<h1 class="header-content__link--username header-content__group-user">'.$_SESSION['UserName'].'</h1>'; ?>
                    </li>
                    <a href="?Action=Logout">Logout</a>
                    <!--Style Username-logout-->
            
            <?php 
                } else {
            ?>
                    <li class="header-content__group"><a href="?Action=Login" class="header-content__link header-content__link--login">Đăng nhập</a></li>
            <?php 
                }
            ?>
            <li class="header-content__group">
                <div class="header-search">
                    <div class="header-search__item">
                        <input type="search" class="header-search__item--input" placeholder="Tìm kiếm ...">
                    </div>
                    <div class="header-search__item">
                        <i class="fas fa-search  header-search__item--icon"></i>
                    </div>
            </li>
        </ul>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center border rounded bg-light my-5">
            <h1>MY CART</h1>
        </div>
    </div>

    <div class="col-lg-9">
            <table class="table">
                <thead class="thead-dark text-center" >
                    <tr>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">quantity</th>
                    <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
                        $total = 0;
                        if(isset($_SESSION['cart'])) {
                            foreach($_SESSION['cart'] as $key => $value)
                            {
                                $total += $value['gia'] * $value['quantity_SP'];
                                $sr = $key+1;
                                echo "
                                <tr>
                                    <td>$sr</td>
                                    <td>$value[ten_sp]</td>
                                    <td>$value[gia]</td>
                                    <td>$value[quantity_SP]</td>
                                    <td>
                                        <form action='?Action=removeProduct' method='post'>
                                            <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                            <input type='hidden' name= 'ten_sp' value='$value[ten_sp]'>
                                        </form>
                                    
                                    </td>
                                </tr>
                                ";
                            
                            }
                        }
                    ?>
                    

                    
                </tbody>
            </table>
    </div>
    
    <div class="col-lg-3">
        <div class="border bg-light rounded p-4">
            <h4>Total: </h4>
            <h5 class="text-right">
            <?php
            
            
                if($total == 0) {
                    echo "";
                } else {
                    echo $total;
                }
            ?></h5>
            <br>
                <?php if($total != 0) { ?>
                        <form action="?Action=Purchase_UI" method="post">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="flexRadioDefault" value="CashOnDelivery" id="flexRadioDefault2" checked>
                                <label for="flexRadioDefault2" class="form-check-label">
                                Cash On Delivery
                                </label>

                                <input type="radio" class="form-check-input" name="flexRadioDefault" value="CashOnCard" id="flexRadioDefault2" checked>
                                <label for="flexRadioDefault2" class="form-check-label">
                                Cash On Card
                                </label>
                            </div>
                            <br>
                            <button class="btn btn-primary btn-block" type="submit" name="MakePurchase" value="purchase">Make purchase</button>
                        </form>
            <?php } else {?>
                    <a href="?Action=Home" style="text-decoration: none;"><button class="btn-warning btn-block">Bạn chưa có sản phẩm nào trong đây, quay lại trang chủ</button></a>
            <?php } ?>
        </div>
        
    </div>
    
</div>
    
<?php include_once 'EndHead.php';?>
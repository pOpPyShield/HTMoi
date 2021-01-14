<header class="header" id="header">
    <!-- Header.php -->
    <div class="header__logo-box">
        <img src="/HTMoi/Public/img/new.png" alt="Logo" class="header__logo">
    </div>
    <ul class="header-content u-center-text">
        <li class="header-content__group"><a href="?Action=Home" class="header-content__link header-content__link--home">Trang chủ</a></li>
        <li class="header-content__group"><a href="?Action=Product" class="header-content__link">Sản phẩm</a></li>
        <?php
        if (isset($_SESSION['UserName']) && $_SESSION['Role'] == 0) {
        ?>

            <li class="header-content__group header-content__group-login">
                <!--Style Username-logout-->
                <?php
                include_once './Model/KhachHang.php';
                $ImgCheckObj = new KhachHang();
                if ($ImgCheckObj->CheckImg($_SESSION['KhachHang_Id']) == true) {
                    echo '<img class="header-content__link--img header-content__group-user" src="/HTMoi/Public/ImageUser/profile' . $ImgCheckObj->getUsrID() . $ImgCheckObj->getImgName() . '.' . $ImgCheckObj->getImgType() . '">';
                } else {
                    echo '<img class="header-content__link--img header-content__group-user" src="/HTMoi/Public/ImageUser/profile' . $ImgCheckObj->getImgName() . '.' . $ImgCheckObj->getImgType() . '">';
                }
                ?>
                <?php echo '<h1 class="header-content__link--username header-content__group-user">' . $_SESSION['UserName'] . '</h1>'; ?>
            </li>
            <?php
            $count = 0;
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
            }
            ?>
            <li class="header-content__group header-content-cart">
                <div class="header-cart">
                    <a href="?Action=GioHang" class="header-content__link"><i class="fas fa-cart-plus header-content__link--cart"></i>giỏ hàng</a>
                    <span class="header-cart__number">+<?php echo $count; ?></span>
                </div>
            </li>

            <a href="?Action=Logout">Logout</a>
            <!--Style Username-logout-->

        <?php
        } else if (isset($_SESSION['UserName']) && $_SESSION['Role'] == 1) {
        ?>
            <li class="header-content__group header-content__group-login">
                <?php
                include_once './Model/KhachHang.php';
                $ImgCheckObj = new KhachHang();
                if ($ImgCheckObj->CheckImg($_SESSION['KhachHang_Id']) == true) {
                    echo '<img class="header-content__link--img header-content__group-user" src="/HTMoi/Public/ImageUser/profile' . $ImgCheckObj->getUsrID() . $ImgCheckObj->getImgName() . '.' . $ImgCheckObj->getImgType() . '">';
                } else {
                    echo '<img class="header-content__link--img header-content__group-user" src="/HTMoi/Public/ImageUser/profile' . $ImgCheckObj->getImgName() . '.' . $ImgCheckObj->getImgType() . '">';
                }
                ?>
                <?php echo '<h1 class="header-content__link--username header-content__group-user">' . $_SESSION['UserName'] . '</h1>'; ?>
            </li>
            <a href="?Action=Admin">Home Admin</a>
            <a href="?Action=Logout">Logout</a>

        <?php
        } else {
        ?>
            <li class="header-content__group"><a href="?Action=Login" class="header-content__link header-content__link--login">Đăng nhập</a></li>
        <?php
        }
        ?>
        <li class="header-content__group">
            <div class="header-search">
            <form action="?Action=TimKiemSanPham" method="post">
                <div class="header-search__item">
                    <input type="text" name="search" class="header-search__item--input" placeholder="Tìm kiếm ...">
                </div>
                <div class="header-search__item">
                    <button type="submit" name="submit-search" ><i class="fas fa-search  header-search__item--icon"></i></button>
                </div>
            </form>
        </li>
    </ul>
</header>
<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("header").style.top = "0";
            document.getElementById("header").style.transition = "all .5s";
        } else {
            document.getElementById("header").style.top = "-90px";
        }
        prevScrollpos = currentScrollPos;
    }
</script>
<?php include_once 'Head.php';?>
    <div class="container">
        <div class="logo">
            <a href="?Action=Home"><img src="/HTMoi/Public/img/new.png" alt="Logo" class="logo__form"></a>
        </div>
        <form class="form" method="POST" action="?Action=logUserIn">
            <h3 class="form__name">Đăng nhập</h3>
            <div class="form-group">
                <input type="text" class="form__input" name="TenDangNhap" required autocomplete="TenDangNhap" id="" placeholder="Tên đăng nhập">
                <label for="name" class="form__label">Tên đăng nhập</label>
            </div>
            <div class="form-group">
                <input type="password" class="form__input" name="MatKhau" required id="" placeholder="Mật khẩu">
                <label for="name" class="form__label">Mật khẩu</label>
            </div>
            <button type="submit" class="form__btn u-margin-bottom-small" name="SubmitLogin" value="LogUserIn">Đăng nhập</button>
            <div class="u-margin-bottom-small">
                <p><i>Bạn chưa có tài khoản?<a href="?Action=Register">Đăng ký</a></i></p>
            </div>
        </form>
    </div>

<?php include_once 'Footer.php';?>
<?php include('include/Scripts.php');?>
<?php include_once 'EndHead.php';?>
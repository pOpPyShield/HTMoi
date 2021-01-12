<?php include_once 'Head.php';?>
<?php if(isset($_GET['status'])=="RegFail"){?>
        <script>alert('Register Fail.');</script>
<?php }?>
    <div class="container">
        <div class="logo">
            <a href="#"><img src="/HTTzz/Public/img/new.png" alt="Logo" class="logo__form"></a>
        </div>
        <form class="form" method="POST" action="?Action=regUserIn">
            <h3 class="form__name">Đăng ký</h3>
            <div class="form-group">
                <input type="text" class="form__input" name="TenDangKy" id="" placeholder="Tên đăng nhập" required>
                <label for="name" class="form__label">Tên đăng nhập</label>
            </div>
            <div class="form-group">
                <input type="email" class="form__input" name="Email" id="" placeholder="Email" required>
                <label for="name" class="form__label">Email</label>
            </div>
            <div class="form-group">
                <input type="password" class="form__input" name="MatKhauDangKy" id="" placeholder="Mật khẩu" required>
                <label for="name" class="form__label">Mật khẩu</label>
            </div>
            <div class="form-group">
                <input type="password" class="form__input" name=""id="" placeholder="Nhập lại mật khẩu" required>
                <label for="name" class="form__label">Nhập lại mật khẩu</label>
            </div>
            <button type="submit" class="form__btn u-margin-bottom-small" name="Register" Value="RegUser">Đăng ký</button>
            <div class="u-margin-bottom-small">
                <p><i>Bạn đã có sẵn tài khoản? <a href="?Action=Login">Đăng nhập</a></i></p>
            </div>
        </form>
    </div>

<?php include_once 'Footer.php';?>
<?php include_once 'EndHead.php';?>
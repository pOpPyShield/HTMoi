<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Public/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="checkout">
        <?php
        $total = 0;
        $PhiVanChuyen = 200000;

        $Associate = array();
        if (isset($_SESSION['cart'])) {

            foreach ($_SESSION['cart'] as $key => $value) {
                $total += $value['gia'] * $value['quantity_SP'] + $value['quantity_SP'] * $PhiVanChuyen;

        ?>
        <?php
            }



            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                $Associate[$i]['id_sp'] = $_SESSION['cart'][$i]['id_sp'];
                $Associate[$i]['quantity'] = $_SESSION['cart'][$i]['quantity_SP'];
            }
        }


        ?>
        <h2 class="checkout__title">Thông tin giao hàng</h2>
        <div class="row">

            <div class="col-6">
                <h3 class="checkout__name">Thông tin nhận hàng:</h3>
                <?php if ($_SESSION['Delivery_type'] == "CashOnCard") { ?>
                    <form action="?Action=DoCheckOutCard" method="POST">
                        <label for="fname" class="checkout__label"><i class="fa fa-user"></i>Họ và tên:</label>
                        <input type="text" id="fname" class="checkout__input" name="fullname" placeholder="Nhập họ và tên" required>

                        <label for="email" class="checkout__label"><i class="fa fa-envelope"></i>Email:</label>
                        <input type="text" id="email" class="checkout__input" name="email" placeholder="HuyBui@gmail.com">
                        <label for="PhoneNumber" class="checkout__label">Số điện thoại:</label>
                        <input type="number" minlength="8" class="checkout__input" name="PhoneNumber" required>

                        <select name="calc_shipping_provinces" required="">
                            <option value="">Tỉnh / Thành phố</option>
                        </select>

                        <select name="calc_shipping_district" required="">
                            <option value="" class="checkout__label">Quận / Huyện</option>
                        </select>
                        <label for="Address" class="checkout__label"><i class="fa fa-address-caed-o"></i>Địa chỉ giao hàng:</label>
                        <input type="text" class="checkout__input" id="Address" name="Address" placeholder="452 Nguyen Tri Phuong" required>

                        <input type="hidden" class="checkout__input" name="UserId" value="<?php echo $_SESSION['KhachHang_Id'] ?>">
                        <h3>Thanh toán</h3>
                        <label for="fname" class="checkout__label">Chấp nhận thanh toán</label>
                        <input type="hidden" id="cdelivery" class="checkout__input" name="cdelivery" value="<?php echo $_SESSION['Delivery_type']; ?>">
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color: navy;"></i>
                            <i class="fa fa-cc-amex" style="color: blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color: red;"></i>
                            <i class="fa fa-cc-discover" style="color: orange;"></i>
                        </div>

                        <label for="cname" class="checkout__label">Tên trên thẻ</label>
                        <input type="text" id="cname" class="checkout__input" name="cardname" placeholder="BUI QUOC HUY" required>

                        <label for="ccnum" class="checkout__label">Số thẻ:</label>
                        <input type="text" id="ccnum" class="checkout__input" name="cardnumber" placeholder="XXXX-XXXX-XXXX-XXXX" required>

                        <label for="expmonth" class="checkout__label">Tháng hết hạn:</label>
                        <input type="text" id="expmonth" class="checkout__input" name="expmonth" placeholder="September" required>


                        <label for="expyear" class="checkout__label">Năm hết hạn:</label>
                        <input type="text" id="expyear" class="checkout__input" name="expyear" placeholder="352" required>

                        <label for="cvv" class="checkout__label">CVV</label>
                        <input type="text" id="cvv" name="cvv" class="checkout__input" placeholder="532" required>

                        <label class="checkout__label"><input type="checkbox" checked="checked" name="sameadr">Shipping address same as billing</label>
                        <input type="hidden" name="ThanhTien" class="checkout__input" value="<?php echo $total; ?>">
                        <button type="submit" value="Buy" class="btn" name="DoCheckOut">Mua hàng</button>
                    </form>
                <?php } else { ?>
                    <form action="?Action=DoCheckOutNoCard" method="POST">
                        <?php
                        foreach ($Associate as $keys) {
                            echo '<input type="hidden" name="resultSP[]" value="' . $keys['id_sp'] . '">';
                            echo '<input type="hidden" name="resultquantity[]" value="' . $keys['quantity'] . '">';
                        }
                        ?>
                        <div class="row">
                            <div class="col-6">
                                <label for="fname" class="checkout__label"><i class="fa fa-user"></i>Tên đầy đủ:</label>
                                <input type="text" id="fname" name="fullname" class="checkout__input" placeholder="Nhập họ và tên" required>

                                <label for="email" class="checkout__label"><i class="fa fa-envelope"></i>Email:</label>
                                <input type="text" id="email" name="email" class="checkout__input" placeholder="HuyBui@gmail.com" required>
                                <label for="PhoneNumber" class="checkout__label"><i class="fa fa-phone"></i>Số điện thoại:</label>
                                <input type="text" minlength="8" class="checkout__input" placeholder="0935370297" name="PhoneNumber" required>
                                <label for="cdelivery" class="checkout__label">Bạn chọn thẻ khi giao hàng</label>
                                <input type="text" class="checkout__input" id=" cdelivery" name="cdelivery" value="<?php echo $_SESSION['Delivery_type']; ?>" readonly>
                                <input type="checkbox" checked="checked" name="sameadr"> <label class="checkout__label">Địa chỉ giao hàng như thanh toán</label>
                                <input type="hidden" class="checkout__input" name="ThanhTien" value="<?php echo $total; ?>">
                            </div>
                            <div class="col-6">
                                <label for="Quan" class="checkout__label">Tỉnh/ Thành phố:</label>
                                <select name="calc_shipping_provinces" class="checkout__input" required="">
                                    <option value="">Tỉnh / Thành phố</option>
                                </select>

                                <label for="Quan" class="checkout__label">Quận:</label>
                                <input type="text" class="checkout__input" placeholder="Quận" name="Quan" required>

                                <label for="Address" class="checkout__label"><i class="fa fa-address-caed-o"></i>Địa chỉ giao hàng:</label>
                                <input type="text" class="checkout__input" id="Address" name="Address" placeholder="452 Nguyễn Tri Phương" required>
                                <input type="hidden" class="checkout__input" name="UserId" value="<?php echo $_SESSION['KhachHang_Id'] ?>">


                            </div>
                        </div>
                    </form>
            </div>
        <?php } ?>
        <div class="col-6">
            <div class="checkout__cart">
                <?php
                $count = 0;
                if (isset($_SESSION['cart'])) {
                    $count = count($_SESSION['cart']);
                }
                ?>
                <h2 class="checkout__name">Giỏ hàng</h2>
                <?php
                $total = 0;
                $PhiVanChuyen = 200000;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $total += $value['gia'] * $value['quantity_SP'] + $value['quantity_SP'] * $PhiVanChuyen;
                        echo "<p class='checkout__cart--product'>$value[ten_sp]" . ': ' . number_format($value['gia'] * $value['quantity_SP']) . "</span> x <span class='quantity'>$value[quantity_SP]</span></p>";
                        echo "<span class='checkout__cart--product'>Phí vận chuyển: " . $value['quantity_SP'] . " x " . number_format($PhiVanChuyen) . "đ" . " = " . number_format($PhiVanChuyen * $value['quantity_SP']) . "</span>" . "đ";
                ?>
                <?php
                    }
                }
                ?>
                <hr>
                <p class="checkout__cart--product">Tổng tiền: <span class="checkout__cart--product"><b><?php echo number_format($total); ?>đ</b></span></p>
                <button type="submit" value="Buy" class="checkout__btn" name="DoCheckOut">Mua hàng</button>
            </div>
        </div>

        </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
    <script>
        if (address_2 = localStorage.getItem('address_2_saved')) {
            $('select[name="calc_shipping_district"] option').each(function() {
                if ($(this).text() == address_2) {
                    $(this).attr('selected', '')
                }
            })
            $('input.billing_address_2').attr('value', address_2)
        }
        if (district = localStorage.getItem('district')) {
            $('select[name="calc_shipping_district"]').html(district)
            $('select[name="calc_shipping_district"]').on('change', function() {
                var target = $(this).children('option:selected')
                target.attr('selected', '')
                $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
                address_2 = target.text()
                $('input.billing_address_2').attr('value', address_2)
                district = $('select[name="calc_shipping_district"]').html()
                localStorage.setItem('district', district)
                localStorage.setItem('address_2_saved', address_2)
            })
        }
        $('select[name="calc_shipping_provinces"]').each(function() {
            var $this = $(this),
                stc = ''
            c.forEach(function(i, e) {
                e += +1
                stc += '<option value=' + e + '>' + i + '</option>'
                $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
                if (address_1 = localStorage.getItem('address_1_saved')) {
                    $('select[name="calc_shipping_provinces"] option').each(function() {
                        if ($(this).text() == address_1) {
                            $(this).attr('selected', '')
                        }
                    })
                    $('input.billing_address_1').attr('value', address_1)
                }
                $this.on('change', function(i) {
                    i = $this.children('option:selected').index() - 1
                    var str = '',
                        r = $this.val()
                    if (r != '') {
                        arr[i].forEach(function(el) {
                            str += '<option value="' + el + '">' + el + '</option>'
                            $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
                        })
                        var address_1 = $this.children('option:selected').text()
                        var district = $('select[name="calc_shipping_district"]').html()
                        localStorage.setItem('address_1_saved', address_1)
                        localStorage.setItem('district', district)
                        $('select[name="calc_shipping_district"]').on('change', function() {
                            var target = $(this).children('option:selected')
                            target.attr('selected', '')
                            $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
                            var address_2 = target.text()
                            $('input.billing_address_2').attr('value', address_2)
                            district = $('select[name="calc_shipping_district"]').html()
                            localStorage.setItem('district', district)
                            localStorage.setItem('address_2_saved', address_2)
                        })
                    } else {
                        $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
                        district = $('select[name="calc_shipping_district"]').html()
                        localStorage.setItem('district', district)
                        localStorage.removeItem('address_1_saved', address_1)
                    }
                })
            })
        });
    </script>
</body>

</html>
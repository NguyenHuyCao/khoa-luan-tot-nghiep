<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
require_once('utils/utility.php');
require_once('api/checkout-form.php');

$user = null;
if (isset($_SESSION['id_user'])){
    $id_user = $_SESSION['id_user'];

    $sql = "SELECT * FROM user WHERE id_user = $id_user";
    $user = executeSingleResult($sql);
} // lưu thông tin người dùng vào biến $user để thực hiện tự động điền form sau này


// lấy dữ liệu giỏ hàng và lưu dưới dạng json
$cart = [];
if (isset($_COOKIE['cart'])) {
    $json = $_COOKIE['cart'];
    $cart = json_decode($json, true); // sau đó lưu vào mảng $cart
}

// duyệt qua mảng cart
$idList = [];
foreach ($cart as $item) {
    $idList[] = $item['id'];
} 
if (count($idList) > 0) { // nếu có sản phẩm
    $idList = implode(',', $idList); // sử dụng hàm implode để chuyển mảng thành chuỗi
    // [2,5,6] => 2,5,6

    $sql = "select * from product where id in ($idList)"; // truy vấn lấy chi tiết sản phẩm từ bảng product
    $cartList = executeResult($sql); // lưu kqua vào $cartlist
} else {
    $cartList = [];
}
?>
<?php 
include("Layout/header.php");
?>
<!-- pages-title-start -->
<section class="contact-img-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="con-text">
          <h2 class="page-title">THANH TOÁN</h2>
          <p><a href="#">Trang chủ</a> | Cửa hàng</p>
        </div>
      </div>
    </div>
  </div>
</section>
<form action="" method="POST">
<div class="checkout-area">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-12">
        <div class="text">
          <!-- Nav tabs -->
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
              <div class="row">
                <form action="#">
                  <div class="checkbox-form">
                    <div class="col-md-12">
                        <h3 class="checkbox9">THÔNG TIN LIÊN HỆ</h3>
                    </div>
                    <div class="col-md-12">
                      <div class="di-na bs">
                        <label class="l-contact">
                        Họ và tên
                        <em>*</em>
                        </label>
                        <input class="form-control" type="text" required="" id="usr" name="fullname"
                            value="<?= $user ? htmlspecialchars($user['full_name']) : ''?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="di-na bs">
                        <label class="l-contact">
                        Địa chỉ Email 
                        <em>*</em>
                        </label>
                        <input class="form-control" type="email" required="" id="email" name="email"
                            value="<?= $user ? htmlspecialchars($user['email']) : '' ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="di-na bs">
                        <label class="l-contact">
                        Số điện thoại 
                        <em>*</em>
                        </label>
                        <input class="form-control" type="tel" required="" id="phone_number" name="phone_number"
                            value="<?= $user ? htmlspecialchars($user['phone_number']) : '' ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label class="l-contact">
                        Địa chỉ  
                        <em>*</em>
                      </label>
                      <div class="di-na bs">
                        <input class="form-control" type="text" required="" id="address" name="address"  placeholder="Địa chỉ của bạn"
                            value="<?= $user ? htmlspecialchars($user['address']) : '' ?>" placeholder="Địa chỉ của bạn">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <label class="l-contact">
                        Ghi chú đơn hàng  
                      </label>
                      <div class="di-na bs">
                        <input class="form-control" type="text" id="note" name="note"  placeholder="Để lại lời nhắn...">
                      </div>
                    </div>

                    <div class="col-md-12 text-center">
                      <p class="checkout-coupon">
                        <a href="dashboard.php"><input type="submit" value="TIẾP TỤC"></a>
                      </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
  </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="ro-checkout-summary">
                                            <div class="ro-title">
                                                <h3 class="checkbox9">TÓM TẮT ĐƠN HÀNG</h3>
                                            </div>
                                <?php
                                         $total = 0;
                                         foreach ($cartList as $item) {
                                             $num = 0;
                                             foreach ($cart as $value) {
                                                 if ($value['id'] == $item['id']) {
                                                     $num = $value['num'];
                                                     break;
                                                 }
                                             }
                                             $total += $num * $item['price'];
                                             echo '
                                            
                                            <div class="ro-body">
                                                <div class="ro-item">
                                                    <div class="ro-image">
                                                        <a href="#">
                                                            <img src="admin/product/' . $item['thumbnail'] . '" alt="">
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <div class="tb-beg">
                                                            <a href="#">' . $item['title'] . '</a>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="ro-price">
                                                            <span class="amount">' . $item['price'] . '</span>
                                                        </div>
                                                        <div class="ro-quantity">
                                                            <strong class="product-quantity"> x ' . $num . '</strong>
                                                        </div>
                                                        <div class="product-total">
                                                            <span class="amount">' . number_format($num * $item['price'], 0, ',', '.') . '<span> VNĐ</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                     
                                     ';
                                         }
                                ?>
                                            <div class="ro-footer">
                                                <div>
                                                    <p>
                                                        Tổng tạm tính
                                                        <span>
                                                            <span class="amount"><?= number_format($total, 0, ',', '.') ?>
                                                        </span>
                                                    </p>
                                                    <div class="ro-divide"></div>
                                                </div>
                                                <div class="shipping">
                                                    <p> Vận chuyển </p>
                                                    <div class="ro-shipping-method">
                                                        <p>
                                                            Giao hàng miễn phí (Free)
                                                        </p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="ro-divide"></div>
                                                </div>
                                                <div class="order-total">
                                                    <p>
                                                        Tổng cộng
                                                        <span>
                                                            <strong>
                                                                <span class="amount"><?= number_format($total, 0, ',', '.') ?> </span>
                                                            </strong>
                                                        </span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <p>
                                                        Tổng Đơn Hàng
                                                        <span>
                                                            <strong>
                                                                <span class="amount"><?= number_format($total, 0, ',', '.') ?><span> VNĐ</span></span>
                                                            </strong>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>
</div>
</form>

<hr class="opacity-20">
<?php require_once('Layout/footer.php'); ?>
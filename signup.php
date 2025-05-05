<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
include("Layout/header.php");
include('config.php');

$errors = []; // Mảng lưu trữ lỗi validate

if (isset($_POST['dangky'])) {
    $fullname   = trim($_POST['hovaten']);
    $tendangnhap = trim($_POST['tendangnhap']);
    $email      = trim($_POST['email']);
    $diachi     = trim($_POST['diachi']);
    $matkhau    = trim($_POST['matkhau']);
    $dienthoai  = trim($_POST['dienthoai']);

    // Kiểm tra các trường có trống hay không
    if (empty($fullname)) {
        $errors['hovaten'] = "Họ và tên không được để trống.";
    } else {
        if (strlen($fullname) > 200) {
            $errors['hovaten'] = "Họ và tên không được quá 200 ký tự.";
        }
    }

    if (empty($tendangnhap)) {
        $errors['tendangnhap'] = "Tên đăng nhập không được để trống.";
    } 
    
    if (empty($email)) {
        $errors['email'] = "Email không được để trống.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email không đúng định dạng.";
        } elseif (strlen($email) > 100) {
          $errors['email'] = "Email không hợp lệ!";
        }
    }

    if (empty($dienthoai)) {
        $errors['dienthoai'] = "Số điện thoại không được để trống.";
    } else {
        if (!preg_match('/^0[0-9]{9,10}$/', $dienthoai)) {
            $errors['dienthoai'] = "Số điện thoại phải bắt đầu bằng 0 và có 10 hoặc 11 số.";
        }
    }

    if (empty($matkhau)) {
        $errors['matkhau'] = "Mật khẩu không được để trống.";
    }

    if (empty($diachi)) {
        $errors['diachi'] = "Địa chỉ không được để trống.";
    } elseif (strlen($diachi) < 20) {
      $errors['diachi'] = "Địa chỉ quá ngắn, vui lòng nhập đầy đủ thông tin!";
    } elseif (strlen($diachi) > 200) {
      $errors['diachi'] = "Địa chỉ quá dài, vui lòng kiểm tra lại!";
    }


    // Nếu không có lỗi, tiến hành kiểm tra và lưu dữ liệu
    if (empty($errors)) {
      // Kiểm tra tên đăng nhập trùng lặp
      $sql_check_username = "SELECT * FROM user WHERE username = '$tendangnhap'";
      $result_check_username = mysqli_query($mysqli, $sql_check_username);
      if (mysqli_num_rows($result_check_username) > 0) {
          $errors['tendangnhap'] = "Tên đăng nhập đã tồn tại.";
      }

      // Kiểm tra email trùng lặp
      $sql_check_email = "SELECT * FROM user WHERE email = '$email'";
      $result_check_email = mysqli_query($mysqli, $sql_check_email);
      if (mysqli_num_rows($result_check_email) > 0) {
          $errors['email'] = "Email đã tồn tại.";
      }

      // Nếu không có lỗi trùng lặp, tiến hành đăng ký
      if (empty($errors)) {
          $sql_dangky = "INSERT INTO user(full_name, username, email, address, password, phone_number) 
                        VALUES('$fullname', '$tendangnhap', '$email', '$diachi', '$matkhau', '$dienthoai')";
          if (mysqli_query($mysqli, $sql_dangky)) {
              // echo '<script>alert("Đăng ký thành công."); window.location.href="login.php";</script>';
              echo '<script>
              Swal.fire({
                 title: "Đăng ký thành công!",
                 icon: "success",
                 confirmButtonText: "Tới trang đăng nhập!"
              }).then((result) => {
                 window.location = "login.php";
              });
              </script>';
          } else {
              $errors['general'] = "Đăng ký thất bại. Vui lòng thử lại.";
          }
      }
    }
}
?>

<!-- CSS để định dạng thông báo lỗi -->
<style>
    .error-message {
        color: red;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 12px;
        margin-top: 5px;
    }
</style>

<section class="contact-img-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="con-text">
          <h2 class="page-title">ĐĂNG KÝ</h2>
          <p><a href="#">Trang chủ</a> | Đăng ký</p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="login-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="tb-login-form ">
          <h5 class="tb-title">Đăng ký</h5>
          <p>Đăng ký tài khoản để có thể mua sắm tại Luxury Home</p>

          <!-- thông báo lỗi -->
          <?php if (isset($errors['general'])): ?>
            <p class="error-message"><?= $errors['general'] ?></p>
          <?php endif; ?>

          <form action="#" method="POST">
            <p class="checkout-coupon top log a-an">
              <label class="l-contact">Họ và tên <em>*</em></label>
              <!-- value được điền sẵn từ biến $fullname nếu nó tồn tại (giữ lại dữ liệu nếu người dùng nhập sai định dạng) -->
              <input type="text" name="hovaten" value="<?= isset($fullname) ? $fullname : '' ?>">
              
              <?php if (isset($errors['hovaten'])): ?>
                <span class="error-message"><?= $errors['hovaten'] ?></span>
              <?php endif; ?>
            </p>
            <p class="checkout-coupon top-down log a-an">
              <label class="l-contact">Tên đăng nhập <em>*</em></label>
              <input type="text" name="tendangnhap" value="<?= isset($tendangnhap) ? $tendangnhap : '' ?>">
              <?php if (isset($errors['tendangnhap'])): ?>
                <span class="error-message"><?= $errors['tendangnhap'] ?></span>
              <?php endif; ?>
            </p>
            <p class="checkout-coupon top-down log a-an">
              <label class="l-contact">Email <em>*</em></label>
              <input type="email" name="email" value="<?= isset($email) ? $email : '' ?>">
              <?php if (isset($errors['email'])): ?>
                <span class="error-message"><?= $errors['email'] ?></span>
              <?php endif; ?>
            </p>
            <p class="checkout-coupon top-down log a-an">
              <label class="l-contact">Số điện thoại <em>*</em></label>
              <input type="text" name="dienthoai" value="<?= isset($dienthoai) ? $dienthoai : '' ?>">
              <?php if (isset($errors['dienthoai'])): ?>
                <span class="error-message"><?= $errors['dienthoai'] ?></span>
              <?php endif; ?>
            </p>
            <p class="checkout-coupon top-down log a-an">
              <label class="l-contact">Mật khẩu <em>*</em></label>
              <input type="password" name="matkhau">
              <?php if (isset($errors['matkhau'])): ?>
                <span class="error-message"><?= $errors['matkhau'] ?></span>
              <?php endif; ?>
            </p>
            <p class="checkout-coupon top-down log a-an">
              <label class="l-contact">Địa chỉ <em>*</em></label>
              <input type="text" name="diachi" value="<?= isset($diachi) ? $diachi : '' ?>">
              <?php if (isset($errors['diachi'])): ?>
                <span class="error-message"><?= $errors['diachi'] ?></span>
              <?php endif; ?>
            </p>
            <p class="login-submit5">
              <input class="button-primary" type="submit" name="dangky" value="Đăng ký">
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<hr class="opacity-20">
<?php require_once('Layout/footer.php'); ?>
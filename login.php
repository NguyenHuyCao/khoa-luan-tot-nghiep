<?php
  require_once('config.php');
	require_once('database/config.php');
  require_once('database/dbhelper.php');
  $errors = []; // mảng lưu trữ lỗi validate

	if(isset($_POST['submit'])){
    $username = trim(strip_tags($_POST['username']));
    $password = trim(strip_tags($_POST['password']));

    if (empty($username)) {
      $errors['username'] = "Tên đăng nhập không được để trống.";
    } else {
        if (!preg_match('/^[a-zA-Z0-9._]+$/', $username)) {
            $errors['username'] = "Tên đăng nhập không được chứa ký tự đặc biệt.";
        }
    }
    // Validate mật khẩu
    if (empty($password)) {
      $errors['password'] = "Mật khẩu không được để trống.";
    }

    // nếu không có lỗi validate thì mới kiểm tra đăng nhập
    if (empty($errors))
    {   
        $sql = "SELECT * FROM user WHERE username='".$username."' AND password='".$password."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql); // thực thi câu lệnh truy vấn
        $count = mysqli_num_rows($row); // đếm dòng
        if($count > 0){
          $user = mysqli_fetch_assoc($row);
          if ($user['role'] == 'admin'){
            echo '<script>
            window.location.href="index.php";
            </script>';
            session_start();
            setcookie("username", $username, time() + 30 * 24 * 60 * 60, '/');
            setcookie("password", $password, time() + 30 * 24 * 60 * 60, '/');
          }
          else {
            echo '<script>
              window.location.href="index.php";
              </script>';
              session_start();
              setcookie("username", $username, time() + 30 * 24 * 60 * 60, '/');
              setcookie("password", $password, time() + 30 * 24 * 60 * 60, '/');
          }
        }
        else{
          $errors['general'] = "Tên đăng nhập hoặc mật khẩu không hợp lệ.";
        }}
  }
?>
<?php 
 include("Layout/header.php");
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
<!-- pages-title-start -->
<section class="contact-img-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="con-text">
          <h2 class="page-title">Đăng nhập</h2>
          <p><a href="#">Trang chủ</a> | Đăng nhập</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- login content section start -->
<div class="login-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="tb-login-form ">
          <h5 class="tb-title">Đăng nhập</h5>
          <p>Đăng nhập tài khoản để trải nghiệm mua sắm tại Luxury Home</p>

          <!-- thông báo lỗi -->
          <?php if (isset($errors['general'])): ?>
            <p class="error-message"><?= $errors['general'] ?></p>
          <?php endif; ?>

          <form action="#" method="POST">
            <p class="checkout-coupon top log a-an">
              <label class="l-contact">
                Tên đăng nhập
                <em>*</em>
              </label>
              <!-- value được điền sẵn từ biến $username nếu nó tồn tại (giữ lại dữ liệu nếu người dùng nhập sai định dạng) -->
              <input type="text" name="username" value="<?= isset($username) ? $username : '' ?>">
              <?php if (isset($errors['username'])): ?>
                <span class="error-message"><?= $errors['username'] ?></span>
              <?php endif; ?>
            </p>
            <p class="checkout-coupon top-down log a-an">
              <label class="l-contact">
                Mật khẩu
                <em>*</em>
              </label>
              <input type="password" name="password">
              <?php if (isset($errors['password'])): ?>
                <span class="error-message"><?= $errors['password'] ?></span>
              <?php endif; ?>
            </p>
            <p class="login-submit5">
              <input class="button-primary" type="submit" name="submit" value="Đăng nhập">
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<hr class="opacity-20">
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
<?php require_once('Layout/footer.php'); ?>
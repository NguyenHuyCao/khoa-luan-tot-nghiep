
<?php
    
	require_once('config.php');
    require_once('database/dbhelper.php');
	if(isset($_POST['submit']) && $_POST["password"] != '' && $_POST["newpassword"] != '' && $_POST["renewpassword"] != ''){
		$password = $_POST['password'];
		$newpassword = $_POST['newpassword'];
        $renewpassword = $_POST['renewpassword'];
        $sql = "SELECT * FROM user WHERE password= '$password'";
        execute($sql);
        if (isset($_COOKIE['password'])) {
          if($password == $_COOKIE['password']) {
              if ($newpassword != $renewpassword) {
                  echo '<script language="javascript">
                  alert("Mật khẩu không khớp, vui lòng nhập lại!!! ");
                  window.location = "changePass.php";
                  </script>';
                  die();
              } else {
                  if (isset($_COOKIE['username'])) {
                      $username = $_COOKIE['username'];
                      $sql = "UPDATE user set password = '$newpassword' WHERE username = '$username'";
                      execute($sql);
                      
                      echo '<script language ="javascript">
                      alert("Đổi mật khẩu thành công !");
                      window.location = "index.php";
                      </script>';

                      session_start();
                      if (isset($_COOKIE['username']) && ($_COOKIE['username'])) {
                          setcookie("username", "", time() - 30 * 24 * 60 * 60, '/');
                          setcookie("password", "", time() - 30 * 24 * 60 * 60, '/');

                          setcookie("username", $username, time() + 30 * 24 * 60 * 60, '/');
                          setcookie("password", $newpassword, time() + 30 * 24 * 60 * 60, '/');

                          
                      }
                  }
              }
          } else {
            echo '<script language="javascript">
                    alert("Mật khẩu bạn nhập không chính xác !!!");
                    window.location = "changePass.php";
                </script>';
          }
        }
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
          <h2 class="page-title">ĐỔI MẬT KHẨU</h2>
          <p><a href="#">Trang chủ</a> | Đổi mật khẩu</p>
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
          <h5 class="tb-title">Đổi mật khẩu</h5>
          <p>Đổi mật khẩu tài khoản</p>
          <form action="#" method="POST">
            <p class="checkout-coupon top log a-an">
              <label class="l-contact">
                Mật khẩu hiện tại
                <em>*</em>
              </label>
              <input type="password" name="password" required>
            </p>
            <p class="checkout-coupon top-down log a-an">
              <label class="l-contact">
                Mật khẩu mới
                <em>*</em>
              </label>
              <input type="password" name="newpassword" required>
            </p>
            <p class="checkout-coupon top-down log a-an">
              <label class="l-contact">
                Nhập lại mật khẩu mới
                <em>*</em>
              </label>
              <input type="password" name="renewpassword" required>
            </p>
            
            <!-- <div class="forgot-password1">
              <a class="forgot-password" href="#">Quên mật khẩu?</a>
            </div> -->
            <p class="login-submit5">
              <input class="button-primary" type="submit" name="submit" value="Đổi mật khẩu">
            </p>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- login  content section end -->
<hr class="opacity-20">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?php require_once('Layout/footer.php'); ?>
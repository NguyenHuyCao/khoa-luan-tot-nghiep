<?php
session_start();
include('config/config.php');
include('config/dbhelper.php');

$errors = []; // Mảng lưu trữ lỗi validate

if (isset($_POST['submit'])) {
    $tendangnhap_admin = trim(strip_tags($_POST['tendangnhap_admin']));
    $matkhau_admin = trim(strip_tags($_POST['matkhau_admin']));

    // Validate tên đăng nhập
    if (empty($tendangnhap_admin)) {
        $errors['tendangnhap_admin'] = "Tên đăng nhập không được để trống.";
    } else {
        if (!preg_match('/^[a-zA-Z0-9._]+$/', $tendangnhap_admin)) {
            $errors['tendangnhap_admin'] = "Tên đăng nhập không được chứa ký tự đặc biệt.";
        }
    }

    // Validate mật khẩu
    if (empty($matkhau_admin)) {
        $errors['matkhau_admin'] = "Mật khẩu không được để trống.";
    }

    // Nếu không có lỗi validate, kiểm tra đăng nhập
    if (empty($errors)) {
        $sql = "SELECT * FROM user WHERE username='" . $tendangnhap_admin . "' AND password='" . $matkhau_admin . "' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if ($count > 0) {
            $user = mysqli_fetch_assoc($row);
            if ($user['role'] == 'admin') {
                // Lưu thông tin vào cookie và chuyển hướng
                setcookie("tendangnhap_admin", $tendangnhap_admin, time() + 30 * 24 * 60 * 60, '/');
                setcookie("matkhau_admin", $matkhau_admin, time() + 30 * 24 * 60 * 60, '/');
                echo '<script>window.location.href="index.php";</script>';
                exit();
            } else {
                $errors['general'] = "Bạn không có quyền admin.";
            }
        } else {
            $errors['general'] = "Tên đăng nhập hoặc mật khẩu không hợp lệ.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo1.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
</head>
<body>
    <div class="animated bounceInDown">
        <div class="container">
            <span class="error animated tada" id="msg"></span>
            <form action="login.php" name="form1" class="box" method="POST">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    Đăng nhập Admin
                </div>
                <!-- Thông báo lỗi chung -->
                <?php if (isset($errors['general'])): ?>
                    <p class="error-message"><?= $errors['general'] ?></p>
                <?php endif; ?>
                <!-- Trường tên đăng nhập -->
                <div>
                    <input type="text" name="tendangnhap_admin" placeholder="Tên đăng nhập" autocomplete="off" value="<?= isset($tendangnhap_admin) ? $tendangnhap_admin : '' ?>">
                    <?php if (isset($errors['tendangnhap_admin'])): ?>
                        <span class="error-message"><?= $errors['tendangnhap_admin'] ?></span>
                    <?php endif; ?>
                </div>
                <!-- Trường mật khẩu -->
                <div>
                    <input type="password" name="matkhau_admin" placeholder="Mật khẩu" id="pwd" autocomplete="off">
                    <?php if (isset($errors['matkhau_admin'])): ?>
                        <span class="error-message"><?= $errors['matkhau_admin'] ?></span>
                    <?php endif; ?>
                </div>
                <input type="submit" name="submit" value="Đăng nhập" class="btn1">
            </form>
        </div>
    </div>
</body>
</html>
<style>/* CSS Libraries Used 

*Animate.css by Daniel Eden.
*FontAwesome 4.7.0
*Typicons

*/

@import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400");

body,
html {
  font-family: "Source Sans Pro", sans-serif;
  background-color: #1d243d;
  padding: 0;
  margin: 0;
}
.login-key {
    height: 100px;
    font-size: 80px;
    line-height: 100px;
    background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.login-title {
    margin-top: 15px;
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 15px;
    font-weight: bold;
    color: #ECF0F5;
	margin-bottom: 45px;
}
#particles-js {
  position: absolute;
  width: 100%;
  height: 100%;
}

.container {
  margin: 0;
  top: 50px;
  left: 50%;
  position: absolute;
  text-align: center;
  transform: translateX(-50%);
  background-color: rgb(33, 41, 66);
  border-radius: 9px;
  border-top: 10px solid #79a6fe;
  border-bottom: 10px solid #8bd17c;
  width: 400px;
  height: 500px;
  box-shadow: 1px 1px 108.8px 19.2px rgb(25, 31, 53);
}

.box h4 {
  font-family: "Source Sans Pro", sans-serif;
  color: #5c6bc0;
  font-size: 18px;
  margin-top: 94px;
}

.box h4 span {
  color: #dfdeee;
  font-weight: lighter;
}

.box h5 {
  font-family: "Source Sans Pro", sans-serif;
  font-size: 13px;
  color: #a1a4ad;
  letter-spacing: 1.5px;
  margin-top: -15px;
  margin-bottom: 70px;
}

.box input[type="text"],
.box input[type="password"] {
  display: block;
  margin: 20px auto;
  background: #262e49;
  border: 0;
  border-radius: 5px;
  padding: 14px 10px;
  width: 320px;
  outline: none;
  color: #d6d6d6;
  -webkit-transition: all 0.2s ease-out;
  -moz-transition: all 0.2s ease-out;
  -ms-transition: all 0.2s ease-out;
  -o-transition: all 0.2s ease-out;
  transition: all 0.2s ease-out;
}
::-webkit-input-placeholder {
  color: #565f79;
}

.box input[type="text"]:focus,
.box input[type="password"]:focus {
  border: 1px solid #79a6fe;
}

a {
  color: #5c7fda;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

label input[type="checkbox"] {
  display: none; /* hide the default checkbox */
}

/* style the artificial checkbox */
label span {
  height: 13px;
  width: 13px;
  border: 2px solid #464d64;
  border-radius: 2px;
  display: inline-block;
  position: relative;
  cursor: pointer;
  float: left;
  left: 7.5%;
}

.btn1 {
  border: 0;
  background: #7f5feb;
  color: #dfdeee;
  border-radius: 100px;
  width: 340px;
  height: 49px;
  font-size: 16px;
  position: absolute;
  top: 79%;
  left: 8%;
  transition: 0.3s;
  cursor: pointer;
}

.btn1:hover {
  background: #5d33e6;
}

.rmb {
  position: absolute;
  margin-left: -24%;
  margin-top: 0px;
  color: #dfdeee;
  font-size: 13px;
}

.forgetpass {
  position: relative;
  float: right;
  right: 28px;
}

.dnthave {
  position: absolute;
  top: 92%;
  left: 24%;
}

[type="checkbox"]:checked + span:before {
  /* <-- style its checked state */
  font-family: FontAwesome;
  font-size: 16px;
  content: "\f00c";
  position: absolute;
  top: -4px;
  color: #896cec;
  left: -1px;
  width: 13px;
}

.typcn {
  position: absolute;
  left: 339px;
  top: 282px;
  color: #3b476b;
  font-size: 22px;
  cursor: pointer;
}

.typcn.active {
  color: #7f60eb;
}

.error {
  background: #ff3333;
  text-align: center;
  width: 337px;
  height: 20px;
  padding: 2px;
  border: 0;
  border-radius: 5px;
  margin: 10px auto 10px;
  position: absolute;
  top: 31%;
  left: 7.2%;
  color: white;
  display: none;
}

.footer {
  position: relative;
  left: 0;
  bottom: 0;
  top: 605px;
  width: 100%;
  color: #78797d;
  font-size: 14px;
  text-align: center;
}

.footer .fa {
  color: #7f5feb;
}
</style>


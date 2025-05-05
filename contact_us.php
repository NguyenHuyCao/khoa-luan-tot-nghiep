<?php
session_start();
include('config.php');
require_once('database/dbhelper.php');

// Khởi tạo biến cho thông tin người dùng
$userFullname = "";
$userEmail = "";
$userPhonenum = "";
$errors = []; // Mảng lưu trữ lỗi

if(isset($_COOKIE['username'])){
    $username = $_COOKIE['username'];
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = executeResult($sql);
    if(count($result) > 0){
       $user = $result[0];
       $userFullname = $user['full_name'];
       $userEmail = $user['email'];
       $userPhonenum = $user['phone_number'];
    }
}

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $message_contact = $_POST['message_contact'];
    $created_at = date('Y-m-d H:i:s');
    // Validate các trường
    if (empty($fullname)) {
      $errors['fullname'] = "Họ và tên không được để trống!";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email không được để trống và phải đúng định dạng!";
    }
    if (empty($phone_number)) {
        $errors['phone_number'] = "Số điện thoại không được để trống!";
    } 
    if (empty($message_contact)) {
        $errors['message_contact'] = "Tin nhắn không được để trống!";
    }

    if (isset($_COOKIE['username'])) {
      $username = $_COOKIE['username'];
      $sql = "SELECT * FROM user WHERE username = '$username'";
      $user = executeResult($sql);
      foreach ($user as $item) {
          $userId = $item['id_user'];
      }
    } else{
      $userId = "";
    }
    
      if(isset($_COOKIE['username'])){
        if($fullname!="" && $email!="" &&  $message_contact!="" && $phone_number!=""){
          $sql = "INSERT INTO contact(fullname,email,phone_number,message_contact,id_user,created_at)
                  VALUE('".$fullname."','".$email."','".$phone_number."','".$message_contact."','".$userId."','".$created_at."')";
          execute($sql);
          echo '<script>alert("Gửi liên hệ thành công.");
                window.location.href="index.php";
                </script>';
        } 
      } else {
        if($fullname!="" && $email!="" &&  $message_contact!="" && $phone_number!=""){
          $sql = "INSERT INTO contact(fullname, email, phone_number, message_contact, created_at) 
                  VALUES ('$fullname', '$email', '$phone_number', '$message_contact', '$created_at')";
          execute($sql);
          echo '<script>alert("Gửi liên hệ thành công.");
                window.location.href="index.php";
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
            <h2 class="page-title">LIÊN HỆ</h2>
            <p><a href="#">Trang chủ</a> | Liên hệ</p>
          </div>
        </div>
    </div>
  </div>
</section>
<body >
<hr class="opacity-20">
  <div class="container">
    <div class="title">Liên hệ</div>
    <div class="content">
      <form action="#" method="POST">
        <div class="user-details">
          <?php
            if(isset($_COOKIE['username'])){
            echo '<p style="font-weight: bold; text-align: center; font-size: 16px;">Xin chào ' . $_COOKIE['username'] . '</p>';
          } else {
            echo '<p style="font-weight: bold; text-align: center; font-size: 16px;">Chào bạn! Nếu có bất kỳ vấn đề cần hỗ trợ, hãy liên hệ với chúng tôi qua biểu mẫu.</p>';} 
            ?>
          <div class="input-box">
            <span class="details">Họ và tên</span>
            <input type="text" name="fullname"  placeholder="Nhập tên của bạn" value="<?= htmlspecialchars($userFullname) ?>">
            <?php if (isset($errors['fullname'])): ?>
              <span style="color: red;"><?= $errors['fullname'] ?></span>
            <?php endif; ?>
          </div>
          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Nhập email của bạn"  value="<?= htmlspecialchars($userEmail) ?>">
            <?php if (isset($errors['email'])): ?>
              <span style="color: red;"><?= $errors['email'] ?></span>
            <?php endif; ?>
          </div>

          <div class="input-box">
            <span class="details">Số điện thoại</span>
            <input type="text" name="phone_number" placeholder="Nhập số điện thoại của bạn"  value="<?= htmlspecialchars($userPhonenum) ?>">
            <?php if (isset($errors['phone_number'])): ?>
              <span style="color: red;"><?= $errors['phone_number'] ?></span>
            <?php endif; ?>
          </div>
          
          <div class="input-box">
            <span class="details">Tin nhắn</span>
            <input type="text" name="message_contact" placeholder="Nhập tin nhắn của bạn"<?= isset($_POST['message_contact']) ? htmlspecialchars($_POST['message_contact']) : '' ?>> </input>
            <?php if (isset($errors['message_contact'])): ?>
              <span style="color: red;"><?= $errors['message_contact'] ?></span>
            <?php endif; ?>
          </div>
          
        </div>
        
        <div class="button">
          <input type="submit" name="submit" value="Gửi">
        </div>
      </form>
    </div>
  </div>



<style>

.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, black,red);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  display: block;
  margin: 20px auto;
  border: 0;
  border-radius: 5px;
  padding: 1px 10px;
  width: 100%;
  outline: none;
  color: #000000;
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.input-box  textarea {
  
  height: 75px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
  
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color:white;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: black;
 }
 form .button input:hover{background: orange;}

</style></body>

</html>
<?php 
include("Layout/footer.php"); 
?>
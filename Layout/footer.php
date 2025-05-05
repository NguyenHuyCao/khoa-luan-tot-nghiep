
<?php
include('config.php');
?>
<!--------------------FOOTER--------------------------- -->
<footer class="section-p1"><!--mục footer -->
  <div class="col">
    <h4>ĐỊA CHỈ CỬA HÀNG</h4><!--Hệ thông cửa hàng -->
    <p>Đại Kim, Hoàng Mai, Hà Nội</p>
  </div> 
  <div class="col">
    <h4>THÔNG TIN LIÊN HỆ</h4><!--Thông tin liên hệ -->
    <p>Tuyển dụng:<a href ="liên kết "> link Website </a> </p>
    <p>Website:<a href ="liên kết "> link Website </a></p>
    <p>Liên hệ CSKH: support@<a href ="liên kết "> link Website </a></p>
    <p>Liên hệ doanh nghiệp: contact@<a href ="liên kết "> link Website </a></p>
  </div>
  <div class="col">
    <h4>THEO DÕI CHÚNG TÔI TRÊN MẠNG XÃ HỘI</h4><!--Follow us on social media-->
    <li><i class="fa fa-facebook"></i></li>
    <li><i class="fa fa-instagram"></i></li>
    <li><i class="fa fa-youtube"></i></li>            
  </div>    
</footer>
<style>

footer {
  background: #2c2c2c;
  display: flex;
  justify-content: space-between;
  padding: 40px 10%;
  color: #ffffff;
  flex-wrap: wrap;
  
}

footer .col {
  flex: 1;
  min-width: 250px;
  margin-bottom: 20px;
}

footer h4 {
  font-size: 18px;
  margin-bottom: 15px;
  font-weight: bold;
  position: relative;
  text-transform: uppercase;
}

/* Tạo gạch chân dưới tiêu đề */
footer h4::after {
  content: "";
  display: block;
  width: 50px;
  height: 3px;
  background: #d1a054;
  margin-top: 5px;
}

/* Chỉnh văn bản */
footer p {
  font-size: 14px;
  line-height: 1.6;
  color: #d3d3d3;
}

footer a {
  color: #d1a054;
  text-decoration: none;
  transition: color 0.3s;
}

footer a:hover {
  color: #ffffff;
  text-decoration: underline;
}

/* Chỉnh icon mạng xã hội */
footer ul {
  display: flex;
  padding: 0;
}

footer li {
  list-style: none;
  font-size: 20px;
  margin-right: 15px;
  cursor: pointer;
  transition: color 0.3s ease;
}

footer li:hover {
  color: #d1a054;
}


</style>

<style>
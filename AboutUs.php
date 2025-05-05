
<?php 
 include("Layout/header.php");
?>
<!-- pages-title-start -->
<section class="contact-img-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="con-text">
          <h2 class="page-title">GIỚI THIỆU LUXURY HOME</h2>
          <p><a href="#">Trang chủ</a> | Giới thiệu</p>
        </div>
      </div>
    </div>
  </div>
</section>
<body>
<hr class="opacity-20">
  <div class="container">
    
    <div class="gallery-display-area">      
      <div class="gallery-wrap">
        <div class="image">
          <img src="images/AboutUs/ảnh1.jpg" />
        </div>
        <div class="image">
          <img src="images/AboutUs/ảnh2.jpg" />
        </div>
        <div class="image">
          <img src="images/AboutUs/ảnh3.jpg" />
        </div>  
        <div class="image">
          <img src="images/AboutUs/ảnh4.jpg" />
        </div>    
        <div class="image">
          <img src="images/AboutUs/ảnh5.jpg" />
        </div>            
      </div>
    </div>
  </div>
    <h2 style="   
      text-align: center;
      padding:80px;
      font-size:25px;
      margin-top: 20px
    ">
      Không Gian Nội Thất Hoàn Mỹ
    </h2>
    <h5 style="    
      font-size:16.6px;
      color:rgb(0, 0, 0);
      text-align:center;
      padding-left:395px;
      padding-right:395px;
      letter-spacing:0.5px;
      line-height:40px;
      font-weight:500;
      padding-bottom:70px;
    ">
      Câu chuyện của **Luxury Home** bắt đầu từ niềm đam mê với không gian sống và mong muốn mang đến những sản phẩm nội thất cao cấp, tinh tế. Chúng tôi tin rằng nội thất không chỉ đơn thuần là những món đồ trang trí, mà còn là cách thể hiện phong cách sống, cá tính và sự tiện nghi của mỗi gia đình.</br></br>
      
      Với sự kết hợp giữa thiết kế hiện đại và giá trị truyền thống, **Luxury Home** tự hào mang đến những sản phẩm nội thất sang trọng, sáng tạo và đầy tính ứng dụng. Chúng tôi không chỉ chú trọng vào chất lượng của từng chi tiết mà còn không ngừng đổi mới để đáp ứng nhu cầu thẩm mỹ và công năng ngày càng cao của khách hàng.</br></br>
      
      Sản phẩm của chúng tôi được chế tác từ những chất liệu cao cấp, thân thiện với môi trường, đảm bảo độ bền bỉ theo thời gian. Mỗi sản phẩm không chỉ là một món đồ nội thất mà còn là một tác phẩm nghệ thuật, góp phần tạo nên không gian sống đẳng cấp.</br></br>
      
      Hơn cả một thương hiệu nội thất, **Luxury Home** mong muốn trở thành người bạn đồng hành trong hành trình kiến tạo tổ ấm của bạn. Sự hài lòng của khách hàng chính là động lực để chúng tôi không ngừng hoàn thiện và phát triển.
    </h5>
    
    <!-- Lý do chọn Luxury Home -->
    <section class="why-choose">
        <div class="container">
            <h2>Tại Sao Chọn Luxury Home?</h2>
            <div class="features">
                <div class="feature">
                    <i class="fas fa-couch"></i>
                    <h3>Thiết Kế Sang Trọng</h3>
                    <p>Sản phẩm độc đáo, mang đậm phong cách hiện đại và tinh tế.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-leaf"></i>
                    <h3>Chất Liệu Cao Cấp</h3>
                    <p>Vật liệu thân thiện môi trường, bền bỉ theo thời gian.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-truck"></i>
                    <h3>Giao Hàng Nhanh</h3>
                    <p>Dịch vụ vận chuyển nhanh chóng, đảm bảo an toàn sản phẩm.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-award"></i>
                    <h3>Bảo Hành Chính Hãng</h3>
                    <p>Cam kết chất lượng, chế độ bảo hành uy tín.</p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
<hr class="opacity-20">
<?php require_once('Layout/footer.php'); ?>


<style>
    *{
    margin: 0;
    padding: 0;
}
i{/*  chỉnh icon ngôi sao */
    font-size:16px;
    text-align: center;
    padding-right: 10px;
}

h2{/*  chỉnh ô chứa chữ H2 */
text-align: center;
font-size:23px; 
padding-left:325px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
padding-right:343px;
padding-bottom:70px;
padding-top:100px;
}

h5{/*  chỉnh ô chứa chữ H5 */
    text-align: left;
    font-size:16px; 
    font-weight: 50;
    padding-left:340px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    padding-right:343px;
    padding-top:10px;
    padding-bottom:18px;


    }

h6{/*  chỉnh ô chứa chữ H6 */
    text-align: left;
    font-size:17.5px; 
    font-weight: 600;
    /* text-decoration: underline; */
    padding-left:355px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    padding-right:343px;
    /* padding-bottom:10px; */
    margin-top:-10px;/*  chỉnh khoảng cách so với chữ bên trên */
}
.image{/*  chỉnh ảnh trong mục body */
    align-items: center;
    text-align: center;
}



/*-----------------BÀI VIẾT LIÊN QUAN--------------------------*/


hr{/*  chỉnh thanh kẻ giữa bài viết liên quan với ảnh trên */
    margin-top:70px;/*  chỉnh khoảng cách so với chữ bên trên */padding-left:325px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    margin-left:313px;
}
h1{/*  chỉnh ô chứa chữ H1 */
    text-align: left;
    font-size:16px; 
    font-weight: 550;
    padding-left:325px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    padding-right:343px;
    padding-bottom:18px;
    margin-top:15px;/*  chỉnh khoảng cách so với chữ bên trên */
}
#list-new {/*  chỉnh ảnh bài viết liên quan */
    font-size:10px;/*size chữ sản phẩm*/
    display: flex;
    list-style: none;
    justify-content: space-around;
    padding-left:190px;/*  chỉnh khoảng cách 2 bên lề để song song với ảnh */
    padding-right:317px;
    margin-top:40px;

}

#list-new .item .name {/*  chỉnh chữ bài viết liên quan */
    text-align: center;
    color:rgb(10, 10, 10);
    font-weight: bold;
    margin-top:20px;/*chỉnh khoảng cách từ tên so với sản phẩm*/
}


#list-new .box-left{
    text-align: center;
    margin-top:400px;/*chỉnh lên xuống nút xem thêm */
    margin-left:-490px;/*chỉnh trái phải nút xem thêm*/
    
}
#list-new .box-left button:hover {/*màu sắc khi nhấp vô nút buttom mua ngay*/
    background:orange;
}
#list-new .box-left button {/*nút buttom mua ngay*/
    font-size:12px;/*chỉnh size chữ*/
    width: 80px;/*chỉnh size dài bóng đen*/
    height: 30px;/*chỉnh size rộng bóng đen*/
    background:#1d1a1a;
    border:none;
    outline:none;
    color:#fff;
    font-weight: bold;
    border-radius: 200px;
    transition:0.4s;/*chỉnh tốc độ chuyển màu*/
}

.gallery-display-area{
    overflow: hidden;
    height: 360px;
    width: 1080px;
    margin-left: 30px;

}

.gallery-wrap{
    animation: slideShow 16s infinite;
    
}

.image{
    float: left;
    height: 360px;
    width: 1080px;
    display: flex;
    justify-content: center;
    align-items: center;

}

@keyframes slideShow{
    20%{
        margin-left: 0;        
    }
    30%{
        margin-left: -100%;        
    }
    40%{
        margin-left: -100%;        
    }
    50%{
        margin-left: -200%;        
    }
    60%{
        margin-left: -200%;        
    }
    70%{
        margin-left: -300%;        
    }
    80%{
        margin-left: -300%;        
    }
    90%{
        margin-left: -400%;        
    }
    100%{
        margin-left: -400%;        
    }
}
h5{/*  chỉnh  ô chứa chữ H4 */
    font-size:16.6px;
    color:rgb(0, 0, 0);
    text-align:center;
    padding-left:395px;
    padding-right:395px;
    letter-spacing:0.5px;
    line-height:40px;
    font-weight:500;
    padding-bottom:70px;
    
    
}
h2{/*  chỉnh ô chứa chữ H2 */
   text-align: center;
  padding:80px;
  font-size:25px;
  margin-top:-200px
}

.why-choose {
    background: #fff;
    padding: 80px 0;
}
.why-choose h2 {
    text-align: center;
    font-size: 32px;
    margin-bottom: 40px;
    margin-top: 10px;
}
.features {
    display: flex;
    justify-content: space-between;
    text-align: center;
}
.feature {
    width: 22%;
}
.feature i {
    font-size: 40px;
    color: #FFD700;
    margin-bottom: 15px;
}
.feature h3 {
    font-size: 22px;
    margin-bottom: 10px;
}
.feature p {
    font-size: 16px;
    color: #666;
}

@media screen and  (max-width: 870px)  and (min-width:300px){
    body {
   width: 1500px;
    }
}
</style>
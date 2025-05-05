

<?php require_once('database/config.php');
require_once('database/dbhelper.php');?>
<?php 
include("Layout/header.php");
?>

<body>
  <!-- POP UP -->
  <!-- <div class="popup-overlay" id="popup">
    <div class="popup-box">
      <h2>Cảnh Báo Giả Mạo Thương Hiệu</h2>
      <p>Quý khách vui lòng cảnh giác với các trang web hoặc số điện thoại giả mạo thương hiệu của chúng tôi. Chúng tôi chỉ cung cấp dịch vụ qua hệ thống chính thức.</p>
      <button onclick="closePopup()">Đã Hiểu</button>
    </div>
  </div> -->

  <section class="slider-main-area">
    <div class="main-slider an-si">
      <div class="bend niceties preview-2 hm-ver-1">
        <div id="ensign-nivoslider-2" class="slides">	
          <img src="/Web/images/leo-slide.jpg" alt="" title="#slider-direction-3"  />
          <img src="/Web/images/agay-slide.jpg" alt="" title="#slider-direction-1"  />
        </div>
        <!-- direction 1 -->
        <div id="slider-direction-3" class="t-cn slider-direction Builder">
          <div class="slide-all">
            <!-- layer 1 -->
            <div class="layer-1">
              <h2 class="title5">Thiết kế hiện đại</h2>
            </div>
            <!-- layer 2 -->
            <div class="layer-2">
              <h2 class="title6">Luxurious Home</h2>
            </div>
            <!-- layer 2 -->
            <div class="layer-2">
              <p class="title0">Giá cực ưu đãi!</p>
            </div>
            <!-- layer 3 -->
            <div class="layer-3">
              <a class="min1" href="shop.php?id_category=1">Mua ngay</a>
            </div>
          </div>
        </div>
        <div id="slider-direction-1" class="t-cn slider-direction Builder">
          <div class="slide-all slide2">
            <!-- layer 1 -->
            <div class="layer-1">
              <h2 class="title5">Chỉ hôm nay</h2>
            </div>
            <!-- layer 2 -->
            <div class="layer-2">
              <h2 class="title6">Luxurious Home</h2>
            </div>
            <!-- layer 2 -->
            <div class="layer-2">
              <p class="title0">Nôi thất hot giảm giá!</p>
            </div>
            <!-- layer 3 -->
            <div class="layer-3">
              <a class="min1" href="shop.php?id_category=3">Mua ngay</a>
            </div>
          </div>
        </div>
    </div>
      </div>
  </section>
        <!-- collection section start -->
  <div class="banner-area">
    <div class="container">
      <div class="section-padding1">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="banner-box banner-box-re">
              <a href="shop.php?id_category=3">
                <img alt="" src="images/banner/2.jpg">
                <div>
                  <h2>
                    Luxury
                    <span>Home</span>
                  </h2>
                  <p>Duyên dáng sang trọng, chất lượng bền vững – Luxury Home, nơi không gian sống nâng tầm đẳng cấp.</p>
                </div>
              </a>
            </div>
            <div class="banner-box res-btm">
              <a href="shop.php?id_category=1">
                <img alt="" src="images/banner/3.jpg">
                <div>
                  <h2>
                    Luxury
                    <span>Home</span>
                  </h2>
                  <p>Duyên dáng sang trọng, chất lượng bền vững – Luxury Home, nơi không gian sống nâng tầm đẳng cấp.</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="banner-container banner-box res-btm">
              <a href="shop.php?id_category=2">
                <img alt="" src="images/banner/1.jpg">
                <div>
                  <h2>
                    Luxury
                    <span>Home</span>
                  </h2>
                  <p>Duyên dáng sang trọng, chất lượng bền vững – Luxury Home, nơi không gian sống nâng tầm đẳng cấp.</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="banner-box banner-box-re">
              <a href="shop.php?id_category=2">
                <img alt="" src="images/banner/4_1.jpg">
                <div>
                  <h2>
                    Luxury
                    <span>Home</span>
                  </h2>
                  <p>Duyên dáng sang trọng, chất lượng bền vững – Luxury Home, nơi không gian sống nâng tầm đẳng cấp.</p>
                </div>
              </a>
            </div>
            <div class="banner-box">
              <a href="shop.php?id_category=4">
                <img alt="" src="images/banner/5.jpg">
                <div>
                  <h2>
                    Luxury
                    <span>Home</span>
                  </h2>
                  <p>Duyên dáng sang trọng, chất lượng bền vững – Luxury Home, nơi không gian sống nâng tầm đẳng cấp.</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- collection section end -->
  <!-- new-products section start -->
  <section class="featured-products single-products section-padding-top">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="section-title">
            <h3>SẢN PHẨM MỚI</h3>
            <div class="section-icon">
              <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="row tab-content">
        <div class="tab-pane  fade in active" id="all">
          <div id="tab-carousel-1" class="re-owl-carousel owl-carousel product-slider owl-theme">
          <?php
            $sql = "SELECT * FROM product
                    WHERE number > 0
                    ORDER BY created_at DESC ";
            $feature_product = executeResult($sql);
            
            $used_feproducts = array ();
            foreach ($feature_product as $item) {
              if (!in_array ($item ['title'], $used_feproducts)) {  //check if the product id is not in the new array
                array_push ($used_feproducts, $item ['title']); //add the product id to the new array
                echo '
                <div class="col-xs-12">
                  <div class="single-product">
                      <div class="product-img">
                          <div class="pro-type">
                              <span>NEW</span>
                          </div>
                          <a href="single_product.php?id=' . $item['id'] . '"> 
                              <img class="thumbnail" src="admin/product/' . $item['thumbnail'] . '" alt="' . $item['title'] . '" />
                          </a>
                      </div>
                      <div class="product-dsc">
                          <h3><a href="single_product.php?id=' . $item['id'] . '">' . $item['title'] . '</a></h3>
                          <div class="star-price">
                              <span class="price-left">' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>

                          </div>
                      </div>
                      <div class="actions-btn">
                          
                      </div>
                  </div>
                </div>';
              }
            }
          ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="blog section-padding-top">
    <div class="container">
      <div class="row"> 
        <div class="col-xs-12">
          <div class="section-title">
            <h3>CẢM NHẬN KHÁCH HÀNG</h3>
            <div class="section-icon">
              <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="row"> 
        <div class="col-xs-12">
          <div class="section-title">    
          <div class="slider">
              <button id="prevBtn">❮</button>
              <div class="review">
                  <img id="mainImage" src="images/customer/customer1.jpeg" alt="Khách hàng 1">
                  <p id="reviewText">"Dịch vụ tuyệt vời, tôi rất hài lòng!"</p>
                  <p id="customerName">- Nguyễn Văn A</p>
              </div>
              <button id="nextBtn">❯</button>
          </div>

          <div class="thumbnails">
              <img class="thumb" src="images/customer/customer1.jpeg" onclick="showReview(0)">
              <img class="thumb" src="images/customer/customer2.jpeg" onclick="showReview(1)">
              <img class="thumb" src="images/customer/customer3.jpeg" onclick="showReview(2)">
              <img class="thumb" src="images/customer/customer4.jpeg" onclick="showReview(3)">
          </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </section>

  <section class="blog section-padding-top">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="section-title">
            <h3>TIN TỨC</h3>
            <div class="section-icon">
              <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div id="blog" class="owl-carousel product-slider owl-theme re-blog">
          <div class="col-xs-12">
            <div class="blog-container-inner">
              <div class="post-thumb">
                <a href="Blog_1.php"><img class="attachment-blog-list wp-post-image" alt="blog-2" src="images/new1.jpg"></a>
              </div>
              <div class="visual-inner">
                <h2 class="blog-title">
                  <div class="name">Nội Thất Cao Cấp - Khám Phá Vẻ Đẹp Sang Trọng Tại Luxury Home</div>
                </h2>
                <div class="blog-meta">
                  <span class="post-category">
                    Tại
                    <a rel="category" href="Blog_1.php">Luxury Home</a>
                  </span>
                  <span class="published">
                    <i class="fa fa-clock-o"></i>
                    Ngày 1 tháng 3, 2025
                  </span>
                </div>
                <div class="blog-content">
                  Tại Luxury Home, chúng tôi tin rằng từng chi tiết là chìa khóa để tạo nên không gian sống đẳng cấp. 
                  Blog của chúng tôi sẽ giới thiệu đến bạn những món đồ nội thất, trang trí và phụ kiện cao cấp, 
                  giúp bạn kiến tạo tổ ấm hoàn hảo theo phong cách riêng.
                </div>
              </div>
              <div class="box-left" >
                <a href="Blog_1.php"><button>Xem thêm </button></a>
              </div>
            </div>
          </div>
          <!-- single blog item end -->
          <div class="col-xs-12">
            <div class="blog-container-inner">
              <div class="post-thumb">
                  <a href="Blog_2.php"><img class="attachment-blog-list wp-post-image" alt="blog-2" src="images/new2_1.jpg"></a>
              </div>
              <div class="visual-inner">
                  <h2 class="blog-title">
                      <div class="name">Bàn Ghế - Khám Phá Sự Tinh Tế Tại Luxury Home</div>
                  </h2>
                  <div class="blog-meta">
                      <span class="post-category">
                          Tại
                          <a rel="category" href="Blog_2.php">Luxury Home</a>
                      </span>
                      <span class="published">
                          <i class="fa fa-clock-o"></i>
                          Ngày 1 tháng 3, 2025
                      </span>
                  </div>
                  <div class="blog-content"> 
                    Luxury Home tự hào về bộ sưu tập nội thất cao cấp từ các thương hiệu hàng đầu thế giới. 
                    Chất liệu bền vững, thiết kế tinh tế và màu sắc hài hòa, tất cả những yếu tố này được kết hợp để tạo nên không gian sống lý tưởng cho mọi phong cách.
                  </div>
              </div>
              <div class="box-left" >
                  <a href="Blog_2.php"><button>Xem thêm </button><!--nút mua hàng --></a>
              </div>  
            </div> 
          </div>
          <!-- single blog item end -->
          <div class="col-xs-12">
            <div class="blog-container-inner">
              <div class="post-thumb">
                <a href="Blog_3.php"><img class="attachment-blog-list wp-post-image" alt="blog-2" src="images/new3_1.jpg"></a>
              </div>
              <div class="visual-inner">
                  <h2 class="blog-title">
                    <div class="name">Sofa - Khám Phá Sự Hoàn Hảo Tại Luxury Home</div>
                  </h2>
                  <div class="blog-meta">
                    <span class="post-category">
                      Tại
                      <a rel="category" href="Blog_3.php">Luxury Home</a>
                    </span>
                    <span class="published">
                      <i class="fa fa-clock-o"></i>
                      Ngày 1 tháng 3, 2025
                    </span>
                  </div>
                  <div class="blog-content"> 
                    Tại Luxury Home, chúng tôi hiểu rằng nội thất không chỉ là vật dụng mà còn thể hiện phong cách và đẳng cấp.  
                    Khám phá những thiết kế sang trọng, tinh tế từ các thương hiệu hàng đầu. Lựa chọn của bạn là niềm tự hào của chúng tôi.  
                  </div>
              </div>
              <div class="box-left" >
                  <a href="Blog_3.php"><button>Xem thêm </button><!--nút mua hàng --></a>
              </div>
                
            </div>
          </div>
          <!-- single blog item end -->
        </div>
      </div>
    </div>
  </section>


  <div class="warning-container">
      <img src="images/logo1.png" alt="Logo Nội Thất" class="logo">
      <h1>⚠️ CẢNH BÁO GIẢ MẠO THƯƠNG HIỆU ⚠️</h1>
      <p>Quý khách vui lòng <span class="highlight">CẢNH GIÁC</span> với các trang web hoặc số điện thoại giả mạo <strong>Công ty Nội Thất LUXURY HOME</strong>.</p>
      <p>Chúng tôi chỉ cung cấp dịch vụ qua hệ thống chính thức và không yêu cầu thanh toán qua tài khoản cá nhân.</p>
      <p>Nếu phát hiện hành vi giả mạo, vui lòng gọi ngay <strong>Hotline: 8888 99998</strong> để được hỗ trợ.</p>
      <button class="btn-confirm" onclick="redirectToHome()">Tôi Đã Hiểu</button>
  </div>

  <section class="blog section-padding-top">
      <div class="container">
        <div class="partner-section">
          <div class="row"> 
            <div class="col-xs-12">
              <div class="section-title">
                <h3>ĐỐI TÁC CỦA CHÚNG TÔI</h3>
                <div class="section-icon">
                  <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row"> 
          <div class="col-xs-12">
            <div class="carousel-container">
              <div class="carousel-track">
                <div class="carousel-item"><img src="images/competor/competor1.png" alt="Đối tác 1"></div>
                <div class="carousel-item"><img src="images/competor/competor2.png" alt="Đối tác 2"></div>
                <div class="carousel-item"><img src="images/competor/competor3.png" alt="Đối tác 3"></div>
                <div class="carousel-item"><img src="images/competor/competor4.png" alt="Đối tác 4"></div>
                <div class="carousel-item"><img src="images/competor/competor5.png" alt="Đối tác 5"></div>

                <!-- Lặp lại để tạo hiệu ứng vô tận -->
                <div class="carousel-item"><img src="images/competor/competor1.png" alt="Đối tác 1"></div>
                <div class="carousel-item"><img src="images/competor/competor2.png" alt="Đối tác 2"></div>
                <div class="carousel-item"><img src="images/competor/competor3.png" alt="Đối tác 3"></div>
                <div class="carousel-item"><img src="images/competor/competor4.png" alt="Đối tác 4"></div>
                <div class="carousel-item"><img src="images/competor/competor5.png" alt="Đối tác 5"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
   </section>

   <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- parallax js -->
    <script src="js/parallax.min.js"></script>
    <!-- owl.carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Img Zoom js -->
    <script src="js/img-zoom/jquery.simpleLens.min.js"></script>
    <!-- meanmenu js -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- jquery.countdown js -->
    <script src="js/jquery.countdown.min.js"></script>
    <!-- Nivo slider js
    ============================================ --> 		
    <script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="lib/home.js" type="text/javascript"></script>
    <!-- jquery-ui js -->
    <script src="js/jquery-ui.min.js"></script>
    <!-- sticky js -->
    <script src="js/sticky.js"></script>
    <!-- plugins js -->
    <script src="js/plugins.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>

    <!-- POP UP -->
    <script>
        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }
    </script>

    <!-- Đánh giá khác hàng -->
    <script>
        const reviews = [
            {
                image: "images/customer/customer1.jpeg",
                text: "Dịch vụ tuyệt vời, tôi rất hài lòng!",
                name: "- Nguyễn Văn A"
            },
            {
                image: "images/customer/customer2.jpeg",
                text: "Sản phẩm rất chất lượng, sẽ giới thiệu cho bạn bè!",
                name: "- Trần Thị B"
            },
            {
                image: "images/customer/customer3.jpeg",
                text: "Giá cả hợp lý, nhân viên nhiệt tình!",
                name: "- Lê Văn C"
            },
            {
                image: "images/customer/customer4.jpeg",
                text: "Trải nghiệm tuyệt vời, chắc chắn sẽ quay lại!",
                name: "- Phạm Thị D"
            }
        ];

        let currentIndex = 0;

        function updateReview(index) {
            document.getElementById("mainImage").src = reviews[index].image;
            document.getElementById("reviewText").textContent = reviews[index].text;
            document.getElementById("customerName").textContent = reviews[index].name;
        }

        document.getElementById("prevBtn").addEventListener("click", () => {
            currentIndex = (currentIndex - 1 + reviews.length) % reviews.length;
            updateReview(currentIndex);
        });

        document.getElementById("nextBtn").addEventListener("click", () => {
            currentIndex = (currentIndex + 1) % reviews.length;
            updateReview(currentIndex);
        });

        function showReview(index) {
            currentIndex = index;
            updateReview(index);
        }
    </script>

    <!-- Cảnh báo -->
    <script>
        function redirectToHome() {
            window.location.href = "index.php";
        }
    </script>
  </body>

<style>     /* ------------------------Banner one piece------------------------------*/
  *{
    margin:0;
    padding:0;
    box-sizing:border-box;
      
  }
  #banner1 {
    width: 100%;
    
    background-image :url("/Web/images/chup-hinh-noi-that.jpg");
    
    height: 880px;/*chỉnh size banner*/
    margin-top:70px;
    display: flex;
    padding:0px 133px;
    position:relative;
  }
  #banner1 .box-left ,#banner .box-right {
    width: 50%;
  }


  #banner1 .box-left button {/*nút buttom mua ngay*/
    font-size:20px;/*chỉnh size chữ*/
    width: 170px;/*chỉnh size dài bóng đen*/
    height: 45px;/*chỉnh size rộng bóng đen*/
    margin-top:420px;/*chỉnh vị trí buttom lên xuống*/
    margin-left:-18px;/*chỉnh vị trí buttom trái phải*/
    background:#1d1a1a;
    border:none;
    outline:none;
    color:#fff;
    font-weight: bold;
    border-radius: 200px;
    transition:0.4s;/*chỉnh tốc độ chuyển màu*/
  }
  #banner1 .box-left button:hover {/*màu sắc khi nhấp vô nút buttom mua ngay*/
      background:orange;
  }

  /* POP UP */
  .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .popup-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .popup-box h2 {
            color: red;
        }
        .popup-box p {
            font-size: 14px;
        }
        .popup-box button {
            background: red;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .popup-box button:hover {
            background: darkred;
        }

  /* Cảnh báo */
.warning-container {
            width: 90%;
            max-width: 600px;
            background-color: #c62828;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 60px auto;
        }

        .logo {
            width: 120px;
            margin-bottom: 10px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .highlight {
            font-weight: bold;
            text-transform: uppercase;
            color: yellow;
        }

        .btn-confirm {
            background: white;
            color: #c62828;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn-confirm:hover {
            background: #ffb3b3;
            color: white;
        }

  /* ĐỐI TÁC */
.partner-section {
    padding: 50px 0;
    background: white;
}

.partner-section h2 {
    font-size: 32px;
    margin-bottom: 25px;
    color: #333;
    text-align: center;
}

/* Container của carousel */
.carousel-container {
    overflow: hidden;
    width: 90%; /* Tăng kích thước */
    margin: auto;
    position: relative;
}

/* Track chứa các ảnh đối tác */
.carousel-track {
    display: flex;
    width: 200%;
    animation: slide 12s linear infinite;
}

/* Mỗi item trong carousel */
.carousel-item {
    flex: 0 0 20%;
    text-align: center;
    padding: 15px; /* Tăng padding */
}

/* Kích thước ảnh đối tác */
.carousel-item img {
    width: 160px; /* Tăng kích thước */
    height: auto;
    filter: grayscale(30%);
    transition: transform 0.4s, filter 0.4s;
}

/* Hiệu ứng hover */
.carousel-item img:hover {
    filter: grayscale(0%);
    transform: scale(1.2);
}

/* Hiệu ứng trượt mượt hơn */
@keyframes slide {
    0% { transform: translateX(0); }
    100% { transform: translateX(-100%); }
}


  /* CẢM NHẬN KHÁC HÀNG */
.customer-reviews {
    text-align: center;
}

.customer-reviews h1 {
    font-size: 28px;
    margin-bottom: 20px;
}

.slider {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px; /* Giảm khoảng cách giữa các phần tử */
}

.review {
    text-align: center;
    width: 250px; /* Giảm chiều rộng để các phần tử sát nhau hơn */
    background: white;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s;
}

/* Ảnh chính */
.review img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
}

/* Nút điều hướng */
button {
    background-color: transparent;
    border: none;
    font-size: 24px;
    cursor: pointer;
    padding: 10px;
}

/* Hàng thumbnail */
.thumbnails {
    display: flex;
    justify-content: center;
    margin-top: 10px;
    gap: 8px; /* Giảm khoảng cách giữa các thumbnail */
}

/* Ảnh thumbnail */
.thumb {
    width: 60px; /* Tăng kích thước để không bị trống */
    height: 60px;
    cursor: pointer;
    border-radius: 50%;
    object-fit: cover;
    transition: transform 0.3s;
}

.thumb:hover {
    transform: scale(1.1);
}



  /* ------------------------NEW ARRIVALS------------------------------*/
  section.main {
    padding: 2rem 0;
    width: 100%;
    margin: 0px auto;
  }
  section.main a {
    text-decoration: none;
  }
  section.main section.recently {
    padding-bottom: 3rem;
    padding-left: 3rem;
    padding-right: 3rem;
  }
  section.main section.recently .link a {
    text-decoration: none;
    color: black;
    font-size: 20px;
  }
  section.main section.recently .title h1 {
    font-size: 35px;
    margin: 0px;
    padding: 30px;
    color: black;
    text-align:center;
  }
  section.main section.recently .product-recently {
    padding-top: 2rem;
  }
  section.main section.recently .product-recently .row {
    display: grid;
    grid-template-columns: auto auto auto auto;
    grid-column-gap: 30px;
    grid-row-gap: 30px;
  }

  section.main section.recently .product-recently .row .col img {
    width: 100%;
    border-radius: 10px;
  }
  section.main section.recently .product-recently .row .col img.thumbnail {
    border: 1px solid rgb(76, 78, 85);
    transition: 0.1s;
  }
  section.main section.recently .product-recently .row .col img.thumbnail:hover {
    box-shadow: 0px 0px 5px 0px grey;
  }
  section.main section.recently .product-recently .row .col .title p {
    font-size: 20px;
    font-weight: 600;
    padding: 0px;
    margin: 5px 0;
    color: black;
    font-family: "Encode Sans SC", sans-serif;
  }
  section.main section.recently .product-recently .row .col .price span {
    padding: 10px 0;
    color: #676767;
    font-size: 20px;
    font-weight: 600;
    color: rgba(207, 16, 16, 0.815);
    font-family: "Bebas Neue", cursive;
  }
  section.main section.recently .product-recently .row .col .dish span {
    padding: 10px 0;
    color: #676767;
  }

  section.main section.recently .product-recently .row .col .more {
    display: flex;
    color: #676767;
    padding: 5px 0;
    font-size: 18px;
  }
  section.main section.recently .product-recently .row .col .more .star {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  section.main section.recently .product-recently .row .col .more .star img {
    width: 25px;
    height: 25px;
  
  }
  section.main section.recently .product-recently .row .col .more .time {
    display: flex;
    padding: 0 10px;

  }
  section.main section.recently .product-recently .row .col .more .time img {
    width: 24px;
    height: 24px;

  }
  #wp-products {/*căn nguyên lish new arrival và sản phẩm */
    padding-top:130px;/*cách banner trên*/
    padding-bottom: 78px;
    padding-left:0px;
    padding-right:0px;/*căn phải với web*/
  }

  #wp-products h2 {
    text-align: center;
    margin-bottom: 76px;/*căn trên so với chữ new arrival*/
    font-size:5x;/*size chữ New Arrival*/
    color:black;
    margin-left:40px;
  }


  #list-products {
    font-size:17px;/*size chữ sản phẩm*/
    display: flex;
    list-style: none;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
  }

  #list-products .item {
    width: 100%px;/*căn trái phải của hình ảnh so với lề*/
    height: 0px;/*chỉnh khung border sau ảnh*/
    background:#fafafa;
    border-radius: 0px;
    margin-bottom: 460px;/*chỉnh khoảng cách sản phẩm trên so với sản phẩm dưới*/
  }


  #list-products .item .name {
    text-align: center;
    color:rgb(10, 10, 10);
    font-weight: bold;
    margin-top:0px;/*chỉnh khoảng cách từ tên so với sản phẩm*/
  }

  #list-products .item .price {
    text-align: center;
    color:#090909;
    font-weight: bold;
    margin-top:0px;/*chỉnh khoảng cách từ giá tiền so với tên sản phẩm*/
  }


  .list-page {
    width: 50%;
    margin:0px auto;
  }

  .list-page {
    display: flex;
    list-style: none;
    justify-content: center;
    align-items: center;
  }


  /* ------------------------Banner SPRING OF THE Y------------------------------*/
  #banner2 {/* banner rồng*/
    width: 100%;
    background-image :url("/Web/images/banner rồng2.jpg");
    background-size:cover;
    height: 710px;/*chỉnh size banner*/
    margin-top:40px;
    display: flex;
    padding:0px 133px;
    position:relative;
  }
  #banner2 .box-left ,#banner .box-right {
    width: 50%;
  }

  #banner2  .box-left h2 {/* chỉnh chữ spring of the Y*/
      
    font-size:50px;
    margin-top:55px;
    margin-left:409px;
    width: 100%;
    padding:0px 30px;   
    font-family:Tahoma ;
    color:#AE611D
  }

  #banner2 .box-left button {/*nút buttom mua ngay*/
    font-size:20px;/*chỉnh size chữ*/
    width: 170px;/*chỉnh size dài bóng đen*/
    height: 45px;/*chỉnh size rộng bóng đen*/
    margin-top:460px;/*chỉnh vị trí buttom lên xuống*/
    margin-left:565px;/*chỉnh vị trí buttom trái phải*/
    background:#1d1a1a;
    border:none;
    outline:none;
    color:#fff;
    font-weight: bold;
    border-radius: 200px;
    transition:0.4s;/*chỉnh tốc độ chuyển màu*/
  }
  #banner2 .box-left button:hover {/*màu sắc khi nhấp vô nút buttom mua ngay*/
    background:orange;
  }


  /* ------------------------Banner LILIWUYN------------------------------*/
  #banner3 {/* banner lilywuyn*/
    width: 100%;
    background-image :url("/Web/images/liliwuyn2.jpg");
    background-size:cover;
    height: 700px;/*chỉnh size banner*/
    margin-top:-40px;
    display: flex;
    padding:0px 133px;
    position:relative;
  }
  #banner3 .box-left ,#banner .box-right {
    width: 50%;
  }

  #banner3 .box-left button {/*nút buttom mua ngay*/
    font-size:20px;/*chỉnh size chữ*/
    width: 170px;/*chỉnh size dài bóng đen*/
    height: 45px;/*chỉnh size rộng bóng đen*/
    margin-top:435px;/*chỉnh vị trí buttom lên xuống*/
    margin-left:565px;/*chỉnh vị trí buttom trái phải*/
    background:#1d1a1a;
    border:none;
    outline:none;
    color:#fff;
    font-weight: bold;
    border-radius: 200px;
    transition:0.4s;/*chỉnh tốc độ chuyển màu*/
  }
  #banner3 .box-left button:hover {/*màu sắc khi nhấp vô nút buttom mua ngay*/
    background:orange;
  }



  /* ------------------------WHAT'S HOT------------------------------*/


  #new {/*căn nguyên lish new arrival và sản phẩm */
    padding-top:50px;/*cách banner trên*/
    padding-bottom: 78px;
    padding-left:0px;
    padding-right:160px;/*căn phải với web*/
      
  }

  #new h2 {
    padding-left:175px;
    text-align: center;
    margin-bottom: 50px;/*căn trên so với chữ WHAT'S HOT*/
    font-size:5x;/*size chữ WHAT'S HOT*/
    color:black;
  }


  #list-new {
    font-size:13px;/*size chữ sản phẩm*/
    display: flex;
    list-style: none;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
  }

  #list-new .item {
    width: 100%px;/*căn trái phải của hình ảnh so với lề*/
    height: 0px;/*chỉnh khung border sau ảnh*/
    background:#fafafa;
    border-radius: 0px;
    margin-bottom: 460px;/*chỉnh khoảng cách sản phẩm trên so với sản phẩm dưới*/
  }


  #list-new .item .name {
    text-align: center;
    color:rgb(10, 10, 10);
    font-weight: bold;
    margin-top:20px;/*chỉnh khoảng cách từ tên so với sản phẩm*/
  }


  .list-page {
    width: 50%;
    margin:0px auto;
  }

  .list-page {
    display: flex;
    list-style: none;
    justify-content: center;
    align-items: center;
  }
  .blog-container-inner .box-left{
    text-align: center;
    margin-top:15px;/*chỉnh lên xuống nút xem thêm */
      
      
  }
  .blog-container-inner .box-left button:hover {/*màu sắc khi nhấp vô nút buttom mua ngay*/
    background:orange;
  }

  .blog-container-inner .box-left button {/*nút buttom mua ngay*/
    font-size:13px;/*chỉnh size chữ*/
    width: 120px;/*chỉnh size dài bóng đen*/
    height: 35px;/*chỉnh size rộng bóng đen*/
    background:#1d1a1a;
    border:none;
    outline:none;
    color:#fff;
    font-weight: bold;
    border-radius: 200px;
    transition:0.4s;/*chỉnh tốc độ chuyển màu*/
  }


  /* ------------------------Banner 4------------------------------*/
  #banner4 {/* banner sale off*/
    width: 100%;
    background-image :url("/Web/images/saleoff2.jpg");
    background-size:cover;
    height: 113px;/*chỉnh size banner*/
    margin-top:-20px;
    margin-left:0px;
    display: flex;
    padding:0px 133px;
    position:relative;
  }
  #banner4 .box-left ,#banner .box-right {
    width: 50%;
  }

  #banner4 .box-left button {/*nút buttom mua ngay*/
    font-size:15px;/*chỉnh size chữ*/
    width: 190px;/*chỉnh size dài bóng đen*/
    height: 55px;/*chỉnh size rộng bóng đen*/
    margin-top:27px;/*chỉnh vị trí buttom lên xuống*/
    margin-left:670px;/*chỉnh vị trí buttom trái phải*/
    background:#1d1a1a;
    border:none;
    outline:none;
    color:#fff;
    font-weight: bold;
    border-radius: 200px;
    transition:0.4s;
  }
  #banner4 .box-left button:hover {/*màu sắc khi nhấp vô nút buttom mua ngay*/
      background:orange;
  }
  @media screen and  (max-width: 870px)  and (min-width:300px){
      body {
  width: 1600px;
      }

  }

.box-left button {
    background-color: #8B5E3B; /* Màu nâu trầm sang trọng */
    color: #fff; /* Màu chữ trắng */
    font-size: 16px; /* Cỡ chữ vừa phải */
    font-weight: bold; /* Chữ đậm */
    border: 2px solid #6D4C41; /* Viền nâu đậm hơn để tạo chiều sâu */
    border-radius: 8px; /* Bo tròn góc nhẹ */
    padding: 12px 24px; /* Tạo khoảng cách cho nút */
    cursor: pointer; /* Đổi con trỏ thành bàn tay khi hover */
    transition: all 0.3s ease-in-out; /* Hiệu ứng mượt */
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2); /* Đổ bóng nhẹ */
}

.box-left button:hover {
    background-color: #6D4C41; /* Màu tối hơn khi hover */
    color: #FFD700; /* Màu chữ vàng nhạt tạo điểm nhấn */
    border-color: #8B5E3B; /* Viền nổi bật hơn */
    transform: translateY(-3px); /* Nút nhô lên nhẹ */
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3); /* Tăng hiệu ứng bóng */
}




</style>


<?php require_once('Layout/footer.php'); ?>

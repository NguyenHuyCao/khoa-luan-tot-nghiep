
<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
// Lấy id từ trang index.php truyền sang rồi hiển thị nó
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'select product.*, collections.name as collection_name from product, collections where product.id_sanpham = collections.id and product.id=' . $id;
    $product = executeSingleResult($sql);
    // Kiểm tra nếu ko có id sp đó thì trả về index.php
    if ($product == null) {
        header('Location: index.php');
        die();
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
          <h2 class="page-title">SẢN PHẨM</h2>
          <p><a href="#">Trang chủ</a> | <a href="shop.php">Cửa hàng</a>  | Sản phẩm</p>
        </div>
      </div>
    </div>
  </div>
</section>
<main>
  <div class="container">
    <!-- END LAYOUT  -->
    <section class="main">
      <section class="order-container">
    <div class="product-images">
        <img src="<?= 'admin/product/'.$product['thumbnail'] ?>" alt="">
        <img src="<?= 'admin/product/'.$product['thumbnail_1'] ?>" alt="">
        <img src="<?= 'admin/product/'.$product['thumbnail_2'] ?>" alt="">
        <img src="<?= 'admin/product/'.$product['thumbnail_3'] ?>" alt="">
        <img src="<?= 'admin/product/'.$product['thumbnail_4'] ?>" alt="">
        <img src="<?= 'admin/product/'.$product['thumbnail_5'] ?>" alt="">
    </div>
    
    <div class="product-info">
        <h1><?= $product['title'] ?></h1>
        <p><?= $product['content'] ?></p>
        <p>Thương Hiệu: <span style="font-weight: 600; color:#FF6600"><?= $product['collection_name'] ?></span></p>
        
        <div class="number">
            <span class="number-buy">Số lượng</span>
            <input id="num" type="number" value="1" min="1" onchange="updatePrice()">
        </div>
        
        <p class="price">Giá: <span id="price"><?= number_format($product['price'], 0, ',', '.') ?></span> VNĐ</p>
        
        <?php 
        if(isset($_COOKIE['username'])) {
            echo '<button class="add-cart" onclick="addToCart(' . $id . ')"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                  <button class="buy-now" onclick="buyNow(' . $id . ')"><i class="fas fa-money-check"></i> Mua ngay</button>';
        } else {
            echo '<div class="wc-proceed-to-checkout">
                    <p class="return-to-shop">
                      <a class="button wc-backward" href="login.php">Đăng nhập để thêm giỏ hàng</a>
                    </p>
                  </div>';
        }
        ?>
    </div>
</section>

      <section class="restaurants">
          <div class="title">
              <h1>Các sản phẩm khác tại <span class="green" style="color: #0099FF;">LUXURY HOME</span></h1>
          </div>
          <div class="product-restaurants">
              <div class="row">
                  <?php
                  $sql = 'select * from product where number > 0';
                  $productList = executeResult($sql);
                  $index = 1;
                  foreach ($productList as $item) {
                      echo '
                          <div class="col">
                              <a href="single_product.php?id=' . $item['id'] . '">
                                  <img class="thumbnail" src="admin/product/' . $item['thumbnail'] . '" alt="">
                                  <div class="title">
                                      <p>' . $item['title'] . '</p>
                                  </div>
                                  <div class="price">
                                      <span>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
                                  </div>
                              </a>
                          </div>
                          ';
                  }
                  ?>
              </div>
          </div>
      </section>
    </section>
  </div>
</main>

<script>
  // function updatePrice() {
  //   var giaGoc = document.querySelector('.gia').innerText;
  //   var soLuong = document.querySelector('#num').value;
  //   var tongGia = giaGoc * soLuong;
  //   document.getElementById('price').innerHTML = tongGia.toLocaleString() + ' VNĐ';
  // }

  function addToCart(id) {
    var soLuong = document.querySelector('#num').value; // lấy số lượng từ ô nhập giá trị
    $.post('api/cookie.php', { // gửi yêu cầu ajax, sử dụng jquery .post() để gửi dữ liệu đến file cookie.php
      'action': 'add',
      'id': id,
      'num': soLuong
    }, function(data) {
      location.reload();
    });
  }

  function buyNow(id) {
    $.post('api/cookie.php', { // tương tự hàm addToCart nhưng tham số mặc định là 1
      'action': 'add',
      'id': id,
      'num': 1
    }, function(data) {
      location.assign("checkout_product.php");
    });
  }
</script>

<style>
  .order-container {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  max-width: 1000px;
  margin: 20px auto;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 8px;
  background: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.product-images {
  flex: 1;
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  padding: 10px;
}

.product-images img {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 5px;
  border: 1px solid #ddd;
}

.product-info {
  flex: 1;
  padding: 20px;
  border-left: 1px solid #ddd;
}

.product-info p {
  margin: 10px 0;
}

.number input {
  width: 60px;
  padding: 5px;
  text-align: center;
}

.price {
  font-size: 18px;
  font-weight: bold;
  color: #d9534f;
}

.add-cart, .buy-now {
  display: block;
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  text-align: center;
  background-color: #FF6600;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}

.add-cart:hover, .buy-now:hover {
  background-color: #e65c00;
}

.wc-proceed-to-checkout {
  text-align: center;
  margin-top: 20px;
}

.wc-proceed-to-checkout a {
  display: inline-block;
  padding: 10px 15px;
  background-color: #007bff;
  color: white;
  text-decoration: none;
  border-radius: 5px;
}

.wc-proceed-to-checkout a:hover {
  background-color: #0056b3;
}

</style>

<?php require_once('Layout/footer.php'); ?>
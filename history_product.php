<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
require_once('utils/utility.php');
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
          <h2 class="page-title">LỊCH SỬ ĐƠN HÀNG</h2>
          <p><a href="#">Trang chủ</a> | Lịch sử đơn hàng</p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="shopping-cart-area s-cart-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="s-cart-all">
          <div class="cart-form table-responsive">
            <?php
              if(!isset($_COOKIE['username'])){
                echo '<p style="font-weight: bold; text-align: center; font-size: 16px;">Vui lòng đăng nhập trước khi truy cập lịch sử đơn hàng.</p>
                <hr class="opacity-20">
                <div class="row">
                  <div class="second-all-class">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="wc-proceed-to-checkout" style="text-align: center;">
                        <p class="return-to-shop">
                          <a class="button wc-backward" href="login.php">Đăng nhập để tiếp tục</a>
                        </p>
                          
                    </div>
                  </div>
                </div>
              </div>
                </div>
              </div>
            <div>
          </div>
        </div>
      </div>
    </div>
  </div>   ';
              } else {
          ?>
          <form class="status-filter-form" method="GET" action="">
            <label for="status-filter"><strong>Lọc theo trạng thái:</strong></label>
            <select name="status" id="status-filter" class="status-select" onchange="this.form.submit()">
              <option value="">Tất cả</option>
              <option value="Tiếp nhận" <?php if(isset($_GET['status']) && $_GET['status'] == 'Tiếp nhận') echo 'selected'; ?>>Tiếp nhận</option>
              <option value="Đang giao" <?php if(isset($_GET['status']) && $_GET['status'] == 'Đang giao') echo 'selected'; ?>>Đang giao</option>
              <option value="Đã nhận hàng" <?php if(isset($_GET['status']) && $_GET['status'] == 'Đã nhận hàng') echo 'selected'; ?>>Đã nhận hàng</option>
              <option value="Đã hủy" <?php if(isset($_GET['status']) && $_GET['status'] == 'Đã hủy') echo 'selected'; ?>>Đã hủy</option>
            </select>
          </form>

          <table id="shopping-cart-table" class="data-table cart-table">
            <tr>
              <th class="low8">STT</th>
              <th class="low1">Ảnh Sản Phẩm</th>
              <th class="low1">Tên Sản Phẩm</th>
              <th class="low7">Giá</th>
              <th class="low7">Số Lượng</th>
              <th class="low7">Tổng Tiền</th>
              <th class="low7">Trạng Thái</th>
            </tr>
            <tr>
            <?php 
            if (isset($_COOKIE['username'])) {
              $username = $_COOKIE['username'];

              $sql = "SELECT * FROM user WHERE username = '$username'";
              $user = executeResult($sql); // in ra 1 dòng 
              foreach ($user as $item) {
                $userId = $item['id_user'];
              }
              $statusFilter = isset($_GET['status']) ? $_GET['status'] : ''; // test
              $sql = "SELECT * from order_details, product 
                      where product.id=order_details.product_id 
                      AND order_details.id_user = '$userId'";

              if (!empty($statusFilter)) {
                $sql .= " AND order_details.status = '$statusFilter'";
              }

              $sql .= " ORDER BY order_id DESC";
              
              $order_details_List = executeResult($sql);
              $total = 0;
              $count = 0;
              
              foreach ($order_details_List as $item) {
                echo '
                <tr style="text-align: center;">
                  <td width="50px">' . (++$count) . '</td>
                  <td class="sop-cart an-shop-cart">
                      <a><img src="admin/product/' . $item['thumbnail'] . '" alt=""></a>
                  </td>
                  <td class="sop-cart an-shop-cart">
                      <a style="font-weight:600;">' . $item['title'] . '</a>
                  </td>
                  <td class="b-500 red">
                    <span class="gia none">' . number_format($item['price'], 0, ',', '.') . '</span>
                    <span> VNĐ</span>
                  </td>
                  <td class="sop-cart an-sh">
                    <div class="quantity ray">
                      ' . $item['num'] . '
                    </div>
                  </td>
                  <td class="b-500 red" style="color:#CC0033; font-weight:600;">
                    ' . number_format($item['num'] * $item['price'], 0, ',', '.') . '
                    <span> VNĐ</span>
                  </td>
                  <td style="color:green; font-weight:600;">
                    ' . $item['status'] . '
                  </td>
                </tr>
                ';
                }
            }
            ?>
            </tr>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
     }
?>
		<!-- shopping-cart  content section end -->
    <script>
    function addToCart(button) {
    var itemId = button.getAttribute('data-item-id');
    var num = document.getElementById(itemId + '_num').value;

    $.post('api/cookie.php', {
        'action': 'update',
        'id': itemId.split('_')[1],
        'num': num
    }, function (data) {
        location.reload();
    });
}
function updatePrice(itemId, itemPrice) {
  // Kiểm tra nếu giá trị nhập vào không phải là số hoặc là số nguyên âm
  var priceId = itemId + '_price';
  var num = document.getElementById(itemId + '_num').value;
  if (isNaN(num) || num <= 0) {
    // Nếu không hợp lệ, đặt giá trị mặc định là 1
    numInput.value = 1;
    num = 1;
  }
  var tong = itemPrice * num; // Tính tổng giá trị mới của sản phẩm
  document.getElementById(priceId).innerHTML = tong.toLocaleString();
  updateGrandTotal(); // Gọi hàm cập nhật tổng giá trị mới của đơn hàng
}


function updateGrandTotal() {
  var grandTotal = 0;
  var itemPrices = document.querySelectorAll('.gia.none');
  var itemQuantities = document.querySelectorAll('.input-text.qty.text');
  for (var i = 0; i < itemPrices.length; i++) {
    var price = itemPrices[i].innerText.match(/\d/g).join("");
    var quantity = itemQuantities[i].value;
    grandTotal += price * quantity;
  }
  document.querySelector('.order-total .amount').innerText = grandTotal.toLocaleString();
}
</script>
<hr class="opacity-20">
<hr class="opacity-20">

<style>
  .status-filter-form {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
}

.status-filter-form label {
  font-size: 16px;
  color: #333;
}

.status-filter-form .status-select {
  padding: 5px 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: #fff;
  color: #333;
  outline: none;
  cursor: pointer;
  transition: border-color 0.3s;
}

.status-filter-form .status-select:focus {
  border-color: #4a90e2;
}

</style>
<?php require_once('Layout/footer.php'); ?>
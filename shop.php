<?php require_once('database/config.php');
require_once('database/dbhelper.php'); ?>
<?php include("Layout/header.php"); ?>

<section class="contact-img-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="con-text">
          <h2 class="page-title">CỬA HÀNG</h2>
          <p><a href="#">Trang chủ</a> | Cửa hàng</p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <section class="main">
    <?php
    $id_category = isset($_GET['id_category']) ? (int)$_GET['id_category'] : 0;
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
    $max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : 0;
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    ?>
    
    <form method="GET" action="">
      <div class="filter-sort">
        <div class="filter-box">
          <input type="hidden" name="id_category" value="<?php echo $id_category; ?>">
          <input type="number" name="min_price" placeholder="Giá tối thiểu" min="0" value="<?php echo $min_price; ?>">
          <input type="number" name="max_price" placeholder="Giá tối đa" min="0" value="<?php echo $max_price; ?>">
          <select name="sort">
            <option value="">Sắp xếp</option>
            <option value="price_asc" <?php echo ($sort == 'price_asc') ? 'selected' : ''; ?>>Giá thấp đến cao</option>
            <option value="price_desc" <?php echo ($sort == 'price_desc') ? 'selected' : ''; ?>>Giá cao đến thấp</option>
          </select>
          <button type="submit">Lọc</button>
        </div>
        <div class="search-box">
          <input type="text" name="search" placeholder="🔍 Tìm kiếm sản phẩm..." value="<?php echo htmlspecialchars($search); ?>">
          <button type="submit">Tìm kiếm</button>
        </div>
      </div>
    </form>
    
    <section class="recently">
      <div class="title">
        <?php
        $sql = "SELECT name FROM category WHERE id=$id_category";
        $name = executeResult($sql);
        if (!empty($name)) {
          echo '<h1>' . htmlspecialchars($name[0]['name']) . '</h1>';
        }
        ?>
      </div>
      <div class="product-recently">
        <div class="row">
          <?php
          $sql = "SELECT * FROM product WHERE number > 0";
          
          if ($id_category > 0) {
            $sql .= " AND id_category=$id_category";
          }
          if (!empty($search)) {
            $sql .= " AND title LIKE '%" . addslashes($search) . "%'";
          }
          if ($min_price > 0 && $max_price > $min_price) {
            $sql .= " AND price BETWEEN $min_price AND $max_price";
          }
          
          switch ($sort) {
            case 'price_asc':
              $sql .= " ORDER BY price ASC";
              break;
            case 'price_desc':
              $sql .= " ORDER BY price DESC";
              break;
          }
          
          $productList = executeResult($sql);
          if (!empty($productList)) {
            foreach ($productList as $item) {
              echo '<div class="col">
                      <a href="single_product.php?id=' . $item['id'] . '">
                        <img class="thumbnail" src="admin/product/' . htmlspecialchars($item['thumbnail']) . '" alt="">
                        <div class="title">
                          <p>' . htmlspecialchars($item['title']) . '</p>
                        </div>
                        <div class="price">
                          <span>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
                        </div>
                      </a>
                    </div>';
            }
          } else {
            echo '<p>Không tìm thấy sản phẩm nào.</p>';
          }
          ?>
        </div>
      </div>
    </section>
  </section>
</div>

<style>
/* Định dạng tổng thể cho bộ lọc và tìm kiếm */
.filter-sort {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 20px;
    padding: 15px;
    background: #f4f4f4;
    border-radius: 10px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
}

/* Bộ lọc giá và sắp xếp */
.filter-box {
    display: flex;
    gap: 10px;
    align-items: center;
}
.filter-box input, .filter-box select, .filter-box button {
    padding: 10px 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}
.filter-box button {
    background-color: #007BFF;
    color: white;
    cursor: pointer;
    transition: 0.3s;
}
.filter-box button:hover {
    background-color: #0056b3;
}

/* Ô tìm kiếm đặt riêng bên phải */
.search-box {
    flex: 1;
    display: flex;
    justify-content: flex-end;
}
.search-box input {
    width: 250px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    background: #fff url('search-icon.png') no-repeat 10px center;
    background-size: 18px;
    padding-left: 35px;
}
.search-box input:focus {
    border-color: #007BFF;
    outline: none;
}


</style>

<?php require_once('Layout/footer.php'); ?>
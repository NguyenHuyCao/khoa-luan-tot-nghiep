<?php 
    session_start();
	if(!isset($_COOKIE['tendangnhap_admin'])){
		header('Location: login.php');
	}
 ?>

<?php 
use function PHPSTORM_META\type;
require_once('database/dbhelper.php'); 
?>
<?php
header("content-type:text/html; charset=UTF-8");
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật đơn hàng</title>
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo1.png">
  <link rel="stylesheet" href="./style.css">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScrseipt -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="../script.js"></script>
</head>
<!-- bytewebster.com -->
<!-- bytewebster.com -->
<!-- bytewebster.com -->
<body>
<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                <h3 class="text-success"><img src="/Web/images/logo1.png" width="40" ><span class="text-info">LUXURY</span>HOME</h3> 
            </a>
            
            <!-- Divider -->
            <hr class="navbar-divider my-18 opacity-20">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="bi bi-speedometer2"></i> Quản lý Liên Hệ
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="product/index.php">
                            <i class="bi bi-bag-heart"></i>Quản Lý Sản Phẩm
                        </a>
                    </li>
                    <!-- Divider -->
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="user/index.php">
                            <i class="bi bi-person-check"></i>Quản Lý Khách Hàng
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="order.php">
                            <i class="bi bi-cash-stack"></i>Quản Lý Đơn Hàng
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="category/index.php">
                            <i class="bi bi-bag-heart"></i>Quản Lý Danh Mục
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="collection/index.php">
                            <i class="bi bi-collection"></i>Quản Lý Thương Hiệu
                        </a>
                    </li>
                    
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-18 opacity-20">
        
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">
                            <i class="bi bi-house-heart-fill"></i></i> Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/login.php" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?')">
                            <i class="bi bi-box-arrow-left"></i> Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-4 ls-tight">
                                QUẢN LÝ ĐƠN HÀNG
                                <!-- <img src="/Web/images/logo1.png" width="60"> Luxury Home -->
                            </h1>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <div class="row g-6 mb-6">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Sản Phẩm</span>
                                        
                                        <span class="h3 font-bold mb-0">
                                            <?php
                                        $sql = "SELECT * FROM `product`";
                                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                        $result = mysqli_query($conn, $sql);
                                        echo '<span>' . mysqli_num_rows($result) . '</span>';
                                        ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                            <i class="bi bi-credit-card"></i>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Khách Hàng</span>
                                        <span class="h3 font-bold mb-0">
                                            <?php
                                            $sql = "SELECT * FROM `user`";
                                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                            $result = mysqli_query($conn, $sql);
                                            echo '<span>' . mysqli_num_rows($result) . '</span>';
                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                            <i class="bi bi-people"></i>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Đơn Hàng</span>
                                        <span class="h3 font-bold mb-0">
                                            <?php
                                            $sql = "SELECT * FROM `order_details`";
                                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                            $result = mysqli_query($conn, $sql);
                                            echo '<span>' . mysqli_num_rows($result) . '</span>';
                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                            <i class="bi bi-clock-history"></i>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Danh Mục</span>
                                        <span class="h3 font-bold mb-0">
                                            <?php
                                            $sql = "SELECT * FROM `category`";
                                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                            $result = mysqli_query($conn, $sql);
                                            echo '<span>' . mysqli_num_rows($result) . '</span>';
                                            ?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                            <i class="bi bi-minecart-loaded"></i>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-0 mb-7" style="padding: 20px">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">CẬP NHẬT TRẠNG THÁI ĐƠN HÀNG</h5>
                    </div>
                    <div class="table-responsive">
                        <form action="" method="POST">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Số Thứ Tự</th>
                                        <th scope="col">Tên Khách Hàng</th>
                                        <th scope="col">Tên Sản Phẩm</th>
                                        <th scope="col">Số Lượng</th>
                                        <th scope="col">Đơn Giá</th>
                                        <th scope="col">Địa Chỉ</th>
                                        <th scope="col">Số Điện Thoại</th>
                                        <th scope="col">Trạng Thái</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <?php
                                            try {
                                                if (isset($_GET['order_id'])) {
                                                    $order_id = $_GET['order_id'];
                                                }
                                                $index = 0;
                                                // $sql = "SELECT * from orders, order_details, product
                                                // where order_details.order_id=orders.id and product.id=order_details.product_id and order_id=$order_id";

                                                $sql = "SELECT order_details.id as detail_id, orders.id as order_id, fullname, title, num, order_details.price as price, address, phone_number, order_details.status 
                                                        FROM orders, order_details, product
                                                        WHERE order_details.order_id=orders.id AND product.id=order_details.product_id AND order_details.order_id=$order_id";
                                                $order_details_List = executeResult($sql);
                                                foreach ($order_details_List as $item) {
                                                    echo '  <tr>
                                                                <td class="text-heading font-semibold">' . (++$index) . '</td>
                                                                <td class="text-heading font-semibold">' . $item['fullname'] . '</td>
                                                                <td class="text-heading font-semibold">' . $item['title'] . '</td>
                                                                <td class="text-heading font-semibold">' . $item['num'] . '</td>
                                                                <td class="text-heading font-semibold">' . number_format($item['price'], 0, ',', '.') . ' VNĐ</td>
                                                                <td class="text-heading font-semibold">' . $item['address'] . '</td>
                                                                <td class="text-heading font-semibold">' . $item['phone_number'] . '</td>
                                                                <td>
                                                                    <select class="border border-4 text-heading font-semibold" name="status[' . $item['detail_id'] . ']" id="status_' . $item['detail_id'] . '">
                                                                        <option value="Tiếp nhận" ' . ($item['status'] == 'Tiếp nhận' ? 'selected' : '') . '>Tiếp nhận</option>
                                                                        <option value="Đang giao" ' . ($item['status'] == 'Đang giao' ? 'selected' : '') . '>Đang giao</option>
                                                                        <option value="Đã nhận hàng" ' . ($item['status'] == 'Đã nhận hàng' ? 'selected' : '') . '>Đã nhận hàng</option>
                                                                        <option value="Đã hủy" ' . ($item['status'] == 'Đã hủy' ? 'selected' : '') . '>Đã hủy</option>
                                                                    </select>
                                                                </td>
                                                            </tr>';
                                                }
                                            } catch (Exception $e) {
                                                die("Lỗi thực thi sql: " . $e->getMessage());
                                            }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-success" style="margin-top: 20px">Lưu</button>
                            <a href="order.php" class="btn btn-warning" style="margin-top: 20px">Quay lại</a>
                        </form>
                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['status'])) {
                                // Lấy số trang hiện tại (giữ nguyên khi reload trang)
                                $pg = isset($_GET['page']) ? $_GET['page'] : 1;
                                $statusArray = $_POST['status'];
                                $errors = array();
                                
                                // Kiểm tra logic chuyển trạng thái cho từng chi tiết đơn hàng
                                foreach ($statusArray as $detail_id => $new_status) {
                                    // Lấy trạng thái hiện tại của chi tiết đơn hàng từ database
                                    $sql_get = "SELECT status FROM order_details WHERE id = $detail_id";
                                    $current = executeSingleResult($sql_get);
                                    if ($current != null) {
                                        $current_status = trim($current['status']);
                                        // Nếu trạng thái hiện tại là "Tiếp nhận", không cho phép chuyển trực tiếp sang "Đã nhận hàng"
                                        if ($current_status == "Tiếp nhận" && $new_status == "Đã nhận hàng") {
                                            $errors[] = "Không thể chuyển trực tiếp từ 'Tiếp nhận' sang 'Đã nhận hàng'!";
                                        }
                                        // Nếu trạng thái hiện tại là "Đang giao", không cho phép chuyển ngược lại về "Tiếp nhận"
                                        elseif ($current_status == "Đang giao" && $new_status == "Tiếp nhận") {
                                            $errors[] = "Không thể chuyển trạng thái ngược từ 'Đang giao' sang 'Tiếp nhận'!";
                                        }
                                        elseif ($current_status == "Đã nhận hàng" && $new_status == "Tiếp nhận") {
                                            $errors[] = "Không thể chuyển trạng thái ngược từ 'Đã nhận hàng' sang 'Tiếp nhận'!";
                                        }
                                        elseif ($current_status == "Đã nhận hàng" && $new_status == "Đang giao") {
                                            $errors[] = "Không thể chuyển trạng thái ngược từ 'Đã nhận hàng' sang 'Đang giao'!";
                                        }
                                    } else {
                                        $errors[] = "Không tìm thấy chi tiết đơn hàng có ID: $detail_id";
                                    }
                                }
                                
                                // Nếu có lỗi, hiển thị thông báo và dừng cập nhật
                                if (!empty($errors)) {
                                    $error_message = implode("\n", $errors);
                                    echo '<script>
                                    Swal.fire({
                                       title: "Cập nhật thất bại",
                                       text: "' . addslashes($error_message) . '",
                                       icon: "error",
                                       confirmButtonText: "OK"
                                    }).then((result) => {
                                       window.location="order.php?page=' . $pg . '";
                                    });
                                    </script>';
                                    exit;
                                }
                                
                                // Nếu không có lỗi, thực hiện cập nhật trạng thái cho từng chi tiết đơn hàng
                                foreach ($statusArray as $detail_id => $new_status) {
                                    $sql_update = "UPDATE order_details SET status = '$new_status' WHERE id = $detail_id";
                                    execute($sql_update);
                                }
                                
                                echo '<script>
                                Swal.fire({
                                   title: "Cập nhật thành công!",
                                   icon: "success",
                                   confirmButtonText: "OK"
                                }).then((result) => {
                                   window.location = "order.php?page=' . $pg . '";
                                });
                                </script>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>

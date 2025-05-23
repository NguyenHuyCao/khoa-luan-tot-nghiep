<?php 
  session_start();
	if(!isset($_COOKIE['tendangnhap_admin'])){
		header('Location: login.php');
	}
 ?>
<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php
require_once('../database/dbhelper.php');
$id = $name = '';
$errors=[];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $id = $_POST['id'] ?? '';

    // Loại bỏ khoảng trắng thừa
    $name = trim(preg_replace('/\s+/', ' ', $name));

    // Validate tên danh mục
    if (empty($name)) {
        $errors['name'] = 'Tên danh mục không được để trống!';
    } elseif (preg_match('/[!@#$%^&*(),.?":{}|<>]/', $name)) {
        $errors['name'] = 'Tên danh mục không được chứa ký tự đặc biệt!';
    }

    // Kiểm tra trùng lặp nếu không có lỗi validate cơ bản
    if (empty($errors)) {
        if ($id == '') {
            // Thêm mới: kiểm tra toàn bộ bảng
            $sql_check = "SELECT * FROM category WHERE name = '" . $name . "'";
        } else {
            // Sửa: kiểm tra các danh mục khác
            $sql_check = "SELECT * FROM category WHERE name = '" . $name . "' AND id <> " . $id;
        }
        $existing = executeSingleResult($sql_check);
        if ($existing != null) {
            $errors['name'] = 'Tên danh mục đã tồn tại!';
        }
    }

    // Nếu không có lỗi, lưu vào database
    if (empty($errors)) {
        $created_at = $updated_at = date('Y-m-d H:i:s');
        if ($id == '') {
            // Thêm danh mục
            $sql = 'INSERT INTO category(name, created_at, updated_at) 
                    VALUES ("' . $name . '", "' . $created_at . '", "' . $updated_at . '")';
        } else {
            // Sửa danh mục
            $sql = 'UPDATE category SET name = "' . $name . '", updated_at = "' . $updated_at . '" WHERE id = ' . $id;
        }
        execute($sql);
        $_SESSION['success'] = true;
        header('Location: index.php');
        exit();
    }
}

// Lấy thông tin danh mục nếu chỉnh sửa
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'SELECT * FROM category WHERE id = ' . $id;
    $category = executeSingleResult($sql);
    if ($category != null) {
        $name = $category['name'];
    }
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa Danh Mục Sản Phẩm</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="icon" type="image/png" href="../../images/logo1.png">
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
                <h3 class="text-success"><img src="/Web/images/logo1.png" width="40" ><span class="text-info">LUXURY</span>hOME</h3> 
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Hồ sơ</a>
                        <a href="#" class="dropdown-item">Cài đặt</a>
                        <a href="#" class="dropdown-item">Hoá đơn</a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">Đăng xuất</a>
                    </div>
                </div>
            </div>
            <!-- Divider -->
            <hr class="navbar-divider my-18 opacity-20">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">
                            <i class="bi bi-speedometer2"></i> Quản lý Liên Hệ
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../product/index.php">
                            <i class="bi bi-bag-heart"></i>Quản Lý Sản Phẩm
                        </a>
                    </li>
                    <!-- Divider -->
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../user/index.php">
                            <i class="bi bi-person-check"></i>Quản Lý Khách Hàng
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../order.php">
                            <i class="bi bi-cash-stack"></i>Quản Lý Đơn Hàng
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../category/index.php">
                            <i class="bi bi-bag-heart"></i>Quản Lý Danh Mục
                        </a>
                    </li>
                    <hr class="navbar-divider my-3 opacity-20">
                    <li class="nav-item">
                        <a class="nav-link" href="../collection/index.php">
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
                        <a class="nav-link" href="../../index.php">
                            <i class="bi bi-house-heart-fill"></i></i> Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../admin/login.php" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?')">
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
                                QUẢN LÝ DANH MỤC
                                <!-- <img src="/Web/images/logo1.png" width="60"> Luxury Home -->
                            </h1>
                        </div>
                        <!-- Actions -->
                        
                    </div>
                
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
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
                    <div class="card-header">
                        <h5 class="mb-0">DANH MỤC SẢN PHẨM</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                        <div class="panel-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="name">Tên Danh Mục:</label>
                                    <input type="text" id="id" name="id" value="<?= $id ?>" hidden='true'>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($name) ?>">
                                    <?php if (isset($errors['name'])): ?>
                                        <span style="color: red;"><?= $errors['name'] ?></span>
                                    <?php endif; ?>
                                </div>
                                <hr class="navbar-divider my-3 opacity-20">
                                <button type="submit" class="btn btn-success" onclick="return addCategory()">Lưu</button>
                                <?php
                                $previous = "javascript:history.go(-1)";
                                if (isset($_SERVER['HTTP_REFERER'])) {
                                    $previous = $_SERVER['HTTP_REFERER'];
                                }
                                ?>
                                <a href="<?= $previous ?>" class="btn btn-warning">Quay lại</a>
                            </form>
                        </div>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
    <script type="text/javascript">
        function addCategory()
        {
            return confirm('Bạn có chắc chắn muốn lưu danh mục này không?');
        }
    </script>
  
</body>
</html>

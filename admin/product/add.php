<?php
header("content-type:text/html; charset=UTF-8");
require_once('../database/dbhelper.php');

session_start(); // Bắt đầu session

$id = $title = $price = $number = $thumbnail = $content = $id_category = $id_sanpham = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'select * from product where id=' . $id;
    $product = executeSingleResult($sql);
    if ($product != null) {
        $title = $product['title'];
        $price = $product['price'];
        $number = $product['number'];
        $thumbnail = $product['thumbnail'];
        $thumbnail_1 = $product['thumbnail_1'];
		$thumbnail_2 = $product['thumbnail_2'];
		$thumbnail_3 = $product['thumbnail_3'];
		$thumbnail_4 = $product['thumbnail_4'];
		$thumbnail_5 = $product['thumbnail_5'];
        $content = $product['content'];
        $id_category = $product['id_category'];
        $id_sanpham = $product['id_sanpham'];
        $created_at = $product['created_at'];
        $updated_at = $product['updated_at'];
    }
}

$errors = []; // mảng lưu trữ lỗi validate
//kiểm tra from nếu được submit
if ($_SERVER['REQUEST_METHOD']==='POST') {
    // lấy dữ liệu từ post
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $price = isset($_POST['price']) ? trim($_POST['price']) : '';
    $number = isset($_POST['number']) ? trim($_POST['number']) : '';
    $id_category = isset($_POST['id_category']) ? $_POST['id_category'] : '';
    $id_sanpham = isset($_POST['id_sanpham']) ? $_POST['id_sanpham'] : '';
    $content = isset($_POST['content']) ? trim($_POST['content']) : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    
    // Validate tên sản phẩm
    if (empty($title)) {
        $errors['title'] = "Tên sản phẩm không được để trống.";
    } else
    {if (preg_match('/[!@#$%^&*(),.?":{}|<>]/', $title)) {
        $errors['title'] = "Tên sản phẩm không được chứa ký tự đặc biệt.";
    }if (strlen($title) > 200) {
        $errors['title'] = "Tên sản phẩm không được quá 200 ký tự.";
    }
    }

    //validate giá sản phẩm
    $price = str_replace(' ', '', $price);
    $price = str_replace(',', '', $price);
    $price = str_replace('.', '', $price);
    if (empty($price) || !is_numeric($price) || $price < 0) {
        $errors['price'] = 'Giá sản phẩm phải là số dương và không được bỏ trống.';
    }

    // Validate số lượng sản phẩm
    if (!is_numeric($number) || $number < 0) {
        $errors['number'] = "Số lượng sản phẩm không được âm.";
    }

    if (empty($id_category)) {
        $errors['id_category'] = 'Vui lòng chọn danh mục.';
    }
    if (empty($id_sanpham)) {
        $errors['id_sanpham'] = 'Vui lòng chọn thương hiệu/bộ sưu tập.';
    }

    // Kiểm tra trùng lặp tên sản phẩm
    if ($id == '') {
        // Trường hợp thêm mới: kiểm tra toàn bộ bảng
        $sql_check = "SELECT * FROM product WHERE title = '" . $title . "'";
    } else {
        // Trường hợp sửa: kiểm tra các sản phẩm khác
        $sql_check = "SELECT * FROM product WHERE title = '" . $title . "' AND id <> " . $id;
    }
    $existing = executeSingleResult($sql_check);
    if ($existing != null) {
        $errors['title'] = "Tên sản phẩm đã tồn tại.";
    }

    if (empty($errors)){
// XỬ LÝ UPLOAD ẢNH
    // Xử lý thumbnail
    if (isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]['error'] == 0 && $_FILES["thumbnail"]["size"] > 0) {
        $target_dir = "uploads/"; //thư mục lưu ảnh được upload
        $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]); //vị trí file lưu tạm trong server
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION); //lấy phần mở rộng của file (jpg, png, ...)
        $maxfilesize = 800000; //cỡ ảnh lớn nhất
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif'); ///những loại file được phép upload

        $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
        if ($check === false) {
            echo "Không phải file ảnh.";
            die();
        }
        if ($_FILES["thumbnail"]["size"] > $maxfilesize) {
            echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
            die();
        }
        if (!in_array($imageFileType, $allowtypes)) {
            echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
            die();
        }
        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
            $thumbnail = $target_file;
        } else {
            echo "Có lỗi xảy ra khi upload file.";
            die();
        }
    }
    // Nếu không có ảnh mới, $thumbnail giữ nguyên giá trị cũ từ $product['thumbnail']

    // Xử lý thumbnail_1
    if (isset($_FILES["thumbnail_1"]) && $_FILES["thumbnail_1"]['error'] == 0 && $_FILES["thumbnail_1"]["size"] > 0) {
        $target_dir_1 = "uploads/";
        $target_file_1 = $target_dir_1 . basename($_FILES["thumbnail_1"]["name"]);
        $imageFileType_1 = pathinfo($target_file_1, PATHINFO_EXTENSION);
        $maxfilesize = 800000;
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');

        $check_1 = getimagesize($_FILES["thumbnail_1"]["tmp_name"]);
        if ($check_1 === false) {
            echo "Không phải file ảnh.";
            die();
        }
        if ($_FILES["thumbnail_1"]["size"] > $maxfilesize) {
            echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
            die();
        }
        if (!in_array($imageFileType_1, $allowtypes)) {
            echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
            die();
        }
        if (move_uploaded_file($_FILES["thumbnail_1"]["tmp_name"], $target_file_1)) {
            $thumbnail_1 = $target_file_1;
        } else {
            echo "Có lỗi xảy ra khi upload file.";
            die();
        }
    }
    
    // Xử lý thumbnail_2
    if (isset($_FILES["thumbnail_2"]) && $_FILES["thumbnail_2"]['error'] == 0 && $_FILES["thumbnail_2"]["size"] > 0) {
        $target_dir_2 = "uploads/";
        $target_file_2 = $target_dir_2 . basename($_FILES["thumbnail_2"]["name"]);
        $imageFileType_2 = pathinfo($target_file_2, PATHINFO_EXTENSION);
        $maxfilesize = 800000;
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');

        $check_2 = getimagesize($_FILES["thumbnail_2"]["tmp_name"]);
        if ($check_2 === false) {
            echo "Không phải file ảnh.";
            die();
        }
        if ($_FILES["thumbnail_2"]["size"] > $maxfilesize) {
            echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
            die();
        }
        if (!in_array($imageFileType_2, $allowtypes)) {
            echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
            die();
        }
        if (move_uploaded_file($_FILES["thumbnail_2"]["tmp_name"], $target_file_2)) {
            $thumbnail_2 = $target_file_2;
        } else {
            echo "Có lỗi xảy ra khi upload file.";
            die();
        }
    }

    // Xử lý thumbnail_3
    if (isset($_FILES["thumbnail_3"]) && $_FILES["thumbnail_3"]['error'] == 0 && $_FILES["thumbnail_3"]["size"] > 0) {
        $target_dir_3 = "uploads/";
        $target_file_3 = $target_dir_3 . basename($_FILES["thumbnail_3"]["name"]);
        $imageFileType_3 = pathinfo($target_file_3, PATHINFO_EXTENSION);
        $maxfilesize = 800000;
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');

        $check_3 = getimagesize($_FILES["thumbnail_3"]["tmp_name"]);
        if ($check_3 === false) {
            echo "Không phải file ảnh.";
            die();
        }
        if ($_FILES["thumbnail_3"]["size"] > $maxfilesize) {
            echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
            die();
        }
        if (!in_array($imageFileType_3, $allowtypes)) {
            echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
            die();
        }
        if (move_uploaded_file($_FILES["thumbnail_3"]["tmp_name"], $target_file_3)) {
            $thumbnail_3 = $target_file_3;
        } else {
            echo "Có lỗi xảy ra khi upload file.";
            die();
        }
    }

    // Xử lý thumbnail_4
    if (isset($_FILES["thumbnail_4"]) && $_FILES["thumbnail_4"]['error'] == 0 && $_FILES["thumbnail_4"]["size"] > 0) {
        $target_dir_4 = "uploads/";
        $target_file_4 = $target_dir_4 . basename($_FILES["thumbnail_4"]["name"]);
        $imageFileType_4 = pathinfo($target_file_4, PATHINFO_EXTENSION);
        $maxfilesize = 800000;
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');

        $check_4 = getimagesize($_FILES["thumbnail_4"]["tmp_name"]);
        if ($check_4 === false) {
            echo "Không phải file ảnh.";
            die();
        }
        if ($_FILES["thumbnail_4"]["size"] > $maxfilesize) {
            echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
            die();
        }
        if (!in_array($imageFileType_4, $allowtypes)) {
            echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
            die();
        }
        if (move_uploaded_file($_FILES["thumbnail_4"]["tmp_name"], $target_file_4)) {
            $thumbnail_4 = $target_file_4;
        } else {
            echo "Có lỗi xảy ra khi upload file.";
            die();
        }
    }

    // Xử lý thumbnail_5
    if (isset($_FILES["thumbnail_5"]) && $_FILES["thumbnail_5"]['error'] == 0 && $_FILES["thumbnail_5"]["size"] > 0) {
        $target_dir_5 = "uploads/";
        $target_file_5 = $target_dir_5 . basename($_FILES["thumbnail_5"]["name"]);
        $imageFileType_5 = pathinfo($target_file_5, PATHINFO_EXTENSION);
        $maxfilesize = 800000;
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');

        $check_5 = getimagesize($_FILES["thumbnail_5"]["tmp_name"]);
        if ($check_5 === false) {
            echo "Không phải file ảnh.";
            die();
        }
        if ($_FILES["thumbnail_5"]["size"] > $maxfilesize) {
            echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
            die();
        }
        if (!in_array($imageFileType_5, $allowtypes)) {
            echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
            die();
        }
        if (move_uploaded_file($_FILES["thumbnail_5"]["tmp_name"], $target_file_5)) {
            $thumbnail_5 = $target_file_5;
        } else {
            echo "Có lỗi xảy ra khi upload file.";
            die();
        }
    }
    $created_at = $updated_at = date('Y-m-d H:s:i');
    // Lưu vào DB
    if ($id == '') {
        // Thêm sản phẩm
        $sql = 'insert into product(title, price, number, thumbnail, thumbnail_1, thumbnail_2, thumbnail_3, thumbnail_4, thumbnail_5, content, id_category, id_sanpham, created_at, updated_at) 
        values ("' . $title . '","' . $price . '","' . $number . '","' . $thumbnail . '","' . $thumbnail_1 . '","' . $thumbnail_2 . '","' . $thumbnail_3 . '","' . $thumbnail_4 . '","' . $thumbnail_5 . '","' . $content . '","' . $id_category . '","' . $id_sanpham . '","' . $created_at . '","' . $updated_at . '")';
    } else {
        // Sửa sản phẩm
        $sql = 'update product set title="' . $title . '",price="' . $price . '",number="' . $number . '",thumbnail="' . $thumbnail . '",thumbnail_1="' . $thumbnail_1 . '",thumbnail_2="' . $thumbnail_2 . '",thumbnail_3="' . $thumbnail_3 . '",thumbnail_4="' . $thumbnail_4 . '",thumbnail_5="' . $thumbnail_5 . '",content="' . $content . '",id_category="' . $id_category . '",id_sanpham="' . $id_sanpham . '", updated_at="' . $updated_at . '" where id=' . $id;
    }
    execute($sql);
    $_SESSION['success'] = true;
    header('Location: index.php');
    exit();
}}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm/Sửa Sản Phẩm</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="icon" type="image/png" href="../../images/logo1.png">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- summernote -->
  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="script.js"></script>
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
                <h3 class="text-success"><img src="/Web/images/logo1.png" width="40" ><span class="text-info">LUXURY</span>HOME</h3> 
            </a>
            
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
                                QUẢN LÝ SẢN PHẨM
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
                        <h5 class="mb-0" style="font-weight: bold; font-size: 20px; text-transform: uppercase; margin-top: 20px; margin-bottom: 10px">Thêm/Sửa Sản Phẩm</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                        <div class="panel-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group" style="margin-top: 10px" >
                                    <label for="title">Tên Sản Phẩm:</label>
                                    <input type="text" id="id" name="id" value="<?= $id ?>" hidden="true">
                                    <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($title) ?>">
                                    <?php if (isset($errors['title'])): ?>
                                        <span style="color: red;"><?= $errors['title'] ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="exampleFormControlSelect1">Chọn Danh Mục:</label>
                                    <select class="form-control" id="id_category" name="id_category">
                                        <?php
                                        $sql = 'select * from category';
                                        $categoryList = executeResult($sql);
                                        foreach ($categoryList as $item) {
                                            if ($item['id'] == $id_category) {
                                                echo '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                            } else {
                                                echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="exampleFormControlSelect1">Chọn Thương Hiệu/Bộ Sưu Tập:</label>
                                    <select class="form-control" id="id_sanpham" name="id_sanpham">
                                        
                                        <?php
                                        $sql = 'select * from collections';
                                        $collectionList = executeResult($sql);
                                        foreach ($collectionList as $item) {
                                            if ($item['id'] == $id_sanpham) {
                                                echo '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                            } else {
                                                echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="name">Giá Sản Phẩm:</label>
                                    <input type="text" class="form-control" id="price" name="price" value="<?= htmlspecialchars($price) ?>">
                                    <?php if (isset($errors['price'])): ?>
                                        <span style="color: red;"><?= $errors['price'] ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="name">Số Lượng Sản Phẩm:</label>
                                    <input type="number" class="form-control" id="number" name="number" value="<?= htmlspecialchars($number) ?>">
                                    <?php if (isset($errors['number'])): ?>
                                        <span style="color: red;"><?= $errors['number'] ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    <!-- <label for="exampleFormControlFile1">Thumbnail:<label> -->
                                    <label for="name">Ảnh đại diện:</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" id="thumbnail" name="thumbnail" value="<?= $thumbnail ?>">
                                    <img src="<?= $thumbnail ?>" style="max-width: 200px" id="img_thumbnail">
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    <!-- <label for="exampleFormControlFile1">Thumbnail:<label> -->
                                    <label for="name">Ảnh minh hoạ:</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" id="thumbnail_1" name="thumbnail_1" value="<?= $thumbnail_1 ?>">
                                    <img src="<?= $thumbnail_1 ?>" style="max-width: 200px" id="img_thumbnail_1">
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    <!-- <label for="exampleFormControlFile1">Thumbnail:<label> -->
                                    <label for="name">Ảnh minh hoạ:</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" id="thumbnail_2" name="thumbnail_2" value="<?= $thumbnail_2 ?>">
                                    <img src="<?= $thumbnail_2 ?>" style="max-width: 200px" id="img_thumbnail_2">
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    <!-- <label for="exampleFormControlFile1">Thumbnail:<label> -->
                                    <label for="name">Ảnh minh hoạ:</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" id="thumbnail_3" name="thumbnail_3" value="<?= $thumbnail_3 ?>">
                                    <img src="<?= $thumbnail_3 ?>" style="max-width: 200px" id="img_thumbnail_3">
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    <!-- <label for="exampleFormControlFile1">Thumbnail:<label> -->
                                    <label for="name">Ảnh minh hoạ:</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" id="thumbnail_4" name="thumbnail_4" value="<?= $thumbnail_4 ?>">
                                    <img src="<?= $thumbnail_4 ?>" style="max-width: 200px" id="img_thumbnail_4">
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    <!-- <label for="exampleFormControlFile1">Thumbnail:<label> -->
                                    <label for="name">Ảnh minh hoạ:</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" id="thumbnail_5" name="thumbnail_5" value="<?= $thumbnail_5 ?>">
                                    <img src="<?= $thumbnail_5 ?>" style="max-width: 200px" id="img_thumbnail_5">
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="exampleFormControlTextarea1" 
                                      style="font-weight: bold; font-size: 16px; text-transform: uppercase; margin-top: 20px; margin-bottom: 10px; ">
                                      Nội dung
                                    </label>

                                    <textarea class="form-control" id="content" rows="3" name="content"><?= $content ?></textarea>
                                </div>
                                <hr class="navbar-divider my-3 opacity-20">
                                <button type="submit" class="btn btn-success" onclick="return addProduct(event)">Lưu</button>
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
        function updateThumbnail() {
            $('#img_thumbnail').attr('src', $('#thumbnail').val())
        }
        $(function() {
            //doi website load noi dung => xu ly phan js
            $('#content').summernote({
                height: 200
            });
        })
		function addProduct(event)
        {
            event.preventDefault(); // Ngăn form submit ngay lập tức
            Swal.fire({
                title: 'Xác nhận',
                text: 'Bạn có chắc chắn muốn lưu sản phẩm này không?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Có',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector('form').submit(); // Submit form nếu người dùng xác nhận
                }
            });
            return false; // Đảm bảo không submit ngoài ý muốn
        }
    </script>
  
</body>
</html>

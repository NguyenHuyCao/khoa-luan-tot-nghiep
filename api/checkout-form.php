<?php
require_once('database/dbhelper.php');

// xử lí đơn hàng khi submit
if (!empty($_POST)) {
    $cart = [];
    if (isset($_COOKIE['cart'])) {
        $json = $_COOKIE['cart'];
        $cart = json_decode($json, true);
    }
    var_dump($cart);
    if ($cart == null || count($cart) == 0) {
        header('Location: index.php');
        die();
    } // đọc cookie cart và giải thành mảng, nếu giỏ hàng rỗng thì điều hướng về trang chủ

    // lấy dữ liệu từ form được submit
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $orderDate = date('Y-m-d H:i:s');

    // lưu thông tin đơn hàng vào bảng orders
    $sql = "INSERT INTO orders(fullname,email, phone_number,address, note, order_date) 
    values ('$fullname','$email','$phone_number','$address','$note','$orderDate')";
    execute($sql);

    // truy vấn lại đơn hàng vừa lưu dựa trên order_date để lấy mã đơn hàng vừa tạo
    $sql = "SELECT * FROM orders WHERE order_date = '$orderDate'";
    $order = executeResult($sql);  
    foreach ($order as $item) {
        $orderId = $item['id']; // mà đơn hàng được lấy ra để dùng trong phần lưu chi tiết đơn hàng
    }

    // nếu username tồn tại hệ thống sẽ truy vấn bảng user để lấy id_user
    // userID sẽ được lưu lại và liên kết với chi tiết đơn hàng
    if (isset($_COOKIE['username'])) {
        $username = $_COOKIE['username'];
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $user = executeResult($sql);
        foreach ($user as $item) {
            $userId = $item['id_user'];
        }
    }

    // lặp qua mảng $cart để lấy id sản phẩm
    $idList = [];
    foreach ($cart as $item) {
        $idList[] = $item['id'];
    }
    if (count($idList) > 0) {
        $idList = implode(',', $idList); // nếu có sản phẩm danh sách id sẽ được chuyển thành chuỗi 
        $sql = "SELECT * FROM product where id in ($idList)"; // và truy vấn bảng produt để lấy chi tiết sp
        $cartList = executeResult($sql); // lưu kết quả vào mảng $cartList
    } else {
        $cartList = [];
    }

    // sau khi lưu đơn hàng, sẽ lưu chi tiết từng sp được đặt vào chi tiết đơn hàng
    $status = 'Tiếp nhận';
    
    // $cartList là danh sách các sản phẩm được lấy từ bảng product dựa trên ID sp trong giỏ hàng
    foreach ($cartList as $item) { // lặp qua từng sp trong giỏ hàng để lưu vào chi tiết đơn hàng
        $num = 0;
        foreach ($cart as $value) { // mỗi sp trong cartlist có thể xuất hiện nhiều lần, hàm này dùng để đếm số lượng của từng sp
            if ($value['id'] == $item['id']) {
                $num = $value['num'];
                break;
            }
        }
        $sql = "INSERT into order_details(order_id, product_id,id_user, num, price,status) values ('$orderId', " . $item['id'] . ",'$userId','$num', " . $item['price'] . ",'$status')";
        execute($sql);
        echo '<script language="javascript">
                alert("Thêm đơn hàng thành công!"); 
                window.location = "history_product.php";
            </script>';
    }
    // xóa dữ liệu giỏ hàng để làm mới giỏ hàng cho lần mua sau
    setcookie('cart', '[]', time() - 1000, '/');
}

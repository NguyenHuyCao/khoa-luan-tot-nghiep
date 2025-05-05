<?php
header("content-type:application/json; charset=UTF-8");
require_once('../database/dbhelper.php');

if (!empty($_POST)) {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $id = isset($_POST['id']) ? $_POST['id'] : '';

        // Chuyển $id thành kiểu số nguyên để giảm rủi ro SQL Injection
        $id = intval($id);

        switch ($action) {
            case 'check':
                // Kiểm tra xem sản phẩm có trong đơn hàng nào không
                $sql = "SELECT COUNT(*) as count FROM order_details WHERE product_id = $id";
                $result = executeSingleResult($sql);
                $canDelete = ($result['count'] == 0);
                echo json_encode(['canDelete' => $canDelete]);
                break;

            case 'delete':
                // Xóa sản phẩm nếu được phép
                $sql = "DELETE FROM product WHERE id = $id";
                execute($sql);
                echo json_encode(['success' => true]);
                break;
        }
    }
}
?>
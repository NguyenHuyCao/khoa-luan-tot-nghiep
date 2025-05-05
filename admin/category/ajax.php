<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php
require_once('../database/dbhelper.php');
if (!empty($_POST) && isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'delete_category':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                // Kiểm tra xem danh mục có được sử dụng trong sản phẩm nào không
                $sql_check = "SELECT COUNT(*) as count FROM product WHERE id_category = $id";
                $result = executeSingleResult($sql_check);

                if ($result['count'] > 0) {
                    echo json_encode(['success' => false, 'error' => 'in_use']);
                } else {
                    // Nếu không có sản phẩm nào sử dụng, thực hiện xóa
                    $sql = "DELETE FROM category WHERE id = $id";
                    execute($sql);
                    echo json_encode(['success' => true]);
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'missing_id']);
            }
            break;
    }
}
?>
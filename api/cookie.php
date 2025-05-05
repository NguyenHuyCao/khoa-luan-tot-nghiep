<?php
require_once('../utils/utility.php');

if(!empty($_POST)) {
	$action = getPost('action');
	$id = getPost('id');
	$num = getPost('num');

	$cart = [];
	if(isset($_COOKIE['cart'])) {//nếu có dữ liệu trong cart thì lấy và chuyển thành mảng trong php vì dữ liệu được lưu dạng json
		$json = $_COOKIE['cart']; 
		$cart = json_decode($json, true);
	}

	switch ($action) {
		case 'add':
			$isFind = false; //biến này xác định xem sản phẩm có tồn tại trong giỏ hàng chưa
			for ($i=0; $i < count($cart); $i++) { // duyệt giỏ hàng do mảng cart đã được tạo từ cookie, chứa danh sách các sản phẩm với trường id và num
                    if($cart[$i]['id'] == $id) { // nếu có id trùng với $id thì có sản phẩm trong giỏ hàng
                        $cart[$i]['num'] += $num; // cộng thêm số lượng mới vào giỏ hàng hiện có
                        $isFind = true; // đánh dấu đã tìm thấy sản phẩm 
                        break;
                    }		
			}
			if(!$isFind) { // trường hợp sản phẩm chưa tồn tại trong giỏ hàng
				$cart[] = [ // thêm phần tử mới vào mảng cart
					'id'=>$id,
					'num'=>$num
				];
			}
			// sau khi mảng được cập nhật, chuyển đổi mảng $cart thành chuỗi json và sử dụng setcookie để cập nhật lại json
			setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/'); 
			break;
		case 'update':
			for ($i = 0; $i < count($cart); $i++) { // duyệt qua mảng cart từ cookie chứa dsach spham với id và num
				if ($cart[$i]['id'] == $id) { // nếu phần tử nào có id bằng với $id nhận từ yêu cầu đổi của người dùng
					$cart[$i]['num'] = $num; // Cập nhật số lượng mới
					break;
				}
			}
			setcookie('cart', json_encode($cart), time() + 30 * 24 * 60 * 60, '/');
			break;
		case 'delete':
			for ($i=0; $i < count($cart); $i++) { //duyệt từng thành phần trong $cart
				if($cart[$i]['id'] == $id) { // nếu có phần tử có id khới với $id được gửi thì
					array_splice($cart, $i, 1); // sử dụng hàm array_split để xóa phần tử tại ví trí $i.
					break;
				}
			}
			// sau khi xóa sản phẩm khỏi mảng $cart, mã mới của giỏ hàng được mã hóa lại thành json và lưu vào cookie cart với thời hạn 30n
			setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
		break;
	}
}
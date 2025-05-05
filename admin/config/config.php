<?php
$mysqli = new mysqli("localhost","root","","web_ban_hang");
$conn = mysqli_connect("localhost","root","","web_ban_hang");
mysqli_set_charset($conn, 'UTF8');
// Check connection
if ($mysqli -> connect_errno) {
  echo "Không kết nối được MYSQLi" . $mysqli -> connect_error;
  exit();
}

?>

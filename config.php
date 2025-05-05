<?php
$mysqli = new mysqli("localhost","root","","web_ban_hang1");
$mysqli->set_charset("utf8");
// Check connection
if ($mysqli -> connect_errno) {
  echo "Không kết nối được MYSQLi" . $mysqli -> connect_error;
  exit();
}
?>
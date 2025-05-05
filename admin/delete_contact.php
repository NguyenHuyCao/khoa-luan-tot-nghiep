<?php
require_once('database/config.php');
require_once('database/dbhelper.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM contact WHERE id = $id";
    execute($sql);
    header("Location: index.php?delete_success=true");
    exit;
}

header("Location: index.php");
exit;
?>
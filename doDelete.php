<?php
require_once("db_connect.php");

$id = $_GET["id"];

// $sql = "DELETE FROM users WHERE id = $id";

// 軟刪除：非實質上的刪除，雖然使用者刪除後會看不到，但後端資料庫還是會保留資料
$sql = "UPDATE users SET states = 0 WHERE id = $id";
// echo $sql;

if ($conn->query($sql) === TRUE) {
  echo "刪除成功";
} else {
  echo "刪除失敗: " . $conn->error;
}

header( "location: user-list.php?id=".$id );
?>
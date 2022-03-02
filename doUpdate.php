<?php
require_once("db_connect.php");

$id = $_POST["id"];

$account=$_POST["account"];
$phones=$_POST["phones"];
$gender=$_POST["gender"];
$phones=array_filter($phones);
$phones_string=implode(', ',$phones);

// echo 
//   $account,"<br>",
//   $gender,"<br>",
//   $phones_string,"<br>";

$sql = "UPDATE users SET account = '$account', gender = '$gender', phones = '$phones_string' WHERE id = $id  AND states = 1";
// echo $sql;

if ($conn->query($sql) === TRUE) {
  echo "更新成功";
} else {
  echo "更新資料錯誤: " . $conn->error;
}

header( "location: user-edit.php?id=".$id );
?>
<?php
// if (!isset($_POST["account"]) || !isset($_POST["password"])) {
//   echo "母湯作弊喔！！";
//   exit;
// }
require_once("./db_connect.php");


$account=$_POST["account"];
$password=md5($_POST["password"]);
$phones=$_POST["phones"];
$gender=$_POST["gender"];
$phones=array_filter($phones);
$phones_string=implode(', ',$phones);
// var_dump($phones);

// if (empty($account)) {
//   echo "請輸入帳號";
//   exit;
// }
// if (empty($password)) {
//   echo "請輸入密碼";
//   exit;
// }

// 或是去修改 XAMPP 的 Apche 的 config 的 PHP.ini 的 data.timezone 時區
date_default_timezone_set("Asia/Taipei");
$now=date('Y-m-d H:i:s');

$sql = "INSERT INTO users (account, password, gender, phones, create_time, states)
VALUES ('$account', '$password', '$gender', '$phones_string', '$now', 1)";
// echo $sql;

if ( $conn -> query($sql) === TRUE ) {
  $last_id = $conn->insert_id;
  echo
    "新資料輸入成功<br>",
    "ID 為 $last_id";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn -> close();
header("location: create-user.php");

// echo 
//   "帳號：$account <br>",
//   "密碼：$password <br>",
//   "性別：$gender <br>",
//   "電話：$phones <br>";
?>
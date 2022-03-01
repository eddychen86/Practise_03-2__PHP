<?php
if (!isset($_POST["account"]) || !isset($_POST["password"])) {
  echo "母湯作弊喔！！";
  exit;
}

$account=$_POST["account"];
$password=$_POST["password"];

if (empty($account)) {
  echo "請輸入帳號";
  exit;
}
if (empty($password)) {
  echo "請輸入密碼";
  exit;
}
echo "帳號：$account <br>密碼：$password";
?>
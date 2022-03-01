<?php
if (!isset($_GET["account"]) || !isset($_GET["password"])) {
  echo "母湯作弊喔！！";
  exit;
}

$account=$_GET["account"];
$password=$_GET["password"];

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
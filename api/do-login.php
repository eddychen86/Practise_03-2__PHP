<?php
session_start();
require_once("../db_connect.php");

$account = $_POST["account"];
$password = md5($_POST["password"]);
// $password = $_POST["password"];

$sql = "SELECT * FROM users WHERE account = '$account' AND password = '$password'";
// echo $sql;

if ( $conn->query($sql) == TRUE ) {
  $result = $conn->query($sql);
  $userCount=$result->num_rows;
  // echo $userCount;
  if ( $userCount > 0 ) {
    // echo "登入成功";
    $user = $result->fetch_assoc();
    $data = [
      "account" => $user["account"]
    ];
    $_SESSION["user"] = $data;
    unset($_SESSION["error"]);
    // var_dump($_SESSION["user"]);
    echo json_encode($data);
  } else {
    // echo "登入失敗";
    if (isset($_SESSION["error"]["times"])) {
      $_SESSION["error"]["times"]++;
    } else {
      $_SESSION["error"]["times"] = 1;
    }
    $_SESSION["error"]["message"] = "帳號或密碼錯誤";
    // header( "location: login.php" );
    $data = [
      "error" => $_SESSION["error"]["message"],
      "times" => $_SESSION["error"]["times"]
    ];
    echo json_encode($data);
  }
} else {
  echo "Error" . $conn->error;
}
?>
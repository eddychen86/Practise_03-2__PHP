<?php
$id = $_GET["id"];

$account=$_POST["account"];
$phones=$_POST["phones"];
$gender=$_POST["gender"];
$phones=array_filter($phones);
$phones_string=implode(',',$phones);

echo 
  $account,"<br>",
  $gender,"<br>",
  $phones_string,"<br>";

$sql = "UPDATE users SET account = '$account', gender = '$gender', phones = '$phones_string' WHERE id = $id"

?>
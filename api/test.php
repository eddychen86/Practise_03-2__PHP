<?php
// $name = $_GET['name'];
// $email = $_GET["email"];

$name = $_POST['name'];
$email = $_POST["email"];

$data = [
  "name" => $name,
  "email" => $email
];

echo json_encode($data);
?>
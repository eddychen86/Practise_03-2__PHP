<?php
session_start();

if (isset($_SESSION["user"])) {
  header("Location: dashboard.php");
}
?>
<!doctype html>
<html lang="zh-TW">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      body {
        background: #eee;
      }
      .login-panel {
        width: 300px;
      }
    </style>
  </head>
  <body>
    <div class="vh-100 d-flex justify-content-center align-items-center">
      <div class="login-panel card p-3">
        <?php if(isset($_SESSION["error"]) && $_SESSION["error"]["times"]>=3): ?>
          <h3 class='text-danger text-center'>!@#!@#!<br><b>母湯手賤亂按啦！</b></h3>
        <?php else: ?>
          <form action="doLogin.php" method="post">
            <h2 class="text-center">登入</h2>
            <div class="form-floating mb-3">
              <input name="account" type="text" class="form-control" id="floatingInput" placeholder="name">
              <label for="floatingInput">Account</label>
            </div>
            <div class="form-floating mb-3">
              <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>
            <div class="mb-2 text-danger text-center">
              <?php 
              if(isset($_SESSION["error"])) {
                echo $_SESSION["error"]["message"].", 共錯誤".$_SESSION["error"]["times"]."次";
              } 
              ?>
            </div>
            <div class="d-grid">
              <button class="btn btn-info" type="submit">Login</button>
              <!-- <button class="btn btn-info" type="submit">Sign up</button> -->
            </div>
          </form>
        <?php endif; ?>
      </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
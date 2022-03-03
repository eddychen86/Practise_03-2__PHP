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
          
            <h2 class="text-center">登入</h2>
            <div class="form-floating mb-3">
              <input name="account" type="text" class="form-control" id="account" placeholder="name">
              <label for="account">Account</label>
            </div>
            <div class="form-floating mb-3">
              <input name="password" type="password" class="form-control" id="password" placeholder="Password">
              <label for="password">Password</label>
            </div>

            <div class="mb-2 text-danger text-center" id="error"></div>
            
            <div class="d-grid">
              <button class="btn btn-info" type="button" id="login">Login</button>
              <!-- <button class="btn btn-info" type="submit">Sign up</button> -->
            </div>
          
        <?php endif; ?>
      </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $("#login").click(function(){
        let account = $("#account").val();
        let password = $("#password").val();
        // console.log(account, password);
        
        let formData = new FormData();
        formData.append('account', account);
        formData.append('password', password);

        axios({
          method: "POST",
          url: "./api/do-login.php",
          data: formData,
          headers: {
            'Content-type': "multipart/form-data"
          }
        })
        .then(function(response){
          // console.log(response);
          let data = response.data;
          console.log("success");
          if (data.status === 1) {
            // 成功
            location.href = "./dashboard.php";
          } else {
            // 失敗
            let message = `${data.error.message}, 共錯誤 ${data.error.times} 次`
            if (data.error.times >= 5) {
              location.href = "";
            }
            
            $("#error").text(message);
          }
        })
        .catch(function(response){
          console.log(response);
        });
      });

    </script>
  </body>
</html>
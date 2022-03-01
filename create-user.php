<!doctype html>
<html lang="zh-TW">
  <head>
    <title>Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
      body {
        margin-top: 30px;
      }
      label {
        margin-bottom: 10px;
      }
      button {
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="py-2">
        <a href="user-list.php" class="btn btn-info">使用者列表</a>
      </div>
      <h2>新增使用者</h2>

      <form action="doCreate.php" class="mt-3" method="post">
        <div class="mb-3">
          <label for="account">帳號：</label>
          <input id="account" type="text" name="account" class="form-control" placeholder="account" required>
        </div>

        <div class="mb-3">
          <label for="password">密碼：</label>
          <input id="password" type="password" name="password" class="form-control" placeholder="password" required>
        </div>

        <div class="mb-3">
          <label for="gender">性別：</label>
          <select name="gender" id="gender" class="form-select">
            <option value="">請選擇</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>

        <div class="row">
          <label for="phones">電話：</label>
          <div class="col">
            <input id="phones" type="tel" name="phones[]" class="form-control" placeholder="123...">
          </div>
          <div class="col">
            <input id="phones" type="tel" name="phones[]" class="form-control" placeholder="456...">
          </div>
          <div class="col">
            <input id="phones" type="tel" name="phones[]" class="form-control" placeholder="789...">
          </div>
        </div>
        <button class="btn btn-info" type="submit">送出</button>
      </form>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>log in</title>
</head>

<body>
  <form action="login_act.php" method="POST">
    <fieldset>
      <legend>ログイン画面</legend>
      <div>
        企業名: <input type="text" name="company">
      </div>
      <div>
        お名前: <input type="text" name="user_name">
      </div>
      <div>
        パスワード: <input type="password" name="password">
      </div>
      <div>
        <button>Login</button>
      </div>
      <a href="register.php">新規登録</a>
    </fieldset>
  </form>

</body>

</html>
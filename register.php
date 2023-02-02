<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録</title>
</head>

<body>
  <form action="register_act.php" method="POST">
    <fieldset>
      <legend>新規登録画面</legend>
      <div>
        企業名: <input type="text" name="company">
      </div>
      <div>
        所属部署: <input type="text" name="affiliation">
      </div>
      <div>
        住所: <input type="text" name="address">
      </div>
      <div>
        お名前: <input type="text" name="user_name">
      </div>
      <div>
        電話番号: <input type="tel" name="tel">
      </div>
      <div>
        メールアドレス: <input type="text" name="mail">
      </div>
      <div>
        パスワード: <input type="password" name="password">
        <p>（8文字以上で、英小文字、英大文字、数字を各1文字以上含むこと）</p>

      </div>
      <div>
        <button>Register</button>
      </div>
      <a href="todo_login.php">or login</a>
    </fieldset>
  </form>

</body>

</html>
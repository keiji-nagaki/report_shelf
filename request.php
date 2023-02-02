<?php
session_start();
include("functions.php");
check_session_id();

$pdo = connect_to_db();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（入力画面）</title>
</head>

<body>
  <form action="request_create.php" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>DB連携型todoリスト（入力画面）</legend>
      <a href="todo_read.php">一覧画面</a>
      <a href="todo_logout.php">ログアウト</a>
      <div>
        企業名: <input type="text" name="company">
      </div>
      <div>
        補器名: <input type="text" name="auxiliaries_name">
      </div>
      <div>
        修理年: <input type="text" name="year">年　※半角数字4桁で入力
      </div>
      <div>
        報告書: <input type="file" name="report" accept=".pdf">
      </div>

      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>
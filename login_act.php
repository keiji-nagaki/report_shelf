<?php
session_start();
include('functions.php');

// var_dump($_POST);
// exit();
// データ受け取り



$user_name = $_POST['user_name'];
$password = $_POST['password'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM member_registration WHERE user_name=:user_name AND password=:password AND deleted_at IS NULL';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
// ユーザ有無で条件分岐

// ユーザー情報を纏める
$user = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($user);
// exit();

// ユーザー情報がない場合
if (!$user) {
  echo "<p>ログイン情報に誤りがあります</p>";
  echo "<a href=todo_login.php>ログイン</a>";
  exit();
} 
// is_adminが１の場合は管理画面に飛ぶ
if($user["is_admin"] ===1){
  $_SESSION = array();
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $user['is_admin'];
  $_SESSION['username'] = $user['username'];
  header("Location:todo_input.php");
  exit();
}
else {
  $_SESSION = array();
  $_SESSION[ "user_id"] = $user["id"];
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $user['is_admin'];
  $_SESSION['user_name'] = $user['user_name'];
  header("Location:user_read.php");
  exit();
}

<?php
// var_dump($_POST);
// exit();

include('functions.php');


if (
  !isset($_POST['company']) || $_POST['company'] === '' ||
  !isset($_POST['affiliation']) || $_POST['affiliation'] === '' ||
  !isset($_POST['address']) || $_POST['address'] === '' ||
  !isset($_POST['user_name']) || $_POST['user_name'] === '' ||
  !isset($_POST['tel']) || $_POST['tel'] === '' ||
  !isset($_POST['mail']) || $_POST['mail'] === '' ||
  !isset($_POST['password']) || $_POST['password'] === ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$company = $_POST["company"];
$affiliation = $_POST["affiliation"];
$address = $_POST["address"];
$user_name = $_POST["user_name"];
$tel = $_POST["tel"];
$mail = $_POST["mail"];
$password = $_POST["password"];

// var_dump($user_name);
// exit();

$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM member_registration WHERE user_name=:user_name';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

if ($stmt->fetchColumn() > 0) {
  echo "<p>すでに登録されているユーザです．</p>";
  echo '<a href="login.php">ログイン画面へ</a>';
  exit();
}

$sql = 'INSERT INTO member_registration(id, company, affiliation, address, user_name, tel, mail, password, is_admin, created_at, updated_at, deleted_at) 
VALUES(NULL, :company, :affiliation, :address, :user_name, :tel, :mail, :password, 0, now(), now(), NULL)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':company', $company, PDO::PARAM_STR);
$stmt->bindValue(':affiliation', $affiliation, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:login.php");
exit();

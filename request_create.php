<?php
session_start();
include("functions.php");
check_session_id();

// var_dump($_POST);
// var_dump($_FILES);
// exit();
// var_dump($_SESSION);
// exit();



if (
  !isset($_POST['company']) || $_POST['company'] === '' ||
  !isset($_POST['auxiliaries_name']) || $_POST['auxiliaries_name'] === '' ||
  !isset($_POST['year']) || $_POST['year'] === '' ||
  !isset($_FILES['report']['name']) || $_FILES['report']['name'] === '' ||
  !isset($_FILES['report']['type']) || $_FILES['report']['type'] === ''
) {
  exit('paramError');
}

$company = $_POST['company'];
$auxiliaries_name = $_POST['auxiliaries_name'];
$year = $_POST['year'];
$report_name = $_FILES['report']['name'];
$report_type = $_FILES['report']['type'];
$user_id = $_SESSION["user_id"];

// var_dump($company);
// exit();
$upload_dir = 'data/';
$report_uploaded_path = date('YmdHis') . $report_name;
$report_save_path = $upload_dir . $report_uploaded_path;

$report_upload = move_uploaded_file($_FILES['report']['name'],$report_save_path);

// var_dump($report_uploaded_path);
// var_dump($report_save_path);
// exit();


$pdo = connect_to_db();

$sql = 'INSERT INTO request(id, company_id, user_id, auxiliaries_name, year, file, file_pass, created_at) 
                   VALUES(NULL, :company, :user_id, :auxiliaries_name, :year, :report_type, :report_save_path, now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':company', $company, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':auxiliaries_name', $auxiliaries_name, PDO::PARAM_STR);
$stmt->bindValue(':year', $year, PDO::PARAM_STR);
$stmt->bindValue(':report_type', $report_type, PDO::PARAM_STR);
$stmt->bindValue(':report_save_path', $report_save_path, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:user_read.php");
exit();

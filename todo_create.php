<?php
session_start();
include("functions.php");
check_session_id();

// var_dump($_POST);
// var_dump($_FILES);
// exit();


if (
  !isset($_POST['auxiliaries']) || $_POST['auxiliaries'] === '' ||
  !isset($_POST['auxiliaries_number']) || $_POST['auxiliaries_number'] === '' ||
  !isset($_POST['auxiliaries_name']) || $_POST['auxiliaries_name'] === '' ||
  !isset($_POST['year']) || $_POST['year'] === '' ||
  !isset($_FILES['specification']['name']) || $_FILES['specification']['name'] === '' ||
  !isset($_FILES['specification']['type']) || $_FILES['specification']['type'] === '' ||
  !isset($_FILES['report']['name']) || $_FILES['report']['name'] === '' ||
  !isset($_FILES['report']['type']) || $_FILES['report']['type'] === ''
) {
  exit('paramError');
}

$auxiliaries = $_POST['auxiliaries'];
$auxiliaries_number = $_POST['auxiliaries_number'];
$auxiliaries_name = $_POST['auxiliaries_name'];
$year = $_POST['year'];
$specification_name = $_FILES['specification']['name'];
$specification_type = $_FILES['specification']['type'];
$report_name = $_FILES['report']['name'];
$report_type = $_FILES['report']['type'];

// var_dump($report_name);
// exit();

$upload_dir = 'data/';
$specification_uploaded_path = date('YmdHis') . $specification_name;
$report_uploaded_path = date('YmdHis') . $report_name;
$specification_save_path = $upload_dir . $specification_uploaded_path;
$report_save_path = $upload_dir . $report_uploaded_path;

$specification_upload = move_uploaded_file($_FILES['specification']['name'],$specification_save_path);
$report_upload = move_uploaded_file($_FILES['report']['name'],$report_save_path);

$pdo = connect_to_db();

$sql = 'INSERT INTO report_data(id, auxiliaries, auxiliaries_number, auxiliaries_name, year,
 specification_type, specification, report_type, report, updated_at, created_at, deleted_at) 
 VALUES(NULL, :auxiliaries, :auxiliaries_number, :auxiliaries_name, :year,
 :specification_type, :specification_save_path, :report_type, :report_save_path, now(), NULL, NULL)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':auxiliaries', $auxiliaries, PDO::PARAM_STR);
$stmt->bindValue(':auxiliaries_number', $auxiliaries_number, PDO::PARAM_STR);
$stmt->bindValue(':auxiliaries_name', $auxiliaries_name, PDO::PARAM_STR);
$stmt->bindValue(':year', $year, PDO::PARAM_STR);
$stmt->bindValue(':specification_type', $specification_type, PDO::PARAM_STR);
$stmt->bindValue(':specification_save_path', $specification_save_path, PDO::PARAM_STR);
$stmt->bindValue(':report_type', $report_type, PDO::PARAM_STR);
$stmt->bindValue(':report_save_path', $report_save_path, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:todo_input.php");
exit();

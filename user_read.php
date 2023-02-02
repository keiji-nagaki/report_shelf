<?php
session_start();
include("functions.php");
check_session_id();

// var_dump($_SESSION);
// exit();

$pdo = connect_to_db();

$sql = 'SELECT * FROM  report_data';
// --  LEFT OUTER JOIN
// --  (SELECT todo_id, COUNT(id) AS like_count FROM like_table GROUP BY todo_id) AS result_table ON todo_table.id = result_table.todo_id';


$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// $user_id = $_SESSION["user_id"];

// var_dump($user_id);
// exit();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $output = "";
// foreach ($result as $record) {
//   $output .= "
//     <tr>
//       <td>{$record["auxiliaries"]}</td>
//       <td>{$record["auxiliaries_number"]}</td>
//       <td>{$record["auxiliaries_name"]}</td>
//       <td>{$record["year"]}</td>
//       <td>{$record["specification"]}</td>
//       <td>{$record["report"]}</td>

//      <td><a href='like_create.php?user_id={$user_id}&todo_id={$record["id"]}'>like{$record["like_count"]}</a></td>
//       <td><a href='todo_edit.php?id={$record["id"]}'>edit</a></td>
//       <td><a href='todo_delete.php?id={$record["id"]}'>delete</a></td>
//     </tr>
//   ";
// }

?>

<!DOCTYPE html>
<html lang="ja">

 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（一覧画面）</title>
 </head>

 <body>
   <fieldset>
     <legend>DB連携型todoリスト（一覧画面）</legend>
     <a href="request.php">登録依頼</a>
     <a href="todo_logout.php">ログアウト</a>
     <table>
       <?php foreach ($result as $record): ?>
       <thead>
         <tr>
           <th>補器種類</th>
           <th>補器番号</th>
           <th>補器名称</th>
           <th>点検年</th>
           <th>仕様書</th>
           <th>報告書</th>
          </tr>
       </thead>
       <tbody>     
          <tr><td><?php echo $record["auxiliaries"]?></td></tr>
          <tr> <td><?php echo $record["auxiliaries_number"]?></td></tr>
          <tr><td><?php echo $record["auxiliaries_name"]?></td></tr>
          <tr><td><?php echo $record["year"]?></td></tr>
          <tr><td><img src="<?php echo $record["specification"]?>"width="300px" height="200px" >仕様書</td></tr>
           <tr><td><img src="<?php echo $record["report"]?>"width="300px" height="200px">報告書</a></td></tr>
        
       </tbody>
       <?php endforeach; ?>
     </table>
   </fieldset>
 </body>

</html>
<?php

//1.POSTデータ取得します
$book_name = $_POST["book_name"];
$book_url = $_POST["book_url"];
$book_cmt = $_POST["book_cmt"];

//2.DB接続します
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch(PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

//3.データ登録SQL作成します
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id,book_name,book_url,book_cmt,indate )VALUES(NULL, :a1, :a2, :a3, sysdate())");
$stmt->bindValue('a1', $book_name,PDO::PARAM_STR);
$stmt->bindValue('a2', $book_url,PDO::PARAM_STR);
$stmt->bindValue('a3', $book_cmt,PDO::PARAM_STR);
$status = $stmt->execute();

//4.データ登録処理後の記述をします
if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: bm_insert_view.php");
    exit;
}

?>
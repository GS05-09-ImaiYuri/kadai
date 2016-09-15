<?php
//1.DBに接続します
try{
    $pdo = new    PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch(PDOException $e){
    exit('データベースに接続できませんでした'.$e->getMessage());
}

//2.データ登録のSQLを作成します
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table');
$status = $stmt->execute();

//3.データを表示します
$view = '';
if($status==false){
    $error = $stmt->$errorInfo();
    exit('ErrorQuery:'.$error[2]);
}else{
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<p>'.$result['id'].$result['book_name'].$result['book_url'].$result['book_cmt'].'</p>';
    } //$viewの後に「.」がないと、レコードが一件しか表示されなくなる。なぜ？
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device=width,initial-scale=1">
    <title>ブックマーク</title>
    <link rel="stylesheet" href="css/range.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>div{padding: 10px;font-size: 16px;}</style>
</head>
    
<body id="main">
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="bm_insert_view.php"></a>
                </div>
            </div>
        </nav>
    </header>
    
    <div>
        <div class="container jumbotron"><?= $view?></div>
    </div>
</body>
</html>
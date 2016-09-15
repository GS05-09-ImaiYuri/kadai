<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>フォーム：POST</title>
</head>
<body>
    
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="bm_list_view.php">データ参照</a>
            </div>
        </div>
    </nav>
</header>

<form method="post" action="bm_insert.php">
    <div class="jumbotron">
        <fieldset>
            <legend>ブックマーク登録</legend>
            <label>書籍名:<input type="text" name="book_name"></label><br>
            <label>書籍URL:<input type="text" name="book_url"></label><br>
            <label>コメント:<textarea name="book_cmt" rows="5" cols="40"></textarea></label><br>
            <input type="submit" value="登録">
        </fieldset>
    </div>
</form>

</body>
</html>
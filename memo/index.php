<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../css/style.css">

<title>PHP</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>    
</header>

<main>
<h2>Practice</h2>

<?php
try {
  $db = new PDO('mysql:dbname=mydb;host=localhost;charaset=utf8','root','root');
} catch(PDOException $e) {
  echo 'DB接続エラー: ' .$e->getMessage();
}

// $count = $db->exec('INSERT INTO my_items SET maker_id=1, item_name="もも", price=210, keyword="缶詰，ピンク，甘い"');
// echo $count .'件のデータを挿入しました';

// $records = $db->query('SELECT * FROM my_items');
// while ($record = $records->fetch()) {
//   print($record['item_name'] ."\n");
// }

$memos = $db->query('SELECT * FROM memos ORDER BY id DESC');
?>

<article>
  <?php while($memo = $memos->fetch()): ?>
    <p><a href="#"><?php print(mb_substr($memo['memo'], 0, 50)); ?></a></p>
    <time><?php print($memo['created_at']); ?></time>
    <hr>
  <?php endwhile; ?>
</article>


</main>
</body>    
</html>
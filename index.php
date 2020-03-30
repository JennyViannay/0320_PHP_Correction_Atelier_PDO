<?php
require 'connect.php';
//CONNECT BDD
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
if($pdo === false){
    echo 'Connection Error :' .$pdo->error_log();
} else {
    // GET ALL ARTICLES FROM DB
    $getAllArticles = "SELECT * FROM article";
    try {
        $sendRequest = $pdo->query($getAllArticles);
        $articles = $sendRequest->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $error = $e->getMessage();
    }
}
foreach($articles as $article){
?>
<div>
    <p>Article n° <?= $article['id'] ?></p>
    <p>Title: <?= $article['title'] ?></p>
    <p>Content: <?= $article['content'] ?></p>
    <p>Author: <?= $article['author'] ?></p>
    <a href=<?= "delete.php?id=".$article['id'] ?>>Delete</a>
    <a href=<?= 
        "edit.php?id=".$article['id'] 
        ."&title=".$article['title'] 
        ."&content=".$article['content'] 
        ."&author=".$article['author']?>
        >Edit
    </a>
</div>
<hr>
<?php
}
?>
<a href="create.php">Create</a>


<?php
require 'connect.php';
//CONNECT BDD
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
if($pdo === false){
    echo 'Connection Error :' .$pdo->error_log();
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $request = "SELECT * FROM article WHERE id=" . $id;
    $sendRequest = $pdo->query($request);
    if ($sendRequest === false) {
        $pdo->errorInfo();
    }
    $article = $sendRequest->fetchObject();
}

if(isset($_POST) && !empty($_POST)){
    $id = $_GET['id'];
    if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author'])){
        try{
            $editArticle = $pdo->prepare("UPDATE article SET title=:title, content=:content, author=:author WHERE id=:id");
            $editArticle->execute([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'author' => $_POST['author'],
                'id' => $id
            ]);
            header('Location: http://localhost:8000');
        } catch (PDOException $e){
            echo $error = $e->getMessage(); 
        }
    } else {
        echo 'TOUS LES CHAMPS SONT REQUIS';
    }
}

?>

<form method="POST">
    <label for="title"></label>
    <input type="text" name="title" id="title" placeholder="Title" value="<?= $article->title ?>">
    <hr>
    <label for="content"></label>
    <textarea type="text" name="content" id="content" placeholder="Text" value="<?= $article->content ?>"></textarea>
    <hr>
    <label for="author"></label>
    <input type="text" name="author" id="author" placeholder="Name" value="<?= $article->author ?>">
    <hr>
    <button type="submit">Update</button>
</form>
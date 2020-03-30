<?php 
require 'connect.php';
//CONNECT BDD
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
if($pdo === false){
    echo 'Connection Error :' .$pdo->error_log();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['title'])&& !empty($_POST['content'])&& !empty($_POST['author'])){
        try {
            $postArticle = $pdo->prepare("INSERT INTO article (title, content, author) VALUES (:title, :content, :author);");
            $postArticle->execute([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'author' => $_POST['author']
            ]);
            return header('Location: http://localhost:8000/index.php');
        } catch (PDOException $e) {
            $error = $e->getMessage();
        }
    } else {
        $error = "Tous les champs sont obligatoires.";
    }
}

if (isset($error)){
    echo $error;
}
?>

<form method="POST">
    <label for="title"></label>
    <input type="text" name="title" id="title" placeholder="Title">
    <hr>
    <label for="content"></label>
    <textarea type="text" name="content" id="content" placeholder="Text"></textarea>
    <hr>
    <label for="author"></label>
    <input type="text" name="author" id="author" placeholder="Name">
    <hr>
    <button type="submit">Create</button>
</form>
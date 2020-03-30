<?php
require 'connect.php';
//CONNECT BDD
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
if($pdo === false){
    echo 'Connection Error :' .$pdo->error_log();
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    try{
        $request = $pdo->prepare("DELETE FROM article WHERE id=:id");
        $request->execute(['id' => $id]);
        header('Location: http://localhost:8000/index.php');
    } catch (PDOException $e){
        $error = $e->getMessage();
    }
}


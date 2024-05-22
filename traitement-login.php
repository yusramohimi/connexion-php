<?php
session_start();
require 'database.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $statement = $pdo -> prepare("SELECT * FROM user WHERE username = :username AND password = :password");
        $statement -> execute([
            ':username' => $_POST['username'],
            ':password' => $_POST['password']
        ]);
        $user = $statement -> fetch(PDO::FETCH_OBJ);
        if($user){
            $_SESSION['user'] = $user;
            header('Location: admin.php');
        }
    }

}
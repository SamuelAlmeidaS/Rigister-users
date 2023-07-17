<?php 
require 'config.php';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password');

if($name && $email && $password){
    $sql = $pdo->prepare("SELECT * FROM wifi_users WHERE email =:email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0){
        $sql = $pdo->prepare("INSERT INTO wifi_users (name, email, password) VALUES (:name, :email, :password)");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);
        $sql->execute();

        header('location: index.php');
        exit;

    } else {
        header('location: register.php');
        exit;
    }


} else {
    header('location: register.php');
    exit;
}

?>
<?php 
require('config.php');
$email= filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');

if($email && $password){

    $sql = $pdo->prepare("SELECT * FROM wifi_users WHERE email =:email && password =:password");
    $sql->bindValue(':email', $email);
    $sql->bindValue(':password', $password);
    $sql->execute();

    if($sql->rowCount() > 0){

        header('location: dashboard.php');
        exit;

    } else {
        header('location: index.php');
        echo 'achou!!';
        exit;
    }


} else {
    header('location: index.php');
    exit;
}


?>
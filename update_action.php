<?php 
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if($id && $name && $email && $password){

    $sql = $pdo->prepare("UPDATE wifi_users SET name =:name, email =:email, password =:password WHERE id =:id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':name',$name);
    $sql->bindValue(':email',$email);
    $sql->bindValue(':password',$password);
    $sql->execute();

} else {
    header('location: dashboard.php');
    exit;
}
header('location: dashboard.php');
exit;

?>
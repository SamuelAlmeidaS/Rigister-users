<?php
require 'config.php';
$lista = [];

$sql = $pdo->query("SELECT * FROM wifi_users");
if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h1>Dashboard</h1>

<table border="1" width="100%">
    <tr>
        <th>id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th colspan="3">Ações</th>
    </tr>
    <?php foreach($lista as $user):?>
    <tr>
        <td><?=$user['id']?></td>
        <td><?=$user['name']?></td>
        <td><?=$user['email']?></td>
        <td><?=$user['password']?></td>
        <td><a href="delete.php?id=<?=$user['id'];?>">[Excluir]</a></td>
        <td><a href="update.php?id=<?=$user['id'];?>">[Editar]</a></td>
        <td><a href="index.php">[Sair]</a></td>
    </tr>
    <?php endforeach;?>
</table>
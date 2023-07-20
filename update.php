<?php 
require 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');

if($id){
    $sql = $pdo->prepare("SELECT * FROM wifi_users WHERE id =:id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $info = $sql->fetch(PDO::FETCH_ASSOC);
    }
}

?>

<form action="update_action.php" method="POST">
    <input type="hidden" name="id" value=<?=$info['id'];?>>

<label>
    Nome:<br>
    <input type="text" name="name" value=<?= $info['name'];?>>
</label><br/><br/>
<label>
    Email:<br>
    <input type="text" name="email" value=<?= $info['email'];?>>
</label><br/><br/>
<label>
    Senha:<br>
    <input type="text" name="password" value=<?= $info['password'];?>>
</label><br/><br/>

<input type="submit" value="Enviar">

</form>
<?php
$bdd = new PDO('mysql:host=localhost:3308;dbname=messagerie;charset=utf8', 'root', '');
$recupMessages = $bdd->query('SELECT * FROM messages');
while($message = $recupMessages->fetch()){
    ?>
    <div class="message">
        <h4><?= $message['pseudo']; ?></h4>
        <p><?= $message['message']; ?></p>
    </div>
    <?php
}
?>
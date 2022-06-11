<?php
$bdd = new PDO('mysql:host=localhost:3308;dbname=messagerie;charset=utf8', 'root', '');
if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['message'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $message = nl2br((htmlspecialchars($_POST['message'])));

        $insererMessage = $bdd->prepare('INSERT INTO messages(pseudo, message) VALUES(?, ?)');
        $insererMessage->execute(array($pseudo, $message));

    }else{
        echo "Veuillez complétez tous les champs...";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instant chat | Wass dev Inc.</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="POST" align="center">
    <input type="text" name="pseudo" placeholder="Pseudo">
    <br><br>
    <textarea name="message" placeholder="Message"></textarea>
    <br>
    <input type="submit" name="valider">
    </form>
    <section id="messages"></section>

    <script>
        setInterval('load_messages()', 500);
        function load_messages(){
            $('#messages').load('loadMessages.php');
        }
    </script>
</body>
</html>
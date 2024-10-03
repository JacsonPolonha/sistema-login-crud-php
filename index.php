<?php 
    session_start();
    if(!isset($_SESSION["USUARIO"])){
        header("location: login.php?acao=faca_login");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/mobile.css">
    <link rel="stylesheet" href="./css/medium.css">
    <link rel="stylesheet" href="./css/large.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php
        include './includes/header.php';
        ?>
        
        <h1>Página inicial</h1>

        <button><a href="login.php?logout=sair">Sair</a></button>

        <?php
        include './includes/footer.php';
        ?>
    </div>
    <script src="script/menu.js"></script>
</body>

</html>
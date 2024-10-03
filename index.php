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
        
        <main class="content">
            <!-- <h1>Página inicial</h1> -->
            <section class="cards">
                <div class="card">
                    <h3>titulo</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa commodi praesentium cum quaerat, perferendis molestias doloremque itaque odit dicta provident officiis reprehenderit nisi non nemo cupiditate nihil fugit ex. Esse.</p>
                </div>
                <div class="card">
                    <h3>titulo</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa commodi praesentium cum quaerat, perferendis molestias dolo</p>
                </div>
                <div class="card">
                    <h3>titulo</h3>
                    <p>Conteúdo</p>
                </div>
                <div class="card">
                    <h3>titulo</h3>
                    <p>Conteúdo</p>
                </div>
            </section>
            <button class="btn-logout"><a href="login.php?logout=sair">Sair</a></button>
        </main>

        <?php
        include './includes/footer.php';
        ?>
    </div>
    <script src="script/menu.js"></script>
</body>

</html>
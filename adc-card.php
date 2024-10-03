<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/mobile.css">
    <link rel="stylesheet" href="./css/medium.css">
    <link rel="stylesheet" href="./css/large.css">
    <title>Adicionar Card</title>
</head>
<body>
<div class="container">
    <?php
        include './includes/header.php';
    ?>
    <div class="container container-login">
            <main class="login-content">
                <h1>Adicionar Card</h1>
    
                <form action="" method="post">
                    <input type="text" name="title" id="title" placeholder="Digite o título">
                    <textarea name="text" id="text"></textarea>
                    <input type="submit" value="Salvar">
                    <?php if ($error): ?>
                        <p class="error"><?= htmlspecialchars($error) ?></p>
                    <?php endif; ?>
                </form>
            </main>
        </div>
</div>
<script src="script/menu.js"></script>
</body>
</html>
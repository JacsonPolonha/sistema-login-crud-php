<?php
session_start();
if (!isset($_SESSION["USUARIO"])) {
    header("location: login.php?acao=faca_login");
    exit;
}

require_once 'Classe.php';
$p = new Conteudos("sistema_login_crud", "localhost", "root", "");

// Verifica se há um ID para exclusão
if (isset($_GET['id'])) {
    $id = addslashes($_GET['id']);
    $p->excluir($id);
    header("Location: index.php");
    exit;
}

$cards = $p->buscaCard();
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
            <section class="cards">
                <?php if (!empty($cards)): ?>
                    <?php foreach ($cards as $card): ?>
                        <div class="card">
                            <h3><?php echo htmlspecialchars($card['titulo']); ?></h3>
                            <p><?php echo htmlspecialchars($card['conteudo']); ?></p>
                            <div class="buttons">
                                <button class="btn-editar">
                                    <a href="adc-card.php?id_update=<?php echo $card['id']; ?>">Editar</a>
                                </button>
                                <button class="btn-excluir">
                                    <a href="index.php?id=<?php echo $card['id']; ?>">Excluir</a>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="empty-card">Nenhum card encontrado.</p>
                <?php endif; ?>
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
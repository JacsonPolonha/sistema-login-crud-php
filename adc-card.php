<?php
require_once 'Classe.php';
$p = new Conteudos("sistema_login_crud", "localhost", "root", "");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_STRING);

    if (!empty($titulo) && !empty($conteudo)) {
          if (isset($_GET['id_update'])) {
            $id_upd = filter_input(INPUT_GET, 'id_update', FILTER_SANITIZE_NUMBER_INT);
            $p->atualizar($id_upd, $titulo, $conteudo);
            $_SESSION['mensagem'] = "Card atualizado com sucesso!";
          } else {
            if (!$p->cadastrar($titulo, $conteudo)) {
                $_SESSION['mensagem'] = "Título já cadastrado!";
            } else {
                $_SESSION['mensagem'] = "Card cadastrado com sucesso!";
            }
        }
        header("Location: index.php"); 
        exit;
    } else {
        $_SESSION['mensagem'] = "Preencha todos os dados!";
    }
}

$titulo = "";
$conteudo = "";


if (isset($_GET['id_update'])) {
    $id_update = addslashes($_GET['id_update']);
    $res = $p->editar($id_update); 

    
    if ($res) {
        $titulo = $res['titulo'];
        $conteudo = $res['conteudo'];
    }
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
    <title>Adicionar Card</title>
</head>

<body>
    <div class="container">
        <?php
        include './includes/header.php';
        ?>
        <div class="container container-login">
            <main class="login-content">
                <!-- Mensagem de feedback ao usuário -->
                <?php if (isset($_SESSION['mensagem'])): ?>
                    <div class="mensagem">
                        <?php
                        echo $_SESSION['mensagem'];
                        unset($_SESSION['mensagem']); // Limpa a mensagem após exibir
                        ?>
                    </div>
                <?php endif; ?>

                <form action="adc-card.php<?php if(isset($res)) echo '?id_update=' . $res['id']; ?>" method="post">
                    <input type="text" name="titulo" id="titulo" placeholder="Título" value="<?php echo htmlspecialchars($titulo); ?>">

                    <textarea name="conteudo" id="conteudo" placeholder="Conteúdo"><?php echo htmlspecialchars($conteudo); ?></textarea>

                    <input type="submit" value="<?php echo isset($id_update) ? 'Atualizar' : 'Salvar'; ?>">
                </form>
            </main>
        </div>
        <?php
            include './includes/footer.php';
        ?>
    </div>
    <script src="script/menu.js"></script>
</body>

</html>
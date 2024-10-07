<?php 
require_once 'Classe.php';
session_start();

$p = new Conteudos("sistema_login_crud", "localhost", "root", "");

//Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_STRING);

    if (!empty($titulo) && !empty($conteudo)) {
          //Verifica se existe o ID para atualização
          if (isset($_GET['id_update'])) {
            $id_upd = filter_input(INPUT_GET, 'id_update', FILTER_SANITIZE_NUMBER_INT);
            $p->atualizar($id_upd, $titulo, $conteudo);
            $_SESSION['mensagem'] = "Card atualizado com sucesso!";
          } else {
            // Se for cadastro
            if (!$p->cadastrar($titulo, $conteudo)) {
                $_SESSION['mensagem'] = "Título já cadastrado!";
            } else {
                $_SESSION['mensagem'] = "Card cadastrado com sucesso!";
            }
        }
        header("Location: index.php"); // Redireciona após operação
        exit;
    } else {
        $_SESSION['mensagem'] = "Preencha todos os dados!";
    }
}

// Verifica se o ID de atualização foi passado
if (isset($_GET['id_update'])) {
    $id_update = filter_input(INPUT_GET, 'id_update', FILTER_SANITIZE_NUMBER_INT);
    $res = $p->editar($id_update);
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
                <h1>Adicionar Card</h1>

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
                    <input type="text" name="titulo" id="titulo" placeholder="Digite o título" value="<?php if (isset($res)) echo htmlspecialchars($res['titulo']); ?>"
                    >
                    <!-- <textarea 
                        name="conteudo" 
                        id="conteudo" 
                        value="<?php if (isset($res)) echo htmlspecialchars($res['conteudo']); ?>">
                    </textarea> -->
                    <input 
                        name="conteudo" 
                        id="conteudo" 
                        value="<?php if (isset($res)) echo htmlspecialchars($res['conteudo']); ?>"
                    >
            
                    <input type="submit" value="<?php echo isset($res) ? 'Atualizar' : 'Salvar'; ?>">
                </form>
            </main>
        </div>
</div>
<script src="script/menu.js"></script>
</body>
</html>
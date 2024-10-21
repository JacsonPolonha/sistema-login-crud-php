<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/mobile.css">
    <link rel="stylesheet" href="./css/medium.css">
    <link rel="stylesheet" href="./css/large.css">
    <title>Sobre o Sistema</title>
</head>

<body>
    <div class="container">
        <?php
        include './includes/header.php';
        ?>
        <main class="content about">
            <h2>Sistema de Gerenciamento de Cards com PHP e MySQL</h2>
            <p>
                Esse sistema tem como objetivo gerenciar um conjunto de cards (blocos de conteúdo com título e descrição) através de um banco de dados MySQL. Ele permite que os usuários cadastrados adicionem, editem, excluam e visualizem cards em uma interface simples. Abaixo, estão explicados os principais componentes e funcionalidades do sistema.
            </p>

            <h2>Estrutura do Sistema</h2>
            <h3>Banco de Dados (MySQL):</h3>
            <p>
                O sistema utiliza uma tabela no MySQL chamada card, que contém dois campos principais:
                
                    <li>titulo: O título do card.</li>
                    <li>conteudo: A descrição ou conteúdo do card.</li>
                
                A tabela é manipulada por uma classe PHP chamada Conteudos, que encapsula toda a lógica de conexão e manipulação de dados.
            </p>

            <h2>Classe Conteudos:</h2>
            <p>
                A classe Conteudos é responsável pela interação com o banco de dados. Ela implementa os seguintes métodos:

                <li>
                    cadastrar($titulo, $conteudo): Cadastra um novo card no banco de dados, desde que o título não esteja duplicado.
                </li>
                <li>
                    editar($id): Busca um card específico pelo seu ID para que os dados possam ser carregados no formulário e posteriormente editados.
                </li>
                <li>
                    atualizar($id, $titulo, $conteudo): Atualiza um card existente com novos valores de título e conteúdo.
                </li>
                <li>
                    excluir($id): Exclui um card do banco de dados.
                </li>
                <li>
                    buscaCard(): Retorna todos os cards salvos no banco, ordenados pelo título, para serem exibidos na página principal.
                </li>
            </p>

            <h2>Página de Cadastro/Edição (adc-card.php):</h2>
            <li>
                Essa página serve tanto para cadastrar novos cards quanto para editar cards existentes.
            </li>
            <li>
                Se um ID de card (passado como id_update na URL) estiver presente, os dados desse card serão carregados nos campos do formulário para edição. Caso contrário, o formulário será utilizado para cadastrar um novo card.
            </li>
            <li>
                O formulário é enviado via POST para a mesma página (adc-card.php), e dependendo se o card está sendo criado ou atualizado, a lógica correspondente é aplicada.
            </li>
            <li>
                Após cadastrar ou atualizar um card, o sistema redireciona para a página principal.
            </li>

            <h2>Página Principal (index.php):</h2>
            <p>
                Esta página exibe todos os cards cadastrados no sistema.
            </p>
            <p>
                Os dados dos cards são carregados dinamicamente a partir do banco de dados e exibidos como blocos dentro de uma estrutura de divs.
            </p>

            <h2>Lógica de Funcionamento</h2>
            <p>Cadastrar um Novo Card:</p>
            <li>
                Na página adc-card.php, o usuário preenche o título e o conteúdo do card.
            </li>
            <li>
                Ao enviar o formulário, o sistema verifica se os campos estão preenchidos e, caso estejam, chama o método cadastrar da classe Conteudos.
            </li>
            <li>
                Se o cadastro for bem-sucedido, o usuário é redirecionado para a página principal, onde poderá ver o novo card listado.
            </li>

            <p>Editar um Card Existente:</p>
            <li>
                Na página principal (index.php), cada card tem um botão "Editar". Quando o usuário clica nesse botão, ele é redirecionado para a página adc-card.php com o ID do card na URL (ex.: adc-card.php?id_update=1).
            </li>
            <li>
                O sistema verifica o ID e busca os dados do card no banco de dados, preenchendo os campos do formulário com as informações correspondentes.
            </li>
            <li>
                O usuário pode modificar os dados e enviar o formulário, que chama o método atualizar para gravar as alterações no banco de dados.
            </li>

            <p>Excluir um Card:</p>
            <li>
                Na página principal, cada card tem um botão "Excluir". Quando clicado, uma janela de confirmação é exibida para evitar exclusões acidentais.
            </li>
            <li>
                Após confirmar, o card é removido do banco de dados com o método excluir, e a página é atualizada automaticamente para refletir a mudança.
            </li>

            <h2>Segurança e Melhores Práticas</h2>
            <p>Escapando dados de entrada e saída:</p>
            <li>
                Todos os dados vindos de formulários são escapados com a função htmlspecialchars() para evitar problemas de segurança, como injeção de código HTML ou JavaScript (XSS).
            </li>
            <p>Uso de Sessões:</p>
            <li>
                A página principal (index.php) é protegida por uma verificação de sessão. Apenas usuários logados podem acessar essa página. Se a sessão não estiver ativa, o usuário é redirecionado para a página de login.
            </li>

            <h2>Resumo das Funcionalidades</h2>
            <li>
                Cadastro de Cards: Permite adicionar novos cards com título e conteúdo ao sistema.
            </li>
            <li>
                Listagem de Cards: Exibe todos os cards cadastrados na página principal, com as opções de editar e excluir.
            </li>
            <li>
                Edição de Cards: Permite modificar os dados de um card já existente.
            </li>
            <li>Exclusão de Cards: Permite excluir um card do banco de dados.</li>
        </main>
        <?php 
            include './includes/footer.php';
        ?>
        <script src="./script/menu.js"></script>
    </div>
</body>

</html>
## passo a passo do teste de login usando o hash
1. Executar o código para gerar o hash
Crie um arquivo PHP temporário (por exemplo, gerar_hash.php) com o seguinte conteúdo:

<?php
$hash = password_hash('sua_senha', PASSWORD_DEFAULT);
echo $hash;
?>

Substitua 'sua_senha' pela senha que você deseja usar (por exemplo, 'minhaSenhaSegura123').

Acesse este arquivo no seu navegador (por exemplo, http://localhost/gerar_hash.php).

O navegador exibirá o hash gerado, que será uma sequência de caracteres como esta:

$2y$10$WzqQAlDlhtUZt5JrAK1oaOlJJF3zZKmUzstlyS6K3pG1hRLy.RS8C

Esse é o hash da sua senha, que é uma forma segura de armazená-la.

2. Armazenar o hash no seu config.php
Agora, pegue esse hash gerado e coloque no seu arquivo config.php:

<pre>
<?php
define('USER', 'nome_de_usuario');
define('PASS', '$2y$10$WzqQAlDlhtUZt5JrAK1oaOlJJF3zZKmUzstlyS6K3pG1hRLy.RS8C'); // Hash gerado
?>
</pre>

Substitua '$2y$10$WzqQAlDlhtUZt5JrAK1oaOlJJF3zZKmUzstlyS6K3pG1hRLy.RS8C' pelo hash que foi gerado no passo anterior.

3. Testar o login com o password_verify
Agora, ao fazer login, o código usará password_verify() para comparar a senha digitada com o hash armazenado.

# Alterações 

login.php na linha 6 o parênteses do if
config.php linhas 3 e 4


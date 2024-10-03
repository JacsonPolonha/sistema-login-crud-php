<?php 
 session_start();
 require_once 'config.php';
 
 function login($user, $pass) {

    //($user === USER && $pass === PASS) 
     if($user === USER && password_verify($pass, PASS)) {
         $_SESSION["USUARIO"] = $user;
         header("Location: index.php");
         exit();
     } else {
         return "Usuário ou senha inválidos";
     }
 }
 
 function logout() {
     if (isset($_GET["logout"]) && $_GET["logout"] === 'sair') {
         session_destroy();
         header("Location: login.php");
         exit();
     }
 }
 
 $error = null;
 
 logout();
 
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    if(isset($_POST["name"]) && isset($_POST["password"])){
        $user = htmlspecialchars($_POST['name']);
        $pass = htmlspecialchars($_POST['password']);
        if ($user && $pass) {
                     $error = login($user, $pass);
                 } else {
                     $error = "Por favor, preencha todos os campos";
                 }
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
    <title>Login - JaPo</title>
</head>
<body>
    <div class="container container-login">
        <main class="login-content">
            <h1>Login</h1>

            <form action="" method="post">
                <input type="text" name="name" id="name" placeholder="Digite sua senha">
                <input type="password" name="password" id="password" placeholder="****">
                <input type="submit" value="Login">
                <?php if ($error): ?>
                    <p class="error"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>
            </form>
        </main>
    </div>
</body>
</html>
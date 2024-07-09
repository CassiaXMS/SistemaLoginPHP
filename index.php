<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
                include("php/config.php");
                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);

                    $result = mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$email' AND password='$password'") or die("Ocorreu um ero!");
                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['email'];
                        $_SESSION['nome'] = $row['nome'];
                        $_SESSION['idade'] = $row['idade'];
                        $_SESSION['id'] = $row['Id'];
                    }else{
                        echo "<div class='message'>
                            <p>Email ou senha incorretos!</p>
                                </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Voltar</button>";
                    }

                    if(isset($_SESSION['valid'])){
                        header("Location: home.php");
                    }
                }else{

            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="field input">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>

                <div class="links">
                    Não tenho uma conta? <a href="resgister.php"> Cadastrar </a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
    
</body>
</html>
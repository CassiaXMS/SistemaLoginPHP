<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
        
        <?php 
            include("php/config.php");
            if(isset($_POST['submit'])){
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $idade = $_POST['idade'];
                $password = $_POST['password'];

            //Verificação de e-mail único
            $verify_query = mysqli_query($con, "SELECT email FROM usuarios WHERE email='$email'");

            if(mysqli_num_rows($verify_query) !=0 ){
                echo "<div class='message'>
                        <p>Este email já foi usado, tente outro por favor!</p>
                     </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Voltar</button>";
            }
            else{
                mysqli_query($con, "INSERT INTO usuarios(nome, email, idade, Password) VALUES('$nome', '$email', '$idade', '$password')") or die("Ocorreu em erro");
                
                echo "<div class='message'>
                        <p>Cadastrado com sucesso!</p>
                    </div> <br>";
                echo "<a href='index.php'><button class='btn'>Entrar agora</button>";
            
                }
            }else{
        
        ?>
            <header>Cadastrar</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" autocomplete="off"  required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="idade">Idade</label>
                    <input type="number" name="idade" id="idade" autocomplete="off"  required>
                </div>

                <div class="field input">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" autocomplete="off"  required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Cadastrar" required>
                </div>

                <div class="links">
                    Já tem uma conta? <a href="index.php">Entrar</a>
                </div>

            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
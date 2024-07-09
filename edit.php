<?php
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Atualizar perfil</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p> <a href="home.php">Logo</a></p>
        </div>

        <div class="right-links">
            <a href="#">Atualizar perfil</a>
            <a href="php/logout.php"> <button class="btn">Sair</button></a>
        </div>
    </div>

    <div class="container">
        <div class="box form-box">

        <?php
            if(isset($_POST['submit'])){
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $idade = $_POST['idade'];
                
                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con, "UPDATE usuarios SET nome='$nome', email='$email', idade='$idade' WHERE Id=$id ") or die("Ocorreu um erro!");

                if($edit_query){
                    echo "<div class='message'>
                        <p>Perfil atualizado!</p>
                    </div> <br>";
                echo "<a href='home.php'><button class='btn'>Home</button>";
                }
            }else{
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT*FROM usuarios WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)) {
                    $res_Uname = $result['nome'];
                    $res_email = $result['email'];
                    $res_idade = $result['idade'];
                }
        
        ?>
            <header>Atualizar perfil</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $res_Uname; ?>" autocomplete="off"  required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_email; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="idade">Idade</label>
                    <input type="number" name="idade" id="idade" value="<?php echo $res_idade; ?>" autocomplete="off"  required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Atualizar" required>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
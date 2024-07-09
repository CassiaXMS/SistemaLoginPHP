<?php
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>

        <div class="right-links">
            
            <?php 
                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM usuarios WHERE Id=$id");
                
                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['nome'];
                    $res_email = $result['email'];
                    $res_idade = $result['idade'];
                    $res_id = $result['Id'];
                }

                echo "<a href='edit.php?Id=$res_id'>Atualizar perfil</a>";
            ?>

            <a href="php/logout.php"> <button class="btn">Sair</button></a>
        </div>
    </div>

    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p> Olá <b><?php echo $res_Uname ?></b>, bem-vindo(a)!</p>
                </div>
                <div class="box">
                    <p> Seu email é <b><?php echo $res_email ?></b>.</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p> Você está com <b><?php echo $res_idade ?> </b>anos de idade.</p>
                </div>
            </div>

        </div>
    </main>
</body>
</html>
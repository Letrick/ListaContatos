<?php


session_start(); //para abrir a sessão
if (!isset($_SESSION['id_usuario'])) //verificar se a pessoa está logada
{

    header("location: index.php"); //vai ser encaminhada para a tela de login para fazer o login
    exit; //para nao executar nada alem dessa linha



}




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Bem vindo</title>
</head>
<nav class="navbar navbar-dark bg-dark">
    <div class="nav-link">
        <a class="navbar-brand" href="AreaPrivada.php"> Inicio </a>
        <a class="navbar-brand" href="?page=novo"> Novo usuario </a>
        <a class="navbar-brand" href="?page=listar"> Listar usuario </a>
        <a class="navbar-brand" href="sair.php"> Sair </a>

    </div>
    <form method="POST" action="config.php" class="form-inline">
        <input class="form-control mr-sm-2" type="text" name="pesquisar" placeholder="Pesquisar" aria-label="Pesquisar">
        <button class="btn btn-outline-success mr-sm-2" type="submit">Pesquisar</button>

    </form>

</nav>


<body>
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <?php

                include("config.php");
                switch (@$_REQUEST["page"]) {
                    case "novo":
                        include("novo-usuario.php");
                        break;

                    case "listar":
                        include("listar-usuario.php");
                        break;

                        case "salvar":
                            include("Salvar-usuario.php");
                            break;

                            case "editar":
                                include("Editar-usuario.php");
                                break;


                    default:
                        print "<h1>Bem vindo</h1>";
                }


                ?>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
<?php

require_once 'CLASSES/usuarios.php';
$u = new Usuario;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="CSS2/estilo.css">
    <title>Projeto - Dev</title>


    
</head>
<a href="index.php"> Voltar </a>
<body>

    <fieldset id="corpo-form">
        <h1>Faça seu cadastro</h1>
        <form method="POST">

            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="tel" name="telefone" placeholder="Telefone" maxlength="30">

            <input type="email" name="email" placeholder="E-mail" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar senha" maxlength="15">

            <input type="submit" value="Cadastrar">

        </form>
    </fieldset>

    </body>


</html>

    <?php

    //verificar se clicou no botao de cadastrar

    if (isset($_POST['nome'])); //verifica de uma variavel, array...
    {

        $nome = addslashes($_POST['nome']); // addslashes serve para impedir que envie codigos para dentro do formulario, tentar hackear
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confSenha']);

        // temos que verificar se a pessoa nao deixou vazio os campos
        if (
            !empty($nome) && !empty($telefone) && !empty($email) && !empty($senha)
            && !empty($confirmarSenha)
        ) {

            $u->conectar("projeto_login", "localhost", "root", "");
            if ($u->msgErro == "") //se está ok, sem erro 

            {
                if ($senha == $confirmarSenha) {

                    if ($u->cadastrar($nome, $telefone, $email, $senha)) {

    ?>

                        <div id="msg-sucesso">
                            Cadastrado com sucesso! Acesse para entrar

                        </div>
                    <?php


                    } else {


                    ?>

                        <div class="msg-erro">
                            Email ja cadastrado!

                        </div>
                <?php


                    }
                } else {

                    ?>

                        <div class="msg-erro">
                         Senha e confirmar senha nao correspondem!

                        </div>
                <?php

                }
            } else {

                ?>

                <div >
                    <?php echo "Erro: " . $u->msgErro; ?>

                </div>
            <?php

            }
        } else {

            ?>

            <div class="msg-erro">
                Preencha todos os campos!

            </div>
    <?php



        }
    }



    ?>



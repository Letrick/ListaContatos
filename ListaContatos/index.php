
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

<body>

<fieldset   id="corpo-form">
    <h1>Bem vindo (a)</h1>
    <form method="POST">

    <input type="email"  name="email"   placeholder="Usuário">
    <input type="password"  name="senha" placeholder="Senha">
    <input type="submit" value="Entrar">
    <a href="cadastrar.php"> Não tem cadastro? <strong>Clique aqui para se cadastrar.</strong>  </a>
    </form>
</fieldset>

<?php


if (isset($_POST['email'])); //isset informa sea variavel foi iniciada
{

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    // temos que verificar se a pessoa nao deixou vazio os campos
    if (!empty($email) && !empty($senha)) 
    {
        $u-> conectar("projeto_login", "localhost", "root", "");
        if ($u->msgErro == "") //se está ok, sem erro 
        {


      



      if  ($u -> logar($email, $senha))
      {
        header("location: AreaPrivada.php");


      }
      else
      {

            ?>
            <div class="msg-erro">
         Email e/ou senha estão incorretos!

        </div>
        <?php
      }
    }
    else
    {

        echo "Erro: ".$u->msgErro;
        
        
        }

    }else
{


    ?>
    <div class="msg-erro">
     Preencha todos os campos!

</div>
<?php



}



}


?>



</body>


</html>
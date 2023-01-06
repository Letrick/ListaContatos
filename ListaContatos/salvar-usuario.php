<?php

switch ($_REQUEST["acao"]){

    case 'cadastrar':
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $telefone = $_POST["telefone"];
        $endereco = $_POST["endereco"];

        $sql = "INSERT INTO cad_contato (nome, cpf, telefone, endereco) 
        VALUES ('{$nome}', '{$cpf}', '{$telefone}','{$endereco}') ";

        $res = $conn -> query($sql);

        if($res == true){

        
         
                print  "<script> alert('Cadastrado com sucesso!');    </script> ";

                print  "<script>location.href='?page=listar';</script> ";


           
        }
        else{

         
               print  "<script> alert('Não foi possivel cadastrar!');    </script> ";

               print  "<script>location.href='?page=listar';</script> ";




        }





        break;

case 'editar':

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];


    $sql = "UPDATE cad_contato SET
        nome='{$nome}',
        cpf='{$cpf}',
        telefone='{$telefone}',
        endereco='{$endereco}'

        WHERE
            id=".$_REQUEST["id"];

    
    $res = $conn -> query($sql);

    if($res == true){

    
     /* <div class="alert alert-warning" role="alert">
        Não foi possivel cadastrar.
            </div> */
            print  "<script> alert('Editado com sucesso!');    </script> ";

            print  "<script>location.href='?page=listar';</script> ";


       
    }
    else{

     /*    ?>
        <div class="alert alert-success" role="alert">
               Enviado com sucesso!
           </div>  

           <?php */
           print  "<script> alert('Não foi possivel editar!');    </script> ";

           print  "<script>location.href='?page=listar';</script> ";




    }


    break;

    case 'excluir':

        $sql = "DELETE FROM cad_contato WHERE id=".$_REQUEST["id"];

        $res = $conn -> query($sql);

        if($res == true){
    
                print  "<script> alert('Excluído com sucesso!');    </script> ";
                print  "<script>location.href='?page=listar';</script> ";
    
        }
        else{

               print  "<script> alert('Não foi possivel excluir!');    </script> ";
               print  "<script>location.href='?page=listar';</script> ";
    
    
        }





        break;



}













?>
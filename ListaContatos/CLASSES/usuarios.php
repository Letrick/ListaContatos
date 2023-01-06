<?php

class Usuario
{

    private $pdo; //usado para segurança na hora de trabalhar com procedimentos em banco de dados
    public  $msgErro = "";



    public function conectar($nome, $host, $usuario, $senha)

    {

        try {
            global $pdo;
            $pdo = new PDO("mysql:dbname=" . $nome . ";host=" . $host, $usuario, $senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $telefone, $email, $senha)
    {

        global $pdo;
        //verificar se ja existe o email cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e ");

        $sql->bindValue(":e", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {

            return false; //esta cadastrada

        } else {         //caso nao, cadastrar


            $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");

            $sql->bindValue(":n",($nome) );
            $sql->bindValue(":t",($telefone) );
            $sql->bindValue(":e",($email) );
            $sql->bindValue(":s", md5($senha) );

            $sql->execute();

            return true;
        }
    }


    public function logar($email, $senha)
    {
        
        global $pdo;

        //verificar se o email e senha estao cadastrados, se sim


        $sql = $pdo -> prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");

        $sql -> bindValue(":e",($email) );
        $sql -> bindValue(":s",md5($senha) );
        $sql -> execute();
        if($sql-> rowcount() > 0) //entrar no sistema 
        {

            $dado = $sql -> fetch(); //array para os ID, o fetch retorna uma unica row da consulta, só um resultado de um array
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];

            return true; // logado com sucesso


        }
        else
        {

            return false; // nao conseguiu logar

        }


    }





}

<?php

class usuarios
{
    public function getTotalUsuarios(){
        global $pdo;

        $sql = $pdo->query("select COUNT(*) as c from usuarios");
        $row = $sql->fetch();

        return $row['c'];
    }

    public function cadastrar($nome, $email, $senha, $telefone)
    {
        global $pdo;
        //verificar se já existe o email cadastrado
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //ja esta cadastrado
        }
        else
        {
            //caso nao, Cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, telefone) VALUES (:n, :e, :s, :tel)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":tel",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true; //tudo ok
        }
    }

        public function login($email, $senha)
        {
            global $pdo;
            //verificar se o email e senha estao cadastrados, se sim
            $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e AND senha = :s");
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            if ($sql->rowCount() > 0) {
                //entrar no sistema (sessao)
                $dado = $sql->fetch();
                session_start();
                $_SESSION['cLogin'] = $dado['id'];
                return true; //cadastrado com sucesso
            } else {
                return false;//nao foi possivel logar
            }
        }
        public function getNamelogin()
        {
            global $pdo;
            $sql = $pdo->prepare("SELECT nome FROM usuarios WHERE id = :id");
            $sql->bindValue(":id", $_SESSION['cLogin']);
            $sql->execute();
            //puxar nome pelo id logado
            if ($sql->rowCount() > 0) {
                $nameuser = $sql->fetch();
            }
            return $nameuser;
        }
}
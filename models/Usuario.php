<?php
require_once "app/config/conexao.php";
//parte do código dentro de conexão, o con

function listarUsuarios(){
    $con = conectar();
        //o con é igual ao conectar, cria uma instancia, 
        //la no conexão tem a function conectar
        // $con = conectar();
        $sql = "SELECT * FROM usuario";
        //cria uma variavel q chama sql, e coloca o que quer executar no banco
        $resultado = mysqli_query($con, $sql);
        //cria essa variavel e coloca o mysqliquery que é função nativa fo banco
        //por isso passa o con e o sql

        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        //retorna a função, pega todo o resultado e joga numa variavel vetorial
        //tipo vetor
        //dentro de resultado ele deixa os usuarios prontos para serem usados
        //retorna os usuarios cadastrados no banco de dados
        //mysqli_assoc, parametro da função
    
}

function inserirUsuario($nome, $email, $login, $senha, $papel, $imagem){
    $con = conectar();
    $sql = "INSERT INTO usuario (nome, email, imagem, login, senha, papel)
            VALUES ('$nome', '$email', '$imagem, '$login', '$senha', '$papel')";

    mysqli_query($con, $sql);

}

function buscarUsuario($id){
    $con = conectar();
    $sql = "SELECT * FROM usuario WHERE id= $id";
    $resultado = mysqli_query($con, $sql);

    return mysqli_fetch_assoc($resultado);
    //vai buscar um usuário específico pelo id
}

function atualizarUsuario($id, $nome, $email, $imagem){
    //o id é para buscar no where
    $con = conectar();
    $sql = "UPDATE usuario
            SET nome= '$nome', email='$email', imagem='$imagem'
            WHERE id=$id";
    mysqli_query($con, $sql);
}

function excluirUsuario($id){
     $con = conectar();
     $sql = "DELETE FROM usuario WHERE id=$id";

     mysqli_query($con, $sql);
}

function login_adm($login, $senha){
    $con = conectar();
    $sql ="SELECT id, nome, login, senha FROM usuario WHERE login='$login' AND senha='$senha'";
    $resultado = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($resultado);
}



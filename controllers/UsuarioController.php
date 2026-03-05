<?php
//onde vai receber os dados
require_once "models/Usuario.php";
//precisa ter acesso a consulta do sql
$acao = isset($_GET['acao']) ? $_GET['acao'] : 'listar';
//o isset é se existir, se existir o get ação
//o ponto de interrogação é para não dar erro

//PROTEÇÃO GLOBAL- copiar em todas as páginas protegidas
if(!isset($_SESSION['adm']) && $acao !='login'){
    include "views/login.php";
    exit;
    //se existe a sessão adm, se não tiver manda para login
    //"vai printar o login
    //o exclamação é se dor diferente de login
    //o EXIT é para parar de ler a página
}
//com o exit, ele não mostra daqui pra baixo
if ($acao =='listar'){
    $usuarios = listarUsuarios();
    include "views/listar.php";
}
if ($acao == 'criar'){
    if ($_POST){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $papel = $_POST['papel'];
        $imagem = "";

        if ($_FILES['imagem']['name']){
            //esse files vai separar o binário do jpeg
            $imagem = "img/" . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
        }
        inserirUsuario($nome, $email,$login , $senha, $papel, $imagem);

        header("Location: index.php");
    }
    include "views/criar.php";
}
if ($acao == 'editar') {
    $id = $_GET['id'];

    if ($_POST){

        $nome = $_POST['nome'];
        $email= $_POST['email'];
        
        $imagem = $_POST['imagem_atual'];

        if ($_FILES['imagem']['name']) {

            $imagem = "img/" . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
        }

        atualizarUsuario($id, $nome, $email, $imagem);
        header("Location: index.php");
    }
    $usuario= buscarUsuario($id);
    include "views/editar.php";
}
if ($acao == 'excluir'){
    excluirUsuario($_GET['id']);
    header("Location: index.php");

}

if ($acao == 'login'){
   $acao = $_GET['acao'] ?? '';

   if ($acao == 'login'){
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $usuario = login_adm($login, $senha);
    if ($usuario){
        $_SESSION['adm'] = $usuario['nome'];
        header("Location: index.php");
        exit;
    }else{
        $erro = "Login inválido!";
    }
   }
    
}
if ($acao == 'logout'){
    //esse vem do sistema geral
    $acao = $_GET['acao'] ?? '';
    if ($acao == 'logout'){
        //e esse é quando você clica
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
<?php
//onde vai receber os dados
require_once "models/Produto.php";
//precisa ter acesso a consulta do sql
$acao = isset($_GET['acao']) ? $_GET['acao'] : 'listar_produto';
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
if ($acao =='listar_produto'){
    $produtos =listarProdutos();
    include "views/listar_produto.php";
}
if ($acao == 'criar_produto'){
    if ($_POST){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $fornecedor = $_POST['fornecedor'];
        $quantidade = $_POST['quantidade'];
        $fabricante = $_POST['fabricante'];
        $preco = $_POST['preco'];
        $margem = $_POST['margem'];
        $data_cadastro = $_POST['data_cadastro'];
        $status_pro = $_POST['status_pro'];
        // $imagem = "";

        // if ($_FILES['imagem']['name']){
        //     //esse files vai separar o binário do jpeg
        //     $imagem = "img/" . $_FILES['imagem']['name'];
        //     move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
        // }
        inserirProduto($nome, $descricao, $fornecedor, $quantidade,$fabricante, $preco, $margem, $data_cadastro, $status_pro);

        header("Location: index.php");
    }
    include "views/criar_produto.php";
}
if ($acao == 'editar_produto') {
    $id = $_GET['id'];

    if ($_POST){

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $fornecedor = $_POST['fornecedor'];
        $quantidade = $_POST['quantidade'];
        $fabricante = $_POST['fabricante'];
        $preco = $_POST['preco'];
        $margem = $_POST['margem'];
        $data_cadastro = $_POST['data_cadastro'];
        $status_pro = $_POST['status_pro'];
        
        $imagem = $_POST['imagem_atual'];

        if ($_FILES['imagem']['name']) {

            $imagem = "img/" . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
        }

        atualizarProduto($id, $nome, $descricao, $fornecedor, $quantidade,$fabricante, $preco, $margem, $data_cadastro, $status_pro);
        header("Location: index.php");
    }
    $produto= buscarProduto($id);
    include "views/editar_produto.php";
}
if ($acao == 'excluir_produto'){
    excluirProduto($_GET['id']);
    header("Location: index.php");

}

if ($acao == 'login'){
   $acao = $_GET['acao'] ?? '';

   if ($acao == 'login'){
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $produto = login_adm($login, $senha);
    if ($produto){
        $_SESSION['adm'] = $produto['nome'];
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
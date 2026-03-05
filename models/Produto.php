<?php
require_once "app/config/conexao.php";

function listarProdutos() {
    $con = conectar();
    $sql = "SELECT * FROM produto";
    $resultado = mysqli_query($con, $sql);

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function inserirProduto($nome, $descricao, $fornecedor, $quantidade, $fabricante, $preco, $margem, $data_cadastro, $status_pro){
    $con = conectar();
    $sql = "INSERT INTO produto (nome, descricao, fornecedor, quantidade, fabricante, preco, margem, data_cadastro, status_pro)
    VALUES ('$nome', '$descricao', '$fornecedor', '$quantidade', '$fabricante', '$preco', '$margem', '$data_cadastro', '$status_pro')";

    mysqli_query($con, $sql);
}

function buscarProduto($id){
    $con = conectar();
    $sql = "SELECT * FROM produto WHERE id = $id";
    $resultado = mysqli_query($con, $sql);

    return mysqli_fetch_assoc($resultado);
}

function atualizarProduto($id, $nome, $descricao, $fornecedor, $quantidade, $fabricante, $preco, $margem, $data_cadastro, $status_pro){
    $con = conectar();
    $sql = "UPDATE produto SET nome='$nome', descricao='$descricao', fornecedor='$fornecedor', quantidade='$quantidade', fabricante='$fabricante', preco='$preco', margem='$margem', data_cadastro='$data_cadastro', status_pro='$status_pro' WHERE id='$id'";

    mysqli_query($con, $sql);
}

function excluirProduto($id){
    $con = conectar();
    $sql = "DELETE FROM produto WHERE id=$id";

    mysqli_query($con, $sql);
}

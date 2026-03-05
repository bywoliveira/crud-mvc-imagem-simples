<?php
// require_once "controllers/UsuarioController.php";
session_start();
//os cookie, quando se abre uma sessão, cria uma variavel q guarda sua sessão
//se tem q sair se não for usa mais, se não fica salvo
//PODE SER ADM

include "app/config/conexao.php";
include "models/Usuario.php";
include "models/Produto.php";
include "controllers/UsuarioController.php";
include "controllers/ProdutoController.php";
//include nos 3 itens, o view não está pois precisa de uma verficação do session

if(isset($_SESSION['adm'])){
    //a sessão adm está ativa? se tiver vai printa bem vindo
    //informação dentro da sessão
    //para usuario ao inves de ser adm, pode se user
    echo"<p>";
    echo "Bem-vindo(a)," .$_SESSION['adm'];
    //session é uma variavel global que transporta informação
    echo " | ";
    echo "<a href='index.php?acao=logout'>Sair</a>";
    //parte de logout para sair da session
    echo "</p>";
    // include "views/listar_produto.php";

}else{
    include "views/login.php";
}
?>
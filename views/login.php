<h2>Login do Sistema</h2>
<?php if (isset($erro)){ ?>
    <p style="color:red;"><?php echo $erro; ?></p>
<?php } ?>

<form method="POST" action="index.php?acao=login">
    Login:
    <input type="text" name="login"><br><br>
    Senha:
    <input type="password" name="senha"><br><br>
    
    <button type="submit">Entrar</button>

</form>
<!--  -->
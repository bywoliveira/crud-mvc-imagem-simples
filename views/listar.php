<style>
table {
    border-collapse: collapse;
    width: 100%;
}

table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 5px;
}
</style>

<h2>Lista de Usuário</h2>
<br>
<br>
<a href="index.php?acao=criar">Novo Usuário</a>
<br>
<br>
<table border="01" >
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Imagem</th>
    <th>Ações</th>

</tr>
<?php foreach ($usuarios as $u) { ?>
<tr>
    <td><?php echo $u['id']; ?></td>
    <td><?php echo $u['nome']; ?></td>
    <td><?php echo $u['email']; ?></td>
    <td>
        <?php if ($u['imagem']) { ?>
            <img src="<?php echo $u['imagem']; ?>" width="80">
        <?php } ?>
    </td>
    <td>
        <a href="index.php?acao=editar&id=<?php echo $u['id']; ?>">editar</a>
        <a href="index.php?acao=excluir&id=<?php echo $u['id']; ?>">Excluir</a>
    </td>
</tr>

<?php } ?>

</table>
       


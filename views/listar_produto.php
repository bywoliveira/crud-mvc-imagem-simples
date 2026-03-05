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

<h2>Lista de Produto</h2>
<br>
<br>
<a href="index.php?acao=criar_produto">Novo Produto</a>
<br>
<br>
<table border="01" >
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Descrição</th>
    <th>Fornecedor</th>
    <th>Quantidade</th>
    <th>Fabricante</th>
    <th>Preço</th>
    <th>Margem</th>
    <th>Data_cadastro</th>
    <th>Status_pro</th>

</tr>
<?php foreach ($produtos as $p) { ?>
<tr>
    <td><?php echo $p['id']; ?></td>
    <td><?php echo $p['nome']; ?></td>
    <td><?php echo $p['descricao']; ?></td>
    <td><?php echo $p['fornecedor']; ?></td>
    <td><?php echo $p['quantidade']; ?></td>
    <td><?php echo $p['fabricante']; ?></td>
    <td><?php echo $p['preco']; ?></td>
    <td><?php echo $p['margem']; ?></td>
    <td><?php echo $p['data_cadastro']; ?></td>
    <td><?php echo $p['status_pro']; ?></td>

     <!-- <td>
        <?php if ($p['imagem2']){ ?>
            <img src="<?php echo $p['imagem2']; ?>" width="80">
        <?php } ?>
    </td> -->

    <td>
        <a href="index.php?acao=editar_produto&id=<?php echo $p['id']; ?>">editar produto</a>
        <a href="index.php?acao=excluir_produto&id=<?php echo $p['id']; ?>">Excluir produto</a>
    </td>
</tr>

<?php } ?>

</table>
       


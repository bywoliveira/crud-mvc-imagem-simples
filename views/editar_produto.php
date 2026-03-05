<h2>Editar Produto</h2>
<form method= "POST" enctype="multipart/form-data">
    Nome:
    <input type="text" name="nome" value="<?= $produto['nome']; ?>"><br><br>
    Descrição:
    <input type="text" name="descricao" value="<?= $produto['descricao']; ?>"><br><br>
    Fornecedor:
    <input type="text" name="fornecedor" value="<?= $produto['fornecedor']; ?>"><br><br>
    Quantidade:
    <input type="text" name="quantidade" value="<?= $produto['quantidade']; ?>"><br><br>
    Fabricante:
    <input type="text" name="fabricante" value="<?= $produto['fabricante']; ?>"><br><br>
    Preço:
    <input type="number" name="preco" value="<?= $produto['preco']; ?>"><br><br>
    Margem:
    <input type="number" name="margem" value="<?= $produto['margem']; ?>"><br><br>
    Data_cadastro:
    <input type="datetime-local" name="data_cadastro" value="<?= $produto['data_cadastro']; ?>"><br><br>
    Status_pro:
    <input type="text" name="status_pro" value="<?= $produto['status_pro']; ?>"><br><br>

    <?php if ($produto['imagem']) { ?>
    <img scr="<?= $produto['imagem']?>" alt="Imagem do Produto" width="100"><br>
   <?php } ?>
   Nova Imagem:
   <input type="file" name="imagem"><br><br>
   <input type="hidden" name="imagem_atual" value ="<?php echo $produto['imagem']; ?>">
   <button type ="submit"> Atualizar</button>
</form>
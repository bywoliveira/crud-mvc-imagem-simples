<h2>Editar Uusuário</h2>
<form method= "POST" enctype="multipart/form-data">
    Nome:
    <input type="text" name="nome" value="<?= $usuario['nome']; ?>"><br><br>
    Email:
    <input type="email" name="email" value="<?= $usuario['email']; ?>"><br><br>
    <?php if ($usuario['imagem']) { ?>
    <img scr="<?= $usuario['imagem']?>" alt="Imagem do Usuário" width="100"><br>
   <?php } ?>
   Nova Imagem:
   <input type="file" name="imagem"><br><br>
   <input type="hidden" name="imagem_atual" value ="<?php echo $usuario['imagem']; ?>">
   <button type ="submit"> Atualizar</button>
</form>
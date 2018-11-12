<h4>Deseja excluir a categoria <?php
    $usu = $this->getDados("categoria");
    if ($usu instanceof Categoria) {
        echo $usu->getDescricao();
    }
    ?>?</h4>
<form method="post" action="<?php echo URL; ?>controle-categoria/confirma-exclusao">
    <input type="hidden" name="id" value="<?php
    if ($usu instanceof Categoria) {
        echo $usu->getId();
    }
    ?>">
    <input type="submit" value="Sim">
</form>
<a href="<?php echo URL; ?>controle-categoria/lista-de-categorias" >Não</a>

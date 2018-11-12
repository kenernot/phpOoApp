<h4>Deseja excluir o produto <?php
    $usu = $this->getDados("produto");
    if ($usu instanceof Produto) {
        echo $usu->getNome();
    }
    ?>?</h4>
<form method="post" action="<?php echo URL; ?>controle-produto/confirma-exclusao">
    <input type="hidden" name="id" value="<?php
    if ($usu instanceof Produto) {
        echo $usu->getId();
    }
    ?>">
    <input type="submit" value="Sim">
</form>
<a href="<?php echo URL; ?>controle-produto/lista-de-produtos" >Não</a>

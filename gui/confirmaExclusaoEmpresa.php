<h4>Deseja excluir o empresa <?php
    $usu = $this->getDados("empresa");
    if ($usu instanceof Empresa) {
        echo $usu->getNome();
    }
    ?>?</h4>
<form method="post" action="<?php echo URL; ?>controle-empresa/confirma-exclusao">
    <input type="hidden" name="idEmpresa" value="<?php
    if ($usu instanceof Empresa) {
        echo $usu->getIdEmpresa();
    }
    ?>">
    <input type="submit" value="Sim">
</form>
<a href="<?php echo URL; ?>controle-empresa/lista-de-empresa" >Não</a>

<div class="container">
    <?php
    $id = "";
    $descricao = "";
    $situacao = "";

    $categoria = $this->getDados("categoria");
    if ($categoria) {
        $categoria instanceof Categoria;
        $id = $categoria->getId();
        $descricao = $categoria->getDescricao();
        $situacao = $categoria->getSituacao();
    }
    ?>

    <form method="post" enctype="multipart/form-data" action="<?php echo URL; ?>controle-categoria/salvar"> 
        <label>Id</label><br>
        <input class="form-control" type="text" readonly="true" value="<?php echo $id; ?>" name="id"><br>
        <label>Descricao</label><br>
        <input class="form-control" type="text" value="<?php echo $descricao; ?>" name="descricao"><br>

        <select class="form-control" name="situacao">
            <option value="A" <?php
            if ($situacao == 'A') {
                echo 'selected="true"';
            }
            ?>>Ativo</option>
            <option value="I" <?php
            if ($situacao == 'I') {
                echo 'selected="true"';
            }
            ?>>Inativo</option>
        </select>
        <hr/>
        <hr/>
        <input type="submit" class="btn btn-success" value="Salvar"><br>
        <a class="btn btn-default" href="<?php echo URL; ?>controle-categoria/lista-de-categorias">voltar</a><br>
    </form>
</div>
<script type="text/javascript" src="<?= URL ?>/js/jquery.3.1.1.min.js"></script>
<script type="text/javascript" src="<?= URL ?>/js/bootstrap.min.js"></script>
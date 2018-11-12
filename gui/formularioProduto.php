<div class="container">
    <?php
    $id = "";
    $nome = "";
    $valor = "";
    $situacao = "";

    $produto = $this->getDados("produto");
    $categorias = $this->getDados("categorias");
    if ($produto) {
        $produto instanceof Produto;
        $id = $produto->getId();
        $nome = $produto->getNome();
        $valor = $produto->getValor();
        $situacao = $produto->getSituacao();

        $categoria = $produto->getCategoria();
    }
    ?>

    <form method="post" enctype="multipart/form-data" action="<?php echo URL; ?>controle-produto/salvar"> 
        <label>Id</label><br>
        <input class="form-control" type="text" readonly="true" value="<?php echo $id; ?>" name="id"><br>
        <label>Nome</label><br>
        <input class="form-control" type="text" value="<?php echo $nome; ?>" name="nome"><br>
        <label>Valor</label><br>
        <input  class="form-control" type="text" value="<?php echo $valor; ?>" name="valor"><br>
        <label>Situação</label><br>
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
        <label>Categorias</label>
        <select class="form-control" name="categoria">
            <?php
            foreach ($categorias as $emp) :
                $emp instanceof Categoria;
                ?>
                <option <?php
                if (
                        ($produto->getCategoria() instanceof Categoria) &&
                        ($produto->getCategoria()->getId() === $emp->getId())
                ):
                    ?>
                        selected ="selected"

                        <?php
                    endif;
                    ?> value="<?= $emp->getId() ?>"><?= $emp->getDescricao() ?> </option>
                    <?php
                endforeach;
                ?>
        </select>
        <hr/>
        <hr/>
        <input type="submit" class="btn btn-success" value="Salvar"><br>
        <a class="btn btn-default" href="<?php echo URL; ?>controle-produto/lista-de-produtos">voltar</a><br>
    </form>
</div>
<script type="text/javascript" src="<?= URL ?>/js/jquery.3.1.1.min.js"></script>
<script type="text/javascript" src="<?= URL ?>/js/bootstrap.min.js"></script>
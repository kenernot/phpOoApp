

<div class="container">

    <a class="btn btn-danger" href="<?php echo URL; ?>Login/logout/">
        <i class="glyphicon glyphicon-remove"></i> Logout</a>
    <a class="btn btn-primary" href="<?php echo URL; ?>controle-categoria/novo/">Novo Categoria</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>DESCRICAO</th>
                <th>SITUAÇÃO</th>
            </tr>
        <tbody>

            <?php if ($this->getDados('categorias')): ?>
                <?php $ar = $this->getDados('categorias'); ?>
                <?php $myArray = ["A" => "Ativo", "I" => "Inativo"]; ?>

                <?php foreach ($ar as $categoria): ?>
                    <?php $categoria instanceof Categoria; ?>

                    <tr><td><?= $categoria->getId() ?></td>
                        <td><?= $categoria->getDescricao() ?></td>
                        <td><?= $myArray{$categoria->getSituacao()} ?></td>
                        <td>
                            <a class="btn btn-default" 
                               href="<?= URL ?>controle-descricao/excluir/<?= $categoria->getId() ?>">
                                excluir
                            </a> &nbsp;
                            <a class="btn btn-default" href="<?= URL ?>controle-descricao/editar/<?= $categoria->getId() ?>">
                                editar
                            </a>
                        </td></tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
        </thead>    
    </table>

</div>

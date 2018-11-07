

<div class="container">

    <a class="btn btn-danger" href="<?php echo URL; ?>Login/logout/">
        <i class="glyphicon glyphicon-remove"></i> Logout</a>
    <a class="btn btn-primary" href="<?php echo URL; ?>controle-empresa/novo/">Novo Empresa</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>SITUAÇÃO</th>
            </tr>
        <tbody>

            <?php if ($this->getDados('empresas')): ?>
                <?php $ar = $this->getDados('empresas'); ?>
                <?php $myArray = ["A" => "Ativo", "I" => "Inativo"]; ?>

                <?php foreach ($ar as $empresa): ?>
                    <?php $empresa instanceof Empresa; ?>

                    <tr><td><?= $empresa->getIdEmpresa() ?></td>
                        <td><?= $empresa->getNome() ?></td>
                        <td><?= $myArray{$empresa->getSituacao()} ?></td>
                        <td>
                            <a class="btn btn-default" 
                               href="<?= URL ?>controle-empresa/excluir/<?= $empresa->getIdEmpresa() ?>">
                                excluir
                            </a> &nbsp;
                            <a class="btn btn-default" href="<?= URL ?>controle-empresa/editar/<?= $empresa->getIdEmpresa() ?>">
                                editar
                            </a>
                        </td></tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
        </thead>    
    </table>

</div>

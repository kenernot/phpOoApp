<?php

/**
 * Description of ControleUsuario
 *
 * @author Administrador
 */
class ControleEmpresa implements IPrivateTO {

    public function listaDeEmpresa() {
        $du = new DaoEmpresa();
        $empresas = $du->listarTodos();
        $v = new TGui("listaDeEmpresa");
        $v->addDados("empresas", $empresas);
        $v->renderizar();
    }

    public function editar($idEmpresa) {
        $p1 = $idEmpresa[2];
        $du = new DaoEmpresa();
        $u = $du->listar($p1);
        $v = new TGui("formularioEmpresa");
        $v->addDados("empresa", $u);
        $v->renderizar();
    }

    public function novo() {
        $u = new Empresa();
        $v = new TGui("formularioEmpresa");
        $v->addDados("empresa", $u);
        $v->renderizar();
    }

    public function salvar() {
        $u = new Empresa();

        $idEmpresa = isset($_POST['idEmpresa']) ? $_POST['idEmpresa'] : FALSE;
        if (trim($idEmpresa) != "") {
            $u->setIdEmpresa($idEmpresa);
        }
        $nome = isset($_POST['nome']) ? $_POST['nome'] : FALSE;
        if (!$nome || trim($nome) == "") {
            throw new Exception("O campo nome é obrigatório!");
        }

        $situacao = isset($_POST['situacao']) ? $_POST['situacao'] : FALSE;
        if (!$situacao || trim($situacao) == "") {
            throw new Exception("O campo situacao é obrigatório!");
        }

        $u->setNome($nome);
        $u->setSituacao($situacao);

        $du = new DaoEmpresa();
        $du->salvar($u);


        header("location: " . URL . "controle-empresa/lista-de-empresa");
    }

    public function excluir($idEmpresa) {
        $p1 = $idEmpresa[2];
        $du = new DaoEmpresa();
        $u = $du->listar($p1);
        $v = new TGui("confirmaExclusaoEmpresa");
        $v->addDados("empresa", $u);
        $v->renderizar();
    }

    public function confirmaExclusao() {
        $idEmpresa = isset($_POST['idEmpresa']) ? $_POST['idEmpresa'] : false;
        if ($idEmpresa) {
            $du = new DaoEmpresa();
            $u = $du->listar($idEmpresa);
            if ($du->excluir($u)) {
                header("location: " . URL . "controle-empresa/lista-de-empresa");
            } else {
                throw new Exception("Não foi possível excluir o registro!");
            }
        } else {
            header("location: " . URL . "controle-empresa/lista-de-empresa");
        }
    }

}

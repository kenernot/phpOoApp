<?php

class ControleCategoria implements IPrivateTO {

    public function listaDeCategorias() {
        $du = new DaoCategoria();
        $categorias = $du->listarTodos();
        $v = new TGui("listaDeCategorias");
        $v->addDados("categorias", $categorias);
        $v->renderizar();
    }

    public function editar($id) {
        $p1 = $id[2];
        $du = new DaoCategoria();
        $u = $du->listar($p1);
        $v = new TGui("formularioCategoria");
        $v->addDados("categoria", $u);
        $v->renderizar();
    }

    public function novo() {
        $u = new Categoria();
        $v = new TGui("formularioCategoria");
        $v->addDados("categoria", $u);
        $v->renderizar();
    }

    public function salvar() {
        $u = new Categoria();

        $id = isset($_POST['id']) ? $_POST['id'] : FALSE;
        if (trim($id) != "") {
            $u->setId($id);
        }
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : FALSE;
        if (!$descricao || trim($descricao) == "") {
            throw new Exception("O campo descrição é obrigatório!");
        }

        $situacao = isset($_POST['situacao']) ? $_POST['situacao'] : FALSE;
        if (!$situacao || trim($situacao) == "") {
            throw new Exception("O campo situacao é obrigatório!");
        }

        $u->setDescricao($descricao);
        $u->setSituacao($situacao);

        $du = new DaoCategoria();
        $du->salvar($u);

        header("location: " . URL . "controle-categoria/lista-de-categorias");
    }

    public function excluir($id) {
        $p1 = $id[2];
        $du = new DaoCategoria();
        $u = $du->listar($p1);
        $v = new TGui("confirmaExclusaoCategoria");
        $v->addDados("categoria", $u);
        $v->renderizar();
    }

    public function confirmaExclusao() {
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        if ($id) {
            $du = new DaoCategoria();
            $u = $du->listar($id);
            if ($du->excluir($u)) {
                header("location: " . URL . "controle-categoria/lista-de-categorias");
            } else {
                throw new Exception("Não foi possível excluir o registro!");
            }
        } else {
            header("location: " . URL . "controle-categoria/lista-de-categorias");
        }
    }

}

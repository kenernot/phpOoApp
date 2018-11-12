<?php

/**
 * Description of ControleUsuario
 *
 * @author Administrador
 */
class ControleProduto implements IPrivateTO {

    public function listaDeProdutos() {
        $du = new DaoProduto();
        $produtos = $du->listarTodos();
        $v = new TGui("listaDeProdutos");
        $v->addDados("produtos", $produtos);
        $v->renderizar();
    }

    public function editar($id) {
        $p1 = $id[2];
        $du = new DaoProduto();
        $u = $du->listar($p1);
        $v = new TGui("formularioProduto");
        $v->addDados("produto", $u);
        $v->addDados("categorias", $this->getCategorias());
        $v->renderizar();
    }

    private function getCategorias() {
        $de = new DaoCategoria();
        return $de->listarTodos();
    }

    public function novo() {
        $u = new Produto();
        $v = new TGui("formularioProduto");
        $v->addDados("produto", $u);
        $v->addDados("categorias", $this->getCategorias());
        $v->renderizar();
    }

    public function salvar() {
        $u = new Produto();
        $id = isset($_POST['id']) ? $_POST['id'] : FALSE;
        if (trim($id) != "") {
            $u->setId($id);
        }
        $nome = isset($_POST['nome']) ? $_POST['nome'] : FALSE;
        if (!$nome || trim($nome) == "") {
            throw new Exception("O campo nome é obrigatório!");
        }
        $valor = isset($_POST['valor']) ? $_POST['valor'] : FALSE;
        if (!$valor || trim($valor) == "" || !is_float($valor))  {
            throw new Exception("O campo valor é obrigatório!");
        }
        $situacao = isset($_POST['situacao']) ? $_POST['situacao'] : FALSE;
        if (!$situacao || trim($situacao) == "") {
            throw new Exception("O campo situacao é obrigatório!");
        }
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : FALSE;
        if (!$categoria || trim($categoria) == "") {
            throw new Exception("O campo categoria é obrigatório!");
        }
        $u->setNome($nome);
        $u->setValor($valor);
        $u->setSituacao($situacao);

        $daoEmp = new DaoCategoria();
        $u->setCategoria($daoEmp->listar($categoria));

        
        $du = new DaoProduto();
        $usu = $du->salvar($u);
        
        if ($usu instanceof Produto) {
            header("location: " . URL . "controle-produto/lista-de-produtos");
        } else {
            echo "Não foi possivel salvar o usuário";
        }
    }

    public function excluir($id) {
        $p1 = $id[2];
        $du = new DaoProduto();
        $u = $du->listar($p1);
        $v = new TGui("confirmaExclusaoProduto");
        $v->addDados("produto", $u);
        $v->renderizar();
    }

    public function confirmaExclusao() {
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        if ($id) {
            $du = new DaoProduto();
            $u = $du->listar($id);
            if ($du->excluir($u)) {
                header("location: " . URL . "controle-produto/lista-de-produtos");
            } else {
                echo "Não foi possível excluir o registro!";
            }
        } else {
            header("location: " . URL . "controle-produtos/lista-de-produtos");
        }
    }

}

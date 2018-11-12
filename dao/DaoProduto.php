<?php

class DaoProduto implements IDao {

    public function excluir($u) {
        $sql = "delete FROM produto where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $p1 = $u->getId();
        $sth->bindParam("ID", $p1);
        try {
            $sth->execute();
            return true;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

    /**
     * 
     * @param int $p1
     * @return Usuario
     */
    public function listar($p1) {

        $sql = "SELECT id, nome, valor, situacao, idcategoria FROM produto where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID", $p1);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $usu = $sth->fetchObject("Produto");
        $demp = new DaoCategoria();
        if ($usu->idcategoria) {
            $emp = $demp->listar($usu->idcategoria);
            $usu->setCategoria($emp);
        }

        return $usu;
    }

    /**
     * 
     * @param int $p1
     * @return ArrayObject
     */

    public function listarTodos() {
        $sql = "SELECT id, nome, valor, situacao, idcategoria FROM produto;";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $arUsu = array();
        while ($usu = $sth->fetchObject("Produto")) {
            $demp = new DaoCategoria();
            if ($usu->idcategoria) {
                $emp = $demp->listar($usu->idcategoria);
                $usu->setCategoria($emp);
            }
            $arUsu[] = $usu;
        }
        return $arUsu;
    }

    public function salvar($u) {
        $id = 0;
        $nome = $u->getNome();
        $valor = $u->getValor();
        $situacao = $u->getSituacao();
        $idcategoria = $u->getCategoria()->getId();
        if ($u->getId()) {
            $id = $u->getId();
            $sql = "update produto set nome=:nome, valor=:valor, situacao=:situacao, "
                    . " idcategoria=:idcategoria where id=:id";
        } else {
            $sql = "insert into produto(id,nome,valor,situacao,idcategoria) values "
                    . "(:id,:nome, :valor,:situacao,:idcategoria);";
        }
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("id", $id);
        $sth->bindParam("nome", $nome);
        $sth->bindParam("valor", $valor);
        $sth->bindParam("situacao", $situacao);
        $sth->bindParam("idcategoria", $idcategoria);
        
        try {
            $sth->execute();
            return $u;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }


}

<?php

class DaoCategoria implements IDao {

    public function excluir($u) {
        $sql = "delete FROM categoria where id=:id";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $p1 = $u->getId();
        $sth->bindParam("id", $p1);
        try {
            $sth->execute();
            return true;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

    public function listar($p1) {
        $sql = "SELECT id, descricao, situacao FROM categoria where id=:id";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("id", $p1);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $cat = $sth->fetchObject("Categoria");
        return $cat;
    }

    public function listarTodos() {
        $sql = "SELECT id, descricao, situacao FROM categoria;";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $arCat = array();
        while ($cat = $sth->fetchObject("Categoria")) {

            $arCat[] = $cat;
        }
        return $arCat;
    }

    
    public function salvar($u) {
        $descricao = $u->getDescricao();
        $id = 0;
        $situacao = $u->getSituacao();
        
        if ($u->getId()) {
            $id = $u->getId();
            $sql = "update categoria set descricao=:descricao, situacao=:situacao where id=:id";
        } else {
            $sql = "insert into categoria(id,descricao,situacao) values "
                    . "(:id,:descricao, :situacao)";
        }
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("id", $id);
        $sth->bindParam("descricao", $descricao);
        $sth->bindParam("situacao", $situacao);
        try {
            $sth->execute();
            return $u;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

}

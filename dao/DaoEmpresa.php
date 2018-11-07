<?php

class DaoEmpresa implements IDao {

    public function excluir($u) {
        $sql = "delete FROM empresa where idEmpresa=:idEmpresa";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $p1 = $u->getIdEmpresa();
        $sth->bindParam("idEmpresa", $p1);
        try {
            $sth->execute();
            return true;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

    public function listar($p1) {
        $sql = "SELECT idEmpresa, nome, situacao FROM empresa where idEmpresa=:idEmpresa";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("idEmpresa", $p1);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $usu = $sth->fetchObject("Empresa");
        return $usu;
    }

    public function listarTodos() {
        $sql = "SELECT idEmpresa, nome, situacao FROM empresa";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $arUsu = array();
        while ($usu = $sth->fetchObject("Empresa")) {

            $arUsu[] = $usu;
        }
        return $arUsu;
    }

    
    public function salvar($u) {
        $nome = $u->getNome();
        $idEmpresa = 0;
        $situacao = $u->getSituacao();
        
        if ($u->getIdEmpresa()) {
            $idEmpresa = $u->getIdEmpresa();
            $sql = "update empresa set nome=:nome, situacao=:situacao where idEmpresa=:idEmpresa";
        } else {
            $sql = "insert into empresa(idEmpresa,nome,situacao) values "
                    . "(:idEmpresa,:nome, :situacao)";
        }
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("idEmpresa", $idEmpresa);
        $sth->bindParam("nome", $nome);
        $sth->bindParam("situacao", $situacao);
        try {
            $sth->execute();
            return $u;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

}

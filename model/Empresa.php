<?php

class Empresa {
    
    private $idEmpresa;
    private $nome;
    private $situacao;
    
    function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function getNome() {
        return $this->nome;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }


}
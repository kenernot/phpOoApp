<?php

class Produto {

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getValor() {
        return $this->valor;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    private $id;
    private $nome;
    private $valor;
    private $situacao;
    private $categoria;

}

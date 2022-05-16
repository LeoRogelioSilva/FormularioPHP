<?php

class Pessoa{
    private  $nome;
    private $celular;
    private $email;
    private $cep;
    private $rua;
    private $numero;
    private $bairro;
    private $cidade;
    private $uf;
    private $id;

    function __construct( $nome, $celular, $email, $cep, $rua, $numero, $bairro, $cidade, $uf){
        $this->nome = $nome;
        $this->celular = $celular;
        $this->email = $email;
        $this->cep = $cep;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->id = "";
    }

    /* GETTERS */

    function getNome(){
        return $this->nome;
    }
    function getCelular() {
        return $this->celular;
    }
    function getEmail() {
        return $this->email;
    }
    function getCep() {
        return $this->cep;
    }
    function getNumero() {
        return $this->numero;
    }
    function getBairro() {
        return $this->bairro;
    }
    function getCidade() {
        return $this->cidade;
    }
    function getUf() {
        return $this->uf;
    }
    function getId() {
        return $this->id;
    }
    function getRua() {
        return $this->rua;
    }

    function setData($conexao){
        $statement = $conexao->prepare('INSERT INTO userdata VALUES (?,?,?,?,?,?,?,?,?,?)');
        $statement->bind_param('sisisissss', $this->nome,$this->celular,$this->email,$this->cep,$this->rua,$this->numero,$this->bairro, $this->cidade, $this->uf, $this->id);
        $statement->execute();
    }


}


?>
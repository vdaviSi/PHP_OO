<?php

abstract class Produto{

    protected $codigo;
    protected $preco;

    public function getCodigo(){
        return $this->codigo;
    }

    public function getPreco(){
        return $this->preco;
    }
}
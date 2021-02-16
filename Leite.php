<?php

require_once "Produto.php";
require_once "Perecivel.php";

class Leite extends Produto implements Perecivel{

    private $marca;
    private $volume;
    private $dataValidade;

    public function getMarca(){
        return $this->marca;
    }

    public function getVolume(){
        return $this->volume;
    }

    public function getDataValidade(bool $format){
        if($format){
            return date("d/m/Y", strtotime($this->dataValidade));
        }

        return $this->dataValidade;
    }

    public function __construct($codigo, $preco, $marca, $volume, $dataValidade)
    {
        $key = array_search("", ["codigo" => $codigo,"preco" => $preco,"marca" => $marca, "volume" => $volume,"data" => $dataValidade]);
        if($key){
            throw new Exception("InformaçãoNulaException: O valor {$key} está vazio");
        }

        $this->codigo = $codigo;
        $this->preco = $preco;
        $this->marca = $marca;
        $this->volume = $volume;
        $this->dataValidade = $dataValidade;
    }

    public function estaVencido(): bool
    {
        return (strtotime(date("Y-m-d")) > strtotime($this->dataValidade));
    }
}
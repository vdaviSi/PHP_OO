<?php
ini_set("display_errors", 1);

require_once "Leite.php";
require_once "Dvd.php";

$estoque = [];
for ($i = 15; $i <= 18; $i++){
    if($i <= 18){
        array_push($estoque, (new Dvd($i, 15, "Filme {$i}", "200{$i}")));
        continue;
    }}
for ($i = 1; $i <= 10; $i++){
    if($i <= 6){
        array_push($estoque, (new Leite($i, 2.5, "Marca {$i}", 1, date("Y-m-d", strtotime("-".($i-0)." days")))));
    }
}

//LEITES VENCIDOS
$vencidos = [];
$lance = 2016;
$dvds = [];
$total = 0;
foreach ($estoque as $item){
    if($item instanceof Leite){
        if($item->estaVencido()){
            array_push($vencidos, $item);
        }
    }else if($item instanceof Dvd){
        array_push($dvds, $item);
    }
    $total += $item->getPreco();
}

if(!empty($vencidos)){
    echo "<p>Os leites vencidos:</p>";
    foreach ($vencidos as $item){
        echo "<p>Cod: {$item->getCodigo()}, Marca: {$item->getMarca()}, Vencimento: ".$item->getDataValidade(true)."</p>";
    }
}

//DVDS
if(!empty($dvds)){
    echo "<p>O dvd lançado em {$lance}:</p>";
    foreach ($dvds as $item){
        echo "<p>Cod: {$item->getCodigo()}, Titulo: {$item->getTitulo()}, Ano: ".$item->getAno()."</p>";
    }
}

echo "<p>Valor total do estoque: R$ ".number_format($total, 2, ",", ".")."</p>";





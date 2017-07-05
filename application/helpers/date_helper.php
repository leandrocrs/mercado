<?php
function dataPtBrParaMysql($dataPtBr) 
{
    $partes = explode("/", $dataPtBr);
    return "{$partes[2]}-{$partes[1]}-{$partes[0]}";
}

function dataMysqlParaPtBr($dataMysql) 
{
    $dataPtBr = new DateTime($dataMysql);
    return $dataPtBr->format("d/m/Y");
}
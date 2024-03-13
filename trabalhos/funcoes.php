<?php
require "../config.php";
include DATABASE;

function produtos(){
    try {
        $vResults = readBase("Produtos");
        return $vResults;
    } catch (Exception $objErr) {
        echo "<h2> Algo deu errado ". $objErr-> getMessage(). "</h2>";
    }
}


?>
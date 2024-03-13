
<?php
    include "funcoes.php";
    if (empty($_GET['i'])) {
        echo "Erro";
    }
    $vId = base64_decode($_GET['i']);
    deletar($vId);

?>


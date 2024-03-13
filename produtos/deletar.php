
<?php
    include "funcoes.php";
    if (empty($_GET['i'])) {
       // header("Location: index.php");
    }
    $vId = base64_decode($_GET['i']);
    deletar($vId);

?>


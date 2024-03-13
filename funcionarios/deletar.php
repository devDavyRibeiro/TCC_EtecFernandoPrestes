
<?php
    include "funcoes.php";
    if (empty($_GET['i'])) {
        header("Location:" . BASEURL);
    }
    $vId = base64_decode($_GET['i']);
    deletar($vId);

?>


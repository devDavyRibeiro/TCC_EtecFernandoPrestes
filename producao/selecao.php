<?php
include "funcoes.php";
include HEADER_TEMPLATE;
$vDates = selecao();
?>
<?php if ($vDates) : ?>
<br>
    <div class="boxleitura">
        <h1 class="text-center">Meus Orçamentos</h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">Nome do Cliente</th>
                        <th scope="col">Pagamento Feito</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vDates as $vKey) : ?>
                        <?php
                        if ($vKey['conclupag_orcamento'] == "s") {
                            $vConclupag = "Sim";
                            $vId = base64_encode($vKey['id_orcamento']); //codifica o id
                        }
                        ?>
                        <tr>
                            <td><?php echo $vKey['nome_cliente']; ?></td>
                            <td><?php echo $vConclupag; ?></td>
                            <td>
                                <a class=" btn buttonp" href="cadastro.php?i=<?php echo $vId; ?>">Produção</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
<?php include FOOTER_TEMPLATE; ?>
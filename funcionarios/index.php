<?php
require "../config.php";
include DATABASE;
include HEADER_TEMPLATE;

valid_login(); //valida o login direto
?>
<div class="conteudo">
    <div class="row">
        <?php if (check_admin()):?>
            <div class="col">
                <a class="btn btn-primary" href="agenda.php">Agenda</a>   
            </div>
            <div class="col">
                <a class="btn btn-primary" href="orcamentos.php">Orçamentos</a>   
            </div>
            <div class="col">
                <a class="btn btn-primary" href="../produtos/">Edição de Produtos</a>   
            </div>
            <div class="col">
                <a class="btn btn-primary" href="cadastro.php">Cadastro</a>  <!-- Provisório, somente para eu conseguir testar -->
				<a class="btn btn-primary" href="leitura.php">Todos os Funcionários</a>  <!-- Provisório, somente para eu conseguir testar --> 
            </div>
        <?php else:?>
            <!-- code -->
        <?php endif;?>
    </div>
       
       
</div>
<?php include FOOTER_TEMPLATE;?>
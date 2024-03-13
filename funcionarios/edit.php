<?php
include "funcoes.php";
include HEADER_TEMPLATE;
if (empty($_GET['i'])) {
    header("Location: ../index.php");
}

$vId = base64_decode($_GET['i']);
$vValue = editar($vId);

?>
<br>
<div class="boxcadastro">
    <h1 class="text-center">Edição de Funcionário</h1>
    <hr>
    <div class="formulario container">
        <form action="#" method="post">
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label">Nome</label>
                    <input type="text" class="form-control" name="nome"value="<?php echo $vValue['nome_funcionario']?>" required maxlength="100">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Telefone</label>
                    <input type="text" class="form-control" name="telefone"value="<?php echo $vValue['telefone_funcionario']?>" required pattern="[0-9]{11}" maxlength="11">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $vValue['email_funcionario']?>"required maxlength="100">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">RG</label>
                    <input type="text" class="form-control" name="rg"value="<?php echo $vValue['rg_funcionario']?>" required pattern="[0-9]{9}" maxlength="9">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Endereço</label>
                    <input type="text" class="form-control" name="endereco" value="<?php echo $vValue['endereco_funcionario']?>"required maxlength="250">
                </div>
            </div>
            <?php if($vValue['cargo_funcionario'] !="admin"):?>
                <div class="row">
                    <div class="mb-3 col-11">
                        <label for="form-cargo" class="form-label">Cargo</label>
                        <select class="form-select" name="cargo" id="form-cargo">
                            <?php if($vValue['cargo_funcionario'] =="Produção"):?>
                                <option selected value="Produção">Produção</option>
                                <option value="Orçamento">Orçamento</option>
                            <?php else:?>
                                <option value="Produção">Produção</option>
                                <option selected value="Orçamento">Orçamento</option>                              
                            <?php endif;?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="mb-4 col-11">
                    <label class="form-label">Senha</label>
                    <input type="password" class="form-control" name="senha"value="<?php echo $_SESSION['senha']?>" required maxlength="50">
                </div>
            </div>

            <div class="row">
                <div>
                    <button type="submit" class="btn buttone text-center">Salvar</button>
                    <a href="../index.php" type="reset" class="btn buttond2 text-center">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <br>
</div>
<?php include FOOTER_TEMPLATE; ?>
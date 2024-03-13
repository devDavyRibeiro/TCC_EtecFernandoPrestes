<?php
include "funcoes.php";
include HEADER_TEMPLATE;
form();
?>
<br>
<div class="boxcadastro">
    <h1 class="text-center">Cadastro de Funcionários</h1>
    <hr>
    <div class="formulario container">
        <form action="#" method="post">
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" required maxlength="100">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Telefone</label>
                    <input type="text" class="form-control" name="telefone" required pattern="[0-9]{11}" maxlength="11">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Email</label>
                    <input type="email" class="form-control" name="email" required maxlength="100">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">RG</label>
                    <input type="text" class="form-control" name="rg" required pattern="[0-9]{9}" maxlength="9">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Endereço</label>
                    <input type="text" class="form-control" name="endereco" required maxlength="250">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label for="form-cargo" class="form-label">Cargo</label>
                    <select class="form-select" name="cargo" id="form-cargo">
                        <option selected value="Produção">Produção</option>
                        <option value="Orçamento">Orçamento</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-4 col-11">
                    <label class="form-label">Senha</label>
                    <input type="password" class="form-control" name="senha" required maxlength="50">
                </div>
            </div>

            <div class="row justify-content-end">
                <div>
                    <button type="submit" class="btn buttone text-center">Criar</button>
                    <a href="../index.php" type="reset" class="btn buttond2 text-center">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <br>
</div>
<?php include FOOTER_TEMPLATE; ?>
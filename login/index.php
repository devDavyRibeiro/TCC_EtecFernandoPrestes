<?php
require "login.php";
include HEADER_TEMPLATE;
login();
?>
<div class="conteudo">
    <div class="mt-4">
            <form action="#" method="post" class="login">
                <h1 class="ps-3">Login</h1><hr>
                <div class="mb-3 ps-4 row">
                    <label class="col-1 col-form-label">Email</label>
                    <div class="col-10">
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </div>
                <div class="mb-3 ps-4 row">
                    <label class="col-1 col-form-label">Senha</label>
                    <div class="col-10">
                        <input type="password" class="form-control" name="senha" required>
                    </div>
                </div>
                <div class="row mb-3 ps-4">
                    <a class="h6" href="#">Esqueci minha Senha</a>
                    <a class="h6" href="../clientes/cadastrar.php">Não possuo cadastro</a>
                </div>
                <div class="row ms-5">
                    <button type="submit" class="btn btn-dark col-5 me-2 mb-5">Entrar</button>
                    <button type="reset" class="btn btn-dark col-5 mb-5">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
    
</div>

<?php include FOOTER_TEMPLATE;?>
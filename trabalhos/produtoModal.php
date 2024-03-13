<div class="modal fade" id="produtoModal" tabindex="-1" aria-labelledby="produtoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered custom-modal-size modal-with-background">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="produtoModalLabel">Entrar</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="meuModal">
                    <!-- Conteúdo do modal -->
                    <img src="<?php echo IMAGEM.$vKey['foto_produto'];?>" alt="Card image cap">
                    
                        <h4 class="card-title"><?php echo $vKey['nome_produto'];?></h4>
                        <p class="card-text"><?php echo $vKey['valor_produto']; ?></p>
                        <?php if(check_admin()):?>
                            <a href="../produtos/edit.php?i=<?php echo base64_encode($vKey['id_produto']); ?>" class="btn btn-primary">Editar</a>
                        <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
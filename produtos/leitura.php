<?php
 include "funcoes.php";
include HEADER_TEMPLATE;
$vDates = leitura();							
?>

<br>
<?php if(!is_null($vDates)):?>
<div class="boxleitura">

<h1 class="text-center">Produtos</h1>
<hr>

<div class="table-responsive">
	<table class="table table-striped table-hover table-dark">
		<thead>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Valor</th>
				<th scope="col">Foto</th>
				<th scope="col">Opção </th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($vDates as $vKey):?>
				<tr class="">
					<td scope="row"><?php echo $vKey['nome_produto']; ?></td>
					<td>R$<?php echo $vKey['valor_produto']; ?></td>
					<?php
						$vFoto = "";
						if (empty($vKey['foto_produto'])) {
							$vFoto = "imagens/SemImagem.png";
						}
						else {
							$vFoto = $vKey['foto_produto'];
						}
					?>
					<td><img src="<?php echo IMAGEM.$vFoto;?>" alt="Imagem do Produto" width="200px"></td>
					<?php
						$vId = base64_encode($vKey['id_produto']); //codifica o id
						$_GET['i'] = $vId; ?>
					<td><a class=" btn buttone" href="edit.php?i=<?php echo $_GET['i'];?>">Editar</a>
					<a class=" btn buttond" href="deletar.php?i=<?php echo $_GET['i'];?>">Deletar</a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
</div>
<?php else: ?>
		<h1>Nenhuma Agenda</h1>
<?php endif; ?>
<?php include FOOTER_TEMPLATE; ?>

<?php
include "funcoes.php";
include HEADER_TEMPLATE;
$vDates = leitura();
?>
<br>
<?php if(!is_null($vDates)):?>
<div class="boxleitura">
	<h1 class="text-center">Todos Em Produção</h1>
	<hr>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-dark">
			<thead>
				<tr>
                    <th scope="col">Nome do Cliente</th>
					<th scope="col">Nome do Funcionario</th>
					<th scope="col">Produto</th>
					<th scope="col">Material</th>
					<th scope="col">Serviço</th>
					<th scope="col">Medidas</th>
					<th scope="col">Data de Entrega</th>
                    <th>Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($vDates as $vKey):?>
					<tr >
						<td scope="row"><?php echo $vKey['nome_cliente']; ?></td>
						<td><?php echo $vKey['nome_funcionario']; ?></td>
						<td><?php echo $vKey['nome_produto']; ?></td>
						<td><?php echo $vKey['material_orcamento_produto'];?></td>
						<td><?php echo $vKey['servico_orcamento_produto'];?></td>
						<td><?php echo $vKey['medida_orcamento_produto'];?></td>
						<td><?php echo formataData($vKey['entrega_orcamento'],"d/m/Y"); ?></td>
						<?php
						$vId = base64_encode($vKey['id_orcamento_produto']); //codifica o id
						$_GET['i'] = $vId; ?>
						<td>
							<a class="btn buttone" href="edit.php?i=<?php echo $_GET['i'];?>">Editar</a>
							<a class="btn buttond" href="deletar.php?i=<?php echo $_GET['i'];?>">Deletar</a>
							<a class="btn buttonp" href="concluir.php?i=<?php echo $_GET['i'];?>">Concluido</a>
						</td>
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
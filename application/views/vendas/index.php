<h1>Minhas vendas</h1>
<table class="table">
	<tbody>
		<?php foreach ($produtosVendidos as $produtoVendido) : ?>
		<tr>
			<td><?= $produtoVendido['nome'] ?></td>
			<td><?= dataMysqlParaPtBr($produtoVendido['data_entrega']) ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
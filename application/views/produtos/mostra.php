<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href=<?=base_url("css/bootstrap.css")?> />
	<meta charset="utf-8" />
	<title>Produto <?= $produto["nome"] ?></title>
</head>
<body>
<div class="container">
	<h1><?= $produto["nome"] ?></h1>
	<h3><?= numeroEmReais($produto["preco"]) ?></h3>
	<?= auto_typography(html_escape($produto["descricao"])) ?>
	<?php
	echo form_open("vendas/novo");
	
	echo form_hidden("produto_id", $produto["id"]);

	echo form_label("Data de entrega","data_de_entrega");
	echo form_input(array(
					"name"=>"data_de_entrega",
					"id"=>"data_de_entrega",
					"class"=>"form-control",
					"type" =>"text",
					"value"=> set_value("data_de_entrega","")
				));

	echo form_button(array(					
					"id"=>"botao",
					"content"=>"Comprar",
					"class"=>"btn btn-success",
					"type"=>"submit"					
				));

	echo form_close();
	?>
</div>
</body>
</html>
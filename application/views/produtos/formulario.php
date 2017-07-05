<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href=<?=base_url("css/bootstrap.css")?> />
	<title></title>
</head>
<body>
<div class="container">
<h2>Cadastro de produtos</h2>

<!-- <?= validation_errors('<p class="alert alert-warning">','</p>')?> -->

		<?php 	
		echo form_open("produtos/novo");	

		echo form_label("Nome","nome");				
		echo form_input(array(
					"name"=>"nome",
					"id"=>"nome",
					"class"=>"form-control",
					"maxlength"=>"255",
					"value"=> set_value("nome","")
				));

		echo form_error("nome");

		echo form_label("Preço","preco");				
		echo form_input(array(
					"name"=>"preco",
					"id"=>"preco",
					"class"=>"form-control",					
					"type"=>"number",
					"value"=> set_value("preco","")
				));

		echo form_error("preco");

		echo form_label("Descrição","descricao");				
		echo form_textarea(array(
					"name"=>"descricao",
					"id"=>"descricao",
					"class"=>"form-control",	
					"value"=> set_value("descricao","")
				));

		echo form_error("descricao");

		echo form_button(array(					
					"id"=>"botao",
					"content"=>"Cadastrar",
					"class"=>"btn btn-primary",
					"type"=>"submit"					
				));

		echo form_close();
		?>	
</div>
</body>
</html>

		<h1>Produtos</h1>
		<table class="table">	
			<thead>				
				<td>Nome</td>
				<td>Preço</td>
				<td>Descrição</td>
			</thead>
			<tbody>
			<?php foreach ($produtos as $produto) :?>
				<tr>
					<td><?= anchor("produtos/{$produto['id']}", $produto["nome"]) ?></td>
					<td><?= numeroEmReais($produto["preco"])?></td>
					<td><?= character_limiter(html_escape($produto["descricao"], 10)) ?></td>
				</tr>
			<?php endforeach?>
			</tbody>
		</table>
		
		<?php if($this->session->userdata("usuario_logado")): ?>
		<?= anchor("produtos/formulario", "Cadastrar", array("class"=>"btn btn-primary")) ?>
		<?= anchor("login/logout", "Sair", array("class"=>"btn btn-primary")) ?>		
		<?php else : ?>
		<h2>Autenticar-se</h2>
		<?php 	
		echo form_open("login/autenticar");			
		echo form_label("E-mail","email");				
		echo form_input(array(
					"name"=>"email",
					"id"=>"email",
					"type"=>"email",					
					"class"=>"form-control",
					"maxlength"=>"255"
				));
		echo form_label("Senha","senha");				
		echo form_password(array(
					"name"=>"senha",
					"id"=>"senha",
					"class"=>"form-control",					
					"maxlength"=>"255"
				));

		echo form_button(array(					
					"id"=>"botao",
					"content"=>"Entrar",
					"class"=>"btn btn-primary",
					"type"=>"submit"					
				));

		echo form_close();
		?>				
		
		<h2>Cadastro</h2>
		<?php 	
		echo form_open("usuarios/novo");	

		echo form_error("nome");
		echo form_label("Nome","nome");
		echo form_input(array(
					"name"=>"nome",
					"id"=>"nome",
					"class"=>"form-control",
					"value"=>set_value("nome",""),
					"maxlength"=>"255"
				));

		echo form_error("email");
		echo form_label("E-mail","email");				
		echo form_input(array(
					"name"=>"email",
					"id"=>"email",
					"type"=>"email",
					"class"=>"form-control",
					"value"=>set_value("email",""),
					"maxlength"=>"255"
				));

		echo form_error("senha");
		echo form_label("Senha","senha");				
		echo form_password(array(
					"name"=>"senha",
					"id"=>"senha",
					"class"=>"form-control",
					"value"=>set_value("senha",""),
					"maxlength"=>"30"
				));

		echo form_button(array(					
					"id"=>"botao",
					"content"=>"Cadastrar",
					"class"=>"btn btn-primary",
					"type"=>"submit"					
				));

		echo form_close();
		?>		
<?php endif ?>	
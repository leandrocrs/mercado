<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index()
	{
		//$this->output->enable_profiler(TRUE);

		$this->load->model("produtos_model");

		$produtos = $this->produtos_model->buscaNaoVendidos();			

		$dados = array("produtos"=>$produtos);

		$this->load->helper(array("currency"));
		$this->load->template("produtos/index.php",$dados);		
		
	}

	public function formulario() 
	{
		autoriza();
        $this->load->template("produtos/formulario");        
    }

	public function novo()
	{

		autoriza();

		// Validação		

		// Colocar 'callback_' antes do nome da função personalizada.
		$this->form_validation->set_rules("nome", "nome", "trim|required|min_length[5]|max_length[100]|callback_nao_tenha_a_palavra_melhor");
		$this->form_validation->set_rules("preco", "preço", "required|decimal");
		$this->form_validation->set_rules("descricao", "descrição", "trim|required|min_length[10]");

		$this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

		$is_valid = $this->form_validation->run();

		if($is_valid)
		{

			$produto = array(
				"nome" => $this->input->post("nome"),
				"preco" => $this->input->post("preco"),
				"descricao" => $this->input->post("descricao"),
				"usuario_id" => $this->session->userdata["usuario_logado"]["id"]
			);

			$this->load->model("produtos_model");
			$this->produtos_model->salvar($produto);

			$this->session->set_flashdata("success", "Produto salvo com sucesso");

			redirect('/');

		} 
		else 
		{
			$this->load->template("produtos/formulario");

		}

	}

	public function mostra($id)
	{

		//$this->output->enable_profiler(TRUE);

		//$id = $this->input->get("id");
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->busca($id);

		$dados = array("produto"=>$produto);

		$this->load->helper(array("typography", "currency"));

		$this->load->template("produtos/mostra.php", $dados);

	}

	public function nao_tenha_a_palavra_melhor($nome)
	{		
		if (strpos($nome, "melhor") !== TRUE)
		{			
            return TRUE;
        }
        else
        {
        	$this->form_validation->set_message("nao_tenha_a_palavra_melhor", "O campo %s não pode conter a palavra 'melhor'.");            
            return FALSE;
        }
	}

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
	public function novo()
	{
		
		//$this->output->enable_profiler(TRUE);

		// Validação				
		$this->form_validation->set_rules("nome", "nome", "required|trim|alpha|min_length[5]|max_length[255]");
		$this->form_validation->set_rules("email", "e-mail", "required|valid_email|is_unique[usuarios.email]");
		$this->form_validation->set_rules("senha", "senha", "required|min_length[8]|max_length[30]");		

		$this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

		$is_valid = $this->form_validation->run();

		if ($is_valid)
		{
			$usuario = array(
				"nome"=>$this->input->post("nome"),
				"email"=>$this->input->post("email"),
				"senha"=>md5($this->input->post("senha"))
			);
		
			$this->load->model("usuarios_model");

			$this->usuarios_model->salvar($usuario);

			$this->session->set_flashdata("success", "Usuário salvo com sucesso");

		}

		redirect('/');
	}

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function autenticar(){

		$this->load->model("usuarios_model");
			
		$email = $this->input->post("email");
		$senha = md5($this->input->post("senha"));

		$usuario = $this->usuarios_model->buscaPorEmailESenha($email, $senha);
		if ($usuario){
			$this->session->set_userdata("usuario_logado", $usuario);
			$this->session->set_flashdata("success", "Logado com sucesso");
			$dados = array("mensagem" => "Autenticado");
		} else {
			$dados = array("mensagem" => "Não autorizado");
			$this->session->set_flashdata("error", "Usuário ou senha invalidos");
		}
		$this->load->template("login/autenticar", $dados);		
		redirect('/');

	}

	public function logout()
	{
		$this->session->unset_userdata("usuario_logado");
		$this->session->set_flashdata("info", "Sessão finalizada.");
		redirect('/');

	}

}

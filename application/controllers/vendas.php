<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendas extends CI_Controller
{

	public function index()
	{		

		$usuario_logado = autoriza();
		//$this->output->enable_profiler(TRUE);

		$this->load->model('produtos_model');

		$produtosVendidos = $this->produtos_model->buscaVendidosPorVendedor($usuario_logado);

		$dados = array('produtosVendidos'=>$produtosVendidos);

		$this->load->template('vendas/index', $dados);
	}

	public function novo()
	{
		$usuario_logado = autoriza();

		$this->output->enable_profiler(TRUE);

		$this->load->model(array('vendas_model', 'produtos_model', 'usuarios_model'));
		
		$venda = array(
			'produto_id'   => $this->input->post('produto_id'),
			'comprador_id' => $usuario_logado["id"],
			'data_entrega' => dataPtBrParaMysql($this->input->post('data_de_entrega'))
		);

		$this->vendas_model->salva($venda);

		$this->load->library("email");

		$config = array(
						"protocol" => "smtp",						
						"smtp_host"=> "ssl://smtp.gmail.com",
						"charset"  => "utf-8",
						"smtp_user"=> 'leandrw@email.com',
						"smtp_pass"=> '*********************',
						"mailtype" => 'html',
						"newline"  => "\r\n",
						"smtp_port"=> '25'
					);
		$this->email->initialize($config);

		$produto = $this->produtos_model->busca($venda["produto_id"]);
        $vendedor = $this->usuarios_model->busca($produto["usuario_id"]);

        $dados = array("produto" => $produto);
        $conteudo = $this->load->view("vendas/email.php", $dados);

		$this->email->from("codeigniteralura@gmail.com", "Mercado");
        $this->email->to($vendedor["email"]);
        $this->email->subject("Seu produto {$produto['nome']} foi vendido!");
        $this->email->message("<html>Seu produto {$produto['nome']} foi vendido!</html>");
        $this->email->send();

		$this->session->set_flashdata('success','Pedido realizado com sucesso.');
		redirect('/');
	}

}

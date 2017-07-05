<?php

class Produtos_model extends CI_Model 
{
	public function buscaTodos()
	{
		return $this->db->get("produtos")->result_array();
	}

	public function buscaNaoVendidos()
	{
		$this->db->where("vendido", '0');
		return $this->db->get("produtos")->result_array();
	}

	public function buscaVendidosPorVendedor($vendedor)
	{
		$this->db->select('produtos.*, vendas.data_entrega');
		$this->db->from('produtos');
		$this->db->join('vendas', 'produtos.id = vendas.produto_id');
		$this->db->where('vendido', true);
		$this->db->where('usuario_id', $vendedor['id']);
		return $this->db->get()->result_array();
	}

	public function salvar($produto)
	{
		$this->db->insert("produtos", $produto);
	}

	public function busca($id)
	{
		return $this->db->get_where("produtos", array("id"=>$id))->row_array();
	}

}
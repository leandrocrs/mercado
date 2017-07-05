<?php
class Vendas_model extends CI_Model 
{
    public function salva($venda) {
        $this->db->insert("vendas", $venda);
        $this->db->update("produtos",
        				array("vendido"=> 1),
        				array("id"=> $venda["produto_id"])
		);
    }
}
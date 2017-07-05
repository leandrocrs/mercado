<?php
function autoriza()
{
	$ci = get_instance();
	$usuario_logado = $ci->session->userdata('usuario_logado');
	if (!$usuario_logado)
	{
		$ci->session->set_flashdata("danger", "Você precisa estar logado.");
        redirect("/");        
	}

	return $usuario_logado;
}
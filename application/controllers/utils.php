<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utils extends CI_Controller {

	public function migrate()
	{
		$this->output->enable_profiler(TRUE);
		$this->load->library('migration');

		$success = $this->migration->current();

		if ($success)
		{
			echo 'Migrado com sucesso.';
		} else {
			show_error($this->migration->error_string());
		}

	}

}
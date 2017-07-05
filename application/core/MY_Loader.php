<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

    public function template($view, $dados = array()) {    	
        $this->view("header.php");
        $this->view($view, $dados);
        $this->view("footer.php");    
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

}
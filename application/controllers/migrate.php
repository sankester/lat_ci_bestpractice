<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 15/04/2017
 * Time: 09:08
 */
class Migrate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->input->is_cli_request() == false) {
            show_404();
        }
        $this->load->library('migration');
//        $this->load->dbforge();
    }

    public function latest()
    {
        $this->migration->latest();
        echo $this->migration->error_string() . PHP_EOL;
    }

    public function reset()
    {
        $this->migration->version(0);
        echo $this->migration->error_string() . PHP_EOL;
    }

    public function version($version = 0)
    {
        $version = (int)$version;
        if ($version == 0) {
            echo "Kamu harus menginputkan versi lebih dari 0" . PHP_EOL;
        }

        $this->migration->version($version);
        echo $this->migration->error_string() . PHP_EOL;
    }
}
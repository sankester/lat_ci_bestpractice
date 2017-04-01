<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use Netcarver\Textile;

class Welcome extends MY_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();


	}
	public function index()
	{

//		$this->benchmark->mark('data_start');
//		$user = $this->ion_auth->user()->row();
//		$this->benchmark->mark('data_end');

//		dump($user);

//		$this->output->enable_profiler(ENVIRONMENT  == 'development');
		$data = array('subview' => 'homepage');
		$this->load->view('layouts/layout', $data );
//		$parser = new Textile\Parser();
//
//		$string = 'h1. Welcome'. PHP_EOL. PHP_EOL;
//		$string .= '* List Item'. PHP_EOL;
//		$string .= '* Another List Item'. PHP_EOL;
//
//		echo $parser->textileThis($string);

	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		//Do your magic here
		$this->load->model('User');		
		// session_destroy();
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{

		$id = $this->input->post('id');
		$password = md5($this->input->post('password'));
		$where = array(	'id' => $id,'password' => $password);
		$cek = $this->User->check('user',$where);
		foreach ($cek->result() as $value) {
			$level =  $value->level ;
		}	
		// var_dump($cek->num_rows()) or die;
		if($cek->num_rows() > 0){
			$array = 	array( 'nip' => $nip , 'status' => 'login' ,'level' => $level);
			$this->session->set_userdata( $array );
			redirect('awal');
		} else {
			$this->session->set_flashdata('error', true);
			redirect();
		}

	}
	public function logout(){
		session_destroy();
		redirect();
	}
}

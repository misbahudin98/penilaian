<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    if($this->session->userdata('status') != 'login'){
	    	redirect();
	    }
        
        date_default_timezone_set('Asia/Jakarta');
		$this->load->model('User');
	}
	public function index(){
		$this->load->view('header');
		$this->load->view('admin_panel/main');	
	}
	public function score(){
		$data['que']=$this->User->get('kuesioner')->result();
		$this->load->view('header');
		$this->load->view('admin_panel/main');	
	}
	public function que($level){
			$data['que']=$this->User->get_where('kuesioner',['level' =>$level])->result();
			// $data['que']=$this->User->que()->result();
			// var_dump($data['que']) or die;
			$this->load->view('header');

			$this->load->view('admin_panel/que',$data);	
	}	

	public function add_que(){

			$data= [ 'kuesioner' =>	$this->input->post('kuesioner'),
				     'level' 	 =>	$this->session->flashdata('type') ];
			$this->User->insert('kuesioner',$data);
			if($this->session->flashdata('type') != 'atasan'){
				$data['kriteria'] = $this->input->post('kriteria');
			}
			redirect(base_url('que/'.$this->session->flashdata('type')));
	}

	public function delete_que($id){

			$where = ['id'=> $id];
			$this->User->delete('kuesioner',$where);
			
			redirect(base_url('que/'.$this->session->flashdata('type')));

	}

	public function update_que(){
		$data =  
			['id'=>$this->input->post('id'),
			 'kuesioner'=> $this->input->post('kuesioner')
			];

		$where = ['id'=> $this->input->post('id')];
		if($this->session->flashdata('type') != 'atasan'){
			$data['kriteria'] = $this->input->post('kriteria');
		}
		$this->User->update('kuesioner',$data,$where);
		
		redirect(base_url('que/'.$this->session->flashdata('type')));
	}

	public function user(){
		$data['user']=$this->User->get('user')->result();
		
		$this->load->view('header');

		$this->load->view('admin_panel/user',$data);	
	}	


	public function add_user(){
		$id = $this->input->post('id');
		$password = md5($this->input->post('password'));
		$nama = $this->input->post('nama');
		$level = $this->input->post('level');
		$data= ['id' =>	$id,
				'password' 	=>	$password,
				'nama' 		=>	$nama,
				'level' 	=>	$level ];
		$this->User->insert('user',$data);
		
		redirect(base_url('user'));
	}

	public function delete_user($id){
		$where = ['id'=> $id];
		$this->User->delete('user',$where);
		
		redirect(base_url('user'));
	}

	public function update_user(){
		$data =  
			['id'=>$this->input->post('id1'),
			 'password'=> md5($this->input->post('password1')),
			 'nama' => $this->input->post('nama1'),
			 'level' => $this->input->post('level1')
			];
		$where = ['id'=> intval($this->input->post('id_real'))];

		$this->User->update('user',$data,$where);
		// var_dump($this->db->last_query()) or die;		
		redirect(base_url('user'));
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
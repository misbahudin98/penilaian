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
			$data['que']=$this->User->que($level)->result();
			// $data['que']=$this->User->que()->result();
			// var_dump($data['que']) or die;
			$this->load->view('header');

			$this->load->view('admin_panel/que',$data);	
	}	

	public function add_que(){

			$data= [ 'kuesioner'   =>	$this->input->post('kuesioner') ];
			if($this->session->flashdata('type') != 'atasan'){
				$data['id_kriteria'] = $this->input->post('kriteria');
				$this->User->insert('kuesioner',$data);
			}
			elseif ($this->session->flashdata('type') == 'atasan') {
				$data['id_kriteria'] = 8;
				$this->User->insert('kuesioner',$data);
			}
			redirect(base_url('que/'.$this->session->flashdata('type')));
	}

	public function delete_que($id){

			$where = ['id'=> $id];
			$this->User->delete('kuesioner',$where);
			// var_dump($this->db->last_query()) or die;
			redirect(base_url('que/'.$this->session->flashdata('type')));

	}

	public function update_que(){
		$data =  
			[
			 'kuesioner'=> $this->input->post('kuesioner')
			];

		$where = ['id'=> intval($this->input->post('id'))];
		if($this->session->flashdata('type') != 'atasan'){
				$data['id_kriteria'] = $this->input->post('kriteria');
				$this->User->update('kuesioner',$data,$where);
				
			}
			elseif ($this->session->flashdata('type') == 'atasan') {
				$data['id_kriteria'] = 8;

				$this->User->update('kuesioner',$data,$where);
			}

		// var_dump($this->db->last_query()) or die;
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

	public function criteria($level)
	{
		if($level = 'atasan'){
			$where = ['id >' => 9];
			$data['bobot'] =$this->User->get_where('skor_kriteria',$where)->result();
		}
		if ($level  = 'mahasiswa') {
			$where = ['id <' => 4];
			$data['bobot'] =$this->User->get_where('skor_kriteria',$where)->result();
		}
		if ($level = 'rekan') {
			$where = ['id >' => 4 ,
					  'id <' => 9];	
			$data['bobot'] =$this->User->get_where('skor_kriteria',$where)->result();
		}
	}

	public function count($level)
	{
		$data['bobot'] = [];
		$z = $this->invers(3);

		var_dump($z) or die;
		if($level = 'atasan'){
			$where = ['id >=' => 10];
			$bobot =$this->User->get_where('skor_kriteria',$where)->result();
			$id = [];
			$nilai = [];
			foreach ($bobot as $bobot) {
			 	
				array_push($id, $bobot->id);
				array_push($nilai, $bobot->nilai);
			 
			}
			
			for ($i=0; $i < 3 ; $i++) { 
				for ($j=0; $j < 3 ; $j++) { 

					if ($i == 0 && $j == 1) {
						echo  $nilai[0];
					}
					elseif ($i == 0 && $j == 2) {
						echo  $nilai[1];
					}
					elseif ($i == 1 && $j == 2) {
						echo  $nilai[2];
					}
					elseif ($i == 1 && $j == 0) {
						echo 'das';
					}
					elseif ($i == 1 && $j == 0) {
						echo 'das';
					}
					elseif ($i == 2 && $j == 0) {
						echo 'd';
					}
					elseif ($i == 2 && $j == 1) {
						echo 'i';
					}
					else{
						echo '1';
					}
					
					echo "&emsp;";
				}
				echo "<br>";
			}		

		}
		if ($level  = 'mahasiswa') {
			$where = ['id <' => 4];
			$data['bobot'] =$this->User->get_where('skor_kriteria',$where)->result();
		}
		if ($level = 'rekan') {
			$where = ['id >' => 4 ,
					  'id <' => 9];	
			$data['bobot'] =$this->User->get_where('skor_kriteria',$where)->result();
		}

		
	}

	public function invers($value)
	{
		$a = [2,3,4,5,6,7,8,9];
		$b = [0.5,0.333,0.25,0.2,0.167,0.143,0.125,0.111];
		

		

		if( is_float($value) ){
			$value = array_search($value, $b);
			$value = $a[$value];	
		}	

		if(!is_float($value)){
			$value = array_search($value, $a);
			$value = $b[$value];
		}

		return $value ;
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
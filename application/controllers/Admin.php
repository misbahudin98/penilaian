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

		if($level = 'atasan'){
			$where = ['id >=' => 10];
			$bobot =$this->User->get_where('skor_kriteria',$where)->result();
			$id = [];
			$nilai = [];
			foreach ($bobot as $bobot) {
			 	
				array_push($id, $bobot->id);
				array_push($nilai, $bobot->nilai);
			 
			}

			$data = $this->matrik_3($nilai);
			var_dump($data) or die;
			
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

	public function matrik_3($value)
	{
		// var_dump($this->invers($value[0])) or die;
			$data[0] = [];
			$data[1] = [];
			$data[2] = [];

			for ($i=0; $i < 3 ; $i++) { 
				for ($j=0; $j < 3 ; $j++) { 

					if ($i == 0 && $j == 0) {
						array_push($data[0], 1);
					}

					elseif ($i == 0 && $j == 1) {
						array_push($data[1], $value[0]);
					}

					elseif ($i == 0 && $j == 2) {
						array_push($data[2], $value[1]);
					}


					elseif ($i == 1 && $j == 0) {
						array_push($data[0] , $this->invers($value[0]) ) ;
					}

					elseif ($i == 1 && $j == 1) {
						array_push($data[1], 1);
					}

					elseif ($i == 1 && $j == 2) {
						array_push($data[2], $value[2])  ;
					}

					
					elseif ($i == 2 && $j == 0) {
						array_push($data[0], $this->invers($value[1]));
					}
					elseif ($i == 2 && $j == 1) {
						array_push($data[1], $this->invers($value[2]));
					}
					elseif ($i == 2 && $j == 2) {
						array_push($data[2], 1);
					}					

				}

			}		

			$data[0] = array_map(
			    function($value) { return (float)$value; },
			    $data[0]
			);
			$data[1] = array_map(
			    function($value) { return (float)$value; },
			    $data[1]
			);
			$data[2] = array_map(
			    function($value) { return (float)$value; },
			    $data[2]
			);

			$hasil['awal'] = $data;
			$hasil['jumlah'] = $this->increase_column($hasil['awal']);
			$hasil['pembagian'] = $this->devide_matrix($hasil['awal'],$hasil['jumlah']) ;

			$hasil['rata'] = $this->average_matrix($hasil['pembagian']);
			$hasil['kali'] = $this->multiply_matrix($hasil['awal'],$hasil['rata']);
			$hasil['prioritas'] = $this->priority_matrix($hasil['kali'],$hasil['rata']);
			$hasil['max'] = array_sum($hasil['prioritas'])/ count($hasil['prioritas']);
			$hasil['ci'] = ($hasil['max']-3)/(2);
			$hasil['cr'] = $hasil['ci'] / 0.58;
			
			
			return $hasil;
	}

	public function increase_column($data)
	{
		if (count($data) == 3) {
			# code...
			$data[0] = array_map(
			    function($value) { return (float)$value; },
			    $data[0]
			);
			$data[1] = array_map(
			    function($value) { return (float)$value; },
			    $data[1]
			);
			$data[2] = array_map(
			    function($value) { return (float)$value; },
			    $data[2]
			);
			$jumlah = [0 => floatval(0), 1 => floatval(0) , 2 => floatval(0) ]; 
			for ($i=0; $i < 3; $i++) { 
				$jumlah[0] = $jumlah[0] + $data[0][$i]  ;
				$jumlah[1] = $jumlah[1] + $data[1][$i]  ;
				$jumlah[2] = $jumlah[2] + $data[2][$i]  ;
			}
		}
		elseif (count($data) == 4) {
			# code...
			$data[0] = array_map(
			    function($value) { return (float)$value; },
			    $data[0]
			);
			$data[1] = array_map(
			    function($value) { return (float)$value; },
			    $data[1]
			);
			$data[2] = array_map(
			    function($value) { return (float)$value; },
			    $data[2]
			);
			$data[3] = array_map(
			    function($value) { return (float)$value; },
			    $data[4]
			);
			$jumlah = [0 => floatval(0), 1 => floatval(0) , 2 => floatval(0), 3 => floatval(0)  ]; 
			for ($i=0; $i < 4; $i++) { 
				$jumlah[0] = $jumlah[0] + $data[0][$i]  ;
				$jumlah[1] = $jumlah[1] + $data[1][$i]  ;
				$jumlah[2] = $jumlah[2] + $data[2][$i]  ;
				$jumlah[3] = $jumlah[3] + $data[3][$i]  ;
			}
		}

		return $jumlah;
	}

	public function devide_matrix($data ,$jumlah)
	{
		 // var_dump($jumlah) or die;
		if (count($data) == 3) {
			for ($i=0; $i < 3; $i++) { 
			 	$data[0][$i] = $data[0][$i] / $jumlah[0];
			 	$data[1][$i] = $data[1][$i] / $jumlah[1];
			 	$data[2][$i] = $data[2][$i] / $jumlah[2];
			 } 
		}
		elseif (count($data) == 4) {
			for ($i=0; $i < 4; $i++) { 
			 	$data[0][$i] = $data[0][$i] / $jumlah[0];
			 	$data[1][$i] = $data[1][$i] / $jumlah[1];
			 	$data[2][$i] = $data[2][$i] / $jumlah[2];
			 	$data[3][$i] = $data[3][$i] / $jumlah[3];
			 } 
		}
		return $data;
	}

	private function multiply_matrix($data , $rata)
	{
		// var_dump($data) or die;

			
		if (count($data) == 3) {

			$kali[0] = ($data[0][0]*$rata[0]) + ($data[1][0] * $rata[1] ) + ($data[2][0] * $rata[2]);   
			$kali[1] = ($data[0][1]*$rata[0]) + ($data[1][1] * $rata[1] ) + ($data[2][1] * $rata[2]);   
			$kali[2] = ($data[0][2]*$rata[0]) + ($data[1][2] * $rata[1] ) + ($data[2][2] * $rata[2]);   

		}
		elseif (count($data) == 4) {
			$kali[0] = ($data[0][0]*$rata[0]) + ($data[1][0] * $rata[1] ) + ($data[2][0] * $rata[2]) + ($data[3][0] * $rata[3]) ;   
			$kali[1] = ($data[0][1]*$rata[0]) + ($data[1][1] * $rata[1] ) + ($data[2][1] * $rata[2]) +  ($data[3][1] * $rata[3]);
			$kali[2] = ($data[0][2]*$rata[0]) + ($data[1][2] * $rata[1] ) + ($data[2][2] * $rata[2]) +
				($data[3][2] * $rata[3]);
			$kali[3] = ($data[0][3]*$rata[0]) + ($data[1][3] * $rata[1] ) + ($data[2][3] * $rata[2]) +
				($data[3][3] * $rata[3]);   


		}
		return $kali;
	}

	public function priority_matrix($data , $rata)
	{
		if (count($data) == 3) {
			$data[0] =$data[0]/$rata[0]; 
			$data[1] =$data[1]/$rata[1]; 
			$data[2] =$data[2]/$rata[2]; 
		}
		elseif (count($data) == 4) {
			$data[0] =$data[0]/$rata[0]; 
			$data[1] =$data[1]/$rata[1]; 
			$data[2] =$data[2]/$rata[2]; 
			$data[3] =$data[3]/$rata[3]; 
		}
		return $data;
	}

	public function average_matrix($data)
	{

		if (count($data) == 3) {

	 		$rata[0] = $data[0][0] +  $data[1][0] + $data[2][0] ;
	 		$rata[1] = $data[0][1] +  $data[1][1] + $data[2][1] ;
	 		$rata[2] = $data[0][2] +  $data[1][2] + $data[2][2] ;
	 		
	 		$rata[0] = $rata[0] / 3;
	 		$rata[1] = $rata[1] / 3;
	 		$rata[2] = $rata[2] / 3;


		}
		elseif (count($data) == 4) {

			$data[0] = array_sum($data[0]) / count($data);
		 	$data[1] = array_sum($data[1]) / count($data);
		 	$data[2] = array_sum($data[2]) / count($data);


		}
		return $rata;
	}

	public function invers($value)
	{
		$a = [2,3,4,5,6,7,8,9];
		$b = [0.5,0.333,0.25,0.2,0.167,0.143,0.125,0.111];
		


			
		if( array_search($value, $b) !== false ){
			$value = array_search($value, $b);
			$value = $a[$value];

		}	

		else{
			$value = array_search($value, $a);
			 $value = $b[$value];
		}

		return $value ;
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
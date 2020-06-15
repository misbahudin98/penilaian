<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != 'login' ){
	    	redirect();
	    }
	    $this->load->model('User');

	}

	public function index()
	{
		$data['profil']=$this->User->get_where('user',['id' => $this->session->userdata('nip')])->result_array();
		$skor  =$this->User->get_where('skor_awal',['id_penilai' => $this->session->userdata('nip'),'skor' => ' '])->result_array();
		$data['skor'] = sizeof($skor) == 0 ? : 1; 
		$data['sesi'] = $this->User->get('buka')->result_array();		

		$this->load->view('header');

		$this->load->view('assessor/dashboard',$data);
	}

	public function password()
	{
		$password = md5($this->input->post('password'));
		$this->User->update('user',['password'=>$password],['id' => $this->session->userdata('nip')]);
		redirect('profil');
	}

	public function que()
	{
		$data['kue'] =$this->User->kue( intval($this->session->userdata('nip')))->result_array();
		$data['sesi'] = $this->User->get('buka')->result_array();		
		// var_dump($data) or die();
		$this->load->view('header');
		$this->load->view('assessor/que',$data);

	}	


	public function input($id)
	{
		$data['kue'] =$this->User->kriteria( $this->session->userdata('level'))->result_array();
		$data['id'] = $id;
		// var_dump($data) or die();
		$this->load->view('header');
		$this->load->view('assessor/input',$data);

	}

	public function input_action()
	{

		// $id = explode(',',$this->input->post('id'));
		$level =  $this->User->get_where('kriteria',['level' => $this->session->userdata('level')])->result_array();
		// var_dump($level) or die;
		$kri = [];
		$kriteria = [];
		foreach ($level as $key ) {
			array_push($kri ,$key['id']);
			array_push($kriteria ,$key['kriteria']);
		}

		for ($i=0; $i < count($kri); $i++) { 
			$kue[$i] = $this->User->get_where('kuesioner',['id_kriteria' => $kri[$i] ])->result_array();
			$id[$i] = [];
			foreach ($kue[$i] as $key ) {
				 array_push($id[$i], intval($key['id'])) ;
			}
			$sum[$i] = 0;
			for ($j=0; $j < count($id[$i]) ; $j++) { 
				$sum[$i] += $this->input->post($id[$i][$j]);
				// echo $sum[$i];
				$avg[$i] = $sum[$i] / count($id[$i]);
			}

			$data[$kriteria[$i]] = $avg[$i];  
			// $data['rata'][$i]['kriteria'] = ;  

		}
		$data = json_encode($data);
		$this->db->update('skor_awal', ['skor' => $data],['id' => intval($this->input->post('id'))]);
		var_dump($this->db->last_query());
		// redirect('pilih');
	}	


	// public function password()
	// {
	// 	$this->load->view('header');
	// 	$this->load->view('assessor/password');
	// }

	// public function change_password()
	// {
	// 	redirect('ganti');
	// }
}

/* End of file assessor.php */
/* Location: ./application/controllers/assessor.php */
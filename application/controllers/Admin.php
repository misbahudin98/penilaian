<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    if( $this->session->userdata('level') != 'admin' or $this->session->userdata('status') != 'login' ){
	    	redirect();
	    }
        
        date_default_timezone_set('Asia/Jakarta');
		$this->load->model('User');
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('admin_panel/main');	
	}


	public function average()
	{
		$atasan  = $this->User->skor('atasan')->result_array();
		$dosen  = $this->User->skor('dosen')->result_array();
		$mahasiswa  = $this->User->skor('mahasiswa')->result_array();
		
		$dosen1 = $this->User->get_where('kriteria',['level'=> 'rekan'])->result_array();
		$mahasiswa1 = $this->User->get_where('kriteria',['level'=> 'mahasiswa'])->result_array();
		$atasan1 = $this->User->get_where('kriteria',['level'=> 'atasan'])->result_array();
		
		$data ['bobot']['dosen'] = $dosen1;
		$data ['bobot']['mahasiswa'] = $mahasiswa1;
		$data ['bobot']['atasan'] = $atasan1;

		$data['mahasiswa'] = [] ;
		for ($i=0; $i < count($mahasiswa); $i++) { 
			$data['mahasiswa'][$i+1] =  $this->json($mahasiswa[$i]['skor'],'mahasiswa');
			$data['mahasiswa'][$i+1]['jumlah'] = $mahasiswa[$i]['jumlah'] ;
			$data['mahasiswa'][$i+1]['id'] = $mahasiswa[$i]['id_dosen'] ;
		}
		$data['dosen'] = [] ;
		for ($i=0; $i < count($dosen); $i++) { 
			$data['dosen'][$i+1] = $this->json($dosen[$i]['skor'],'dosen');
			$data['dosen'][$i+1]['jumlah'] = $dosen[$i]['jumlah'] ;
			$data['dosen'][$i+1]['id'] = $dosen[$i]['id_dosen'] ;

		}

		$data['atasan'] = [] ;
		for ($i=0; $i < count($atasan); $i++) { 
			$data['atasan'][$i+1]= $this->json($atasan[$i]['skor'],'atasan');
			$data['atasan'][$i+1]['jumlah'] = $atasan[$i]['jumlah'] ;
			$data['atasan'][$i+1]['id'] = $atasan[$i]['id_dosen'] ;

		}

		return $data;
	}

	public function json($value)
	{	
		$value = json_decode('['.$value.']' , 1);
		
		 // var_dump($value) or die;
			$data['kepribadian'] = 0;	
			$data['pendagogik']  = 0;	
			$data['sosial'] 	 = 0;	
			if (isset($value[0]['profesional']) ) {
				$data['profesional'] = 0;	
			}
		
		for ($i=0; $i < count($value); $i++) { 
			$data['kepribadian'] += $value[$i]['kepribadian'];	
			$data['pendagogik']  += $value[$i]['pendagogik'];	
			$data['sosial'] 	 += $value[$i]['sosial'];	
			if (isset($value[0]['profesional']) ) {
				$data['profesional'] =  $value[$i]['profesional'];	
			}
		}
		$rata['kepribadian'] = $data['kepribadian'] / count($value);
		$rata['pendagogik'] = $data['pendagogik'] / count($value);
		$rata['sosial'] = $data['sosial'] / count($value);
		if (isset($value[0]['profesional']) ) {
			$rata['profesional'] = $data['profesional'] / count($value);
		}	
		return $rata;
	}

	public function score()
	{
		$data['matakuliah']=$this->User->get('matakuliah')->result();
		$data['penilai']=$this->User->get_where('user',['level !=' => 'admin'])->result();
		$data['dosen']=$this->User->get_where('user',['level' => 'dosen'])->result();
		$data['skor'] = $this->User->skor_awal()->result();

		$this->load->view('header');	
		$this->load->view('admin_panel/skor',$data);	
	}

	public function end()
	{
		$rata =$this->average();
		$bobot = $this->value($rata);
		$rank = $this->rank($bobot);
		$borda = $this->borda($rank);
		$data = $this->score_borda($borda);
		// var_dump($data)or die;
		

		$this->load->view('header');	
		$this->load->view('admin_panel/borda',$data);	
	}

	public function score_borda($data)
	{
		$sum = 0;
		for ($i=1; $i <= count($data['ranking']) ; $i++) { 
			$sum += $data['ranking'][$i]['sum'];
		}
		$data['jumlah_borda'] =$sum;
		for ($i=1; $i <= count($data['ranking']) ; $i++) { 
			 $data['ranking'][$i]['score'] = $data['ranking'][$i]['sum']/$data['jumlah_borda'] ;
		}


		return $data;
	}

	public function borda($data)
	{
		for ($i=1; $i <= count($data['mahasiswa']) ; $i++) { 
			# code...
			$mahasiswa = $data['mahasiswa'][$i]['rank'];
			$atasan = $data['atasan'][$i]['rank'];
			$dosen = $data['dosen'][$i]['rank'];
			for ($j=1; $j <= count($data['mahasiswa']) ; $j++) { 

				if ($mahasiswa == $atasan && $atasan == $dosen && $atasan == $j) {
					$a[$j] = ($data['mahasiswa'][$i]['bobot_h'] + $data['dosen'][$i]['bobot_h'] + $data['atasan'][$i]['bobot_h'] ) * $data['mahasiswa'][$i]['invers_rank'] ;
				}
				elseif ($mahasiswa == $atasan  && $atasan == $j) {
					$a[$j] = ($data['mahasiswa'][$i]['bobot_h'] + $data['atasan'][$i]['bobot_h'] ) * $data['mahasiswa'][$i]['invers_rank'] ;

				}
				elseif ($atasan == $dosen && $atasan == $j) {
					$a[$j] = ($data['atasan'][$i]['bobot_h'] + $data['dosen'][$i]['bobot_h'] )* $data['dosen'][$i]['invers_rank'] ;

				}
				elseif ( $dosen == $mahasiswa && $atasan == $j) {
					$a[$j] = ($data['dosen'][$i]['bobot_h'] + $data['mahasiswa'][$i]['bobot_h'] )* $data['dosen'][$i]['invers_rank'] ;

				}
				elseif ($dosen == $j ) {
					$a[$j] = $data['dosen'][$i]['bobot_h'] * $data['dosen'][$i]['invers_rank'] ;

				}
				elseif ($atasan == $j) {
					$a[$j] = $data['atasan'][$i]['bobot_h'] * $data['atasan'][$i]['invers_rank'];

				}
				elseif ( $mahasiswa == $j) {
					$a[$j] = $data['mahasiswa'][$i]['bobot_h'] * $data['mahasiswa'][$i]['invers_rank'];

				}
			


			}
			$sum = 0;
			foreach ($a as $key => $value) {
				$sum += $value; 
			}
			$data['ranking'][$i]['rank'] = $a;
			$data['ranking'][$i]['id'] = $data['mahasiswa'][$i]['id'];
			$data['ranking'][$i]['sum'] = $sum;

			unset($sum);
			unset($a);
		}
		return $data;
	}

	public function rank($data)
	{
		$atasan = [] ;
		$dosen = [] ;
		$mahasiswa = [] ;

		for ($i=1; $i <= count($data['dosen']) ; $i++) { 
			$dosen[$i] = $data['dosen'][$i]['bobot_h'];
		}

		for ($i=1; $i <= count($data['mahasiswa']) ; $i++) { 
			$mahasiswa[$i] = $data['mahasiswa'][$i]['bobot_h'];
		}

		for ($i=1; $i <= count($data['atasan']) ; $i++) { 
			$atasan[$i] =  $data['atasan'][$i]['bobot_h'] ;
		}

		// $dosen1 = $dosen;
		// arsort($dosen1);
		// $dosen2 = [];
		// foreach ($dosen1 as $key => $value) {
		// 	array_push($dosen2, $value); 
		// }
		
		// for ($i=0; $i < count($dosen); $i++) { 
		// 	$a = array_search($dosen2[$i], $dosen);
			
		// }


		$a= $this->rank_number($dosen);
		$b= $this->rank_number($atasan);
		$c= $this->rank_number($mahasiswa);
		
		for ($i=1; $i <= count($data['dosen']) ; $i++) { 

				$data['dosen'][$i]['rank'] = $a[$i];
			$data['dosen'][$i]['invers_rank'] = $this->invers_value(count($data['dosen']),$a[$i] );
			
		}
		for ($i=1; $i <= count($data['atasan']) ; $i++) { 
			$data['atasan'][$i]['rank'] = $b[$i];
			$data['atasan'][$i]['invers_rank'] = $this->invers_value(count($data['atasan']),$b[$i] );
		}

		for ($i=1; $i <= count($data['mahasiswa']) ; $i++) { 
			$data['mahasiswa'][$i]['rank'] = $c[$i];
			$data['mahasiswa'][$i]['invers_rank'] = $this->invers_value(count($data['mahasiswa']),$c[$i] );
		}

		// $des = [];
		// $urut = 1;
		// for ($i= count($data['mahasiswa'] ); $i > 0  ; $i--) { 
		//  	$des[$urut] = $i;	
		//  	$urut++;
		// } 

		// $data['borda'] = $des;
		return $data;
	}


	public function invers_value($value,$data)
	{
		$des = [];
		for ($i= $value; $i > 0  ; $i--) { 
		 	array_push($des, $i);	
		} 
		$asc = [];
		for ($i= 1; $i <= $value  ; $i++) { 
		 	array_push($asc, $i);
		}
		for ($i=0; $i < $value ; $i++) { 
			$index =  array_search($data, $asc);
		}
		// var_dump($index) or die;
		return  $des[$index];
	}	
	public function rank_number($data)
	{
		$data1 = $data;
		arsort($data1);
		$data2 = [];
		$c =1; 
		foreach ($data1 as $key => $value) {
			$data2[$c] = $value; 
			$c++;
		}
		$a =[];
		for ($i=1; $i <= count($data); $i++) { 
			$rank = array_search($data2[$i], $data);
			$a[$rank] = $i;
		}
		ksort($a);
		return $a;
	}

	public function value($data)
	{
		$dosen = $this->User->get_where('kriteria',['level'=> 'rekan'])->result_array();
		$mahasiswa = $this->User->get_where('kriteria',['level'=> 'mahasiswa'])->result_array();
		$atasan = $this->User->get_where('kriteria',['level'=> 'atasan'])->result_array();
		
		// var_dump($data) or die;
 		for ($i= 1; $i <= count($data['dosen']) ; $i++) { 

			$bobot[0] = $data['dosen'][$i]['kepribadian'] * $dosen[0]['bobot'];
			$bobot[1] = $data['dosen'][$i]['pendagogik'] * $dosen[1]['bobot'];
			$bobot[2] = $data['dosen'][$i]['sosial'] * $dosen[2]['bobot'];
			$bobot[3] = $data['dosen'][$i]['profesional'] * $dosen[3]['bobot'];
			$b = $bobot[0] + $bobot[1] + $bobot[2] + $bobot[3] ;

			$data['dosen'][$i]['bobot_1'] = $bobot[0];
			$data['dosen'][$i]['bobot_2'] = $bobot[1];
			$data['dosen'][$i]['bobot_3'] = $bobot[2];
			$data['dosen'][$i]['bobot_4'] = $bobot[3];
			$data['dosen'][$i]['bobot_h'] = $b;

		}
		// var_dump($bobot)		or die;
		for ($i=1; $i <= count($data['mahasiswa']) ; $i++) { 

			$bobot[0] = $data['mahasiswa'][$i]['kepribadian'] * $mahasiswa[0]['bobot'];
			$bobot[1] = $data['mahasiswa'][$i]['pendagogik'] * $mahasiswa[1]['bobot'];
			$bobot[2] = $data['mahasiswa'][$i]['sosial'] * $mahasiswa[2]['bobot'];
			$b = $bobot[0] + $bobot[1] + $bobot[2] ;

			$data['mahasiswa'][$i]['bobot_1'] = $bobot[0];
			$data['mahasiswa'][$i]['bobot_2'] = $bobot[1];
			$data['mahasiswa'][$i]['bobot_3'] = $bobot[2];

			$data['mahasiswa'][$i]['bobot_h'] = $b;
		}

		for ($i=1; $i <= count($data['atasan']) ; $i++) { 
			
			$bobot[0] = $data['atasan'][$i]['kepribadian'] * $atasan[0]['bobot'];
			$bobot[1] = $data['atasan'][$i]['pendagogik'] * $atasan[1]['bobot'];
			$bobot[2] = $data['atasan'][$i]['sosial'] * $atasan[2]['bobot'];
			$b = $bobot[0] + $bobot[1] + $bobot[2] ;
			
			$data['atasan'][$i]['bobot_1'] = $bobot[0];
			$data['atasan'][$i]['bobot_2'] = $bobot[1];
			$data['atasan'][$i]['bobot_3'] = $bobot[2];

			$data['atasan'][$i]['bobot_h'] = $b;

			

		}
		return $data;

	}

	public function add_matakuliah()
	{

		$data= ['nama'   =>	$this->input->post('nama') ];
		$this->User->insert('matakuliah',$data);
	
		redirect(base_url('skor'));
	}

	public function delete_matakuliah($id)
	{

		$where = ['id'=> $id];
		$this->User->delete('matakuliah',$where);
		// var_dump($this->db->last_query()) or die;
		redirect(base_url('skor'));
	}

	
	public function update_matakuliah()
	{
		$data =  
			[
			 'nama'=> $this->input->post('nama')
			];

		$where = ['id'=> intval($this->input->post('id'))];
		$this->User->update('matakuliah',$data,$where);
				
		redirect(base_url('skor'));
	}

	public function add_score()
	{
		$data= [
			'id_dosen'   =>	$this->input->post('dosen'),
			'id_penilai'   =>	$this->input->post('penilai')			
			 ];
		$data['matakuliah'] = $this->input->post('matakuliah') !== '0' ? $this->input->post('matakuliah') : null ;

		// var_dump($data) or die;
		$this->User->insert('skor_awal',$data);
	
		redirect(base_url('skor'));
	}

	public function delete_score($id)
	{

		$where = ['id'=> $id];
		$this->User->delete('skor_awal',$where);
		// var_dump($this->db->last_query()) or die;
		redirect(base_url('skor'));
	}

	public function que($level)
	{
			$data['que']=$this->User->que($level)->result();
			// $data['que']=$this->User->que()->result();
			// var_dump($data['que']) or die;
			$this->load->view('header');

			$this->load->view('admin_panel/que',$data);	
	}	

	public function add_que()
	{

			$data= [ 'kuesioner'   =>	$this->input->post('kuesioner') ];
		
				$data['id_kriteria'] = $this->input->post('kriteria');
				$this->User->insert('kuesioner',$data);
		
			redirect(base_url('que/'.$this->session->flashdata('type')));
	}

	public function delete_que($id)
	{

			$where = ['id'=> $id];
			$this->User->delete('kuesioner',$where);
			// var_dump($this->db->last_query()) or die;
			redirect(base_url('que/'.$this->session->flashdata('type')));

	}

	public function update_que()
	{
		$data =  
			[
			 'kuesioner'=> $this->input->post('kuesioner')
			];

		$where = ['id'=> intval($this->input->post('id'))];
		$data['id_kriteria'] = $this->input->post('kriteria');
		$this->User->update('kuesioner',$data,$where);
				
		redirect(base_url('que/'.$this->session->flashdata('type')));
	}

	public function update_value($level)
	{
		$data = $this->input->post();
		if ($data == null) {
			$this->session->set_flashdata('null', 1);
			redirect('kriteria/'.$this->uri->segment(2));
		}

		if ($level == 'mahasiswa') {
			$where1 = ['id <' => 4];
			$bobot =$this->User->get_where('skor_kriteria',$where1)->result();
			$id = [];
			$nilai = [];
			foreach ($bobot as $bobot) {
			 	
				array_push($id, $bobot->id);
				array_push($nilai, $bobot->nilai);
			 
			}

			$criteria = $this->matrik_3($nilai,1);



			$data[2] = $data[3];
			unset($data[3]);



			for ($i=0; $i < 3 ; $i++) { 
				$this->User->update('skor_kriteria',['nilai' => $this->value_array($data[$i])],['id'=> $i+1]);
				$this->User->update('kriteria',['bobot' => $criteria[$i] ], ['id'=> $i+1] );
			}


		}elseif ($level == 'rekan') {
			// var_dump($data) or die;
			$where1 = ['id >' => 3,
					   'id <' => 10];
			$bobot =$this->User->get_where('skor_kriteria',$where1)->result();
			$id = [];
			$nilai = [];
			foreach ($bobot as $bobot) {
			 	
				array_push($id, $bobot->id);
				array_push($nilai, $bobot->nilai);
			 
			}

			$criteria = $this->matrik_4($nilai,1);


			for ($i=0; $i < 6 ; $i++) { 
				$this->User->update('skor_kriteria',['nilai' => $this->value_array($data[$i])],['id' => $i+4 ]);
			}
			for ($i=0; $i < 4 ; $i++) { 
				$this->User->update('kriteria',['bobot' => $criteria[$i]], ['id'=> $i+4 ]);
			}
		}elseif ($level == 'atasan') {
			$where1 = ['id >='=> 10];
			$bobot =$this->User->get_where('skor_kriteria',$where1)->result();
			$id = [];
			$nilai = [];
			foreach ($bobot as $bobot) {
			 	
				array_push($id, $bobot->id);
				array_push($nilai, $bobot->nilai);
			 
			}

			$criteria = $this->matrik_3($nilai,1);

			$data[2] = $data[3];
			unset($data[3]);

			for ($i=0; $i < 3 ; $i++) { 
			$this->User->update('skor_kriteria',['nilai' => $this->value_array($data[$i])],['id' => $i+10]);
			$this->User->update('kriteria',['bobot' => $criteria[$i]],['id' => $i+8]);
			}

		}

		$this->session->set_flashdata('sukses',1);
		redirect('kriteria/'.$level);
	}


	public function user()
	{
		$data['user']=$this->User->get('user')->result();
		
		$this->load->view('header');

		$this->load->view('admin_panel/user',$data);	
	}	


	public function add_user()
	{
		$id = $this->input->post('id');
		$password = md5($this->input->post('password'));
		$nama = $this->input->post('nama');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat = $this->input->post('alamat');
		$hp = $this->input->post('hp');
		$level = $this->input->post('level');
		$data= ['id' =>	$id,
				'password' 		=>	$password,
				'nama' 			=>	$nama,
				'tanggal_lahir'	=>	$tanggal_lahir,
				'alamat' 			=>	$alamat,
				'hp' 			=>	$hp,
				'level' 		=>	$level ];		
		$this->User->insert('user',$data);

		redirect(base_url('user'));
	}

	public function delete_user($id)
	{
		$where = ['id'=> $id];
		$this->User->delete('user',$where);
		
		redirect(base_url('user'));
	}

	public function update_user()
	{

		$id = $this->input->post('id1');
		$password = md5($this->input->post('password1'));
		$nama = $this->input->post('nama1');
		$tanggal_lahir = $this->input->post('tanggal_lahir1');
		$alamat = $this->input->post('alamat1');
		$hp = $this->input->post('hp1');
		$level = $this->input->post('level1');
		$data= ['id' =>	$id,
				'password' 		=>	$password,
				'nama' 			=>	$nama,
				'tanggal_lahir'	=>	$tanggal_lahir,
				'alamat' 			=>	$alamat,
				'hp' 			=>	$hp,
				'level' 		=>	$level ];		
		$where = ['id'=> intval($this->input->post('id_real'))];

		$this->User->update('user',$data,$where);
		// var_dump($this->db->last_query()) or die;		
		redirect(base_url('user'));
	}

	public function criteria($level)
	{
		if ($level  == 'mahasiswa') {
			$where = ['id <' => 4];
			$hasil = [];
			$bobot =$this->User->get_where('skor_kriteria',$where)->result();
			foreach ($bobot as $key ) {
				array_push($hasil, $key->nilai);
			}
			$hasil = array_replace($hasil, [3 => $hasil[2]]);
			unset($hasil[2]);
			$data['bobot'] = [];
			foreach ($hasil as $key ) {
				array_push($data['bobot'], $this->index_array($key));
			}

			$data['bobot'] = array_replace($data['bobot'], [3 => $data['bobot'][2]] );

		}
		if ($level == 'rekan') {
			$where = ['id >' => 3 ,
					  'id <' => 10];	
			$bobot =$this->User->get_where('skor_kriteria',$where)->result();
			$hasil = [];
			foreach ($bobot as $key ) {
				array_push($hasil, $key->nilai);
			}	
			$data['bobot'] = [];
			foreach ($hasil as $key ) {
				array_push($data['bobot'], $this->index_array($key));
			}


		}
		elseif ($level == 'atasan'){
			$where = ['id >=' => 10];
			$hasil = [];
			$bobot = $this->User->get_where('skor_kriteria',$where)->result();
			foreach ($bobot as $key ) {
				array_push($hasil, $key->nilai);
			}
					
			$data['bobot'] = [];
			foreach ($hasil as $key ) {
				array_push($data['bobot'], $this->index_array($key));
			}

			$data['bobot'] = array_replace($data['bobot'], [3 => $data['bobot'][2]] );
		}


		// var_dump($data) or die;
		$this->load->view('header');
		$this->load->view('admin_panel/kriteria',$data);
	}

	public function count($level )
	{
				
		if ($level  == 'mahasiswa') {
			$where = ['id <' => 4];
			$bobot =$this->User->get_where('skor_kriteria',$where)->result();
			$id = [];
			$nilai = [];
			foreach ($bobot as $bobot) {
			 	
				array_push($id, $bobot->id);
				array_push($nilai, $bobot->nilai);
			 
			}

			$data = $this->matrik_3($nilai);


		}
		if ($level == 'rekan') {
			$where = ['id >' => 3 ,
					  'id <' => 10];	
			$bobot =$this->User->get_where('skor_kriteria',$where)->result();
			$id = [];
			$nilai = [];
			foreach ($bobot as $bobot) {
			 	
				array_push($id, $bobot->id);
				array_push($nilai, $bobot->nilai);
			 
			}

			$data = $this->matrik_4($nilai);
			// var_dump($data) or die;	
		}
		elseif($level == 'atasan'){
			$where = ['id >=' => 10];
			$bobot =$this->User->get_where('skor_kriteria',$where)->result();
			$id = [];
			$nilai = [];
			foreach ($bobot as $bobot) {
			 	
				array_push($id, $bobot->id);
				array_push($nilai, $bobot->nilai);
			 
			}

			$data = $this->matrik_3($nilai);

		}
		$this->load->view('header', $data);
		$this->load->view('admin_panel/bobot', $data);
	}

	public function matrik_4($value, $eigen = 0)
	{
			$data[0] = [];
			$data[1] = [];
			$data[2] = [];
			$data[3] = [];
						array_push($data[0], 1);
						array_push($data[0] , $value[0] ) ;
						array_push($data[0], $value[1]);
						array_push($data[0], $value[2]);

						array_push($data[1], $this->invers($value[0]));
						array_push($data[1], 1);
						array_push($data[1], $value[3]);
						array_push($data[1], $value[4]);

						array_push($data[2], $this->invers($value[1]));
						array_push($data[2], $this->invers($value[3]))  ;
						array_push($data[2], 1);
						array_push($data[2], $value[5]);

						array_push($data[3], $this->invers($value[2]));
						array_push($data[3], $this->invers($value[4]));
						array_push($data[3], $this->invers($value[5]));
						array_push($data[3], 1);



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
			    $data[3]
			);

			$hasil['awal'] = $data;
			$hasil['jumlah'] = $this->increase_column($hasil['awal']);
			$hasil['pembagian'] = $this->devide_matrix($hasil['awal'],$hasil['jumlah']) ;
			$hasil['rata'] = $this->average_matrix($hasil['pembagian']);
			$hasil['pembagian'][4] =  [];
			for ($i=0; $i < 4; $i++) { 
				array_push($hasil['pembagian'][4], $hasil['rata'][$i]);
			}
			// var_dump($hasil) or die();
			
			$hasil['kali'] = $this->multiply_matrix($hasil['awal'],$hasil['rata']);
			$hasil['prioritas'] = $this->priority_matrix($hasil['kali'],$hasil['rata']);
			$hasil['max'] = array_sum($hasil['prioritas'])/ count($hasil['prioritas']);
			$hasil['ci'] = ($hasil['max']-4)/(3);
			$hasil['cr'] = $hasil['ci'] / 0.9;
			

			if ($eigen == 0) {				
				return $hasil;
			}
			elseif ($eigen == 1) {
				return $hasil['rata'];
			}
	}	

	public function matrik_3($value ,$eigen = 0)
	{
		// var_dump($value) or die;
			$data[0] = [];
			$data[1] = [];
			$data[2] = [];

						array_push($data[0], 1);
						array_push($data[1] , $this->invers($value[0]) ) ;
						array_push($data[2], $this->invers($value[1]));
						
						array_push($data[0], $value[0]);
						array_push($data[1], 1);
						array_push($data[2], $this->invers($value[2]));
						
						array_push($data[0], $value[1]);
						array_push($data[1], $value[2])  ;
						array_push($data[2], 1);
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
			$hasil['pembagian'][4] =  [];
			for ($i=0; $i < 3; $i++) { 
				array_push($hasil['pembagian'][4], $hasil['rata'][$i]);
			}
			$hasil['kali'] = $this->multiply_matrix($hasil['awal'],$hasil['rata']);
			$hasil['prioritas'] = $this->priority_matrix($hasil['kali'],$hasil['rata']);
			$hasil['max'] = array_sum($hasil['prioritas'])/ count($hasil['prioritas']);
			$hasil['ci'] = ($hasil['max']-3)/(2);
			$hasil['cr'] = $hasil['ci'] / 0.58;
						// var_dump($hasil) or die;
			
			if ($eigen == 0) {				
				return $hasil;
			}
			elseif ($eigen == 1) {
				return $hasil['rata'];
			}
	}

	public function increase_column($data)
	{
		if (count($data) == 3) {
			# code...

			$jumlah = [0 => floatval(0), 1 => floatval(0) , 2 => floatval(0) ]; 
			for ($i=0; $i < 3; $i++) { 
				$jumlah[0] = $jumlah[0] + $data[$i][0]  ;
				$jumlah[1] = $jumlah[1] + $data[$i][1]  ;
				$jumlah[2] = $jumlah[2] + $data[$i][2]  ;
			}
		}
		elseif (count($data) == 4) {

			// var_dump($data) or die;
			$jumlah = [0 => floatval(0), 1 => floatval(0) , 2 => floatval(0), 3 => floatval(0)  ]; 
			for ($i=0; $i < 4; $i++) { 
				$jumlah[0] = $jumlah[0] + $data[$i][0]  ;
				$jumlah[1] = $jumlah[1] + $data[$i][1]  ;
				$jumlah[2] = $jumlah[2] + $data[$i][2]  ;
				$jumlah[3] = $jumlah[3] + $data[$i][3]  ;
			}
		}

		return $jumlah;
	}

	public function devide_matrix($data ,$jumlah)
	{
		if (count($data) == 3) {

			 	for ($i=0; $i < 3; $i++) { 
			 	$data[$i][0] = $data[$i][0] / $jumlah[0];
			 	$data[$i][1] = $data[$i][1] / $jumlah[1];
			 	$data[$i][2] = $data[$i][2] / $jumlah[2];
			 		
			 	}		  
		}
		elseif (count($data) == 4) {
			for ($i=0; $i < 4; $i++) { 
			 	$data[$i][0] = $data[$i][0] / $jumlah[0];
			 	$data[$i][1] = $data[$i][1] / $jumlah[1];
			 	$data[$i][2] = $data[$i][2] / $jumlah[2];
			 	$data[$i][3] = $data[$i][3] / $jumlah[3];
			 } 
		}
		return $data;
	}

	private function multiply_matrix($data , $rata)
	{
		// var_dump($data) or die;

			
		if (count($data) == 3) {

			$kali[0] = ($data[0][0]*$rata[0]) + ($data[0][1] * $rata[1] ) + ($data[0][2] * $rata[2]);   
			$kali[1] = ($data[1][0]*$rata[0]) + ($data[1][1] * $rata[1] ) + ($data[1][2] * $rata[2]);   
			$kali[2] = ($data[2][0]*$rata[0]) + ($data[2][1] * $rata[1] ) + ($data[2][2] * $rata[2]);   

		}
		elseif (count($data) == 4) {
			$kali[0] = ($data[0][0]*$rata[0]) + ($data[0][1] * $rata[1] ) + ($data[0][2] * $rata[2]) + ($data[0][3] * $rata[3]) ;   
			$kali[1] = ($data[1][0]*$rata[0]) + ($data[1][1] * $rata[1] ) + ($data[1][2] * $rata[2]) +  ($data[1][3] * $rata[3]);
			$kali[2] = ($data[2][0]*$rata[0]) + ($data[2][1] * $rata[1] ) + ($data[2][2] * $rata[2]) +
				($data[2][3] * $rata[3]);
			$kali[3] = ($data[3][0]*$rata[0]) + ($data[3][1] * $rata[1] ) + ($data[3][2] * $rata[2]) +
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

	 		$rata[0] = $data[0][0] +  $data[0][1] + $data[0][2] ;
	 		$rata[1] = $data[1][0] +  $data[1][1] + $data[1][2] ;
	 		$rata[2] = $data[2][0] +  $data[2][1] + $data[2][2] ;
	 		
	 		$rata[0] = $rata[0] / 3;
	 		$rata[1] = $rata[1] / 3;
	 		$rata[2] = $rata[2] / 3;


		}
		elseif (count($data) == 4) {


	 		$rata[0] = array_sum($data[0]) / 4;
	 		$rata[1] = array_sum($data[1]) / 4;
	 		$rata[2] = array_sum($data[2]) / 4;
	 		$rata[3] = array_sum($data[3]) / 4;


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

	public function index_array($value)
	{
		$a = [9,8,7,6,5,4,3,2,1];
		$b = [0.5,0.333,0.25,0.2,0.167,0.143,0.125,0.111];
		


			
		if( array_search($value, $b) !== false ){
			$value = array_search($value, $b);
			$value += 9;			

		}	

		else{
			$value = array_search($value, $a);
			
		}

		return $value ;
	}

	public function value_array($value)
	{
		$a = [9,8,7,6,5,4,3,2,1];
		$b = [0.5,0.333,0.25,0.2,0.167,0.143,0.125,0.111];	
		if( $value > 8  ){
			$value = $b[$value-9]			;
		}	
		else{
			$value = $a[$value]			;

		}
		return $value ;
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
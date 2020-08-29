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
		$data['skor'] = empty($skor)? 0  : 1; 
		// var_dump(isset($skor)) or die;
		$data['sesi'] = $this->User->get('buka')->result_array();		
		$data['tahun'] = ['rank'=>[], 'tahun'=>[] ];
		if ($this->session->userdata('level') == 'dosen') {
			$tahun = $this->db->query("select DISTINCT tahun from skor_awal where id_dosen = ".$this->session->userdata('nip'))->result_array();

		// $data['tahun'] =;
		}
		// var_dump() or die;
		

		// var_dump($data) or die;

		$this->load->view('header');

		if ($this->session->userdata('level') == 'dosen') {
			
			for ($i=0; $i < count($tahun); $i++) { 
			$rata = $this->average($tahun[$i]['tahun']); 
			$bobot = $this->value($rata);
			$rank = $this->rank($bobot);
			$borda = $this->borda($rank);
			$datAa = $this->score_borda($borda);
			for ($k=1; $k <= count($datAa['ranking']) ; $k++) { 
				# code...
				$score['s'][$k] = $datAa['ranking'][$k]['score'];
				$score['n'][$k] = $datAa['ranking'][$k]['id'];
			}
			arsort($score['s']);
				$end = ['s' => [],  'n'=> [] ] ;
			foreach ($score['s'] as $key => $value ) {
				array_push($end['s'], $value);

				array_push($end['n'], $score['n'][$key] );
			}
			array_push($data['tahun']['rank'], array_search($this->session->userdata('nip'), $end['n']) +1);
			array_push($data['tahun']['tahun'], $tahun[$i]['tahun']);
						// $data1 = $datAa;
				// arsort($data1);
				// $data2 = [];
				// $c =1; 
				// foreach ($data1 as $key => $value) {
				// 	$data2[$c] = $value; 
				// 	$c++;
				// }
				// $a =[];
				// for ($i=1; $i <= count($data); $i++) { 
				// 	$rank = array_search($data2[$i], $data);
				// 	$a[$rank] = $i;
				// }
				// ksort($a);

			// for ($j=1; $j < count($datAa) ; $j++) { 
			// 	if ($datAa['ranking'][$j]['id'] == $this->session->userdata('nip') ) {
			// 		$data['rank'][$j]['tahun'] = $rata;
			// 	}
			// }

			}
			$data['tahun']['rank'] = json_encode($data['tahun']['rank']);
			$data['tahun']['tahun'] = json_encode($data['tahun']['tahun']);
			// var_dump($data['tahun']) or die;
		$this->load->view('assessor/dashboard',$data);			
		}
		else{
		$this->load->view('assessor/dashboard1',$data);			

		}
	}

	// public function average_value()
	// {
	// 	$mahasiswa = $this->User->chart($this->session->userdata('nip'),'mahasiswa')->result_array();
	// 	$dosen = $this->User->chart($this->session->userdata('nip'),'dosen')->result_array();
	// 	$atasan = $this->User->chart($this->session->userdata('nip'),'atasan')->result_array();
	// 	// var_dump($mahasiswa) ;
	
	// 	if	(empty($atasan) === true or empty($dosen) === true or empty($mahasiswa) === true  ){
	// 		unset($data);
	// 		$data = 0;
	// 	}
	// 	else {

	// 	$data['mahasiswa'] = ['kepribadian' => 0, 'pendagogik' => 0,'sosial' => 0,'jumlah' => 0] ;
	// 	for ($i=0; $i < count($mahasiswa); $i++) {
	// 		$a =$this->json($mahasiswa[$i]['skor'],'mahasiswa'); 
	// 		$data['mahasiswa']['kepribadian'] += $a['kepribadian'] ;
	// 		$data['mahasiswa']['pendagogik'] += $a['pendagogik'] ;
	// 		$data['mahasiswa']['sosial'] += $a['sosial'] ;
	// 		$data['mahasiswa']['jumlah']++;

	// 	}

	// 	$data['dosen'] = ['kepribadian' => 0, 'pendagogik' => 0,'profesional' => 0,'sosial' => 0,'jumlah' => 0] ;

	// 	for ($i=0; $i < count($dosen); $i++) { 
	// 		$a =$this->json($dosen[$i]['skor'],'mahasiswa'); 
	// 		$data['dosen']['kepribadian'] += $a['kepribadian'] ;
	// 		$data['dosen']['pendagogik'] += $a['pendagogik'] ;
	// 		$data['dosen']['profesional'] += $a['profesional'] ;
	// 		$data['dosen']['sosial'] += $a['sosial'] ;
	// 		$data['dosen']['jumlah']++;
			
	// 	}


	// 	$data['atasan'] = ['kepribadian' => 0, 'profesional' => 0,'sosial' => 0,'jumlah' => 0] ;
	// 	for ($i=0; $i < count($atasan); $i++) { 
	// 		$data['atasan'] += $this->json($atasan[$i]['skor'],'atasan');			
	// 		$data['atasan']['kepribadian'] += $a['kepribadian'] ;
	// 		$data['atasan']['profesional'] += $a['profesional'] ;
	// 		$data['atasan']['sosial'] += $a['sosial'] ;
	// 		$data['atasan']['jumlah']++;
	// 	}
	// 	$data['mahasiswa']['jumlah'] = $data['mahasiswa']['jumlah'] * 5;
	// 	$data['mahasiswa']['kepribadian'] =  $data['mahasiswa']['kepribadian'] * 100 /$data['mahasiswa']['jumlah'];
	// 	$data['mahasiswa']['pendagogik'] =  $data['mahasiswa']['pendagogik'] * 100 /$data['mahasiswa']['jumlah'];
	// 	$data['mahasiswa']['sosial'] =  $data['mahasiswa']['sosial'] * 100 /$data['mahasiswa']['jumlah'];


	// 	$data['dosen']['jumlah'] = $data['dosen']['jumlah'] * 5;
	// 	$data['dosen']['kepribadian'] =  $data['dosen']['kepribadian'] * 100 /$data['dosen']['jumlah'];
	// 	$data['dosen']['pendagogik'] =  $data['dosen']['pendagogik'] * 100 /$data['dosen']['jumlah'];
	// 	$data['dosen']['sosial'] =  $data['dosen']['sosial'] * 100 /$data['dosen']['jumlah'];
	// 	$data['dosen']['profesional'] =  $data['dosen']['sosial'] * 100 /$data['dosen']['jumlah'];
		


	// 	$data['atasan']['jumlah'] = $data['atasan']['jumlah'] * 5;
	// 	$data['atasan']['kepribadian'] =  $data['atasan']['kepribadian'] * 100 /$data['atasan']['jumlah'];

	// 	$data['atasan']['sosial'] =  $data['atasan']['sosial'] * 100 /$data['atasan']['jumlah'];
	// 	$data['atasan']['profesional'] =  $data['atasan']['profesional'] * 100 /$data['atasan']['jumlah'];
		
	// 	} 
	
	// 	// var_dump($data)or die;
	// 	return $data;
	// }

	// public function json($value)
	// {	
	// 	$value = json_decode('['.$value.']' , 1);
		
	// 	 // var_dump($value) or die;
	// 		$data['kepribadian'] = 0;	
	// 		$data['sosial'] 	 = 0;	
	// 		if (isset($value[0]['pendagogik']) ) {
	// 			$data['pendagogik']  = 0;	
			
	// 		}
	// 		if (isset($value[0]['profesional']) ) {
	// 			$data['profesional'] = 0;	
	// 		}
		
	// 	for ($i=0; $i < count($value); $i++) { 
	// 		$data['kepribadian'] += $value[$i]['kepribadian'];	
	// 		if (isset($value[0]['pendagogik']) ) {
		
	// 		$data['pendagogik']  += $value[$i]['pendagogik'];	
	// 		}
	// 		$data['sosial'] 	 += $value[$i]['sosial'];	
	// 		if (isset($value[0]['profesional']) ) {
	// 			$data['profesional'] +=  $value[$i]['profesional'];	
	// 		}
	// 	}
	// 	$rata['kepribadian'] = $data['kepribadian'] / count($value);
	// 	if (isset($value[0]['pendagogik']) ) {
	
	// 	$rata['pendagogik'] = $data['pendagogik'] / count($value);
	// 	}
	// 	$rata['sosial'] = $data['sosial'] / count($value);
	// 	if (isset($value[0]['profesional']) ) {
	// 		$rata['profesional'] = $data['profesional'] / count($value);
	// 	}	

	// 	// var_dump($rata) or die;
	// 	return $rata;
	// }	

	// public function chart()
	// {

	// 	$mahasiswa = $this->User->chart($this->session->userdata('nip'),'mahasiswa')->result_array();
	// 	$dosen = $this->User->chart($this->session->userdata('nip'),'dosen')->result_array();
	// 	$atasan = $this->User->chart($this->session->userdata('nip'),'atasan')->result_array();


	// 	$data['mahasiswa'] = ['kepribdian' => [],'pendagogik' => [],'sosial' => []];
	// 	$data['dosen'] = ['kepribdian' => [],'pendagogik' => [],'sosial' => []];
	// 	$data['atasan'] = ['kepribdian' => [],'pendagogik' => [],'sosial' => []];
	// 	for ($i=0; $i < count($mahasiswa) ; $i++) { 
	// 		array_push($data['mahasiswa']['kepribdian'], $mahasiswa[$i]);  
	// 	}
	// 	// var_dump($mahasiswa) or die;


	// }


	// public function average()
	// {
	// 	$atasan  = $this->User->get_where('skor_awal','atasan')->result_array();
	// 	$dosen  = $this->User->skor('dosen')->result_array();
	// 	$mahasiswa  = $this->User->skor('mahasiswa')->result_array();
		
	// 	$dosen1 = $this->User->get_where('kriteria',['level'=> 'rekan'])->result_array();
	// 	$mahasiswa1 = $this->User->get_where('kriteria',['level'=> 'mahasiswa'])->result_array();
	// 	$atasan1 = $this->User->get_where('kriteria',['level'=> 'atasan'])->result_array();
		
	// 	$data ['bobot']['dosen'] = $dosen1;
	// 	$data ['bobot']['mahasiswa'] = $mahasiswa1;
	// 	$data ['bobot']['atasan'] = $atasan1;

	// 	$data['mahasiswa'] = [] ;
	// 	for ($i=0; $i < count($mahasiswa); $i++) { 
	// 		$data['mahasiswa'][$i+1] =  $this->json($mahasiswa[$i]['skor'],'mahasiswa');
	// 		$data['mahasiswa'][$i+1]['jumlah'] = $mahasiswa[$i]['jumlah'] ;
	// 		$data['mahasiswa'][$i+1]['id'] = $mahasiswa[$i]['id_dosen'] ;
	// 	}
	// 	$data['dosen'] = [] ;
	// 	for ($i=0; $i < count($dosen); $i++) { 
	// 		$data['dosen'][$i+1] = $this->json($dosen[$i]['skor'],'dosen');
	// 		$data['dosen'][$i+1]['jumlah'] = $dosen[$i]['jumlah'] ;
	// 		$data['dosen'][$i+1]['id'] = $dosen[$i]['id_dosen'] ;

	// 	}

	// 	$data['atasan'] = [] ;
	// 	for ($i=0; $i < count($atasan); $i++) { 
	// 		$data['atasan'][$i+1]= $this->json($atasan[$i]['skor'],'atasan');
	// 		$data['atasan'][$i+1]['jumlah'] = $atasan[$i]['jumlah'] ;
	// 		$data['atasan'][$i+1]['id'] = $atasan[$i]['id_dosen'] ;

	// 	}

	// 	return $data;
	// }

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
		if ($this->session->userdata('level') == 'dosen') {
			$data['kue'] =$this->User->kriteria('rekan')->result_array();
		}else
		{
			$data['kue'] =$this->User->kriteria( $this->session->userdata('level'))->result_array();
		}
		$data['id'] = $id;
		// var_dump($data) or die();
		$this->load->view('header');
		$this->load->view('assessor/input',$data);

	}

	public function input_action()
	{

		// $id = explode(',',$this->input->post('id'));

		if ($this->session->userdata('level') == 'dosen') {
			$level =  $this->User->get_where('kriteria',['level' => 'rekan'])->result_array();
		}else{
			$level =  $this->User->get_where('kriteria',['level' => $this->session->userdata('level')])->result_array();
		}

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
		// var_dump($this->db->last_query());
		redirect('pilih');
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

		// var_dump($data) or die;
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
		// var_dump($data['dosen']) or die();


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
		arsort($data);
				$a = [ 0 => 0] ;
			foreach ($data as $key => $value ) {
				
				array_push($a, $key );
			}
					unset($a[0]);
		return $a;
	}

	public function value($data)
	{
		$dosen = $this->User->get_where('kriteria',['level'=> 'rekan'])->result_array();
		$mahasiswa = $this->User->get_where('kriteria',['level'=> 'mahasiswa'])->result_array();
		$atasan = $this->User->get_where('kriteria',['level'=> 'atasan'])->result_array();
		
		// var_dump($data['dosen'][1]['kepribadian']) or die;
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
			$bobot[1] = $data['atasan'][$i]['profesional'] * $atasan[1]['bobot'];
			$bobot[2] = $data['atasan'][$i]['sosial'] * $atasan[2]['bobot'];
			$b = $bobot[0] + $bobot[1] + $bobot[2] ;
			
			$data['atasan'][$i]['bobot_1'] = $bobot[0];
			$data['atasan'][$i]['bobot_2'] = $bobot[1];
			$data['atasan'][$i]['bobot_3'] = $bobot[2];

			$data['atasan'][$i]['bobot_h'] = $b;

			

		}
		// var_dump($data) OR DIE;
		return $data;

	}

	
	public function average($tahun)
	{
		$atasan  = $this->User->skor('atasan',$tahun)->result_array();
		$dosen  = $this->User->skor('dosen',$tahun)->result_array();
		$mahasiswa  = $this->User->skor('mahasiswa',$tahun)->result_array();
		
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
			$data['sosial'] 	 = 0;	
			if (isset($value[0]['pendagogik']) ) {
				$data['pendagogik']  = 0;	
			
			}
			if (isset($value[0]['profesional']) ) {
				$data['profesional'] = 0;	
			}
		
		for ($i=0; $i < count($value); $i++) { 
			$data['kepribadian'] += $value[$i]['kepribadian'];	
			if (isset($value[0]['pendagogik']) ) {
		
			$data['pendagogik']  += $value[$i]['pendagogik'];	
			}
			$data['sosial'] 	 += $value[$i]['sosial'];	
			if (isset($value[0]['profesional']) ) {
				$data['profesional'] +=  $value[$i]['profesional'];	
			}
		}
		$rata['kepribadian'] = $data['kepribadian'] / count($value);
		if (isset($value[0]['pendagogik']) ) {
	
		$rata['pendagogik'] = $data['pendagogik'] / count($value);
		}
		$rata['sosial'] = $data['sosial'] / count($value);
		if (isset($value[0]['profesional']) ) {
			$rata['profesional'] = $data['profesional'] / count($value);
		}	

		// var_dump($rata) or die;
		return $rata;
	}
}

/* End of file assessor.php */
/* Location: ./application/controllers/assessor.php */
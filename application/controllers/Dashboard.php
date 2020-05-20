<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    function __construct(){
		parent::__construct();		
		$this->load->model('M_produk');
		$this->load->model('M_profil');
		$this->load->model('M_pesanan');
		$this->load->library('upload');
		$this->load->helper(array('url'));
		// if($this->session->userdata('status') != "login"){
		// 	echo "<script>
        //         alert('Anda harus login terlebih dahulu');
        //         window.location.href = '".base_url('Login')."';
        //     </script>";//Url tujuan
		// }
		
	}


    public function index() {
        
       $data['kategori'] = $this->M_produk->tampil_kategori();
		// $data['produk'] = $this->M_produk->tampil_produk3();
		// $data['produk2'] = $this->M_produk->tampil_produk4();
		// $data['produk3'] = $this->M_produk->tampil_produk5();
        $this->load->view('mebel/dashboard', $data);
	}
   public function kategori() {
        
       $data['kategori'] = $this->M_produk->tampil_kategori();
	   $idk = $this->uri->segment(3);
	   $data['data'] = $this->M_produk->tampil_kategori();
	   if($idk != null){
		$data['produk'] = $this->M_produk->katprod($idk);
        $this->load->view('mebel/kategori', $data);
	   }else{
		$data['produk'] = $this->M_produk->katprod2();
        $this->load->view('mebel/kategori', $data);
	   }
	   
	}
	 public function contact() {
        
       $data['kategori'] = $this->M_produk->tampil_kategori();
		// $data['produk'] = $this->M_produk->tampil_produk3();
		// $data['produk2'] = $this->M_produk->tampil_produk4();
		// $data['produk3'] = $this->M_produk->tampil_produk5();
        $this->load->view('mebel/contact', $data);
	}
 public function faq() {
        
       $data['kategori'] = $this->M_produk->tampil_kategori();
		// $data['produk'] = $this->M_produk->tampil_produk3();
		// $data['produk2'] = $this->M_produk->tampil_produk4();
		// $data['produk3'] = $this->M_produk->tampil_produk5();
        $this->load->view('mebel/faq', $data);
	}
	public function detailproduk($id_produk){
		$data['data'] = $this->M_produk->tampil_kategori();
		$data['produk'] = $this->M_produk->tampil_detailproduk($id_produk);
		$this->load->view('mebel/detailproduk',$data);
	}
	
	public function tambah_ke_keranjang() 
	{
		// $produk = $this->M_produk->find($id_produk);

		$data = array(
			'id'      => $this->input->post('id_produk'),
			'qty'     => $this->input->post('stok'),
			'price'   => $this->input->post('harga'),
			'name'    => $this->input->post('nama_produk'),
			'panjang'    => $this->input->post('panjang'),
			'lebar'    => $this->input->post('lebar'),
			'tinggi'    => $this->input->post('tinggi'),
			'idpesan' => $this->M_pesanan->get_idpesan()
	);
		
		if($this->session->userdata('status') != "login"){
			echo "<script>
				alert('Anda harus login terlebih dahulu');
				window.location.href = '".base_url('Landing_controller/Login')."';
			</script>";//Url tujuan
		}else{
			$this->cart->insert($data);
			redirect('Dashboard');
		}
	}

	public function detail_keranjang()
	{
		$iduser = $this->session->userdata("iduser");
		$data['pelanggan'] = $this->M_profil->kostumer($iduser);
		if($this->session->userdata('status') != "login"){
			echo "<script>
				alert('Anda harus login terlebih dahulu');
				window.location.href = '".base_url('Landing_controller/Login')."';
			</script>";//Url tujuan
		}else{
			$this->load->view('mebel/keranjang', $data);
		}
	}

	public function hapus_keranjang()
	{
		// $this->cart->contents(['id']);
		$this->cart->destroy();
		redirect('Dashboard/detail_keranjang');
	}
	
	function getCity($province){		

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/basic/city?province=$province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: fbd791dbdaa5ed2f93cd83f0f68887ef"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  //echo $response;
			$data = json_decode($response, true);
		  //echo json_encode($k['rajaongkir']['results']);

		  
		  for ($j=0; $j < count($data['rajaongkir']['results']); $j++){
		  

		    echo "<option value='".$data['rajaongkir']['results'][$j]['city_id']."'>".$data['rajaongkir']['results'][$j]['city_name']." (".$data['rajaongkir']['results'][$j]['type'].")"."</option>";
		  	 /*
		  	 if($data['rajaongkir']['results'][$j]['type']=="Kabupaten"){
		  	 	echo "Kabupaten";
		  	 }esle{
		  	 	echo "Kota";
		  	 }
		  	 */

		  }
		}
	}

	function getCost()
	{
		$idpsn = $this->input->get('idpsn');
		$origin = $this->input->get('origin');
		$destination = $this->input->get('destination');
		$berat = $this->input->get('berat');
		$courier = $this->input->get('courier');

		$data = array(	'idpsn' => $idpsn,
						'origin' => $origin,
						'destination' => $destination, 
						'berat' => $berat, 
						'courier' => $courier 

		);
		
		$this->load->view('rajaongkir/GetCost', $data);
	}
	
}
?>

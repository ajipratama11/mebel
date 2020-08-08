<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller{
    function __construct(){
		parent::__construct();		
		$this->load->model('M_produk');
		$this->load->model('M_profil');
		$this->load->model('M_pesanan');
		$this->load->library('upload');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "login"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Login')."';
            </script>";//Url tujuan
		}
		
	}


    public function index() {
        
        $data['kategori'] = $this->M_produk->tampil_kategori();
		// $data['produk'] = $this->M_produk->tampil_produk3();
		// $data['produk2'] = $this->M_produk->tampil_produk4();
		// $data['produk3'] = $this->M_produk->tampil_produk5();
        $this->load->view('landing/index', $data);
	}
	
	public function tambah_ke_keranjang() 
	{
		// $produk = $this->M_produk->find($id_produk);

		$data = array(
			'id'      => $this->input->post('id_produk'),
			'qty'     => $this->input->post('stok'),
			'price'   => $this->input->post('harga'),
			'name'    => $this->input->post('nama_produk'),
			'berat'    => $this->input->post('berat'),
			'idpesan' => $this->M_pesanan->get_idpesan()
	);
		$this->cart->insert($data);
		redirect('Landing');
	}

	public function detail_keranjang()
	{
		$iduser = $this->session->userdata("iduser");
		$data['pelanggan'] = $this->M_profil->kostumer($iduser);
		$this->load->view('landing/keranjang', $data);
	}

	public function hapus_keranjang()
	{
		// $this->cart->contents(['id']);
		$this->cart->destroy();
		redirect('Landing/detail_keranjang');
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

	function getKecamatan($destination){
		
		
		if($destination == 160){
				
			echo "<option value='Jombang'>Ajung</option>";
			echo "<option value='Ambulu'>Ambulu</option>";
			echo "<option value='Kencong'>Arjasa</option>";
			echo "<option value='Bangsalsari'>Bangsalsari</option>";
			echo "<option value='Balung'>Balung</option>";
			echo "<option value='Gumukmas'>Gumukmas</option>";
			echo "<option value='Jelbuk'>Jelbuk</option>";
			echo "<option value='Jenggawah'>Jenggawah</option>";
			echo "<option value='Jombang'>Jombang</option>";
			echo "<option value='Kalisat'>Kalisat</option>";
			echo "<option value='Kaliwates'>Kaliwates</option>";
			echo "<option value='Kencong'>Kencong</option>";
			echo "<option value='Ledokombo'>Ledokombo</option>";
			echo "<option value='Mayang'>Mayang</option>";
			echo "<option value='Mumbulsari'>Mumbulsari</option>";
			echo "<option value='Panti'>Panti</option>";
			echo "<option value='Pakusari'>Pakusari</option>";
			echo "<option value='Patrang'>Patrang</option>";
			echo "<option value='Puger'>Puger</option>";
			echo "<option value='Rambipuji'>Rambipuji</option>";
			echo "<option value='Semboro'>Semboro</option>";
			echo "<option value='Silo'>Silo</option>";
			echo "<option value='Sukorambi'>Sukorambi</option>";
			echo "<option value='Sukowono'>Sukowono</option>";
			echo "<option value='Sumberbaru'>Sumberbaru</option>";
			echo "<option value='Sumberjambe'>Sumberjambe</option>";
			echo "<option value='Sumbersari'>Sumbersari</option>";
			echo "<option value='Tanggul'>Tanggul</option>";
			echo "<option value='Tempurejo'>Tempurejo</option>";
			echo "<option value='Umbulsari'>Umbulsari</option>";
			echo "<option value='Wuluhan'>Wuluhan</option>";
			
		 
			
		}else{
			
			echo "<input></input>";
		}

	}
	function getDesa($kecamatan){
		
		
		if($kecamatan == 'Ajung'){
				
			
			echo "<option value='Ajung'>Ajung</option>";
			echo "<option value='Klompangan'>Klompangan</option>";
			echo "<option value='Mangaran'>Mangaran</option>";
			echo "<option value='Pancakarya'>Pancakarya</option>";
			echo "<option value='Rowoindah'>Rowoindah</option>";
			echo "<option value='Sukamakmur'>Sukamakmur</option>";
			echo "<option value='Wirowongso'>Wirowongso</option>";
		
			
		}else if($kecamatan == 'Ambulu'){
			
			echo "<option value='Ambulu'>Ambulu</option>";
			echo "<option value='Andongsari'>Andongsari</option>";
			echo "<option value='Karang Anyar'>Karang Anyar</option>";
			echo "<option value='Pontang'>Pontang</option>";
			echo "<option value='Sabrang'>Sabrang</option>";
			echo "<option value='Sumberejo'>Sumberejo</option>";
			echo "<option value='Tegalsari'>Tegalsari</option>";
			
		}else if($kecamatan == 'Arjasa'){

			echo "<option value='Arjasa'>Arjasa</option>";
			echo "<option value='Biting'>Biting</option>";
			echo "<option value='Candijati'>Candijati</option>";
			echo "<option value='Darsono'>Darsono</option>";
			echo "<option value='Kamal'>Kamal</option>";
			echo "<option value='Kemuning Lor'>Kemuning Lor</option>";

		}else if($kecamatan == 'Bangsalsari'){

			echo "<option value='Badean'>Badean</option>";
			echo "<option value='Bangsalsari'>Bangsalsari</option>";
			echo "<option value='Banjarsari'>Banjarsari</option>";
			echo "<option value='Curahkalong'>Curahkalong</option>";
			echo "<option value='Gambirono'>Gambirono</option>";
			echo "<option value='Karangsono'>Karangsono</option>";
			echo "<option value='Langkap'>Langkap</option>";
			echo "<option value='Petung'>Petung</option>";
			echo "<option value='Sukorejo'>Sukorejo</option>";
			echo "<option value='Tisnogambar'>Tisnogambar</option>";
			echo "<option value='Tugusari'>Tugusari</option>";

		}else if($kecamatan == 'Balung'){

			echo "<option value='Balung Kidul'>Balung Kidul</option>";
			echo "<option value='Balung Kulon'>Balung Kulon</option>";
			echo "<option value='Balung Lor'>Balung Lor</option>";
			echo "<option value='Curahlele'>Curahlele</option>";
			echo "<option value='Gumelar'>Gumelar</option>";
			echo "<option value='Karangduren'>Karangduren</option>";
			echo "<option value='Karang Semanding'>Karang Semanding</option>";
			echo "<option value='Tutul'>Tutul</option>";

		}else if($kecamatan == 'Gumukmas'){

			echo "<option value='Bagorejo'>Bagorejo</option>";
			echo "<option value='Gumukmas'>Gumukmas</option>";
			echo "<option value='Karangrejo'>Karangrejo</option>";
			echo "<option value='Kepanjen'>Kepanjen</option>";
			echo "<option value='Mayangan'>Mayangan</option>";
			echo "<option value='Menampu'>Menampu</option>";
			echo "<option value='Purwoasri'>Purwoasri</option>";
			echo "<option value='Tembokrejo'>Tembokrejo</option>";

		}else if($kecamatan == 'Jelbuk'){

			echo "<option value='Jelbuk'>Jelbuk</option>";
			echo "<option value='Panduman'>Panduman</option>";
			echo "<option value='Sucopangepok'>Sucopangepok</option>";
			echo "<option value='Sugerkidul'>Sugerkidul</option>";
			echo "<option value='Sukojember'>Sukojember</option>";
			echo "<option value='Sukowiryo'>Sukowiryo</option>";

		}else if($kecamatan == 'Jenggawah'){

			echo "<option value='Cangkring'>Cangkring</option>";
			echo "<option value='Jatimulyo'>Jatimulyo</option>";
			echo "<option value='Jatisari'>Jatisari</option>";
			echo "<option value='Jenggawah'>Jenggawah</option>";
			echo "<option value='Kemuningsari Kidul'>Kemuningsari Kidul</option>";
			echo "<option value='Kertonegoro'>Kertonegoro</option>";
			echo "<option value='Sruni'>Sruni</option>";
			echo "<option value='Wonojati'>Wonojati</option>";

		}else if($kecamatan == 'Jombang'){

			echo "<option value='Jombang'>Jombang</option>";
			echo "<option value='Keting'>Keting</option>";
			echo "<option value='Ngampelrejo'>Ngampelrejo</option>";
			echo "<option value='Padomasan'>Padomasan</option>";
			echo "<option value='Sarimulyo'>Sarimulyo</option>";
			echo "<option value='Wringinagung'>Wringinagung</option>";

		}else if($kecamatan == 'Kalisat'){

			echo "<option value='Ajung'>Ajung</option>";
			echo "<option value='Gambiran'>Gambiran</option>";
			echo "<option value='Glagahwero'>Glagahwero</option>";
			echo "<option value='Gumuksari'>Gumuksari</option>";
			echo "<option value='Kalisat'>Kalisat</option>";
			echo "<option value='Patempuran'>Patempuran</option>";
			echo "<option value='Plalangan'>Plalangan</option>";
			echo "<option value='Sebanen'>Sebanen</option>";
			echo "<option value='Sukoreno'>Sukoreno</option>";
			echo "<option value='Sumberjeruk'>Sumberjeruk</option>";
			echo "<option value='Sumberkalong'>Sumberkalong</option>";
			echo "<option value='Sumberketempa'>Sumberketempa</option>";

		}else if($kecamatan == 'Kaliwates'){

			echo "<option value='Jember Kidul'>Jember Kidul</option>";
			echo "<option value='Kaliwates'>Kaliwates</option>";
			echo "<option value='Kebon Agung'>Kebon Agung</option>";
			echo "<option value='Kepatihan'>Kepatihan</option>";
			echo "<option value='Mangli'>Mangli</option>";
			echo "<option value='Sempusari'>Sempusari</option>";
			echo "<option value='Tegal Besar'>Tegal Besar</option>";

		}else if($kecamatan == 'Kencong'){

			echo "<option value='Cakru'>Cakru</option>";
			echo "<option value='Kencong'>Kencong</option>";
			echo "<option value='Kraton'>Kraton</option>";
			echo "<option value='Paseban'>Paseban</option>";
			echo "<option value='Wonorejo'>Wonorejo</option>";

		}else if($kecamatan == 'Ledokombo'){

			echo "<option value='Karangpaiton'>Karangpaiton</option>";
			echo "<option value='Ledokombo'>Ledokombo</option>";
			echo "<option value='Lembengan'>Lembengan</option>";
			echo "<option value='Slateng'>Slateng</option>";
			echo "<option value='Sukogidri'>Sukogidri</option>";
			echo "<option value='Sumberanget'>Sumberanget</option>";
			echo "<option value='Sumberbulus'>Sumberbulus</option>";
			echo "<option value='Sumberlesung'>Sumberlesung</option>";
			echo "<option value='Sumbersalak'>Sumbersalak</option>";
			echo "<option value='Suren'>Suren</option>";
			

		}else if($kecamatan == 'Mayang'){

			echo "<option value='Mayang'>Mayang</option>";
			echo "<option value='Mrawan'>Mrawan</option>";
			echo "<option value='Seputih'>Seputih</option>";
			echo "<option value='Sidomukti'>Sidomukti</option>";
			echo "<option value='Sumberkejayan'>Sumberkejayan</option>";
			echo "<option value='Tegalwaru'>Tegalwaru</option>";
			echo "<option value='Tegalrejo'>Tegalrejo</option>";

		}else if($kecamatan == 'Mumbulsari'){

			echo "<option value='Karang Kedawung'>Karang Kedawung</option>";
			echo "<option value='Kawangrejo'>Kawangrejo</option>";
			echo "<option value='Lampeji'>Lampeji</option>";
			echo "<option value='Lengkong'>Lengkong</option>";
			echo "<option value='Mumbulsari'>Mumbulsari</option>";
			echo "<option value='Suco'>Suco</option>";
			echo "<option value='Tamansari'>Tamansari</option>";

		}else if($kecamatan == 'Panti'){

			echo "<option value='Glagahwero'>Glagahwero</option>";
			echo "<option value='Kemiri'>Kemiri</option>";
			echo "<option value='Kemuningsari Lor'>Kemuningsari Lor</option>";
			echo "<option value='Pakis'>Pakis</option>";
			echo "<option value='Panti'>Panti</option>";
			echo "<option value='Serut'>Serut</option>";
			echo "<option value='Suci'>Suci</option>";

		}else if($kecamatan == 'Pakusari'){

			echo "<option value='Bedadung'>Bedadung</option>";
			echo "<option value='Jatian'>Jatian</option>";
			echo "<option value='Kertosari'>Kertosari</option>";
			echo "<option value='Pakusari'>Pakusari</option>";
			echo "<option value='Patemon'>Patemon</option>";
			echo "<option value='Subo'>Subo</option>";
			echo "<option value='Sumberpinang'>Sumberpinang</option>";

		}else if($kecamatan == 'Patrang'){

			echo "<option value='Banjarsengon'>Banjarsengon</option>";
			echo "<option value='Baratan'>Baratan</option>";
			echo "<option value='Bintoro'>Bintoro</option>";
			echo "<option value='Gebang'>Gebang</option>";
			echo "<option value='Jemberlor'>Jemberlor</option>";
			echo "<option value='Jumerto'>Jumerto</option>";
			echo "<option value='Patrang'>Patrang</option>";
			echo "<option value='Slawu'>Slawu</option>";

		}else if($kecamatan == 'Puger'){

			echo "<option value='Bagon'>Bagon</option>";
			echo "<option value='Grenden'>Grenden</option>";
			echo "<option value='Jambearum'>Jambearum</option>";
			echo "<option value='Kasiyan'>Kasiyan</option>";
			echo "<option value='Kasiyan Timur'>Kasiyan Timur</option>";
			echo "<option value='Mlokorejo'>Mlokorejo</option>";
			echo "<option value='Mojomulyo'>Mojomulyo</option>";
			echo "<option value='Mojosari'>Mojosari</option>";
			echo "<option value='Puger Kulon'>Puger Kulon</option>";
			echo "<option value='Puger Wetan'>Puger Wetan</option>";
			echo "<option value='Wonosari'>Wonosari</option>";
			echo "<option value='Wringintelu'>Wringintelu</option>";
			

		}else if($kecamatan == 'Rambipuji'){

			echo "<option value='Curahmalang'>Curahmalang</option>";
			echo "<option value='Gugut'>Gugut</option>";
			echo "<option value='Kaliwining'>Kaliwining</option>";
			echo "<option value='Nogosari'>Nogosari</option>";
			echo "<option value='Pecoro'>Pecoro</option>";
			echo "<option value='Rambigundam'>Rambigundam</option>";
			echo "<option value='Rambipuji'>Rambipuji</option>";
			echo "<option value='Rowotamtu'>Rowotamtu</option>";

		}else if($kecamatan == 'Semboro'){

			echo "<option value='Pondokdalem'>Pondokdalem</option>";
			echo "<option value='Pondokjoyo'>Pondokjoyo</option>";
			echo "<option value='Rejoagung'>Rejoagung</option>";
			echo "<option value='Semboro'>Semboro</option>";
			echo "<option value='Sidomekar'>Sidomekar</option>";
			echo "<option value='Sidomulyo'>Sidomulyo</option>";

		}else if($kecamatan == 'Silo'){

			echo "<option value='Garahan'>Garahan</option>";
			echo "<option value='Harjomulyo'>Harjomulyo</option>";
			echo "<option value='Karangharjo'>Karangharjo</option>";
			echo "<option value='Mulyorejo'>Mulyorejo</option>";
			echo "<option value='Pace'>Pace</option>";
			echo "<option value='Sempolan'>Sempolan</option>";
			echo "<option value='Sidomulyo'>Sidomulyo</option>";
			echo "<option value='Silo'>Silo</option>";
			echo "<option value='Sumberjati'>Sumberjati</option>";

		}else if($kecamatan == 'Sukorambi'){

			echo "<option value='Dukuhmencek'>Dukuhmencek</option>";
			echo "<option value='Jubung'>Jubung</option>";
			echo "<option value='Karangpring'>Karangpring</option>";
			echo "<option value='Klungkung'>Klungkung</option>";
			echo "<option value='Sukorambi'>Sukorambi</option>";

		}else if($kecamatan == 'Sukowono'){

			echo "<option value='Arjasa'>Arjasa</option>";
			echo "<option value='Balet Baru'>Balet Baru</option>";
			echo "<option value='Dawuhanmangli'>Dawuhanmangli</option>";
			echo "<option value='Mojogemi'>Mojogemi</option>";
			echo "<option value='Pocangan'>Pocangan</option>";
			echo "<option value='Sukokerto'>Sukokerto</option>";
			echo "<option value='Sukorejo'>Sukorejo</option>";
			echo "<option value='Sukosari'>Sukosari</option>";
			echo "<option value='Sukowono'>Sukowono</option>";
			echo "<option value='Sumberwringin'>Sumberwringin</option>";
			echo "<option value='Sumberdanti'>Sumberdanti</option>";
			echo "<option value='Sumberwaru'>Sumberwaru</option>";

		}else if($kecamatan == 'Sumberbaru'){

			echo "<option value='Gelang'>Gelang</option>";
			echo "<option value='Jambesari'>Jambesari</option>";
			echo "<option value='Jamintoro'>Jamintoro</option>";
			echo "<option value='Jatiroto'>Jatiroto</option>";
			echo "<option value='Kaliglagah'>Kaliglagah</option>";
			echo "<option value='Karangbayat'>Karangbayat</option>";
			echo "<option value='Pringgowirawan'>Pringgowirawan</option>";
			echo "<option value='Rowotengah'>Rowotengah</option>";
			echo "<option value='Sumberagung'>Sumberagung</option>";
			echo "<option value='Yosorati'>Yosorati</option>";

		}else if($kecamatan == 'Sumberjambe'){

			echo "<option value='Cumedak'>Cumedak</option>";
			echo "<option value='Gunungmalang'>Gunungmalang</option>";
			echo "<option value='Jambearum'>Jambearum</option>";
			echo "<option value='Plerean'>Plerean</option>";
			echo "<option value='Pringgondani'>Pringgondani</option>";
			echo "<option value='Randuagung'>Randuagung</option>";
			echo "<option value='Rowosari'>Rowosari</option>";
			echo "<option value='Sumberjambe'>Sumberjambe</option>";
			echo "<option value='Sumberpakem'>Sumberpakem</option>";

		}else if($kecamatan == 'Sumbersari'){

			echo "<option value='Antirogo'>Antirogo</option>";
			echo "<option value='Karangrejo'>Karangrejo</option>";
			echo "<option value='Kebonsari'>Kebonsari</option>";
			echo "<option value='Kranjingan'>Kranjingan</option>";
			echo "<option value='Sumbersari'>Sumbersari</option>";
			echo "<option value='Tegalgede'>Tegalgede</option>";
			echo "<option value='Wirolegi'>Wirolegi</option>";

		}else if($kecamatan == 'Tanggul'){

			echo "<option value='Darungan'>Darungan</option>";
			echo "<option value='Klatakan'>Klatakan</option>";
			echo "<option value='Kramat Sukoharjo'>Kramat Sukoharjo</option>";
			echo "<option value='Manggisan'>Manggisan</option>";
			echo "<option value='Patemon'>Patemon</option>";
			echo "<option value='Selodakon'>Selodakon</option>";
			echo "<option value='Tanggul Kulon'>Tanggul Kulon</option>";
			echo "<option value='Tanggul Wetan'>Tanggul Wetan</option>";

		}else if($kecamatan == 'Tempurejo'){

			echo "<option value='Andongrejo'>Andongrejo</option>";
			echo "<option value='Curahnongko'>Curahnongko</option>";
			echo "<option value='Curahtakir'>Curahtakir</option>";
			echo "<option value='Pondokrejo'>Pondokrejo</option>";
			echo "<option value='Sidodadi'>Sidodadi</option>";
			echo "<option value='Sanenrejo'>Sanenrejo</option>";
			echo "<option value='Tempurejo'>Tempurejo</option>";
			echo "<option value='Wonoasri'>Wonoasri</option>";

		}else if($kecamatan == 'Umbulsari'){

			echo "<option value='Gadingrejo'>Gadingrejo</option>";
			echo "<option value='Gunungsari'>Gunungsari</option>";
			echo "<option value='Mundurejo'>Mundurejo</option>";
			echo "<option value='Paleran'>Paleran</option>";
			echo "<option value='Sidorejo'>Sidorejo</option>";
			echo "<option value='Sukoreno'>Sukoreno</option>";
			echo "<option value='Tanjungsari'>Tanjungsari</option>";
			echo "<option value='Tegalwangi'>Tegalwangi</option>";
			echo "<option value='Umbulrejo'>Umbulrejo</option>";
			echo "<option value='Umbulsari'>Umbulsari</option>";
			

		}else if($kecamatan == 'Wuluhan'){

			echo "<option value='Ampel'>Ampel</option>";
			echo "<option value='Dukuhdempok'>Dukuhdempok</option>";
			echo "<option value='Glundengan'>Glundengan</option>";
			echo "<option value='Kesilir'>Kesilir</option>";
			echo "<option value='Lojejer'>Lojejer</option>";
			echo "<option value='Tamansari'>Tamansari</option>";
			echo "<option value='Tanjungrejo'>Tanjungrejo</option>";
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

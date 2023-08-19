<?php
defined('BASEPATH') or exit('Npo direct script access allowed');

class Welcome extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_data');
		$this->load->helper('url');
		$this->load->helper('download');
	}

	public function index()
	{

		$this->data['slider'] = $this->db->get('tbl_slider_hero')->result();
		$this->data['laporan'] = $this->db->get('tbl_laporan_penyaluran')->row();


		$this->data['imgBig'] = $this->db->get_where('tbl_gallery', array('id' => 1))->row();
		$this->data['imgMedium'] = $this->db->get_where('tbl_gallery', array('id' => 2))->row();
		$this->data['imgSmall'] = $this->db->get_where('tbl_gallery', array('id' => 4))->row();


		$this->data['contentA'] = $this->db->get_where('tbl_about_us', array('id' => 1))->row();
		$this->data['contentB'] = $this->db->get_where('tbl_about_us', array('id' => 2))->row();


		$this->data['program'] = $this->db->get('tbl_program_kerja_a')->result();
		$this->data['gallery2'] = $this->db->get_where('tbl_galeri2', array('status' => "Y"))->result();

		$this->data['imgAbout'] = $this->db->get_where('tbl_galeri_about_us', array('id' => 1))->row();

		$this->db->order_by('id', 'desc');
		$this->data['video'] = $this->db->get('tbl_video')->result();

		$this->db->order_by('id', 'desc');
		$this->data['donasiSlider'] = $this->db->get_where('tbl_donasi', array("tr_statusPembayaran" => "Y"))->result();

		$this->data['totalDonasi'] = $this->db->get('tbl_donasi')->row();
		$this->data['targetDonasi'] = $this->db->get('tbl_target_donasi')->row();

		$this->web = 'content/v_home';
		// $this->data['navigation']=$this->db->get_where('tbl_navigation');
		$this->layout();
	}
	public function formPost()

	{

		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));



		$userIp = $this->input->ip_address();



		$secret = $this->config->item('google_secret');



		$url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;



		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);

		curl_close($ch);



		$status = json_decode($output, true);



		if ($status['success']) {

			print_r('Google Recaptcha Successful');

			exit;
		} else {

			$this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
		}



		redirect('form', 'refresh');
	}



	public function add_user()
	{
		$nama = $this->input->post('nama');
		$telp = $this->input->post('telp');
		$namaLogistics = $this->input->post('namaLogistics');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$domisili = $this->input->post('domisili');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'nama' => $nama,
			'noTelp' => $telp,
			'namaLogistics' => $namaLogistics,
			'alamat' => $alamat,
			'email' => $email,
			'domisili' => $domisili,
			'keterangan' => $keterangan
		);
		$this->M_data->input_data($data, 'log_user');
		// echo "<script>alert('Success');</script>";
		redirect('../thank_you', 'refresh');
	}

	public function download()
	{
		force_download('upload/Promo-List-EMCO.pdf', NULL);
	}
}
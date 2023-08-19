<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{

	//set the class variable.
	var $template  = array();
	var $data      = array();
	//Load layout    
	public function layout()
	{
		date_default_timezone_set("Asia/Jakarta");

		$this->CI = &get_instance();
		// $this->data['menu']=$this->menu(0,$h="");
		$this->data['website'] = $this->CI->db->get('tbl_website')->row();
		$this->data['sosmed'] = $this->CI->db->get('tbl_sosmed')->result();
		$this->data['bank'] = $this->CI->db->get('tbl_master_bank')->result();
		$this->data['masterDonasi'] = $this->CI->db->get('tbl_master_donasi')->result();

		$this->template['header']   = $this->load->view('layout/header', $this->data); //, $this->data

		$this->template['web'] = $this->load->view($this->web, $this->data); //, $this->data
		$this->template['footer'] = $this->load->view('layout/footer', $this->data); //, $this->data
		$this->initCounter(); //insert statistik
	}

	function initCounter()
	{

		$ip = $_SERVER['REMOTE_ADDR']; // menangkap ip pengunjung
		$location = 'https://alkarim.my.id' . $_SERVER['PHP_SELF']; // menangkap server path

		//membuat log dalam tabel database 'counter'
		$check = $this->db->query("SELECT * from tbl_counter where ip='" . $ip . "' and date(`timestamp`)=CURDATE()");
		$check2 = $check->row();
		if ($check->num_rows() > 0) {

			$create_log = $this->db->query("UPDATE tbl_counter SET `timestamp`=NOW() WHERE id='" . $check2->id . "'");
		} else {
			$create_log = $this->db->query("INSERT INTO tbl_counter(ip,location,`timestamp`)VALUES('$ip', '$location',NOW()) ");
		}
	}
}

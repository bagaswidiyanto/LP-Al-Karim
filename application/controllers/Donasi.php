<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donasi extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        $this->load->library('form_validation');
    }


    public function index()
    {

        $this->data['slider'] = $this->db->get('tbl_slider_hero')->result();
        $this->data['laporan'] = $this->db->get('tbl_laporan_penyaluran')->row();
        $this->data['imgBig'] = $this->db->get_where('tbl_gallery', array('id' => 1))->row();
        $this->data['imgMedium'] = $this->db->get_where('tbl_gallery', array('id' => 2))->row();
        $this->data['imgSmall'] = $this->db->get_where('tbl_gallery', array('id' => 3))->row();


        $this->data['contentA'] = $this->db->get_where('tbl_about_us', array('id' => 1))->row();
        $this->data['contentB'] = $this->db->get_where('tbl_about_us', array('id' => 2))->row();


        $this->data['program'] = $this->db->get('tbl_program_kerja_a')->result();
        $this->data['gallery2'] = $this->db->get('tbl_galeri2')->result();

        $this->data['imgAbout'] = $this->db->get_where('tbl_galeri_about_us', array('id' => 1))->row();

        $this->db->order_by('id', 'desc');
        $this->data['video'] = $this->db->get('tbl_video')->result();

        $this->db->order_by('id', 'desc');
        $this->data['donasiSlider'] = $this->db->get_where('tbl_donasi', array("tr_statusPembayaran" => "Y"))->result();

        $this->data['totalDonasi'] = $this->db->get('tbl_donasi')->row();
        $this->data['targetDonasi'] = $this->db->get('tbl_target_donasi')->row();
        $this->web = 'content/v_home';
        $this->layout();
    }

    public function add_donasi()
    {

        $this->data['slider'] = $this->db->get('tbl_slider_hero')->result();
        $this->data['laporan'] = $this->db->get('tbl_laporan_penyaluran')->row();
        $this->data['imgBig'] = $this->db->get_where('tbl_gallery', array('id' => 1))->row();
        $this->data['imgMedium'] = $this->db->get_where('tbl_gallery', array('id' => 2))->row();
        $this->data['imgSmall'] = $this->db->get_where('tbl_gallery', array('id' => 3))->row();


        $this->data['contentA'] = $this->db->get_where('tbl_about_us', array('id' => 1))->row();
        $this->data['contentB'] = $this->db->get_where('tbl_about_us', array('id' => 2))->row();


        $this->data['program'] = $this->db->get('tbl_program_kerja_a')->result();
        $this->data['gallery2'] = $this->db->get('tbl_galeri2')->result();

        $this->data['imgAbout'] = $this->db->get_where('tbl_galeri_about_us', array('id' => 1))->row();

        $this->db->order_by('id', 'desc');
        $this->data['video'] = $this->db->get('tbl_video')->result();

        $this->db->order_by('id', 'desc');
        $this->data['donasiSlider'] = $this->db->get_where('tbl_donasi', array("tr_statusPembayaran" => "Y"))->result();

        $this->data['totalDonasi'] = $this->db->get('tbl_donasi')->row();
        $this->data['targetDonasi'] = $this->db->get('tbl_target_donasi')->row();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('hasil', 'hasil', 'required');
        $this->form_validation->set_rules('bank', 'bank', 'required');

        if ($this->form_validation->run() == TRUE) {
            $no_unik = $this->input->post('no_unik');
            $nama = $this->input->post('nama');
            $hideNama = $this->input->post('hideNama');
            $no_wa = $this->input->post('no_wa');
            $email = $this->input->post('email');
            $pesan = $this->input->post('pesan');
            $hasil = $this->input->post('hasil');
            $bank = $this->input->post('bank');


            $data = array(
                'no_unik' => $no_unik,
                'nama' => $nama,
                'hideNama' => $hideNama,
                'nama' => $nama,
                'no_wa' => $no_wa,
                'email' => $email,
                'pesan' => $pesan,
                'nominalDonasi' => $hasil,
                'bank' => $bank,
                'tr_statusPembayaran' => "N",
            );


            $this->M_data->input_data($data, 'tbl_donasi');

            $nominalWa = number_format($hasil, 0, ",", ".");

            $query = $this->db->query("SELECT a.no_unik, a.nama, a.nominalDonasi, b.nama as namaBank, b.no_rek FROM tbl_donasi a LEFT JOIN tbl_master_bank b ON a.bank = b.kode WHERE a.no_unik = '" . $no_unik . "'")->row();
            if ($hideNama == "Y") {
                $namaDonatur = "Hamba Allah";
            } else {
                $namaDonatur = $nama;
            }
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $no_wa,
                    'message' => "
Alhamdulillah, Terimakasih *$namaDonatur*🤲😊

Telah mendaftar donasi untuk Program:
*Pembangunan Asrama Santri Penghafal Alquran Yatim Dhuafa*

Nominal Donasi: *Rp $nominalWa*

Tinggal satu langkah lagi Bpk/Ibu *$namaDonatur*, Silahkan transfer donasi ke No 
Rekening Atas Nama Yayasan Bhakti Alkarim *$query->namaBank $query->no_rek*

(Pastikan nominalnya sama persis ya Bapak/Ibu *$namaDonatur*, untuk memudahkan pengecekan donasi)

Semoga niat baik kita dimudahkan oleh Allah Subhanahuwata'ala. Aamiin Ya Rabb😊🤲🙏

Terimakasih.",
                    'countryCode' => '62', //optional
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: #wDL@+fXiFRV+46HM6zt' //change TOKEN to your actual token
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo "good";
        } else {
            $this->web = 'content/v_home';
            $this->layout();
        }
    }
}

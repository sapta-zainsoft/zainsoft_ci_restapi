<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Android_anggota extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        // $this->load->model('nasabah_model');
    }

    //Menampilkan data nasabah
    // function index_get() { 
    // 	$nasabah = $this->nasabah_model->all_nasabah();
    //     // $nasabah = $this->db->get('nasabah')->result();
    //     $this->response(array("result"=>$nasabah, 200));
    // }

    function index_get(){
        $status = $this->get('status');
        $kode_kantor = $this->get('kode_kantor');
        $kode_kolektor = $this->get('kode_group3');
        $no_id = $this->get('no_id');
        $filter = $this->get('filter');
        if($status == 'all_nasabah'){
            $nasabah = $this->db->get('nasabah')->result();
        }
        elseif ($status == 'nasabah_id_max') {
            $this->db->from('nasabah');
            $this->db->where('kode_kantor', $kode_kantor);
            $this->db->select('coalesce(max(nasabah_id)+1,0) as hasil_max_nasabah_id');
            $nasabah = $this->db->get()->result();
        }
        elseif ($status == 'find_id'){
            $this->db->select('*');
            $this->db->from('nasabah');
            $this->db->where('no_id', $no_id);
            $nasabah = $this->db->get()->result();
        }
        elseif ($status == 'filter_search'){
            $this->db->select('*');
            $this->db->from('nasabah');
            $this->db->like('nama_nasabah', $filter, 'BOTH');
            $nasabah = $this->db->get()->result();
        }
        $this->response(array("result"=>$nasabah,200));
    }

    function index_post() {
        $data = array(
                    'nasabah_id'        => $this->post('nasabah_id'),
                    'nama_nasabah'      => $this->post('nama_nasabah'),
                    'alamat'            => $this->post('alamat'),
                    'jenis_kelamin'     => $this->post('jenis_kelamin'),
                    'tempat_lahir'      => $this->post('tempat_lahir'),
                    'tgl_lahir'         => $this->post('tgl_lahir'),
                    'jenis_id'          => $this->post('jenis_id'),
                    'no_id'             => $this->post('no_id'),
                    'kode_group1'       => $this->post('kode_group1'),
                    'kode_group2'       => $this->post('kode_group2'),
                    'kode_group3'       => $this->post('kode_group3'),
                    'kode_agama'        => $this->post('kode_agama'),
                    'kelurahan'         => $this->post('kelurahan'),
                    'kecamatan'         => $this->post('kecamatan'),
                    'kabupaten'         => $this->post('kabupaten'),
                    'provinsi'          => $this->post('provinsi'),
                    'verifikasi'        => $this->post('verifikasi'),
                    'verifikasi_update' => $this->post('verifikasi_update'),
                    'hp'                => $this->post('hp'),
                    'wa'                => $this->post('wa'),
                    'kode_kantor'       => $this->post('kode_kantor'),
                    'userid'            => $this->post('userid')
                );
        $insert = $this->db->insert('nasabah', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // function index_get() {
    //     $key = $this->get('nasabah_id');
    //     if ($key == '') {
    //         $nasabah = $this->db->get('nasabah')->result();
    //     } else {
    //         $this->db->where('nasabah_id', $key);
    //         $nasabah = $this->db->get('nasabah')->result();
    //     }
    //     $this->response(array("result"=>$nasabah,200));

    //     //start Nasabah ID maksimum
    //     // $max_id = $this->get('max_id');
    //     $kode_kantor = $this->get('kode_kantor');
    //     $kode_kolektor = $this->get('kode_group3');
    //     if ($kode_kolektor == ''){
    //         $nasabah_max = 'kosong';
    //     }
    //     else {
    //         $this->db->from('nasabah');
    //         $this->db->where('kode_kantor', $kode_kantor);
    //         $this->db->where('kode_group3', $kode_kolektor);
    //         $this->db->select('max(nasabah_id) as hasil_max_nasabah_id');
    //         $nasabah_max = $this->db->get()->result();
    //     }
    //     // $this->response($nasabah, 200);
    //     $this->response(array("result"=>$nasabah_max,200));
    //     // Ending nasabah_max id maksimum


    //     $key = $this->get('no_id');
    //     if ($key == '') {
    //         $nasabah = $this->db->get('nasabah')->result();
    //     } else {
    //         $this->db->where('no_id', $key);
    //         $nasabah = $this->db->get('nasabah')->result();
    //     }
    //     // $this->response($nasabah, 200);
    //     $this->response(array("result"=>$nasabah,200));
    // }


    // insert new data to mahasiswa
    function index_post() {
        $data = array(
                    'nasabah_id'        => $this->post('nasabah_id'),
                    'nama_nasabah'      => $this->post('nama_nasabah'),
                    'alamat'            => $this->post('alamat'),
                    'jenis_kelamin'     => $this->post('jenis_kelamin'),
                    'tempat_lahir'      => $this->post('tempat_lahir'),
                    'tgl_lahir'         => $this->post('tgl_lahir'),
                    'jenis_id'          => $this->post('jenis_id'),
                    'no_id'             => $this->post('no_id'),
                    'kode_group1'       => $this->post('kode_group1'),
                    'kode_group2'       => $this->post('kode_group2'),
                    'kode_group3'       => $this->post('kode_group3'),
                    'kode_agama'        => $this->post('kode_agama'),
                    'kelurahan'         => $this->post('kelurahan'),
                    'kecamatan'         => $this->post('kecamatan'),
                    'kabupaten'         => $this->post('kabupaten'),
                    'provinsi'          => $this->post('provinsi'),
                    'verifikasi'        => $this->post('verifikasi'),
                    'verifikasi_update' => $this->post('verifikasi_update'),
                    'hp'                => $this->post('hp'),
                    'wa'                => $this->post('wa'),
                    'tgl_register'      => $this->post('tgl_register'),
                    'kode_kantor'       => $this->post('kode_kantor'));
        $insert = $this->db->insert('mahasiswa', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data mahasiswa
    function index_put() {
        $nim = $this->put('nim');
        $data = array(
                    'nim'       => $this->put('nim'),
                    'nama'      => $this->put('nama'),
                    'id_jurusan'=> $this->put('id_jurusan'),
                    'alamat'    => $this->put('alamat'));
        $this->db->where('nim', $nim);
        $update = $this->db->update('mahasiswa', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete mahasiswa
    function index_delete() {
        $nim = $this->delete('nim');
        $this->db->where('nim', $nim);
        $delete = $this->db->delete('mahasiswa');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>
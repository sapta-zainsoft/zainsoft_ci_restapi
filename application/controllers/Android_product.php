<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Android_product extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get() {
        $key_query = $this->get('key_query');
        if ($key_query == 'all') {
            $this->db->select('*');
            $this->db->from('product');
            $result_query = $this->db->get()->result();
        }
        $this->response(array("result"=>$result_query,200));
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
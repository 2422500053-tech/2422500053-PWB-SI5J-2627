<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota2422500053_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_admin_logged_in();

        $this->load->model('Kota2422500053_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    // MENAMPILKAN DATA KOTA
    public function index()
    {
        $data['title'] = 'Kota';
        $data['data_kota'] =
            $this->Kota2422500053_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('Kota2422500053/index', $data);
        $this->load->view('templates/footer');
    }

    // VALIDASI DATA
    private function validasi()
    {
        $this->form_validation->set_rules(
            'nama_kota053',
            'Nama Kota',
            'trim|required|max_length[50]'
        );

        $this->form_validation->set_rules(
            'wilayah053',
            'Wilayah',
            'trim|required|max_length[30]'
        );

        $this->form_validation->set_rules(
            'provinsi053',
            'Provinsi',
            'trim|required|max_length[50]'
        );

        $this->form_validation->set_rules(
            'status053',
            'Status',
            'trim|required|in_list[Aktif,Tidak Aktif]'
        );
    }

    // TAMBAH DATA KOTA
    public function tambah()
    {
        if ($this->input->method(TRUE) !== 'POST') {
            show_404();
        }

        $this->validasi();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
            return;
        }

        $data = array(
            'nama_kota053' =>
                $this->input->post('nama_kota053', TRUE),

            'wilayah053' =>
                $this->input->post('wilayah053', TRUE),

            'provinsi053' =>
                $this->input->post('provinsi053', TRUE),

            'status053' =>
                $this->input->post('status053', TRUE)
        );

        if ($this->Kota2422500053_model->tambah($data)) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success">
                    Data kota berhasil ditambahkan!
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger">
                    Data kota gagal ditambahkan!
                </div>'
            );
        }

        redirect('administrator/kota');
    }

    // UBAH DATA KOTA
    public function ubah($id = NULL)
    {
        if ($id === NULL) {
            show_404();
        }

        if ($this->input->method(TRUE) !== 'POST') {
            show_404();
        }

        $kota = $this->Kota2422500053_model
                     ->get_by_id($id);

        if (!$kota) {
            show_404();
        }

        $this->validasi();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
            return;
        }

        $data = array(
            'nama_kota053' =>
                $this->input->post('nama_kota053', TRUE),

            'wilayah053' =>
                $this->input->post('wilayah053', TRUE),

            'provinsi053' =>
                $this->input->post('provinsi053', TRUE),

            'status053' =>
                $this->input->post('status053', TRUE)
        );

        if ($this->Kota2422500053_model->ubah($id, $data)) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success">
                    Data kota berhasil diubah!
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger">
                    Data kota gagal diubah!
                </div>'
            );
        }

        redirect('administrator/kota');
    }

    // HAPUS DATA KOTA
    public function hapus($id = NULL)
    {
        if ($id === NULL) {
            show_404();
        }

        if ($this->input->method(TRUE) !== 'POST') {
            show_404();
        }

        $kota = $this->Kota2422500053_model
                     ->get_by_id($id);

        if (!$kota) {
            show_404();
        }

        if ($this->Kota2422500053_model->hapus($id)) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success">
                    Data kota berhasil dihapus!
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger">
                    Data kota gagal dihapus!
                </div>'
            );
        }

        redirect('administrator/kota');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('templates/Topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/Footer');
    }
    public function upload()
    {
        $config['upload_path'] = 'assets/foto_kue/'; // folder upload 
        $config['allowed_types'] = 'gif|jpg|png'; // jenis file
        $config['max_size'] = 3000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) //sesuai dengan name pada form 
        {
            echo 'anda gagal upload';
        } else {
            //tampung data dari form
            $nama = $this->input->post('nm_produk');
            $des = $this->input->post('Deskripsi');
            $harga = $this->input->post('harga');
            $file = $this->upload->data();
            $gambar = $file['file_name'];
            $this->toko_model->simpan(array(
                'nama_produk' => $nama, 'deskripsi' => $des,
                'harga' => $harga,
                'gambar' => $gambar
            ));
            redirect('user/lihat_produk');
        }
    }
    public function lihat_produk()
    {
        $data['produk'] = $this->toko_model->lihat_data()->result();
        $this->load->view('user/Head', $data);
        $this->load->view('user/Nav', $data);
        $this->load->view('user/Sidebar', $data);
        $this->load->view('user/tabel', $data);
        $this->load->view('user/Footer', $data);
    }
}

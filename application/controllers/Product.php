<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    function _construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
    }
    public function list_product()
    {
        $this->load->model('Toko_model');
        $data['title'] = 'Lihat Produk';
        $data['produk'] = $this->Toko_model->lihat_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('templates/Topbar', $data);
        $this->load->view('product/list_product', $data);
        $this->load->view('templates/Footer');
    }
    function edit($id_produk)
    {
        $this->load->model('Toko_model');
        $data['title'] = 'Edit Produk';
        $where = array('id_produk' => $id_produk);
        $data['produk'] = $this->Toko_model->ubah_produk($where, 'produk')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('templates/Topbar', $data);
        $this->load->view('product/edit_product', $data);
        $this->load->view('templates/Footer');
    }
    public function Hapus($id_produk)
    {
        $this->toko_model->p_hapus($id_produk);
        redirect('product/list_product');
    }

    public function upload()
    {
        $config['upload_path'] = 'assets/foto_bunga/'; // folder upload 
        $config['allowed_types'] = 'gif|jpg|png'; // jenis file
        $config['max_size'] = 20000;
        $config['max_width'] = 1920;
        $config['max_height'] = 1080;
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
            redirect('product/list_product');
        }
    }

    public function update()
    {
        $config['upload_path']    = 'assets/foto_bunga/'; // folder upload
        $config['allowed_types']    = 'gif|jpg|png'; // jenis file
        $config['max_size']    = 200000;
        $config['max_width']    = 1920;
        $config['max_height']    = 1080;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) //sesuai dengan name pada form
        {
            echo 'anda gagal upload';
        } else {



            //tampung data dari form
            $id_produk = $this->input->post('id');
            $nama = $this->input->post('nm_produk');
            $des = $this->input->post('Deskripsi');
            $harga = $this->input->post('harga');
            $file = $this->upload->data();
            $gambar = $file['file_name'];


            $data = array(
                'nama_produk' => $nama,
                'deskripsi' => $des, 'harga' => $harga,
                'gambar' => $gambar
            );
            $where = array(
                'id_produk' => $id_produk
            );

            $this->toko_model->update_produk($where, $data, 'produk');
            redirect('product/list_product');
        }
    }

    function add_product()
    {
        $data['title'] = 'Tambah Produk';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('templates/Topbar', $data);
        $this->load->view('product/add_product', $data);
        $this->load->view('templates/Footer');
    }
}

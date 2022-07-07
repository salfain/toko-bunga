<?php
defined('BASEPATH') or exit('Mo direct script access allowed');

class Toko_model extends CI_Model
{
    function lihat_data()
    {
        return $this->db->get('produk');
    }
    public function simpan($data)
    {
        $insert = $this->db->insert('produk', $data);
        return $insert;
    }
    public function p_hapus($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }
    function ubah_produk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_produk($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function cek_login($table, $where)
    {

        return $this->db->get_where($table, $where);
    }
}

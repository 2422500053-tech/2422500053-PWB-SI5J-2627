<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produk_kategori_model extends CI_Model
{
    private $_table = "kategori";

    public function get_all()
    {
        $query = $this->db->get($this->_table);
        return $query->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->affected_rows() != 1 ? false : true;
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, [
            'id_kategori' => $id
        ])->row_array();
    }

    public function hapus($id)
    {
        $this->db->delete($this->_table, [
            'id_kategori' => $id
        ]);

        return $this->db->affected_rows() != 1 ? false : true;
    }

    public function ubah($data, $id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update($this->_table, $data);
        return $this->db->affected_rows() != 1 ? false : true;
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota2422500053_model extends CI_Model
{
    private $table = 'Kota2422500053';
    private $primary_key = 'id_kota53';

    public function __construct()
    {
        parent::__construct();
    }

    // MENAMPILKAN SEMUA DATA KOTA
    public function get_all()
    {
        return $this->db
            ->order_by($this->primary_key, 'DESC')
            ->get($this->table)
            ->result_array();
    }

    // MENAMPILKAN DATA BERDASARKAN ID
    public function get_by_id($id)
    {
        return $this->db
            ->get_where(
                $this->table,
                array($this->primary_key => $id)
            )
            ->row_array();
    }

    // TAMBAH DATA KOTA
    public function tambah($data)
    {
        return $this->db->insert(
            $this->table,
            $data
        );
    }

    // UBAH DATA KOTA
    public function ubah($id, $data)
    {
        return $this->db
            ->where($this->primary_key, $id)
            ->update($this->table, $data);
    }

    // HAPUS DATA KOTA
    public function hapus($id)
    {
        return $this->db
            ->where($this->primary_key, $id)
            ->delete($this->table);
    }
}

<?php

class Model_kategori extends CI_Model
{
    public function data_demam()
    {
        return $this->db->get_where("obat", array('id_kategori' => '7'));
    }
    public function data_lambung()
    {
        return $this->db->get_where("obat", array('id_kategori' => '5'));
    }
    public function data_batuk()
    {
        return $this->db->get_where("obat", array('id_kategori' => '2'));
    }
    public function data_sakit_kepala()
    {
        return $this->db->get_where("obat", array('id_kategori' => '4'));
    }
    public function data_vitamin()
    {
        return $this->db->get_where("obat", array('id_kategori' => '1'));
    }
}

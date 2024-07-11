<?php
defined('BASEPATH') or exit('No direct script access allowed');
class m_fasilitas extends CI_Model
{
    public $data;
    public function __construct()
    {
        parent::__construct();
    }
    public function getData()
    {
        
        $this->db->select('*');
        $this->db->from('fasilitas');
        $this->db->join('admin', 'admin.id_admin = fasilitas.id_admin');
        $this->db->join('kategori', 'kategori.id_kategori = fasilitas.id_kategori');
        $result = $this->db->get();
        return $result;
    }
    public function getAllKategori()
    {
        $result = $this->db->get('kategori');
        return $result;
    }
    public function getFasilitasById($idFasilitas)
    {
        $this->db->select('*');
        $this->db->from('fasilitas');
        $this->db->join('kategori', 'kategori.id_kategori = fasilitas.id_kategori');
        $this->db->where('fasilitas.id_fasilitas', $idFasilitas);
        $result = $this->db->get()->result();
        return $result[0];
    }
    public function insertFasilitas($data_foto)
    {
            $insert = array(
                'nama_fasilitas' => $this->input->post('nama_fasilitas'),
                'image' => 'assets/images/fasilitas/' . $data_foto,
                'id_kategori' => $this->input->post('kategori'),
                'id_admin' => '1'
            );

            $result = $this->db->insert('fasilitas', $insert);
            return $result;
        }
    public function editFasilitas()
    {
            $edit = array(
                'nama_fasilitas' => $this->input->post('nama_fasilitas'),
                'id_kategori' => $this->input->post('kategori'),
                'id_admin' => '1',
            );

            $this->db->where('id_fasilitas', $this->input->post('id'));
            $result = $this->db->update('fasilitas', $edit);
            return $result;
    }
    public function editFotoFasilitas($data_foto)
    {
        // var_dump($this->session->userdata('id_admin'));
        // die;
        $edit = array(
            'nama_fasilitas' => $this->input->post('nama_fasilitas'),
            'image' => 'assets/images/fasilitas/' . $data_foto,
            'id_kategori' => $this->input->post('kategori'),
            'id_admin' => '1',
        );

        $this->db->where('id_fasilitas', $this->input->post('id'));
        $result = $this->db->update('fasilitas', $edit);
        return $result;
    }
    public function getKategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('fasilitas');
        $this->db->join('kategori', 'kategori.id_kategori= fasilitas.id_kategori');
        $this->db->where('fasilitas.id_kategori', $id_kategori);
        $result = $this->db->get();
        return $result->result();
    }
    public function deleteFasilitas($idFasilitas)
    {
        $this->db->where('id_fasilitas', $idFasilitas);
        $result = $this->db->delete('fasilitas');
        return $result;
    }
}

/* End of file m_datakategori.php */
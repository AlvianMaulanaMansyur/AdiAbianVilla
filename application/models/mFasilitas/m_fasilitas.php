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
        $result = $this->db->get();
        return $result;
    }
    public function getFasilitasById($idFasilitas)
    {
        $this->db->select('*');
        $this->db->from('fasilitas');
        $this->db->where('fasilitas.id_fasilitas', $idFasilitas);
        $result = $this->db->get()->result();
        return $result[0];
    }
    public function insertFasilitas($data_foto)
    {
            $this->load->model('M_dashboard');
            $username = $this->session->userdata('username');
            $id_admin = $this->M_dashboard->getIdAdmin($username);
            $insert = array(
                'nama_fasilitas' => $this->input->post('nama_fasilitas'),
                'image' => 'assets/images/fasilitas/' . $data_foto,
                'id_admin' => $id_admin[0]['id_admin']
            );

            $result = $this->db->insert('fasilitas', $insert);
            return $result;
    }
    public function editFasilitas()
    {
            $this->load->model('M_dashboard');
            $username = $this->session->userdata('username');
            $id_admin = $this->M_dashboard->getIdAdmin($username);
            $edit = array(
                'nama_fasilitas' => $this->input->post('nama_fasilitas'),
                'id_admin' => $id_admin[0]['id_admin']
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
            'id_admin' => '1',
        );

        $this->db->where('id_fasilitas', $this->input->post('id'));
        $result = $this->db->update('fasilitas', $edit);
        return $result;
    }
    public function deleteFasilitas($idFasilitas)
    {
        $this->db->where('id_fasilitas', $idFasilitas);
        $result = $this->db->delete('fasilitas');
        return $result;
    }
}

/* End of file m_datakategori.php */
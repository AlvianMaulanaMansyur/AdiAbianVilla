<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kamar extends CI_Model
{

    public function ketersediaan($checkin, $checkout)
    {
        $this->db->select('kamar.id_kamar, pemesanan.id_pemesanan, pemesanan.tgl_checkIn, pemesanan.tgl_checkOut');
        $this->db->from('kamar');
        $this->db->join('kamar_has_pemesanan', 'kamar.id_kamar = kamar_has_pemesanan.id_kamar', 'left');
        $this->db->join('pemesanan', 'kamar_has_pemesanan.id_pemesanan = pemesanan.id_pemesanan', 'left');
        $this->db->where('kamar.status_ketersediaan', 1);
        $this->db->or_group_start();
        $this->db->where('pemesanan.tgl_checkOut <', $checkin);
        $this->db->or_where('pemesanan.tgl_checkIn >', $checkout);
        $this->db->group_end();

        $query = $this->db->get();
        $kamar_tersedia = $query->result();
        return $kamar_tersedia;
    }
}

/* End of file M_kamar.php */

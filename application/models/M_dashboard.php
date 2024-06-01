<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function get_kamar()
    {
        $query = $this->db->get('kamar');
        return $query->result_array();
    }

    public function get_status_ketersediaan()
    {
        $this->db->select('id_kamar,no_kamar,status_ketersediaan');
        $query = $this->db->get('kamar');
        return $query->result_array();
    }

    public function ubah_status_kamar($id_kamar, $status)
    {
        $data = array('status_ketersediaan' => $status);
        $this->db->where('id_kamar', $id_kamar);
        $this->db->update('kamar', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function ketersediaan($checkin, $checkout)
    {
        $this->db->select('kamar.id_kamar');
        $this->db->from('kamar');
        $this->db->join('kamar_has_pemesanan', 'kamar.id_kamar = kamar_has_pemesanan.id_kamar', 'left');
        $this->db->join('pemesanan', 'kamar_has_pemesanan.id_pemesanan = pemesanan.id_pemesanan', 'left');

        // Ensure that the room is available if:
        // 1. The room is marked as available
        // 2. There is no overlapping reservation for the given period
        $this->db->where('kamar.status_ketersediaan', 1);
        $this->db->group_start();
        $this->db->where('pemesanan.id_pemesanan IS NULL'); // No reservation
        $this->db->or_group_start();
        $this->db->where('pemesanan.tgl_checkOut <=', $checkin);
        $this->db->or_where('pemesanan.tgl_checkIn >=', $checkout);
        $this->db->group_end();
        $this->db->group_end();

        $this->db->group_by('kamar.id_kamar');

        $query = $this->db->get();
        return $query->result();
    }


    public function detailKetersediaan($tanggal_check_in, $tanggal_check_out)
    {
        $this->db->select('kamar.id_kamar');
        $this->db->from('kamar');
        $this->db->join('kamar_has_pemesanan', 'kamar.id_kamar = kamar_has_pemesanan.id_kamar');
        $this->db->join('pemesanan', 'kamar_has_pemesanan.id_pemesanan = pemesanan.id_pemesanan');
        $this->db->where('pemesanan.tgl_checkIn >= ', $tanggal_check_in);
        $this->db->where('pemesanan.tgl_checkOut <= ', $tanggal_check_out);

        $this->db->group_by('kamar.id_kamar');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function gabungKetersediaan($checkin, $checkout)
    {
        $ketersediaanResult = $this->ketersediaan($checkin, $checkout);
        $detailKetersediaanResult = $this->detailKetersediaan($checkin, $checkout);
        $uniqueResult = [];

        if ($detailKetersediaanResult == FALSE) {
            $uniqueResult = $ketersediaanResult;
        } else {
            $mergedResult = array_merge($ketersediaanResult, $detailKetersediaanResult);
            $idCounts = [];
            foreach ($mergedResult as $item) {
                $id = $item->id_kamar;
                if (!isset($idCounts[$id])) {
                    $idCounts[$id] = 1;
                } else {
                    $idCounts[$id]++;
                }
            }

            foreach ($mergedResult as $item) {
                $id = $item->id_kamar;
                if ($idCounts[$id] <= 1) {
                    $uniqueResult[] = $item;
                }
            }
        }
        return $uniqueResult;
    }
}



/* End of file M_dashboard.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kamar extends CI_Model
{
    public function ketersediaan($checkin, $checkout)
    {
        $this->db->select('kamar.id_kamar');
        $this->db->from('kamar');
        $this->db->join('kamar_has_pemesanan', 'kamar.id_kamar = kamar_has_pemesanan.id_kamar', 'left');
        $this->db->join('pemesanan', 'kamar_has_pemesanan.id_pemesanan = pemesanan.id_pemesanan', 'left');
        $this->db->where('kamar.status_ketersediaan', 1);
        $this->db->or_group_start();
        $this->db->where('pemesanan.tgl_checkOut <', $checkin);
        $this->db->or_where('pemesanan.tgl_checkIn >', $checkout);
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
        $this->db->where('(pemesanan.tgl_checkIn >= ' . $this->db->escape($tanggal_check_in) . ' AND pemesanan.tgl_checkOut <= ' . $this->db->escape($tanggal_check_out) . ')');
        $this->db->or_where('(pemesanan.tgl_checkIn > ' . $this->db->escape($tanggal_check_out) . ' AND pemesanan.tgl_checkOut IS NULL)');
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

/* End of file M_kamar.php */

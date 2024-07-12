<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kamar extends CI_Model
{
    public function getHargaKamar()
    {
        $this->db->select('harga');
        $this->db->from('detail_kamar');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKamar()
    {
        $this->db->select('id_kamar,no_kamar');
        $this->db->from('kamar');
        $query = $this->db->get();
        return $query->result();
    }
  
    // public function ketersediaan($checkin, $checkout)
    // {
    //     $this->db->select('kamar.id_kamar, pemesanan.tgl_checkIn, pemesanan.tgl_checkOut, detail_kamar.harga, detail_kamar.jenis_kamar');
    //     $this->db->from('kamar');
    //     $this->db->join('kamar_has_pemesanan', 'kamar.id_kamar = kamar_has_pemesanan.id_kamar', 'left');
    //     $this->db->join('pemesanan', 'kamar_has_pemesanan.id_pemesanan = pemesanan.id_pemesanan', 'left');
    //     $this->db->join('detail_kamar', 'kamar.id_detail_kamar = detail_kamar.id_detail_kamar', 'left');
        
    //     // Kondisi untuk memeriksa ketersediaan kamar berdasarkan tanggal check-in dan check-out
    //     $this->db->group_start();
    //     $this->db->where('pemesanan.id_pemesanan IS NULL');
    //     $this->db->or_group_start();
    //     $this->db->where('pemesanan.tgl_checkOut <=', $checkin);
    //     $this->db->or_where('pemesanan.tgl_checkIn >=', $checkout);
    //     $this->db->group_end();
    //     $this->db->group_end();
    
    //     $this->db->group_by('kamar.id_kamar');
    
    //     $query = $this->db->get();
    //     return $query->result();
    // }


    
    // public function ketersediaan($checkin, $checkout)
    // {
    //     $this->db->select('kamar.id_kamar, kamar.no_kamar, pemesanan.tgl_checkIn, pemesanan.tgl_checkOut, detail_kamar.harga, detail_kamar.jenis_kamar');
    //     $this->db->from('kamar');
    //     $this->db->join('kamar_has_pemesanan', 'kamar.id_kamar = kamar_has_pemesanan.id_kamar', 'left');
    //     $this->db->join('pemesanan', 'kamar_has_pemesanan.id_pemesanan = pemesanan.id_pemesanan', 'left');
    //     $this->db->join('detail_kamar', 'kamar.id_detail_kamar = detail_kamar.id_detail_kamar', 'left');
    //     $this->db->where('pemesanan.id_pemesanan IS NULL');
    //     $this->db->or_group_start();
    //     $this->db->where('pemesanan.tgl_checkOut <=', $checkin);
    //     $this->db->or_where('pemesanan.tgl_checkIn >=', $checkout);
    //     $this->db->group_end();
    //     $this->db->group_by('kamar.id_kamar');

    //     $query = $this->db->get();
    //     return $query->result();
    // }
    public function detailKetersediaan($tanggal_check_in, $tanggal_check_out)
    {
        $this->db->select('kamar.id_kamar');
        $this->db->from('kamar');
        $this->db->join('kamar_has_pemesanan', 'kamar.id_kamar = kamar_has_pemesanan.id_kamar');
        $this->db->join('pemesanan', 'kamar_has_pemesanan.id_pemesanan = pemesanan.id_pemesanan');
        $this->db->join('detail_kamar', 'kamar.id_detail_kamar = detail_kamar.id_detail_kamar', 'left');
        
        $this->db->where('pemesanan.id_pemesanan IS NOT NULL');
        $this->db->group_start();
        $this->db->where('pemesanan.tgl_checkIn BETWEEN "'.$tanggal_check_in.'" AND "'.$tanggal_check_out.'"');
        $this->db->or_where('pemesanan.tgl_checkOut BETWEEN "'.$tanggal_check_in.'" AND "'.$tanggal_check_out.'"');
        $this->db->or_where('"'.$tanggal_check_in.'" BETWEEN pemesanan.tgl_checkIn AND pemesanan.tgl_checkOut');
        $this->db->or_where('"'.$tanggal_check_out.'" BETWEEN pemesanan.tgl_checkIn AND pemesanan.tgl_checkOut');
        $this->db->group_end();
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    public function ketersediaan($tanggal_check_in, $tanggal_check_out)
    {
        $all_kamar = $this->getKamar();
        $unavailable_kamar = $this->detailKetersediaan($tanggal_check_in, $tanggal_check_out);

        if (!empty($unavailable_kamar)) {
            $unavailable_kamar_ids = array_column($unavailable_kamar, 'id_kamar');
            $available_kamar = array_values(array_filter($all_kamar, function ($kamar) use ($unavailable_kamar_ids) {
                return !in_array($kamar->id_kamar, $unavailable_kamar_ids);
            }));
        } else {
            $available_kamar = $all_kamar;
        }

        // Menghitung jumlah kamar yang tersedia
        $available_kamar_count = count($available_kamar);

        // Mengembalikan data kamar yang tersedia dan jumlahnya
        $result = [
            'available_kamar' => $available_kamar,
            'count' => $available_kamar_count
        ];

        return $result;
    }

    // public function gabungKetersediaan($checkin, $checkout)
    // {
    //     $ketersediaanResult = $this->ketersediaan($checkin, $checkout);
    //     $detailKetersediaanResult = $this->detailKetersediaan($checkin, $checkout);
    //     $uniqueResult = [];

    //     if ($detailKetersediaanResult == FALSE) {
    //         $uniqueResult = $ketersediaanResult;
    //     } else {
    //         $mergedResult = array_merge($ketersediaanResult, $detailKetersediaanResult);
    //         $idCounts = [];
    //         foreach ($mergedResult as $item) {
    //             $id = $item->id_kamar;
    //             if (!isset($idCounts[$id])) {
    //                 $idCounts[$id] = 1;
    //             } else {
    //                 $idCounts[$id]++;
    //             }
    //         }

    //         foreach ($mergedResult as $item) {
    //             $id = $item->id_kamar;
    //             if ($idCounts[$id] <= 1) {
    //                 $uniqueResult[] = $item;
    //             }
    //         }
    //     }
    //     return $uniqueResult;
    // }
    public function tampilkamar()
    {
        $this->db->select('kamar.id_kamar, pemesanan.tgl_checkIn, pemesanan.tgl_checkOut, kamar.no_kamar');
        $this->db->from('kamar');
        $this->db->join('kamar_has_pemesanan', 'kamar.id_kamar = kamar_has_pemesanan.id_kamar', 'left');
        $this->db->join('pemesanan', 'kamar_has_pemesanan.id_pemesanan = pemesanan.id_pemesanan', 'left');
        $this->db->group_by('kamar.id_kamar');

        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file M_kamar.php */

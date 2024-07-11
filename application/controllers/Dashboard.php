<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('customer_model');
        $this->load->model('M_dashboard');
        $this->load->model('M_pemesanan');
        $this->load->library('PDF');
        
        
        if (empty($this->session->userdata('username'))) {
            redirect('Authadmin/login');
        }
    }
    public function main()
    {
        $data = [
            'title' => 'Adi Abian Villa Dashboard',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/test',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script'
        ];
        $this->load->view('dashboard/main', $data);
    }

    public function statusketersediaan()
    {
        $kamar = $this->M_dashboard->get_kamar();
        $tipekamar = $this->M_dashboard->get_tipe_kamar();
        $data = [
            'title' => 'Adi Abian Villa Dashboard',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/statuskamar',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            'kamar' => $kamar,
            'tipekamar' => $tipekamar
        ];
        $this->load->view('dashboard/main', $data);
    }

    public function addKamar()
    {
        $this->form_validation->set_rules('no_kamar', 'No Kamar', 'required');
        $this->form_validation->set_rules('jenis_kamar', 'Tipe Kamar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = ['status' => false, 'message' => validation_errors()];
            echo json_encode($response);
        } else {
            $no_kamar = $this->input->post('no_kamar');
            $jenis_kamar = $this->input->post('jenis_kamar');
            $id_detail_kamar = $this->M_dashboard->getIddetailkamar($jenis_kamar);
            // var_dump($id_detail_kamar);
            $data = [
                'no_kamar' => $no_kamar,
                'id_detail_kamar' => $id_detail_kamar[0]['id_detail_kamar'],
                'id_admin' => 1
            ];
            $insert = $this->M_dashboard->insertKamar($data);
            if ($insert) {
                $response = ['status' => true, 'message' => 'Kamar berhasil ditambahkan'];
            } else {
                $response = ['status' => false, 'message' => 'Gagal menambahkan kamar'];
            }
            echo json_encode($response);
        }
    }

    public function addtipekamar()
    {
        $this->form_validation->set_rules('harga', 'Harga Kamar', 'required');
        $this->form_validation->set_rules('jenis_kamar', 'Tipe Kamar', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = ['status' => false, 'message' => validation_errors()];
            echo json_encode($response);
        } else {
            $data = [
                'harga' => $this->input->post('harga'),
                'jenis_kamar' => $this->input->post('jenis_kamar'),
                'deskripsi' => $this->input->post('deskripsi'),
            ];
            $insert = $this->M_dashboard->inserttipe($data);
            if ($insert) {
                $response = ['status' => true, 'message' => 'Kamar berhasil ditambahkan'];
            } else {
                $response = ['status' => false, 'message' => 'Gagal menambahkan kamar'];
            }
            echo json_encode($response);
        }
    }
    public function editTipeKamar()
    {
        $id_detail_kamar = $this->input->post('id_detail_kamar');
        $data = [
            'jenis_kamar' => $this->input->post('jenis_kamar'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $update = $this->M_dashboard->editTipeKamar($id_detail_kamar, $data);
        echo json_encode(['status' => $update]);
    }

    public function deleteTipeKamar()
    {
        $id_detail_kamar = $this->input->post('id_detail_kamar');
        $delete = $this->M_dashboard->deleteTipeKamar($id_detail_kamar);
        if ($delete) {
            $response = ['status' => true, 'message' => 'Kamar berhasil dihapus'];
        } else {
            $response = ['status' => false, 'message' => 'Gagal menghapus kamar'];
        }
        echo json_encode($response);
    }

    public function editKamar()
    {
        $this->form_validation->set_rules('id_kamar', 'ID Kamar', 'required');
        $this->form_validation->set_rules('no_kamar', 'No Kamar', 'required');
        $this->form_validation->set_rules('jenis_kamar', 'Tipe Kamar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = ['status' => false, 'message' => validation_errors()];
            echo json_encode($response);
        } else {
            $id_kamar = $this->input->post('id_kamar');
            $no_kamar = $this->input->post('no_kamar');
            $jenis_kamar = $this->input->post('jenis_kamar');
            $id_detail_kamar = $this->M_dashboard->getIddetailkamar($jenis_kamar);
            // var_dump($id_detail_kamar);
            $data = [
                'no_kamar' => $no_kamar,
                'id_detail_kamar' => $id_detail_kamar[0]['id_detail_kamar'],
                'id_admin' => 1
            ];
            $update = $this->M_dashboard->updateKamar($id_kamar, $data);
            if ($update) {
                $response = ['status' => true, 'message' => 'Kamar berhasil diubah'];
            } else {
                $response = ['status' => false, 'message' => 'Gagal mengubah kamar'];
            }
            echo json_encode($response);
        }
    }

    public function deleteKamar()
    {
        $id_kamar = $this->input->post('id_kamar');
        $delete = $this->M_dashboard->deleteKamar($id_kamar);
        if ($delete) {
            $response = ['status' => true, 'message' => 'Kamar berhasil dihapus'];
        } else {
            $response = ['status' => false, 'message' => 'Gagal menghapus kamar'];
        }
        echo json_encode($response);
    }

    public function daftarPemesanan()
    {
        $pemesanan = $this->M_pemesanan->getPemesanan();
        $data = [
            'title' => 'Adi Abian Villa Dashboard',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/daftar_pemesanan',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            'pemesanan' => $pemesanan
        ];
        $this->load->view('dashboard/main', $data);
    }

    public function guestdata()
    {
        $guest = $this->customer_model->get_data_tamu();
        $data = [
            'title' => 'Guest Data',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            'content' => 'dashboard/guestdata',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            'guest' => $guest,
        ];
        $this->load->view('dashboard/main', $data);
    }

    public function edit()
    {
        $id_tamu = $this->input->post('id_tamu');
        $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('phone'),
            'jenis_kelamin' => $this->input->post('gender'),
            'negara' => $this->input->post('nationality')
        ];
        $this->customer_model->update_guest($id_tamu, $data);
        $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
        redirect('Dashboard/guestData');
    }

    public function monthlyReport()
    {
        $selectedMonth = $this->input->get('month');
        if ($selectedMonth) {
            $selectedYear = $this->input->get('year');

            $monthYear = "$selectedYear-$selectedMonth";

            // Simpan nilai bulan ke dalam session
            $this->session->set_userdata('selected_month', $monthYear);
            $formattedMonthYear = date("F Y", strtotime($this->session->userdata('selected_month')));
        } else {
            $monthYear = "";
            $this->session->set_userdata('selected_month', $monthYear);
            $monthYear = $this->session->userdata('selected_month');
            $formattedMonthYear = "";
        }

        $monthly_orders = $this->M_dashboard->getMonthlyOrders($this->session->userdata('selected_month'));

        $data = [
            'title' => 'Guest Data',
            'header' => 'dashboard/header',
            'navbar' => 'dashboard/navbar',
            'sidebar' => 'dashboard/sidebar',
            // 'content' => 'dashboard/guestdata',
            'footer' => 'dashboard/footer',
            'script' => 'dashboard/script',
            // 'guest' => $guest,
            'monthly_orders' => $monthly_orders,
            // 'active_tab' => 'monthlyReport',
            'selected_month' => $formattedMonthYear,
        ];

        if ($selectedMonth == '') {
            $data['content'] = 'dashboard/monthly_report';
        } else {
            $data['content'] = 'dashboard/monthly_report_table';
        }
        $this->load->view('dashboard/main', $data);
    }

    public function exportExcel() {
        // Fetch data
        $monthly_orders = $this->M_dashboard->getMonthlyOrders($this->session->userdata('selected_month'));
    
        // Headers for CSV file download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="Monthly_Report.csv"');
        header('Cache-Control: max-age=0');
    
        // Open file pointer to php://output
        $fp = fopen('php://output', 'w');
    
        // Write headers to the file
        fputcsv($fp, array('No', 'Guest', 'Booking ID', 'Booking Date', 'Check-in Date', 'Check-out Date', 'Adults', 'Kids', 'Payment Status', 'Payment Amount'));
    
        // Write data rows to the file
        foreach ($monthly_orders as $order) {
            // Format dates as needed
            $booking_date = date('d-m-Y H:i:s', strtotime($order['tgl_pemesanan']));
            $checkin_date = date('d-m-Y', strtotime($order['tgl_checkIn']));
            $checkout_date = date('d-m-Y', strtotime($order['tgl_checkOut']));
    
            // Format payment amount as Rupiah
            $payment_amount = "Rp " . number_format($order['jumlah_pembayaran'], 0, ',', '.');
    
            // Write row to CSV
            $no = 1;
            fputcsv($fp, array(
                $no++,
                $order['nama'],
                $order['id_pemesanan'],
                $booking_date,
                $checkin_date,
                $checkout_date,
                $order['dewasa'],
                $order['anak'],
                $order['status'] == 1 ? 'Confirmed' : 'Pending',
                $payment_amount
            ));
        }
    
        // Close file pointer
        fclose($fp);
    
        // Exit script
        exit;
    }
    
    
    
}

/* End of file Controllername.php */

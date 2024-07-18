<?php


defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('customer_model');
        $this->load->model('M_dashboard');
        $this->load->model('M_pemesanan');
        // $this->load->library('PDF');
        
        if (empty($this->session->userdata('username'))) {
            redirect('Authadmin/login');
        }
    }
    public function main()
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
        // Ambil data bulanan dari model
        $monthly_orders = $this->M_dashboard->getMonthlyOrders($this->session->userdata('selected_month'));

        // Buat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Buat sheet aktif
        $sheet = $spreadsheet->getActiveSheet();

        // Menulis header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Guest');
        $sheet->setCellValue('C1', 'Booking ID');
        $sheet->setCellValue('D1', 'Booking Date');
        $sheet->setCellValue('E1', 'Check-in Date');
        $sheet->setCellValue('F1', 'Check-out Date');
        $sheet->setCellValue('G1', 'Numbers of Room');
        $sheet->setCellValue('H1', 'Adults');
        $sheet->setCellValue('I1', 'Kids');
        $sheet->setCellValue('J1', 'Payment Status');
        $sheet->setCellValue('K1', 'Payment Amount');

        // Menulis data dari $monthly_orders
        $row = 2;
        foreach ($monthly_orders as $order) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $order['nama']);
            $sheet->setCellValue('C' . $row, $order['id_pemesanan']);
            $sheet->setCellValue('D' . $row, $order['tgl_pemesanan']);
            $sheet->setCellValue('E' . $row, $order['tgl_checkIn']);
            $sheet->setCellValue('F' . $row, $order['tgl_checkOut']);
            $sheet->setCellValue('G' . $row, $order['jumlah_kamar']);
            $sheet->setCellValue('H' . $row, $order['dewasa']);
            $sheet->setCellValue('I' . $row, $order['anak']);
            $sheet->setCellValue('J' . $row, $order['status'] == 1 ? 'Confirmed' : 'Pending');
            $sheet->setCellValue('K' . $row, 'Rp ' . number_format($order['jumlah_pembayaran'], 0, ',', '.'));
            $row++;
        }

        // Membuat objek Writer untuk Excel (Xlsx)
        $writer = new Xlsx($spreadsheet);

        // Nama file Excel yang akan diunduh
        $filename = 'Monthly_Report.xlsx';

        // Setup header untuk file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Simpan file Excel ke output
        $writer->save('php://output');

        // Exit untuk menghentikan eksekusi script
        exit;
    }
    
}

/* End of file Controllername.php */

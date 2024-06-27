<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_tamu');
        $this->load->model('M_pemesanan');
        $this->load->model('M_kamar');
    }
    
    public function proses()
    {
        $duitkuConfig = new \Duitku\Config("431a431d29417fbe41e2b813fc4c6478", "DS19433");
        $duitkuConfig->setSandboxMode(true);

        $identity = $this->session->userdata('identity');
        $id_tamu = $this->M_tamu->getIdTamuByEmailUsername($identity);

        $hargaKamar = $this->M_kamar->getHargaKamar();
        $jumlahkamar = $this->M_pemesanan->getSessionValues();
        $id_pemesanan = $this->M_pemesanan->getPemesananByIdTamu($id_tamu[0]['id_tamu']);
        var_dump($id_pemesanan);
        $pemesanan = $this->M_pemesanan->getPemesananById($id_pemesanan[0]->id_pemesanan);
        var_dump('pemesanan : ',$pemesanan);
        var_dump($id_pemesanan);
        var_dump($identity);
        
        var_dump($jumlahkamar);
        $paymentAmount      = $pemesanan[0]->jumlah_pembayaran;
        echo "Total Payment Amount: " . $paymentAmount;
        $email              = "customer@gmail.com"; // your customer email
        $phoneNumber        = "081234567890"; // your customer phone number (optional)
        $productDetails     = "Test Payment";
        $merchantOrderId    = $id_pemesanan[0]->id_pemesanan; // from merchant, unique   
        $additionalParam    = ''; // optional
        $merchantUserInfo   = ''; // optional
        $customerVaName     = 'John Doe'; // display name on bank confirmation display
        $callbackUrl        = 'https://minnow-smashing-formally.ngrok-free.app/adiabianvilla/payment/callback'; // url for callback
        $returnUrl          = 'http://localhost/adiabianvilla/payment/return'; // url for redirect
        $expiryPeriod       = 60; // set the expired time in minutes

        // Customer Detail
        $firstName          = "John";
        $lastName           = "Doe";
        $username ="";

        // Address
        $alamat             = "Jl. Kembangan Raya";
        $city               = "Jakarta";
        $postalCode         = "11530";
        $countryCode        = "ID";

        $address = array(
            'firstName'     => $firstName,
            'lastName'      => $lastName,
            'address'       => $alamat,
            'city'          => $city,
            'postalCode'    => $postalCode,
            'phone'         => $phoneNumber,
            'countryCode'   => $countryCode
        );

        $customerDetail = array(
            'firstName'         => $firstName,
            'lastName'          => $lastName,
            'email'             => $email,
            'phoneNumber'       => $phoneNumber,
            'billingAddress'    => $address,
            'shippingAddress'   => $address
        );

        // Item Details
        $item1 = array(
            'name'      => $productDetails,
            'price'     => $paymentAmount,
            'quantity'  => 1
        );

        $itemDetails = array(
            $item1
        );

        $params = array(
            'paymentAmount'     => $paymentAmount,
            'merchantOrderId'   => $merchantOrderId,
            'productDetails'    => $productDetails,
            'additionalParam'   => $additionalParam,
            'merchantUserInfo'  => $merchantUserInfo,
            'customerVaName'    => $customerVaName,
            'email'             => $email,
            'phoneNumber'       => $phoneNumber,
            'itemDetails'       => $itemDetails,
            'customerDetail'    => $customerDetail,
            'callbackUrl'       => $callbackUrl,
            'returnUrl'         => $returnUrl,
            'expiryPeriod'      => $expiryPeriod
        );

        try {
            // createInvoice Request
            $responseDuitkuApi = \Duitku\Pop::createInvoice($params, $duitkuConfig);
            $data = json_decode($responseDuitkuApi);
            redirect($data->paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback()
    {
        $apiKey = '431a431d29417fbe41e2b813fc4c6478';
        $merchantCode = isset($_POST['merchantCode']) ? $_POST['merchantCode'] : null;
        $amount = isset($_POST['amount']) ? $_POST['amount'] : null;
        $merchantOrderId = isset($_POST['merchantOrderId']) ? $_POST['merchantOrderId'] : null;
        $productDetail = isset($_POST['productDetail']) ? $_POST['productDetail'] : null;
        $additionalParam = isset($_POST['additionalParam']) ? $_POST['additionalParam'] : null;
        $paymentMethod = isset($_POST['paymentCode']) ? $_POST['paymentCode'] : null;
        $resultCode = isset($_POST['resultCode']) ? $_POST['resultCode'] : null;
        $merchantUserId = isset($_POST['merchantUserId']) ? $_POST['merchantUserId'] : null;
        $reference = isset($_POST['reference']) ? $_POST['reference'] : null;
        $signature = isset($_POST['signature']) ? $_POST['signature'] : null;
        $publisherOrderId = isset($_POST['publisherOrderId']) ? $_POST['publisherOrderId'] : null;
        $spUserHash = isset($_POST['spUserHash']) ? $_POST['spUserHash'] : null;
        $settlementDate = isset($_POST['settlementDate']) ? $_POST['settlementDate'] : null;
        $issuerCode = isset($_POST['issuerCode']) ? $_POST['issuerCode'] : null;

        //log callback untuk debug 
        // file_put_contents('callback.txt', "* Callback *\r\n", FILE_APPEND | LOCK_EX);
        var_dump($signature);
        var_dump($merchantOrderId);

        if (!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature)) {
            $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
            $calcSignature = md5($params);

            if ($signature == $calcSignature) {
                $updateStatus = array ('status' => 1);
                $this->db->where('id_pemesanan', $merchantOrderId);
                $this->db->update('pemesanan', $updateStatus);

                $data = $this->input->post();
                file_put_contents('callback.txt', print_r($data, true), FILE_APPEND | LOCK_EX);
            } else {
                file_put_contents('callback.txt', "* Bad Signature *\r\n\r\n", FILE_APPEND | LOCK_EX);
                throw new Exception('Bad Signature');
            }
        } else {
            file_put_contents('callback.txt', "* Bad Parameter *\r\n\r\n", FILE_APPEND | LOCK_EX);
            throw new Exception('Bad Parameter');
        }
    }

    public function return()
    {
        echo ('Pembayaran anda kami proses');
    }
}

/* End of file Controllername.php */

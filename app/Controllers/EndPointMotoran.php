<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\AkunSistem;

class EndPointMotoran extends BaseController
{
    use ResponseTrait;
    private $akunSistem;
    public function __construct()
    {
        $this->akunSistem = new AkunSistem();
    }
    public function receiveApiRequest()
    {
        $requests = \Config\Services::request();
        $authorizationHeader = $requests->getHeaderLine('Authorization');
        $bearer_token = $this->akunSistem->getAkunSistem()[0]['bearer_token'];
        if ($authorizationHeader != 'Bearer ' . $bearer_token) {
            return [
                'Status' => 0,
                'Message' => 'Unauthorized Token'
            ];
        }
        return null;
    }
    public function index(): string
    {
        return view('welcome_message');
    }
    public function  generate_token(){
        $data = (array) $this->request->getVar();
        $username = $data['username'];
        $password = $data['password'];
        $username_sistem = $this->akunSistem->getAkunSistem()[0]['akun'];
        $password_sistem = $this->akunSistem->getAkunSistem()[0]['password'];
        if ($username != $username_sistem || $password != $password_sistem){
            $response_data = [
                'Status' => 0,
                'Message' => 'Username or password not found',
                'data' => '[]'
            ];
            return $this->respond($response_data,200);
        }
        $response_data = [
            'Status' => 1,
            'Message' => 'Data successfully submitted.',
            'status' => 1,
            'data' => $this->akunSistem->getAkunSistem()[0]['bearer_token']
        ];
        return $this->respond($response_data,200);
    }
    public function booking_setstatus()
    {
        $authorizationError = $this->receiveApiRequest();
        if ($authorizationError) {
            return $this->respond($authorizationError, 200);
        }
        $data = (array) $this->request->getVar();
        $apps_booking_number = $data['AppsBookingNumber'];
        $apps_booking_number_sistem = $this->akunSistem->getAkunSistem()[0]['apps_booking_number'];
        if ($apps_booking_number != $apps_booking_number_sistem){
            $response_data = [
                'Status' => 0,
                'Message' => 'Booking number not found',
                'data' => '[]'
            ];
            return $this->respond($response_data,200);
        }
        if ($data['Status'] != 1){
            $response_data = [
                'Status' => 0,
                'Message' => 'Status not found',
                'data' => '[]'
            ];
            return $this->respond($response_data,200);
        }
        $response_data = [
            'Status' => 1,
            'Message' => 'Data successfully submitted.'
        ];
        return $this->respond($response_data,200);
    }
    public function information_detail(){
        $authorizationError = $this->receiveApiRequest();
        if ($authorizationError) {
            return $this->respond($authorizationError, 200);
        }
        $data = (array)$this->request->getVar();
        $apps_booking_number = $data['AppsBookingNumber'];
        $dms_booking_number = $data['DmsBookingNumber'];
        $service_process = $data['ServiceProcess'];
        $estimated_time = $data['EstimatedTime'];
        $apps_booking_number_sistem = $this->akunSistem->getAkunSistem()[0]['apps_booking_number'];
        if ($apps_booking_number != $apps_booking_number_sistem){
            $response_data = [
                'Status' => 0,
                'Message' => 'Service Update Failed'
            ];
            return $this->respond($response_data,200);
        }
        if(!$apps_booking_number || !$dms_booking_number || !$service_process){
            $response_data = [
                'Status' => 0,
                'Message' => 'Service Update Failed'
            ];
            return $this->respond($response_data,200);
        }
        $response_data = [
            'Status' => 1,
            'Message' => 'Data successfully submitted.'
        ];
        return $this->respond($response_data, 200);
    }
    public function booking_checkout(){
        $authorizationError = $this->receiveApiRequest();
        if ($authorizationError) {
            return $this->respond($authorizationError, 200);
        }
        $data = (array)$this->request->getVar();
        $apps_booking_number = $data['AppsBookingNumber'];
        $dms_booking_number = $data['DmsBookingNumber'];
        $apps_booking_number_sistem = $this->akunSistem->getAkunSistem()[0]['apps_booking_number'];
        if ($apps_booking_number != $apps_booking_number_sistem){
            $response_data = [
                'Status' => 0,
                'Message' => 'Booking number not found'
            ];
            return $this->respond($response_data,200);
        }
        if (!$dms_booking_number){
            $response_data = [
                'Status' => 0,
                'Message' => 'Service Update Failed'
            ];
            return $this->respond($response_data,200);
        }
        $response_data = [
            'Status' => 1,
            'Message' => 'Data successfully submitted.'
        ];
        return $this->respond($response_data, 200);
    }
    public function booking_pay(){
        $authorizationError = $this->receiveApiRequest();
        if ($authorizationError) {
            return $this->respond($authorizationError, 200);
        }
        $data = (array)$this->request->getVar();
        $apps_booking_number = $data['AppsBookingNumber'];
        $dms_booking_number = $data['DmsBookingNumber'];
        $amount = $data['Amount'];
        $channel = $data['Channel'];
        $apps_booking_number_sistem = $this->akunSistem->getAkunSistem()[0]['apps_booking_number'];
        if ($apps_booking_number != $apps_booking_number_sistem){
            $response_data = [
                'Status' => 0,
                'Message' => 'Booking number not found'
            ];
            return $this->respond($response_data,200);
        }
        if(!$dms_booking_number || !$amount || !$channel){
            $response_data = [
                'Status' => 0,
                'Message' => 'Service Update Failed'
            ];
            return $this->respond($response_data,200);
        }
        $response_data = [
            'Status' => 1,
            'Message' => 'Data successfully submitted.'
        ];
        return $this->respond($response_data, 200);
    }
}

<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\AkunSistem;

class EndPoint extends BaseController
{
    use ResponseTrait;
    private $akunSistem;
    public function __construct()
    {
        $this->akunSistem = new AkunSistem();
    }
    public function index(): string
    {
        return view('welcome_message');
    }
    public function  check_credentials($data){
        
    }
    public function booking_setstatus()
    {
        $data = (array) $this->request->getVar();
        $apps_booking_number = $data['AppsBookingNumber'];
        $dms_booking_number = $data['DmsBookingNumber'];
        $apps_booking_number_sistem = $this->akunSistem->getAkunSistem()[0]['apps_booking_number'];
        if ($apps_booking_number != $apps_booking_number_sistem){
            $response_data = [
                'Status' => 0,
                'Message' => 'Booking number not found',
                'data' => '[]'
            ];
            return $this->respond($response_data,200);
        }
        if (!$dms_booking_number){
            $response_data = [
                'Status' => 0,
                'Message' => 'Service Update Failed',
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
        if(!$apps_booking_number || !$dms_booking_number || !$service_process || !$estimated_time){
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

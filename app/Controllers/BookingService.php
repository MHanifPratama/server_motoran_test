<?php

namespace App\Controllers;

use App\Models\AkunSistem;

class BookingService extends BaseController
{
    private $akunSistem;
    public function __construct()
    {
        $this->akunSistem = new AkunSistem();
    }
    public function index(): string
    {
        #Post API /api/mokita/v1/pit/availability
        $curl = curl_init();
        $authorizationHeader = 'Authorization: Bearer ' . $this->akunSistem->getAkunSistem()[0]['bearer_token'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8096/api/mokita/v1/pit/availability',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'BookingType' => 'bengkel',
                'BookDate' => date('Y-m-d'),
                'AhassCode' => '16367',
            ),
            CURLOPT_HTTPHEADER => array(
                $authorizationHeader,
                'Cookie: session_id=79bbed810c5bc40290f62188fd04ea8285bb65a2; website_lang=en_US'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        if ($data['Status']==0){
            $data_send = [
                'status' => $data['Status'],
                'msg' => $data['Message'],
                'Data' => '[]'
            ];
            return view('booking_service',$data_send);
        }
        return view('booking_service',$data);
    }
    public function booking()
    {
        $curl = curl_init();
        $authorizationHeader = 'Authorization: Bearer ' . $this->akunSistem->getAkunSistem()[0]['bearer_token'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8096/api/mokita/v1/service/booking',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'Customer' => 'Bambang',
                'Phone' => '082216829355',
                'Email' => 'gogon@gmail.com',
                'Address' => '','DigitCode3' => 
                'FW0','EngineNumber' => 'TESTRANGKA01',
                'PitId' => '21',
                'AhassCode' => '16367',
                'BookingDate' => '2023-09-20',
                'BookingTime' => '09:00',
                'ServiceType' => 'bengkel',
                'AppsBookingNumber' => $this->akunSistem->getAkunSistem()[0]['apps_booking_number'],
                'StatusBooking' => '0',
                'PromoName' => 'AHASS PROMO',
                'PromoCode' => 'AHASS1001',
                'KPB' => '',
                'PlateNumber' => 'B1234ABC',
                'TaskList' => '["08294M99Z8YN9", "KURAS AIR RADIATOR,BERSIH CVT,KURAS TANGKI"]'),
            CURLOPT_HTTPHEADER => array(
                $authorizationHeader,
                'Cookie: session_id=79bbed810c5bc40290f62188fd04ea8285bb65a2; website_lang=en_US'
            ),
          ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        $data_send=[];
        if ($data['Status']==1){
            $data_send = [
                'status' => $data['Status'],
                'msg' => $data['Message'],
                'data_booking'=>$data['Data']['DmsBookingNumber'],
                'apps_booking_number'=>$data['Data']['AppsBookingNumber']
            ];
            return view('response_booking',$data_send);
        }
            
        else{
            $data_send = [
                'status' => $data['Status'],
                'msg' => $data['Message'],
                'data_booking'=>'',
                'apps_booking_number'=>''
            ];
            return view('response_booking',$data_send);
        }

    }
}

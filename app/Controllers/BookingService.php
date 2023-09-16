<?php

namespace App\Controllers;

class BookingService extends BaseController
{
    public function index(): string
    {
        return view('booking_service');
    }
    public function booking()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8096/api/mokita/v1/service/booking',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('Customer' => 'Bambang','Phone' => '082216829355','Email' => 'gogon@gmail.com','Address' => '','DigitCode3' => 'FW0','EngineNumber' => 'TESTRANGKA01','PitId' => '21','AhassCode' => '16367','BookingDate' => '2023-09-20','BookingTime' => '09:00','ServiceType' => 'bengkel','AppsBookingNumber' => '1216367110745','StatusBooking' => '0','PromoName' => 'AHASS PROMO','PromoCode' => 'AHASS1001','KPB' => '','PlateNumber' => 'B1234ABC','TaskList' => '["08294M99Z8YN9", "KURAS AIR RADIATOR,BERSIH CVT,KURAS TANGKI"]'),
            CURLOPT_HTTPHEADER => array(
              'Authorization: Bearer CisdG72iIKKsG8jUpjq95BuCWoFlVQ',
              'Cookie: session_id=79bbed810c5bc40290f62188fd04ea8285bb65a2; website_lang=en_US'
            ),
          ));
        // return view('booking_service_booking');
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

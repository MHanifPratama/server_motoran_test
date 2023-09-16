<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AkunSistem extends Seeder
{
    public function run()
    {
        $data=[
            'apps_booking_number' => '1234567890',
            'akun' => 'admin',
            'password'=>'admin',
            'bearer_token'=>'Bearer CisdG72iIKKsG8jUpjq95BuCWoFlVQ'
        ];
        $this->db->table('akun_sistem')->insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = new User;
        $obj->truncate();
        $pengguna = [
            ['Shahril Azwa Bin Ibrahim Pati','770525075269','shahril.ibrahim@mampu.gov.my','0133097227',true],
        ];
        
        foreach ($pengguna as $data) {
            $obj->create([
                'nama' => $data[0],
                'nokp' => $data[1],
                'emel' => $data[2],
                'email_verified_at' => now(),
                'notel' => $data[3],
                'password' => bcrypt($data[1]), // password
                'aktif' => 1,
                'admin' => $data[4],
                'remember_token' => Str::random(10),
                'approved' => true,
            ]);
        }
    }
}

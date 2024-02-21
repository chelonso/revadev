<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VenuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('venues')->insert([
            [
                'name' => 'Sede Central',
                'address' => 'Calle Mayor 123',
                'phone' => '123456789',
                'email' => 'sede_central@email.com',
            ],
            [
                'name' => 'Sede Norte',
                'address' => 'Avenida del Norte 456',
                'phone' => '987654321',
                'email' => 'sede_norte@email.com',
            ],
        ]);
    }
}
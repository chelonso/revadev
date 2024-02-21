<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sede Central (2 canchas)
        DB::table('fields')->insert([
            [
                'name' => 'Cancha 1',
                'venue_id' => 1,
                'field_type' => 'Fútbol',
                'capacity' => 10,
            ],
            [
                'name' => 'Cancha 2',
                'venue_id' => 1,
                'field_type' => 'Tenis',
                'capacity' => 4,
            ],
        ]);

        // Sede Norte (3 canchas)
        DB::table('fields')->insert([
            [
                'name' => 'Cancha 3',
                'venue_id' => 2,
                'field_type' => 'Fútbol',
                'capacity' => 8,
            ],
            [
                'name' => 'Cancha 4',
                'venue_id' => 2,
                'field_type' => 'Baloncesto',
                'capacity' => 20,
            ],
            [
                'name' => 'Cancha 5',
                'venue_id' => 2,
                'field_type' => 'Pádel',
                'capacity' => 4,
            ],
        ]);
    }
}
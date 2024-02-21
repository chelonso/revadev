<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Factory::create();

        // Jugadores (nivel 1)
        DB::table('bookings')->insert([
            [
                'user_id' => 1,
                'field_id' => 1,
                'venue_id' => 1,
                'date' => '2024-02-25',
                'start_time' => '18:00:00',
                'end_time' => '20:00:00',
            ],
            [
                'user_id' => 2,
                'field_id' => 2,
                'venue_id' => 1,
                'date' => '2024-02-25',
                'start_time' => '15:00:00',
                'end_time' => '16:00:00',
            ],
            [
                'user_id' => 2,
                'field_id' => 1,
                'venue_id' => 1,
                'date' => '2024-02-26',
                'start_time' => '20:00:00',
                'end_time' => '21:00:00',
            ],
            [
                'user_id' => 3,
                'field_id' => 4,
                'venue_id' => 2,
                'date' => '2024-02-25',
                'start_time' => '18:00:00',
                'end_time' => '19:00:00',
            ],
        ]);
        
    }
}
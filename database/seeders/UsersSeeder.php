<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Jugadores (nivel 1)
        DB::table('users')->insert([
            [
                'name' => 'Juan Pérez',
                'email' => 'juanperez@email.com',
                'password' => bcrypt('password'),
                'level' => 1,
            ],
            [
                'name' => 'María Gómez',
                'email' => 'mariagomez@email.com',
                'password' => bcrypt('password'),
                'level' => 1,
            ],
            [
                'name' => 'Pedro López',
                'email' => 'pedrolopez@email.com',
                'password' => bcrypt('password'),
                'level' => 1,
            ],
        ]);

        // Administradores de sede (nivel 2)
        DB::table('users')->insert([
            [
                'name' => 'Ana Martín',
                'email' => 'anamartin@email.com',
                'password' => bcrypt('password'),
                'level' => 2,
            ],
            [
                'name' => 'David García',
                'email' => 'davidgarcia@email.com',
                'password' => bcrypt('password'),
                'level' => 2,
            ],
        ]);

        // Administrador del sistema (nivel 3)
        DB::table('users')->insert([
            [
                'name' => 'Administrador',
                'email' => 'admin@email.com',
                'password' => bcrypt('password'),
                'level' => 3,
            ],
        ]);
    }
}
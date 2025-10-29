<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventoSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('eventos')->insert([
            [
                'tipo' => 'Casamento',
                'data' => '2024-12-15',
                'local_id' => 1,
                'cliente_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo' => 'Aniversário',
                'data' => '2024-11-20',
                'local_id' => 2,
                'cliente_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo' => 'Formatura',
                'data' => '2024-10-30',
                'local_id' => 3,
                'cliente_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

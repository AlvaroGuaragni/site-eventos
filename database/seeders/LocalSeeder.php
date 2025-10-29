<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('locais')->insert([
            [
                'local' => 'Centro de Convenções São Paulo',
                'capacidade' => 500,
                'endereco' => 'Av. Paulista, 1000 - São Paulo/SP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'local' => 'Hotel Plaza',
                'capacidade' => 200,
                'endereco' => 'Rua Augusta, 500 - São Paulo/SP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'local' => 'Espaço Cultural',
                'capacidade' => 100,
                'endereco' => 'Rua da Consolação, 200 - São Paulo/SP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

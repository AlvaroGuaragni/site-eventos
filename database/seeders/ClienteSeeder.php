<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'nome' => 'João Silva',
                'telefone' => '(11) 99999-9999',
                'cpf' => '123.456.789-00',
                'genero' => 'Masculino',
                'email' => 'joao@email.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Maria Santos',
                'telefone' => '(11) 88888-8888',
                'cpf' => '987.654.321-00',
                'genero' => 'Feminino',
                'email' => 'maria@email.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Pedro Oliveira',
                'telefone' => '(11) 77777-7777',
                'cpf' => '456.789.123-00',
                'genero' => 'Masculino',
                'email' => 'pedro@email.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedro 100';
        $fornecedor->site = 'Fornecedor.com';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'Fornecedor@mail.com';
        $fornecedor->save();

        // Utilizando o método create e atenção ao fillable da classe
        Fornecedor::create([
            'nome' => 'fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'fornecedor200@mail.com',
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome' => 'fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'PR',
            'email' => 'fornecedor300@mail.com',
        ]);
    }
}

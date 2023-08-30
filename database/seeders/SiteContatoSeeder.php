<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '51 555555';
        // $contato->email = 'a@ht.com';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Seja bem vindo ao sistema de gestão';
        // $contato->save();

    SiteContato::factory()->count(100)->create();

    }
}

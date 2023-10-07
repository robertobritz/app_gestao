<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos(){
        // return $this->belongsToMany(Produto::class, 'pedidos_produtos'); // relacionando direto com a tabela Produtos

        return $this->belongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('created_at', 'quantidade');

        /*
            1-Modelo do relacionamento NxN em relação o Modelo que estamos implementando
            2-É a tabela auxiliar que armazena os registros de relacionamento
            3-Representa o nome da FK da tabela mapeada pelo Model na tabela de relacionamento
            4-Representa o nome da FK da tabnela mapeda pela model utilizada no relacionamenbto que estamos utilizanodo
        */
    }
}

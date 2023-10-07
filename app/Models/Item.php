<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function itemDetalhe(){
        
        return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id'); // quando o nome da model não é igual ao do banco de dados, precisamos referencial explicitamente a FK, e depois ligado a PK

    }

    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class);
    }

    public function pedidos(){
        return $this->belongsToMany(Pedido::class, 'pedidos_produtos', 'produto_id', 'pedido_id');

        /*
            3- Representa o nome da Fk da tabela mapeada (produtos) pelo model na tabela de relacionamento
            4- Representa o nome da FK mapeada pelo model utilziado no relacionamento que estamos implementando.
        */
    }
}

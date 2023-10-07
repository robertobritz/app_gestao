<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'fornecedores';

    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos(){
        return $this->hasMany(Item::class, 'fornecedor_id', 'id'); // FK e depois PK
        //return $this->hasMany(Item::class); // Como está padronizado FK e PK, poderia ser esta relação direta
    }
}

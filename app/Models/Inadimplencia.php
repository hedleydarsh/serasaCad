<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inadimplencia extends Model
{
    use HasFactory;

    protected $fillable = ['loja_id', 'user_id', 'cliente_id', 
    'num_doc', 'cod_venda', 'dt_compra', 'dt_vencimento'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function loja(){
        return $this->belongsTo(Loja::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}

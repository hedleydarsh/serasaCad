<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inadimplencia extends Model
{
    use SoftDeletes;
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

    public function anexo(){
        return $this->hasMany(InadimplenciaAnexo::class);
    }
}

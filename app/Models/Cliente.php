<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome', 'cpf', 'email', 'endereco', 'email', 'descricao', 'telefone'];
    
    public function inadimplencias(){
        return $this->hasMany(Inadimplencia::class);
    }
}

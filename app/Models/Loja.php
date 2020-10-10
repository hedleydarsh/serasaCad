<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'telefone', 'slug'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inadimplencias(){
        return $this->hasMany(Inadimplencia::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InadimplenciaAnexo extends Model
{
    use HasFactory;

    protected $fillable = ['anexo', 'inadimplencia_id'];

    public function inadimplencia(){
        return $this->belongsTo(Inadimplencia::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locadora extends Model
{
    use HasFactory;

    protected $table = 'locadora';

    protected $fillable = [
        'filme',
        'genero',
        'descricao',
        'data_de_lancamento',
        'usuario'
    ];

    public function usuario(){
        return $this->belongsTo('App\Models\User', 'usuario');
        
    }
}

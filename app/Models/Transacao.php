<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;

    protected $table = 'transacoes';
    
    protected $fillable = [
        'valor',
        'tipo',
        'categoria_id',
        'data',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}

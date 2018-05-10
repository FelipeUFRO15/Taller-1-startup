<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'url', 'short', 'id_usuario',
    ];

    public function usuario() {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
//Relación 1 a muchos inversa User-Pedido
    public function user(){
        return $this->belongsTo(User::class);
    }
}

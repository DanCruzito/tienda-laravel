<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    //Relación 1 a muchos inversa Categoria-Producto
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}

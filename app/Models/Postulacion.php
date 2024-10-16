<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla
    protected $table = 'postulaciones';

    protected $fillable = ['user_id', 'oferta_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function oferta()
    {
        return $this->belongsTo(Oferta::class);
    }
}

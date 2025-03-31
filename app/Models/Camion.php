<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    use HasFactory;
    
    protected $table = 'camion';
    protected $primaryKey = 'id_camion';
    
    protected $fillable = [
        'placa',
        'codig_interno',
        'id_transporte',
        'color',
        'modelo',
        'capacidad_toneladas',
        'id_marca',
    ];
    
    public function transporte()
    {
        return $this->belongsTo(Transporte::class, 'id_transporte', 'id_transporte');
    }
    
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca', 'id_marca');
    }
}
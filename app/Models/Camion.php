<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    protected $table = 'camion'; // Especifica el nombre exacto de la tabla
    protected $primaryKey = 'id_camion'; // Define la clave primaria correcta
    
    protected $fillable = [
        'placa', 'modelo', 'id_marca', 'id_transporte', 'capacidad_toneladas', 'codig_interno', 'color'
    ];
    
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca', 'id_marca');
    }
    
    public function transporte()
    {
        return $this->belongsTo(Transporte::class, 'id_transporte', 'id_transporte');
    }
}
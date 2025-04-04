<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Camion extends Model
{
    use HasFactory;
    protected $table = 'camion';
    protected $primaryKey = 'id_camion'; 
    
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
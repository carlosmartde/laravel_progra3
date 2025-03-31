<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    
    protected $table = 'marca';
    protected $primaryKey = 'id_marca';
    public $timestamps = false;
    
    protected $fillable = [
        'descripcion',
    ];
    
    public function camiones()
    {
        return $this->hasMany(Camion::class, 'id_marca', 'id_marca');
    }
}
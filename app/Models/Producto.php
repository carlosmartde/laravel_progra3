<?php

namespace App\Models;

use Database\Factories\ProductoFatory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['id','nombre_producto', 'descripcion_producto', 'precio_producto'];
    public $timestamps=true;

    public static function newFactory()
    {
        return ProductoFatory::new();
    }
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableProductos extends Model
{
    protected $fillable = ['nombreProductos','preciosProductos','descripcionProductos','cantidadProductos', 'preciocompraProductos', 'Diferencia'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreProductos)
	{
		return $query->where('nombreProductos', 'LIKE', "%$nombreProductos%");
	}

}
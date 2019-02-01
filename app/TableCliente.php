<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableCliente extends Model
{
    protected $fillable = ['idCliente','Nombre_Cliente','Apellido_Cliente','razon_s_Cliente','ruc_Cliente', 'direccion_Cliente', 'telefono_Cliente', 'correo_Cliente'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $Nombre_Cliente)
	{
		return $query->where('Nombre_Cliente', 'LIKE', "%$Nombre_Cliente%");
	}

}
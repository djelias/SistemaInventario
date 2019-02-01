<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableFacturasc extends Model
{
    protected $fillable = ['id_proveedor','fecha','totals','estado','notaEnvio'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $id_proveedor)
	{
		return $query->where('id_proveedor', 'LIKE', "%$id_proveedor%");
	}

	public function TableCliente(){
    return $this->belongsTo('App\TableCliente', 'cliente');
}

}
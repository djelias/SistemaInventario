<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $fillable = ['proveedor','fecha','estado','pago'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $proveedor)
	{
		return $query->where('proveedor', 'LIKE', "%$proveedor%");
	}


	public function TableCliente(){
    return $this->belongsTo('App\Pagos', 'proveedor');
}

}
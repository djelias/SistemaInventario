<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    protected $fillable = ['proveedor','fecha','estado','total', 'visibilidad'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $proveedor)
	{
		return $query->where('proveedor', 'LIKE', "%$proveedor%");
	}


	public function TableCliente(){
    return $this->belongsTo('App\Control', 'proveedor');
}

}
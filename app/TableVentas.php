<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableVentas extends Model
{
    protected $fillable = ['id_facturas','id_productos','cantidad','notaEnvio'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $id_facturas)
	{
		return $query->where('id_facturas', 'LIKE', "%$id_facturas%");
	}


	public function TableFacturas(){
    return $this->belongsTo('App\TableFacturas', 'id_facturas');
}

	public function TableProductos(){
    return $this->belongsTo('App\TableProductos', 'id_productos');
}

}
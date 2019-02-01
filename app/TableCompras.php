<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableCompras extends Model
{
    protected $fillable = ['id_facturasc','id_productos','cantidad','notaEnvio'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $id_facturasc)
	{
		return $query->where('id_facturasc', 'LIKE', "%$id_facturasc%");
	}


	public function TableFacturasc(){
    return $this->belongsTo('App\TableFacturasc', 'id_facturasc');
}

	public function TableProductos(){
    return $this->belongsTo('App\TableProductos', 'id_productos');
}

}
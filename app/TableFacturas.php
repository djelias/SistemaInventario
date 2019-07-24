<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableFacturas extends Model
{
    protected $fillable = ['id_facturas','cliente','fecha','totals','notaEnvio'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $fecha)
	{
		return $query->where('fecha', 'LIKE', "%$fecha%");
	}

	public function TableCliente(){
    return $this->belongsTo('App\TableCliente', 'cliente');
}

}
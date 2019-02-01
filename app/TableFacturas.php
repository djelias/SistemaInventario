<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableFacturas extends Model
{
    protected $fillable = ['id_facturas','cliente','fecha','totals','notaEnvio'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $cliente)
	{
		return $query->where('cliente', 'LIKE', "%$cliente%");
	}

	public function TableCliente(){
    return $this->belongsTo('App\TableCliente', 'cliente');
}

}
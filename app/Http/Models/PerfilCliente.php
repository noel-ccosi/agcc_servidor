<?php

namespace App\Http\Models;
use App\Http\Models\TipoProducto;

use Illuminate\Database\Eloquent\Model;

class PerfilCliente extends Model
{
    protected $table='perfil_cliente';

    protected $fillable= [
        "desc_perfil_cliente","linea_credito_id"
    ];

    public function lineaCredito(){
        return $this->belongsTo(LineaCredito::class,'linea_credito_id','id');
    }

    public function tipo_producto()
    {
        //                                          Clase                                           Clave Principal
        return $this->belongsToMany('App\Http\Models\TipoProducto','perfil_cliente_tipo_producto','perfil_cliente_id','tipo_producto_id')
        ->withPivot('detalle','desc_perfil_producto')
        ->withTimestamps();
    }
}

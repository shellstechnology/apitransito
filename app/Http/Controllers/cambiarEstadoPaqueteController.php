<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estados_p;
use App\Models\Paquetes;
class cambiarEstadoPaqueteController extends Controller
{
    public function buscarPaquete(Request $request){
        $paquete=Paquetes::withoutTrashed()->where('id',$request->input('id'))->first();
        if($paquete){
        $this->cambiarEstadoCamion($paquete);
        }
    }

    public function cambiarEstadoCamion($paquete){
        $estado=Estados_p::withTrashed()->where('id',$paquete['id_estado_p'])->first();
        if($estado['descripcion']!='entregado'){
            $nuevoEstado=Estados_p::withoutTrashed()->where('descripcion','entregado')->first();
            $paquete->update([
                'id_estado_p'=>$nuevoEstado['id']
            ]);
        }
    }
}

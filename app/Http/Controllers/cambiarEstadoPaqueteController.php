<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estados_p;
use App\Models\paquetes;
use Illuminate\Support\Facades\Validator;

class cambiarEstadoPaqueteController extends Controller
{
    public function buscarPaquete(Request $request){
        $validador = $this->validarDatos($request->all());
        if ($validador->fails()) {
            return;
        }
        $paquete=Paquetes::withoutTrashed()->where('id',$request->post('id'))->first();
        if($paquete){
        $respuesta=$this->cambiarEstadoPaquete($paquete);
        return response()->json(['message' => $respuesta]);
        }
        return response()->json(['message' => 'No hay ningún paquete con esta id']);
        
    }

    public function cambiarEstadoPaquete($paquete){
            $paquete->update([
                'id_estado_p'=>'3'
            ]);
            return 'Paquete modificado con exito';
    }

    private function validarDatos($request)
    {

        $reglas = [
            'id' => 'required|integer',
        ];
        return Validator::make([
            'id' => $request['id'],
        ], $reglas);
    }

}

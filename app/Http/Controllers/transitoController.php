<?php

namespace App\Http\Controllers;

use App\Models\Choferes;
use App\Models\Usuarios;
use App\Models\Lotes;
use App\Models\Paquete_Contiene_Lote;
use App\Models\Paquetes;
use App\Models\Camiones;
use App\Models\Chofer_Conduce_Camion;
use Illuminate\Http\Request;

class transitoController extends Controller
{
    public function buscarLotesChofer(Request $request)
    {
        $listaChoferesMatricula = [];
        $choferes = Chofer_Conduce_Camion::withoutTrashed()->where('id_chofer', $request->input('id_usuario'))->get();
        
        if ($choferes->isNotEmpty()) {
            foreach ($choferes as $chofer) {
                $listaChoferesMatricula[] = [
                    'chofer' => $chofer->id_chofer,
                    'matricula' => $chofer->matricula_camion,
                ];
            }
            
            return response()->json(['message' => 'si', 'data' => $listaChoferesMatricula]);
        }
    
        return response()->json(['message' => 'no']);
    }
}
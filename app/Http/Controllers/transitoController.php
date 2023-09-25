<?php

namespace App\Http\Controllers;

use App\Models\Camion_Lleva_Lote;
use App\Models\Estados_p;
use App\Models\Lugares_Entrega;
use App\Models\Paquete_Contiene_Lote;
use App\Models\Paquetes;
use App\Models\Chofer_Conduce_Camion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
                $this->buscarLote($chofer->matricula_camion);
            }
        }
        return view('inicio');
    }


    public function buscarLote($matricula)
    {
        $listaCamionesLote = [];
        $lotes = Camion_Lleva_Lote::where('matricula', $matricula)->get();
        if ($lotes->isNotEmpty()) {
            foreach ($lotes as $lote) {
                $listaCamionesLote[] = [
                    'lote' => $lote->id_lote,
                    'matricula' => $lote->matricula_camion,
                ];
                $this->paqueteEnLote($lote->id_lote);
            }
            return response()->json(['message' => 'Camion encontrado', 'data' => $listaCamionesLote]);
        }
        return response()->json(['message' => 'No hay ningún camion con esa matricula']);
    }

    public function paqueteEnLote($idLote)
    {
        $listaPaquetesLote = [];
        $listaPaquete = [];
        $paquetes = Paquete_Contiene_Lote::withoutTrashed()->where('id_lote', $idLote)->get();
        if ($paquetes->isNotEmpty()) {
            foreach ($paquetes as $paquete) {
                $listaPaquetesLote[] = [
                    'nombre' => $paquete->nombre,
                    'estado' => $paquete->id_estado_p,
                ];

                $listaPaquete[] = $this->buscarPaquete($paquete->id_paquete);
            }
            Session::put('datos',$listaPaquete);
            return response()->json(['message' => 'Paquete encontrado', 'data' => $listaPaquetesLote]);
        }
        return response()->json(['message' => 'No hay ningún paquete en ese lote']);
    }

    public function buscarPaquete($idPaquete)
    {
        $listaPaquetes = [];
        $paquetes = Paquetes::where('id', $idPaquete)->get();
        if ($paquetes->isNotEmpty()) {
            foreach ($paquetes as $paquete) {
                $listaPaquetes = [
                    'nombre' => $paquete->nombre,
                    'lote' => $paquete->id_lote,
                    'paquete' => $paquete->id_paquete,
                    'estado' => $paquete->id_estado_p
                ];
                $datosPaquete= $this->direccionPaquete($paquete->id_lugar_entrega, $listaPaquetes);
                return $datosPaquete;
            }
        }
    }

    public function direccionPaquete($idLugarEntrega, $listaPaquetes)
    {
        $listaDirecciones = [];
        $direcciones = Lugares_Entrega::find($idLugarEntrega);
        if (!is_null($direcciones)) {
            $listaDirecciones = [
                'direccion' => $direcciones->direccion,
                'latitud' => $direcciones->latitud,
                'longitud' => $direcciones->longitud,
            ];
            $datosPaquete = $this->definirPaquete($listaDirecciones, $listaPaquetes);
            return $datosPaquete;
        }
        return null; 
    }


    public function definirPaquete($listaDirecciones, $listaPaquetes)
    {
        $estado = $this->definirEstado($listaPaquetes['estado']);
        return [
            'Paquete' => $listaPaquetes['nombre'],
            'Estado' => $estado,
            'Direccion' => $listaDirecciones['direccion'],
            'Latitud' => $listaDirecciones['latitud'],
            'Longitud' => $listaDirecciones['longitud']
        ];
    }

    public function definirEstado($idEstado)
    {
        $estado = Estados_p::where('id', $idEstado)->first();
        return $estado['descripcion_estado_p'];
    }
}
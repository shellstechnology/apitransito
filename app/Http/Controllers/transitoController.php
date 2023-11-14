<?php

namespace App\Http\Controllers;

use App\Models\camion_lleva_lote;
use App\Models\camiones;
use App\Models\estados_p;
use App\Models\lugares_entrega;
use App\Models\paquete_contiene_lote;
use App\Models\paquetes;
use App\Models\chofer_conduce_camion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class transitoController extends Controller
{

    public function obtenerCamiones()
    {
        $matriculas = Camiones::pluck('matricula');
        return $matriculas;
    }

    public function obtenerChofer(Request $request)
    {
        $chofer=Chofer_Conduce_Camion::where('matricula_camion',$request->input('matricula'))->first();
        return $chofer['id_chofer'];
    }
    public function buscarLotesChofer(Request $request)
    {
        $listaCamionesLote = [];
        $validador = $this->validarDatos($request->all());
        if ($validador->fails()) {
            return;
        }
        $choferes = Chofer_Conduce_Camion::withoutTrashed()->where('id_chofer', $request->post('id_usuario'))->first();
        if ($choferes != null) {
            $listaCamionesLote = $this->buscarLote($choferes['matricula_camion']);
        }
        return $listaCamionesLote;
    }


    public function buscarLote($matricula)
    {
        $listaCamionesLote = [];
        $lotes = Camion_Lleva_Lote::where('matricula', $matricula)->get();
        if ($lotes->isNotEmpty()) {
            foreach ($lotes as $lote) {
                $listaCamionesLote[] = $this->paqueteEnLote($lote->id_lote);
            }
            return $listaCamionesLote;
        }
        return response()->json(['message' => 'No hay ningún camion con esa matricula']);
    }

    public function paqueteEnLote($idLote)
    {
        $listaPaquete = [];
        $paquetes = Paquete_Contiene_Lote::withoutTrashed()->where('id_lote', $idLote)->get();
        if ($paquetes->isNotEmpty()) {
            foreach ($paquetes as $paquete) {
                $listaPaquete[] = $this->buscarPaquete($paquete->id_paquete);
            }
            return $listaPaquete;
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
                $datosPaquete = $this->direccionPaquete($paquete->id_lugar_entrega, $listaPaquetes);
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

    private function validarDatos($request)
    {

        $reglas = [
            'id' => 'required|integer',
        ];
        return Validator::make([
            'id' => $request['id_usuario'],
        ], $reglas);
    }
}
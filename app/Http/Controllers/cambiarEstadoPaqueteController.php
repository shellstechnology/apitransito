<?php

namespace App\Http\Controllers;

use App\Models\camion_lleva_lote;
use App\Models\Caracteristicas;
use App\Models\chofer_conduce_camion;
use App\Models\lugares_entrega;
use App\Models\paquete_contiene_lote;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\estados_p;
use App\Models\paquetes;
use Illuminate\Support\Facades\Validator;

class cambiarEstadoPaqueteController extends Controller
{

    public function obtenerEstadosPaquete($userId)
    {
        $camion = Chofer_Conduce_Camion::withTrashed()->where('id_chofer', $userId)->first();
        $infoPaquete = [];
        if ($camion) {
            $lotes = Camion_Lleva_Lote::where('matricula', $camion['matricula_camion'])->get();
            if ($lotes->count() > 0) {
                foreach ($lotes as $lote) {
                    $paquetesLote = Paquete_Contiene_Lote::where('id_lote', $lote['id_lote'])->get();
                    foreach ($paquetesLote as $paqueteLote) {
                        $datoPaquete = Paquetes::withTrashed()->where('id',$paqueteLote['id_paquete'])->get();
                        foreach ($datoPaquete as $dato) {
                            $infoPaquete[] = $this->obtenerPaquetes($dato);
                        }
                    }
                }
            }
        }
        $descripcionEstados = Estados_p::pluck('descripcion_estado_p');
        return [$infoPaquete, $descripcionEstados];
    }

    private function obtenerPaquetes($paquete)
    {
        try {
            $lugarEntrega = Lugares_Entrega::withTrashed()->where('id', $paquete['id_lugar_entrega'])->first();
            $caracteristica = Caracteristicas::withTrashed()->where('id', $paquete['id_caracteristica_paquete'])->first();
            $estado = Estados_P::withTrashed()->where('id', $paquete['id_estado_p'])->first();
            $producto = Producto::withTrashed()->where('id', $paquete['id_producto'])->first();
            if ($producto && $lugarEntrega && $caracteristica) {
                return (
                    [
                        'Id Paquete' => $paquete['id'],
                        'Nombre del Paquete' => $paquete['nombre'],
                        'Fecha de Entrega' => $paquete['fecha_de_entrega'],
                        'Direccion' => $lugarEntrega['direccion'],
                        'Latitud' => $lugarEntrega['latitud'],
                        'Longitud' => $lugarEntrega['longitud'],
                        'Estado' => $estado['descripcion_estado_p'],
                        'Caracteristicas' => $caracteristica['descripcion_caracteristica'],
                        'Nombre del Remitente' => $paquete['nombre_remitente'],
                        'Nombre del Destinatario' => $paquete['nombre_destinatario'],
                        'Id del Producto' => $producto['id'],
                        'Producto' => $producto['nombre'],
                        'Volumen(L)' => $paquete['volumen_l'],
                        'Peso(Kg)' => $paquete['peso_kg'],
                        'created_at' => $paquete['created_at'],
                        'updated_at' => $paquete['updated_at'],
                        'deleted_at' => $paquete['deleted_at'],
                    ]);
            }
        } catch (\Exception $e) {
            $mensajeDeError = 'Error: ';
            return $mensajeDeError;
        }

    }

    public function buscarPaquete(Request $request)
    {
        $paquetes = $request->post('paquetes');
        foreach ($paquetes as $paqueteSeleccionado) {
            $validador = $this->validarDatos($paqueteSeleccionado);
            if ($validador->fails()) {
                return;
            }
            $paquete = Paquetes::withoutTrashed()->where('id', $paqueteSeleccionado)->first();
            if ($paquete) {
                $this->cambiarEstadoPaquete($paquete);
            }
        }
        return response()->json(['message' => 'paquetes modificados']);
    }

    public function cambiarEstadoPaquete($paquete)
    {
        $paquete->update([
            'id_estado_p' => '3'
        ]);
        return 'Paquete modificado con exito';
    }

    private function validarDatos($request)
    {

        $reglas = [
            'id' => 'required|integer',
        ];
        return Validator::make([
            'id' => $request,
        ], $reglas);
    }

}
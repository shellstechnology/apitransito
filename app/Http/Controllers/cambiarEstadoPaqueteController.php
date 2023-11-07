<?php

namespace App\Http\Controllers;

use App\Models\Caracteristicas;
use App\Models\Lugares_Entrega;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Estados_p;
use App\Models\Paquetes;
use Illuminate\Support\Facades\Validator;

class cambiarEstadoPaqueteController extends Controller
{

    public function obtenerEstadosPaquete()
    {
        $datoPaquete = Paquetes::withTrashed()->get();
        $infoPaquete = [];
        foreach ($datoPaquete as $dato) {
            $infoPaquete[] = $this->obtenerPaquetes($dato);
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
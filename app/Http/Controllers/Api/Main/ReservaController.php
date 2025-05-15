<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function create(Request $request) {
            $reserva = Reserva::create([
            'inicio' => $request->inicio,
            'fin' => $request->fin,
            'pago_id' => $request->pago_id,
            'cliente_id' => $request->cliente_id,
            'cuarto_id' => $request->cuarto_id,
            'persona_id' => $request->persona_id,
        ]);
        return response()->json([$reserva]);
    }

    public function all() {
        return Reserva::all();
    }

    public function get($id) {
        $reserva = Reserva::find($id);
        if (!$reserva) {
            return response()->json(['mensaje' => 'Reserva no encontrada'], 404);
        }
        return response()->json([$reserva]);
    }

    public function update(Request $request, $id) {
        $reserva = Reserva::find($id);
        if (!$reserva) {
            return response()->json(['mensaje' => 'Reserva no encontrada'], 404);
        }
        $reserva->inicio = $validated['inicio'] ?? $reserva->inicio;
        $reserva->fin = $validated['fin'] ?? $reserva->fin;
        $reserva->pago_id = $validated['pago_id'] ?? $reserva->pago_id;
        $reserva->cliente_id = $validated['cliente_id'] ?? $reserva->cliente_id;
        $reserva->cuarto_id = $validated['cuarto_id'] ?? $reserva->cuarto_id;
        $reserva->persona_id = $validated['persona_id'] ?? $reserva->persona_id;
        $reserva->save();
        return response()->json(['mensaje' => 'Reserva actualizada']);
    
    }
    
    public function delete($id) {
         $reserva = Reserva::find($id);
        if (!$reserva) {
            return response()->json(['mensaje' => 'Reserva  no encontrada'], 404);
        }
        $reserva->delete();
        return response()->json(['mensaje' => 'Reserva borrada']);
    }
}

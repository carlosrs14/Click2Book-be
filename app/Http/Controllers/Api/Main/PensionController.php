<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\Controller;
use App\Models\Propiedad;
use Illuminate\Http\Request;

class PensionController extends Controller
{
    public function create(Request $request) {
        $request->validate([

        ]);

        $propiedad = Propiedad::create([
            'esambientefamiliar' => $request->esambientefamiliar,
            'escupocompleto' => $request->escupocompleto,
            'direccion' => $request->direccion,
            'descripcion' => $request->descripccion,
            'propietario_id' => $request->propietario_id,
            'tipopropiedad_id' => $request->tipopropiedad_id,
            'barrio_id' => $request->barrio_id
        ]);

        return response()->json([$propiedad]);
    }

    public function all() {
        return Propiedad::all();
    }

    public function get($id) {
        $propiedad = Propiedad::find($id);
        if (!$propiedad) {
            return response()->json(['mensaje' => 'Pension no encontrado'], 404);
        }
        return response()->json([$propiedad]);
        
    }

    public function update(Request $request, $id) {
        $propiedad = Propiedad::find($id);
        if (!$propiedad) {
            return response();
        }

        $validated = $request->validate([
            
            'esambientefamiliar' => 'required',
            'escupocompleto' => 'required'
        ]);

        $propiedad->esamibientefamiliar = $validated['escupocompleto']?? $propiedad->escupocompleto;
        $propiedad->escupocompleto = $validated['escupocompleto']?? $propiedad->escupocompleto;
        $propiedad->save();

        return response()->json([$propiedad]);
    }

    public function delete($id) {
        $propiedad = Propiedad::find($id);
        if (!$propiedad) {
            return response()->json(['mensaje' => 'Pension no encontrada'], 404);
        }
        $propiedad->delete();
        return response()->json(['mensaje' => 'Pension no encontrada']);
    }
}

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
            'descripcion' => $request->descripcion,
            'user_id' => $request->user_id,
            'tipopropiedad_id' => $request->tipopropiedad_id,
            'barrio_id' => $request->barrio_id
        ]);

        return response()->json($propiedad);
    }

    public function all() {
        return response()->json(Propiedad::all());
    }

    public function get($id) {
        $propiedad = Propiedad::find($id);
        if (!$propiedad) {
            return response()->json(['mensaje' => 'Pension no encontrada'], 404);
        }
        return response()->json($propiedad);
        
    }

    public function filtrar(Request $request) {

    }

    public function filterByOwner($idPropietario) {
        return Propiedad::where('user_id', $idPropietario)->get();
    }
    
    public function update(Request $request, $id) {
        $propiedad = Propiedad::find($id);
        if (!$propiedad) {
            return response()->json(['mensaje' => 'Pension no encontrada'], 404);
        }

        $validated = $request->validate([
            'esambientefamiliar' => 'required',
            'escupocompleto' => 'required',
            'descripcion' => 'required'
        ]);

        $propiedad->esambientefamiliar = $validated['esambientefamiliar']?? $propiedad->esambientefamiliar;
        $propiedad->escupocompleto = $validated['escupocompleto']?? $propiedad->escupocompleto;
        $propiedad->descripcion = $validated['descripcion']?? $propiedad->descripcion;
        $propiedad->save();

        return response()->json($propiedad);
    }

    public function delete($id) {
        $propiedad = Propiedad::find($id);
        if (!$propiedad) {
            return response()->json(['mensaje' => 'Pension no encontrada'], 404);
        }
        $propiedad->delete();
        return response()->json(['mensaje' => 'Pension borrada con éxito']);
    }
}

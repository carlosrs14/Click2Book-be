<?php

namespace App\Http\Controllers\Api\Extra;

use App\Http\Controllers\Controller;
use App\Models\FotoPropiedad;
use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;

class FotoPensionController extends Controller
{
    public function subirImagen(Request $request, $id) {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);
        $propiedad = Propiedad::find($id);
        if (!$propiedad) {
            return response()->json(['mensaje' => 'Pension no encontrado'], 404);
        }
        $ruta = $request->file('image')->store('pensiones/'.$id, 'public');
        $img = $propiedad->images()->create(['path'=>$ruta]);
        return response()->json($img);
    }

    public function listarImagenes($id) {
        $propiedad = Propiedad::find($id);
        if (!$propiedad) {
            return response()->json(['mensaje' => 'Pension no encontrado'], 404);
        }
        $images = $propiedad->images()->get()->map(function ($img) {
            return [
                'id' => $img->id,
                'url' => asset('storage/' . $img->path),
                'created_at' => $img->created_at,
            ];
        });

        return response()->json($images);
    }

    public function borrarImagen($id) {
        
        $imagen = FotoPropiedad::find($id);

        if (!$imagen) {
            return response()->json(['mensaje' => 'Imagen no encontrada'], 404);
        }

        //if ($image->user_id !== auth()->id()) {
        //    return response()->json(['error' => 'No autorizado'], 403);
        //}
        Storage::disk('public')->delete($imagen->path);

        $imagen->delete();

        return response()->json(['mensaje' => 'imagen borrada']);
    }
}

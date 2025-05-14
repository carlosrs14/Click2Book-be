<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function create(Request $request) {

    }

    public function all() {
        return Reserva::all();
    }

    public function get($id) {
        
    }

    public function update(Request $request, $id) {

    }
    
    public function delete($id) {

    }
}

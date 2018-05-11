<?php

namespace App\Http\Controllers;
use App\Direccion;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;

class RedireccionController extends Controller
{
    public function abrir ($short) {

        $direccion = Direccion::select('url')->where('short', $short)->first();
        return redirect($direccion->url);
    }
}

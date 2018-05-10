<?php

namespace App\Http\Controllers;
use App\Direccion;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;

class RedireccionController extends Controller
{
    public function abrir ($short) {
        $url = '';
        $direcciones = Direccion::get();

        foreach ($direcciones as $dir) {
            if ($dir->short == $short) {
                $url = $dir->url;
                break;
            }
        }

        return redirect($url);
    }
}

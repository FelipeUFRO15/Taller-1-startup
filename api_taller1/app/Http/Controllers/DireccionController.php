<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direccion;
use App\Http\Controllers\AuthController;
use DB;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = \JWTAuth::parseToken()->authenticate();
            $direcciones = Direccion::where('id_usuario', $user->id)->get();
            foreach ($direcciones as $dir) {
                $dir->short = 'http://localhost:8000/'.$dir->short;
            }

            return $direcciones;
        } catch (\Exception $e) {
            \Log::info("Error {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
            return \Response::json('Error: $e', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AuthController $auth)
    {
        //$user = \JWTAuth::parseToken()->authenticate();

        $direc = new Direccion();
        $direc->url = $request->url;
        $direc->short = substr(md5(time().$direc->url), 0, 5);
        $direc->id_usuario = $auth->getAuthenticatedUser()->usuario->id;
        logger($direc);
        $direc->save();
        return ['created' => true];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($short)
    {
        $url = '';
        $user = \JWTAuth::parseToken()->authenticate();
        $direcciones = Direccion::where('id_usuario', $user->id)->get();

        foreach ($direcciones as $dir) {
            if ($dir->short == $short) {
                $url = $dir->url;
                break;
            }
        }

        return redirect($url);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $direccion = Direccion::find($id);
        $direccion->update($request->all());
        return ['update' => true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Direccion::destroy($id);
        return ['deleted' => true];
    }
}

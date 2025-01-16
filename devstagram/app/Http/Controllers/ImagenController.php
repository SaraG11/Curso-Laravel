<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// use Intervention\Image\Drivers\Imagick\Driver;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        $manager = new ImageManager(new Driver());
        
        $imagen = $request->file('file');
        //generar un id unico para las imagenes
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        //guardar la imagen al servidor
        $imagenServer = $manager->read($imagen);
        //agregamos efecto a la imagen con intervention
        $imagenServer->cover(1000, 1000);

        //agregamos la imagen a la  carpeta en public donde se guardaran las imagenes
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServer->save($imagenPath);

        
        return response()->json(['imagen' => $nombreImagen ]);

    }
}

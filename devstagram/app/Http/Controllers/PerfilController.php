<?php

namespace App\Http\Controllers;
// use Illuminate\Routing\Controller;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);
        
        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' .Auth::user()->id, 'min:3','max:20'],
            'email' => 'required|email|unique:users,email,' .Auth::user()->id,
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('La contraseña actual es incorrecta.');
                }
            }],
            'new_password' => 'nullable|min:6|confirmed', // 'confirmed' valida que coincida con password_confirmation
        ]);    

        if($request->imagen){
            $manager = new ImageManager(new Driver());
        
            $imagen = $request->file('imagen');
            //generar un id unico para las imagenes
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            //guardar la imagen al servidor
            $imagenServer = $manager->read($imagen);
            //agregamos efecto a la imagen con intervention
            $imagenServer->cover(1000, 1000);

            //agregamos la imagen a la  carpeta en public donde se guardaran las imagenes 
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServer->save($imagenPath);
        }

        // guardar cambios

        $usuario = User::find(Auth::user()->id);
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->imagen = $nombreImagen ?? Auth::user()->imagen ?? null;

        // Cambiar contraseña si se proporciona una nueva
        if ($request->filled('new_password')) {
            $usuario->password = Hash::make($request->new_password);
        }

        $usuario->save();
        // reedireccionar al usuario
        return redirect()->route('posts.index', $usuario->username);

    }
}

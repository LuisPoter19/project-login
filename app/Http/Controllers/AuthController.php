<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class AuthController extends Controller
{
    public function index()//Metodo que mostrará la pagina de inicio de sesión.
    {
        return view('auth.login');
    }

    public function login(Request $request)//Metodo que se encargara de generar la autenticación del usuario.
    
    {
        $credentials = $request->only('email', 'password');/*Request se encargara de capturar los datos enviados desde el formulario de autenticación,
        y only solo capturara los datos que se desean obtener, estos se almacenaran en $credentials como un array asosiativo: 
        ['email' => 'valor_email', 'password' => 'valor_password']*/

        if (Auth::attempt($credentials)) {//El método attempt se encargara de realizar la validación para el inicio de sesión.
            /*Auth es una fachada que permite acceder a las caracteristicas de autenticación. Las fachadas permiten acceder de
            una manera más sencilla a clases complejas*/
            /*---------------------------
            DENTRO DE Auth::attempt OCURRE EL SIGUIENTE PROCESO.
            PASO 1:
            $user = User::where('email', $credentials['email'])->first(); - Se realiza la consulta usando el modelo User y
            buscara el primer resultado en el campo 'email' de la tabla User que coincida con el dato almacenado en $credentials['email'] ,
            posteriormente almacenara el email y la password en la variable $user , esto se almacenará como un objeto. -

            PASO 2:
            if ($user && Hash::check($credentials['password'], $user->password)) { - Se realiza la validación del usuario y clave,
            dónde $credentials['password'] es la clave que se ingreso en el formulario y esta almacenada en $credentials y en
            $user->password esta la contraseña cifrada almacenada en la base de datos. -
                Auth::login($user); - Nos permitira garantizar que solo los usuarios autenticados puedan acceder a las rutas del sistema. -
                $request->session()->regenerate(); - Nos permite cambiar el identificador de sesión del usuario, esto con el fin de evitar
                ataques de acceso no autorizados. -
                
            } else {
  
            }
            -----------------------------*/
            #return redirect()->intended('/main-page');

            return Redirect::route('main-page');/*Después de la autenticación, se redireccionará al usuario a la ruta especificada,
            en este caso main-page*/
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ]);
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function newRegister(Request $request)
        {
           $user = new User();
           $user->timestamps = false;
           $user->email = $request->get('email');
           $user->password = Hash::make($request->get('password'));
           $user->save();

           return Redirect::route('viewLogin');    
           
        }
}

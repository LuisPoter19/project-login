<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function index()//Metodo que mostrará la pagina de inicio de sesión.
    {
        return view('auth.login');
    }

    public function login(Request $request)//Metodo que se encargara de generar la autenticación del usuario.
    
    {

        $request->validate([/*De esta manera podremos validar los datos enviados desde el cliente al servidor, y antes de ser
            procesados se comprueba que si cumpla con las condiciones*/
            'email' => 'required|email',//El email es obligatorio y debe ser un correo electronico valido.
            'password' => [
                'required',//El campo contraseña es obligatorio.
                'string',//Debe ser una cadena de texto.
                'min:8',//Debe tener minimo 8 caracteres.
                'regex:/[a-z]/',//Debe tener al menos una letra minuscula.
                'regex:/[A-Z]/',//Debe tener al menos una letra mayuscula.
                'regex:/[0-9]/',//Debe tener al menos un número.
                'regex:/[@$!%*#?&]/',//Debe tener al menos un caracter especial.
                'different:username'//Debe ser diferente al campo de usuario.
                ]
        ]);

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

            $request->session()->regenerate();
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
           $validator = Validator::make($request->all(), [/*Facade que nos permitira implementar una validación. "all" nos
            devolvera todos los datos de la solicitud como un array asociativo*/
                'email' => 'required|email|unique:users',
                'password' => [
                    'required',//El campo contraseña es obligatorio.
                    'string',//Debe ser una cadena de texto.
                    'min:8',//Debe tener minimo 8 caracteres.
                    'regex:/[a-z]/',//Debe tener al menos una letra minuscula.
                    'regex:/[A-Z]/',//Debe tener al menos una letra mayuscula.
                    'regex:/[0-9]/',//Debe tener al menos un número.
                    'regex:/[@$!%*#?&]/',//Debe tener al menos un caracter especial.
                    'different:username'//Debe ser diferente al campo de usuario.
                    ]
           ]);
           
           if ($validator->fails()) {//Se comprueba si la validación a fallado.
                return back()->withErrors($validator)->withInput();//Si ha fallado se devuelve a la pagina del login con el error generado.
           }

           $user = new User();
           $user->timestamps = false;
           $user->email = $request->email;
           $user->password = Hash::make($request->password);
           $user->save();

           #return Redirect::route('viewLogin');    
           return redirect()->route('viewLogin')->with('succes', 'Registro Exitoso. Por favor inicia sesión');
        }
}

import Swal from 'sweetalert2';//Importamos Swal para crear modals o ventanas emergentes.

//El siguiente bloque nos permitira mostrar al cliente los errores que se han generado por parte del servidor.

document.addEventListener('DOMContentLoaded', function() {/*Este método nos permite cargar todo el contenido HTML para
    posteriormente ser manipulados con JS. Luego se ejecutara una función anonima y los diferentes eventos que estén dentro de esta.*/
    if (window.hasErrors) {/*Se valida si la variable global "window.hasErrors" es true, es decir si se ha capturado algún
        error devuelto por el servidor.*/
        Swal.fire({//"Swal.fire" es una función que nos permitira crear modals o ventanas/alertas emergentes.
            title: '¡Error!',//Titulo de la alerta.
            text: window.errorMessage,//Mostrara el error que ha devuelto el servidor y que ha sido capturado por la variable global.
            icon: 'error',//Mostrará un icono de error, otross tipos de iconos: (success, warning, info, question).
            confirmButtonColor: '#3085d6',//Color del boton
            confirmButtonText: '¡Entendido!',//Texto del boton
            width: '400px'//Ancho de la alerta
        });
    }
//--------------------------------------------------------------------------------------
        
    // Obtener el token CSRF: Nos permitira proteger la aplicación web contra ataques de falsificación de solicitudes.

    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');/*Este método nos devuelve el primer elemento que
    coincide con el selector css especificado.*/
    if (!csrfTokenMeta) {//Se valida si se ha encontrado la etiqueta o selector especificado.
        console.error('CSRF token meta tag not found.');
        return;//Se finaliza la función y sale de ella.
    }
    const csrfToken = csrfTokenMeta.getAttribute('content');/*Nos permitira obtener el valor del atributo "content" del HTML.*/

//--------------------------------------------------------------------------------------

    // Validar el formulario de inicio de sesión antes de enviarlo.

    document.getElementById('loginBtn').addEventListener('click', function(event) {/*"getElementById" selecciona el elemento
        con id "loginBtn". Se añade un evento al botón que se ejecuta cuando se hace clic en el.Y la función se llama
        cuando ocurre el evento del clic. En el parametro "event" que es un objeto contendrá información detallada sobre el evento.*/

        event.preventDefault();/*Evita que el formulario sea enviado de manera automatica al servidor, es decir, primero
        se realizan las validaciones que se han implementado de parte del cliente para luego envíar los datos al servidor.*/
        
        const email = document.getElementById('email').value;//Se obtiene el valor del campo email con id email.
        const password = document.getElementById('password').value;//Se obtiene el valor del campo password con id password.
        let errors = [];//Se crea una variable como un array vacio.

        if (!email) {//Se comprueba si la constante email esta vacia.
            errors.push('El campo de correo electrónico es obligatorio.');//Se agrega el mensaje de error en el array.
        } else if (!/\S+@\S+\.\S+/.test(email)) {//Se comprueba que el dato ingresado cumplan con la condición de la expresión regular.
            errors.push('Por favor, ingrese un correo electrónico válido.');
        }

        if (!password) {
            errors.push('El campo de contraseña es obligatorio.');
        }

        if (errors.length > 0) {//Se valida la longitud de "errors", si es mayor a 0.
            Swal.fire({
                title: '¡Error!',
                html: errors.join('<br>'),/*"join" permitira concatenar todos los errores almacenados en "errors" y cada
                mensaje estará separado por un salto de linea <br>*/
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: '¡Entendido!',
                width: '400px'
            });
        } else {
            document.getElementById('loginForm').submit();/*Si no hay ningún error, se obtiene el elemento "loginForm" que
            pertenece al formulario y se envían los datos al servidor para ser procesados.*/
        }
        });

//--------------------------------------------------------------------------------------

        // Mostrar formulario de registro al hacer clic en el botón "Registrarse"
        document.getElementById('registerBtn').addEventListener('click', function() {
            Swal.fire({
                title: 'Registro',
                html: `
                    <div class="container-register">
                        <form class="form-register p-4rounded shadow-lg" id="registerForm" method="POST" action="${window.routes.register}">
                            <input type="hidden" name="_token" value="${csrfToken}"> <!--input no visible que incluye un token CSRF-->
                            <div class="form-group mb-4">
                                <input type="email" id="email" class="form-control" placeholder=" " name="email" aria-describedby="email">
                                <label for="email" class="placeholder-label">Email</label>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" class="form-control" placeholder=" " name="password">
                                <label for="password" class="placeholder-label">Contraseña</label>
                            </div>
                        </form>
                    </div
                `,
                focusConfirm: false,
                preConfirm: () => {//preConfirm asegura de que el formulario se envíe cuando el usuario confirme la acción. 
                    document.getElementById('registerForm').submit();//Se Obtiene el formulario de registro.
                },
                confirmButtonText: 'Registrarse',
                showCancelButton: true,//Habilita el boton de cancelar.
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                customClass: {//Nos permite añadir clases CSS personalizadas.
                    popup: 'my-custom-popup',
                }
        });
    });
});



  


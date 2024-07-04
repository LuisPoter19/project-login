/*document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    form.addEventListener('submit', function(event) {
        let valid = true;

        // Reset error messages
        emailError.style.display = 'none';
        passwordError.style.display = 'none';

        // Email validation
        if (!emailInput.value) {
            valid = false;
            emailError.textContent = 'El campo email es obligatorio.';
            emailError.style.display = 'block';
        } else if (!validateEmail(emailInput.value)) {
            valid = false;
            emailError.textContent = 'El campo email debe ser una dirección de correo válida.';
            emailError.style.display = 'block';
        }

        // Password validation
        if (!passwordInput.value) {
            valid = false;
            passwordError.textContent = 'El campo contraseña es obligatorio.';
            passwordError.style.display = 'block';
        } else if (passwordInput.value.length < 6) {
            valid = false;
            passwordError.textContent = 'El campo contraseña debe tener al menos 6 caracteres.';
            passwordError.style.display = 'block';
        }

        if (!valid) {
            event.preventDefault();
        }
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});*/

//---------------------------------------------------------------------
/*document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        const emailInput = document.getElementById('email');
        const emailErrorModal = new bootstrap.Modal(document.getElementById('errorModal'));

        if (emailInput.value === '' || !validateEmail(emailInput.value)) {
            event.preventDefault(); // Previene el envío del formulario
            emailErrorModal.show(); // Muestra el modal de error
        }
    });

    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }
});*/

//---------------------------------------------------------------------

/*document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        const emailInput = document.getElementById('email');

        if (emailInput.value === '' || !validateEmail(emailInput.value)) {
            event.preventDefault(); // Previene el envío del formulario
            Swal.fire({
                icon: 'error',
                title: 'Error de Validación',
                text: 'Por favor, ingrese un correo válido.'
            });
        }
    });

    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }
});*/

//--------------------------------------------------------------------

import Swal from 'sweetalert2';

Swal.fire({
    title: '¡Error!',
    text: 'Ingresa un email valido.',
    //icon: 'warning', // Puedes cambiar el icono (success, error, warning, info, question)
    confirmButtonColor: '#3085d6', // Cambia el color del botón de confirmación
    confirmButtonText: '¡Entendido!', // Cambia el texto del botón de confirmación
    width: '400px',
    height: '900px',
    //showCancelButton: true, // Muestra un botón de cancelar
    //cancelButtonColor: '#d33', // Cambia el color del botón de cancelar
    //cancelButtonText: 'Cancelar', // Cambia el texto del botón de cancelar
  }).then((result) => {
    if (result.isConfirmed) {
      // Acción cuando se confirma
      Swal.fire('¡Confirmado!', 'Has confirmado la acción.', 'success');
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Acción cuando se cancela
      Swal.fire('Cancelado', 'Has cancelado la acción.', 'error');
    }
  });
  


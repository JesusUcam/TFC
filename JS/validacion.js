function validarInicioSesion() {
  var email = document.getElementById("emailInicio").value;
  console.log(email);
  var clave = document.getElementById("claveInicio").value;
  console.log(clave);

  // Validar que el campo de email tenga un formato válido
  if (!/^\S+@\S+\.\S+$/.test(email)) {
    alert("Por favor ingrese un email válido.");
    return false;
  }

  // Validar que la contraseña tenga al menos 6 caracteres
  if (clave.length < 6) {
    alert("La contraseña debe tener al menos 6 caracteres.");
    return false;
  }

  return true;
}

// Función para validar el formulario de registro
function validarRegistro() {
  var email = document.getElementById("register-email").value;
  console.log(email);
  var nombre = document.getElementById("register-name").value;
  var apellidos = document.getElementById("register-surname").value;
  var telefono = document.getElementById("register-phone").value;
  var clave = document.getElementById("register-password").value;

  // Validar que el campo de email tenga un formato válido
  if (!/^\S+@\S+\.\S+$/.test(email)) {
    alert("Por favor ingrese un email válido.");
    return false;
  }

  // Validar que el nombre y apellidos no contengan números
  if (/\d/.test(nombre) || /\d/.test(apellidos)) {
    alert("El nombre y apellidos no pueden contener números.");
    return false;
  }

  // Validar que el teléfono tenga máximo 10 caracteres y sean números
  if (!/^\d{1,10}$/.test(telefono)) {
    alert(
      "El teléfono debe tener máximo 10 caracteres y contener solo números."
    );
    return false;
  }

  // Validar que la contraseña tenga al menos 6 caracteres
  if (clave.length < 6) {
    alert("La contraseña debe tener al menos 6 caracteres.");
    return false;
  }

  return true;
}

function validarContacto() {
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var correo = document.getElementById("correo").value;
    var mensaje = document.getElementById("mensaje").value;

    if (nombre === "" || apellido === "" || correo === "" || mensaje === "") {
        alert("Por favor, completa todos los campos.");
        return false;
    }

    alert("Formulario enviado con éxito.");
    return true;
}
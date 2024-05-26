//Los centros me sobran?
let peluquerosStr = document.getElementById('datos_peluqueros').value;
let serviciosStr = document.getElementById('datos_servicios').value;
let centrosStr = document.getElementById('datos_centros').value;
let citasStr = document.getElementById('datos_citas').value;

let datos_peluqueros = JSON.parse(peluquerosStr);
let datos_servicios = JSON.parse(serviciosStr);
let datos_centros = JSON.parse(centrosStr);
let datos_citas = JSON.parse(citasStr);

console.log(datos_citas);

//Peferencias del cliente
let centro_seleccionado = document.querySelector("#centroSeleccionado").value;
let peluquero_seleccionado = document.querySelector("#peluqueroSeleccionado").value;
let servicio_seleccionado = document.querySelector("#servicioSeleccionado").value;

//Sacar a método
let duracion;
let precio;
datos_servicios.forEach(servicio => {
    if (servicio.nombre == servicio_seleccionado) {
        let [hours, minutes] = servicio.duracion.split(':').map(Number); // Convertir a números
        if (hours > 0) {
            minutes += 60 * hours;
        }
        duracion = minutes;
        precio = servicio.precio;
    }
});
let duracion_milisegundos = duracion * 60000; // 1 minuto = 60000 milisegundos

// Configuración de opciones para mostrar la fecha_temporal en español
let opcionesfecha_temporal = { 
    weekday: 'long', 
    year: 'numeric', 
    month: 'long', 
    day: 'numeric',
    hour: 'numeric',
    minute: 'numeric',
    second: 'numeric'
};

// let fecha_temporalFormateada = new Intl.DateTimeFormat('es-ES', opcionesfecha_temporal).format(fecha_temporal);

let citas_del_peluquero = [];
datos_citas.forEach(cita => {

    let fecha_temporal = new Date(cita.fecha);

    // Obtenemos todas las citas
    if (centro_seleccionado==cita.centro && peluquero_seleccionado==cita.peluquero) { //El centro sobra porque un peluquero no va a poder estar en 2 centros a la vez

        //Sacar a método
        let servicio_de_cita = cita.servicio;
        let duracion2;
        let precio2;
        datos_servicios.forEach(servicio => {

            if (servicio.nombre == servicio_de_cita) {
                console.log("Conseguido");
                let [hours, minutes] = servicio.duracion.split(':').map(Number); // Convertir a números
                if (hours > 0) {
                    minutes += 60 * hours;
                }
                duracion2 = minutes;
                precio2 = servicio.precio;
            }
        });
        let duracion_milisegundos2 = duracion2 * 60000; // 1 minuto = 60000 milisegundos
        
        let fecha_y_duracion = [fecha_temporal.getTime(), duracion_milisegundos2]
        
        citas_del_peluquero.push(fecha_y_duracion);

        console.log(fecha_y_duracion);

    }

});

let fecha = new Date();
let fecha_milisegundos = fecha.getTime();

citas_del_peluquero.forEach(fecha_cita => {

    console.log(fecha_cita);
    
    let fecha_cita_inicio = fecha_cita[0];
    let fecha_cita_terminada = fecha_cita[0] + fecha_cita[1];

    let ndate1 = new Date(fecha_cita_inicio);
    let ndate2 = new Date(fecha_cita_terminada);

    console.log(fecha_milisegundos - fecha_cita_inicio);
    console.log(fecha_milisegundos - fecha_cita_terminada);
    console.log(duracion_milisegundos);

    if (fecha_milisegundos>fecha_cita) {

    }
    console.log(ndate1);
    console.log(ndate2);
});
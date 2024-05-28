//Los centros me sobran?
let listado = document.querySelector("#listado_citas");
console.log(listado);

let peluquerosStr = document.getElementById('datos_peluqueros').value;
let serviciosStr = document.getElementById('datos_servicios').value;
let centrosStr = document.getElementById('datos_centros').value;
let citasStr = document.getElementById('datos_citas').value;

let datos_peluqueros = JSON.parse(peluquerosStr);
let datos_servicios = JSON.parse(serviciosStr);
let datos_centros = JSON.parse(centrosStr);
let datos_citas = JSON.parse(citasStr);

// console.log(datos_citas);

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

        // console.log(fecha_y_duracion);

    }

});

//IMPORTANTE Deberia limitar las citas recogidas a solo las que sean de después del día actual.
let fecha = new Date();
let cita_milisegundos = fecha.getTime(); // FECHA ACTUAL
let fecha_semana_siguiente = cita_milisegundos + (7 * 24 * 60 * 60000); // una semana después

const horaInicio = 9; // 9 AM
const horaFin = 22; // 10 PM

let citas_no_disponibles = [];
let citas_disponibles = [];

let num_citas_mostrar = 0;

while (cita_milisegundos < fecha_semana_siguiente) {
    let ndate1 = new Date(cita_milisegundos);
    
    // Si es domingo, saltar al siguiente día
    if (ndate1.getDay() === 0) {
        cita_milisegundos += 24 * 60 * 60000; // Sumar 24 horas
        continue;
    }

    // Si la hora es antes de 9 AM, ajustar a 9 AM del mismo día
    if (ndate1.getHours() < horaInicio) {
        ndate1.setHours(horaInicio, 0, 0, 0);
        cita_milisegundos = ndate1.getTime();
    }

    // Si la hora es después de 10 PM, ajustar a 9 AM del siguiente día
    if (ndate1.getHours() >= horaFin) {
        ndate1.setHours(horaInicio, 0, 0, 0);
        cita_milisegundos = ndate1.getTime() + (24 * 60 * 60000); // Sumar 24 horas
        continue;
    }

    let cita_milisegundos_fin = cita_milisegundos + duracion_milisegundos;
    let ndate2 = new Date(cita_milisegundos_fin);

    let fecha_temporalFormateada1 = new Intl.DateTimeFormat('es-ES', opcionesfecha_temporal).format(ndate1);
    let fecha_temporalFormateada2 = new Intl.DateTimeFormat('es-ES', opcionesfecha_temporal).format(ndate2);

    let estaDisponible = true;

    citas_del_peluquero.forEach(fecha_cita => {
        let fecha_cita_inicio = fecha_cita[0];
        let fecha_cita_terminada = fecha_cita[0] + fecha_cita[1];

        if ((cita_milisegundos > fecha_cita_inicio && cita_milisegundos < fecha_cita_terminada) ||
            (cita_milisegundos_fin > fecha_cita_inicio && cita_milisegundos_fin < fecha_cita_terminada)) {
            estaDisponible = false;
            citas_no_disponibles.push(fecha_temporalFormateada1);
        }
    });

    if (estaDisponible) {
        citas_disponibles.push(fecha_temporalFormateada1);
    }

    // Incrementar el tiempo para la próxima cita
    cita_milisegundos += duracion_milisegundos;
    num_citas_mostrar++;
}

console.log("Citas Disponibles: ", citas_disponibles);
console.log("Citas No Disponibles: ", citas_no_disponibles);


citas_disponibles.forEach(element => {
    let opcion = document.createElement("p");
    opcion.setAttribute("style", "background-color: white; padding: 10px; border-radius: 5px; transition: background-color 0.3s, transform 0.3s;");
    opcion.textContent = element;
    
    opcion.onmouseover = function() {
        opcion.style.backgroundColor = "#f0f0f0";
        opcion.style.transform = "scale(1.05)";
    };
    
    opcion.onmouseout = function() {
        opcion.style.backgroundColor = "white";
        opcion.style.transform = "scale(1)";
    };

    opcion.addEventListener("click", function() {
        console.log(element);
    });
    
    listado.appendChild(opcion);

});

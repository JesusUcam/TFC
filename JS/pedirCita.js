// FALTA MOSTRAR BIEN LAS CITAS Y UN BOTÓN PARA VER MÁS SEMANAS. Con mostrar bien las citas me refiero a que sale el dia actual y el dia actual 7 dias despues
let listado = document.querySelector("#listado_citas");
let submit = document.querySelector("#enviar_formulario_citas");
console.log(listado);

//Datos BBDD
let peluquerosStr = document.getElementById('datos_peluqueros').value;
let serviciosStr = document.getElementById('datos_servicios').value;
let centrosStr = document.getElementById('datos_centros').value;
let citasStr = document.getElementById('datos_citas').value;
//Datos BBDD JSON
let datos_peluqueros = JSON.parse(peluquerosStr);
let datos_servicios = JSON.parse(serviciosStr);
let datos_centros = JSON.parse(centrosStr);
let datos_citas = JSON.parse(citasStr);

//Peferencias del cliente HTML
let centro_selector = document.querySelector("#centroSeleccionado");
let peluquero_selector = document.querySelector("#peluqueroSeleccionado");
let servicio_selector = document.querySelector("#servicioSeleccionado");
//Peferencias del cliente
let peluquero_seleccionado = peluquero_selector.value;
let servicio_seleccionado = servicio_selector.value;
let centro_seleccionado = centro_selector.value;

//BOTONES PARA VER LAS CITAS
let btn_comprobar_citas = document.querySelector("#comprobar_citas");
let btn_comprobar_citas_siguiente = document.querySelector("#comprobar_citas_siguiente");
let btn_comprobar_citas_anterior = document.querySelector("#comprobar_citas_anterior");

let semana_citas = 0;

//Eventlisteners que guardan preferencias de los clientes
peluquero_selector.addEventListener("change", function escoger_peluquero() {
    limpieza_listado();
    peluquero_seleccionado = peluquero_selector.value;
});

centro_selector.addEventListener("change", function escoger_centro() {
    limpieza_listado();
    centro_seleccionado = centro_selector.value;
    options_de_peluqueros();
});

servicio_selector.addEventListener("change", function escoger_servicio() {
    limpieza_listado();
    servicio_seleccionado = servicio_selector.value;
});

btn_comprobar_citas.addEventListener("click", function habilitar_citas_as() {
    console.log(peluquero_seleccionado);
    console.log(servicio_seleccionado);
    console.log(centro_seleccionado);
    listado.innerHTML = "";
    get_citas(semana_citas);
    btn_comprobar_citas_siguiente.setAttribute("style", "display: inline-block");
    btn_comprobar_citas.setAttribute("style", "display: none");
});

btn_comprobar_citas_siguiente.addEventListener("click", function citas_siguientes() {
    semana_citas++;
    listado.innerHTML = "";
    get_citas(semana_citas);
    btn_comprobar_citas_anterior.setAttribute("style", "display: inline-block");
});

btn_comprobar_citas_anterior.addEventListener("click", function citas_anteriores() {
    semana_citas--;
    listado.innerHTML = "";
    get_citas(semana_citas);
    if (semana_citas<1) {
        console.log("menos de uno");
        btn_comprobar_citas_anterior.setAttribute("style", "display: none");
    }
});

submit.addEventListener("mouseover", function name(params) {
    console.log("Hola mundo");
    console.log(peluquero_seleccionado);
    console.log(servicio_seleccionado);
    console.log(centro_seleccionado);
    console.log("FALTA SOLO LA CITA Y ENVIAR");
    console.log("ADIOS");
})

///////////////////////////////////////////
//////////////// FUNCIONES ////////////////
///////////////////////////////////////////

options_de_peluqueros();
function options_de_peluqueros() {
    
    peluquero_selector.innerHTML = "";
    
    datos_peluqueros.forEach(peluquero => {
        
        if (centro_seleccionado==peluquero['centro_peluquero']) {
            let opcion_peluquero = document.createElement("option");
            opcion_peluquero.setAttribute("value", peluquero['nombre'])
            opcion_peluquero.textContent = peluquero['nombre'];
            peluquero_selector.appendChild(opcion_peluquero);
        }

    });

    peluquero_seleccionado = peluquero_selector.value;

}

function limpieza_listado() {
    listado.innerHTML = "";
    btn_comprobar_citas.setAttribute("style", "display: inline-block");
    btn_comprobar_citas_siguiente.setAttribute("style", "display: none");
    btn_comprobar_citas_anterior.setAttribute("style", "display: none");
    semana_citas = 0;
}
    
//FUNCION PRINCIPAL
function get_citas(semanas) {
    
    //IMPORTANTE Deberia limitar las citas recogidas a solo las que sean de después del día actual.
    let fecha = new Date(); //Fecha catual
    let cita_milisegundos = fecha.getTime(); // FECHA ACTUAL
    cita_milisegundos += (semanas*(7 * 24 * 60 * 60000));
    let fecha_semana_siguiente = cita_milisegundos + (7 * 24 * 60 * 60000); // una semana después
    
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

        }

    });

    const horaInicio = 9; // 9 AM
    const horaFin = 22; // 10 PM

    let citas_no_disponibles = [];

    let citas_disponibles = [[], [], [], [], [], []];

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

        // let fecha_temporalFormateada1 = new Intl.DateTimeFormat('es-ES', opcionesfecha_temporal).format(ndate1);
        // let fecha_temporalFormateada2 = new Intl.DateTimeFormat('es-ES', opcionesfecha_temporal).format(ndate2);

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
            
            citas_disponibles[ndate1.getDay()-1].push(ndate1); //-1 porque el domingo (0) nunca está
            // console.log(ndate1);
            // citas_disponibles.push(fecha_temporalFormateada1);

        }

        // Incrementar el tiempo para la próxima cita
        cita_milisegundos += duracion_milisegundos;
        num_citas_mostrar++;
    }

    //MOSTRAR CITAS EN LA PÁGINA
    citas_disponibles.forEach(citas_dia => {

        listado.setAttribute("style", "display: flex; color: black; flex-direction: row; justify-content: space-between;");

        let dia = document.createElement("div");
        // dia.setAttribute("class", "citas_js");
        let dia_titulo = document.createElement("h3");
        // dia_titulo.setAttribute("class", "citas_js");
        
        let opcionesfecha_temporal_dia = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric'
        };
        let fecha_temporalFormateadaX = new Intl.DateTimeFormat('es-ES').format(citas_dia[0]);
        dia_titulo.textContent = fecha_temporalFormateadaX;
        dia_titulo.setAttribute("style", "background-color: white; color: black; padding: 10px; border-radius: 2px; transition: background-color 0.3s, transform 0.3s;")

        dia.appendChild(dia_titulo);

        // console.log(fecha_temporalFormateadaX);

        citas_dia.forEach(cita_temp => {

            let opcion = document.createElement("p");
            opcion.setAttribute("class", `cita${fecha_temporalFormateadaX}`);
            opcion.setAttribute("style", "display: none;");
            opcion.textContent = cita_temp;

            opcion.onmouseover = function() {
                opcion.style.backgroundColor = "#f0f0f0";
                opcion.style.transform = "scale(1.05)";
            };
        
            opcion.onmouseout = function() {
                opcion.style.backgroundColor = "white";
                opcion.style.transform = "scale(1)";
            };

            opcion.addEventListener("click", function() {
                console.log(cita_temp);
            });
        
            dia.appendChild(opcion);

        })

        let desplegado=false;
        dia_titulo.addEventListener("click", function() {
            let childs = dia.children;
            if (desplegado) {
                for (let i2 = 1; i2 < childs.length; i2++) {
                    const child = childs[i2];
                    child.setAttribute("style", "display: none;");
                }
                desplegado=false;
            } else {
                for (let i2 = 1; i2 < childs.length; i2++) {
                    const child = childs[i2];
                    child.setAttribute("style", "background-color: white; padding: 10px; border-radius: 2px; transition: background-color 0.3s, transform 0.3s;");
                }
                desplegado=true;
            }
        })

        listado.appendChild(dia);

    });
    
}

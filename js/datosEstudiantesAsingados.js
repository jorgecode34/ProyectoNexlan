let datosUsuarios = [] // Array global para manejo de estudiantes

/**
 * Función que trae usuarios desde PHP
 */
async function traerUsuarios() {
    const response = await fetch('traerEstudiantesAsignados.php', {
        method: 'GET'
    })
    const res = await response.json()
    return res
}

/**
 * Llama a la función de traer datos de forma asincrona
 */
traerUsuarios().then(dato => {
    for (let i = 0; i < dato.length; i++) {
        agregarNavTab(dato[i], i)
    }
    datosUsuarios = dato
    
    // Activar la primera pestaña por defecto
    document.querySelector('.nav-link').classList.add('active')
    document.querySelector('.tab-pane').classList.add('show', 'active')
})

/**
 * Agrega una nueva pestaña y su contenido correspondiente
 * @param {Object} infoPersona - Información del estudiante
 * @param {number} pos - Posición en el array
 */
function agregarNavTab(infoPersona, pos) {
    // Crear pestaña
    const tab = `
        <li class="nav-item" role="presentation">
            <button class="nav-link" 
                    id="nav-${pos}-tab" 
                    data-bs-toggle="tab" 
                    data-bs-target="#nav-${pos}" 
                    type="button" 
                    role="tab" 
                    aria-controls="nav-${pos}" 
                    aria-selected="false">
                ${infoPersona.primerNombre} ${infoPersona.primerApellido}
            </button>
        </li>
    `
    
    const content = `
        <div class="tab-pane fade" 
             id="nav-${pos}" 
             role="tabpanel" 
             aria-labelledby="nav-${pos}-tab">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <h5 class="card-title">Información del estudiante</h5>
                        <p class="mb-1"><strong>Nombre:</strong> ${infoPersona.primerNombre}</p>
                        <p class="mb-1"><strong>Apellido:</strong> ${infoPersona.primerApellido}</p>
                        <p class="mb-1"><strong>Documento:</strong> ${infoPersona.documento}</p>
                        <p class="mb-1"><strong>Teléfono de contacto:</strong> ${infoPersona.tel}</p>
                        <p class="mb-1"><strong>Correo:</strong> ${infoPersona.email}</p>
                    </div>

                    <div class="col-md-6">
                        <h5 class="card-title">Datos de la siguiente clase</h5>
                        <p class="mb-1"><strong>Fecha:</strong> ${infoPersona.start}</p>
                        <p class="mb-1"><strong>Hora:</strong> ${infoPersona.time}</p>
                        <p class="mb-1"><strong>Tipo:</strong> ${infoPersona.tipo}</p>
                        <p class="mb-1"><strong>Titulo:</strong> ${infoPersona.title}</p>
                        <p class="mb-1"><strong>Descripción:</strong> ${infoPersona.descripcion}</p>
                    </div>
                </div>
            </div>
        </div>
    `
    
    // Agregar pestaña y contenido al DOM
    $('#navTab').append(tab)
    $('#navContent').append(content)
}
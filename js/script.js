<<<<<<< HEAD
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
=======
const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
)
const tooltipList = [...tooltipTriggerList].map(
  tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl)
)

// Example starter JavaScript for disabling form submissions if there are invalid fields
;(() => {
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
<<<<<<< HEAD
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

let calendar;

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    calendar = new FullCalendar.Calendar(calendarEl, {



      headerToolbar:{
        left:'prev,next today',
        center:'title',
        right:'dayGridMonth dayGridYear',
      },  



      initialView: 'dayGridMonth',
      themeSystem: 'bootstrap5',
      locale: 'es-us',
      navlinks: true,
      selectable: true,
      selectMirror: true,
      editable: false,
      dayMaxEvents: true,
      showNonCurrentDates: false,


      // Hacer el mouse pointer al posarme sobre un evento
      eventMouseEnter: function(info) {
        info.el.style.cursor = 'pointer';
      },
      eventMouseLeave: function(info) {
        info.el.style.cursor = 'default';
      },


      // Hacer el mouse pointer al posarme sobre un día 
      dayCellDidMount: function(info) {
        info.el.style.cursor = 'pointer';
      },



      dateClick: function(info){
        console.log(info);

        const visualizarModalDia = new bootstrap.Modal(document.getElementById("dayModal"));
        document.getElementById("nuevo_fecha").value = info.dateStr;
        visualizarModalDia.show();
      },



      eventClick: function (info){
       console.log(info);
      
       const visualizarModalEvento = new bootstrap.Modal(document.getElementById("eventModal"));

       document.getElementById("visualizar_id").value = info.event.id;
       document.getElementById("delete_id").value = info.event.id;
       
        document.getElementById("visualizar_titulo").value = info.event.title;
        document.getElementById("visualizar_inicio").value = moment(info.event.start).format('YYYY-MM-DD');
        document.getElementById("visualizar_descripcion").value = info.event.extendedProps.descripcion;
        document.getElementById("visualizar_time").value = info.event.extendedProps.time ? moment(info.event.extendedProps.time, 'HH:mm:ss').format('HH:mm') : '';


        document.getElementById("visualizar_instructor").value = info.event.extendedProps.instructor;
        document.getElementById("visualizar_estudiante").value = info.event.extendedProps.estudiante;
        document.getElementById("visualizar_vehiculo").value = info.event.extendedProps.vehiculo;
       visualizarModalEvento.show();
      },



      eventDrop:function(info){
        console.log(info)
      },





      eventResize:function(info){
        console.log(info)
      },



      events: 'listar-eventos.php',
      


    });
    calendar.render();

    
});

=======
    form.addEventListener(
      'submit',
      event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      },
      false
    )
  })
})()

/* Función para ocultar o mostrar contraseña*/
document.addEventListener('DOMContentLoaded', function () {
  const togglePassword = document.querySelector('#togglePassword')
  const password = document.querySelector('#inputPassword')

  togglePassword.addEventListener('click', function () {
    if (!password || !togglePassword) {
      console.error('No se encontraron los elementos necesarios')
      return
    }

    const type =
      password.getAttribute('type') === 'password' ? 'text' : 'password'
    password.setAttribute('type', type)

    // Cambiar el ícono
    const eyeIcon =
      type === 'text'
        ? `
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
              <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
          </svg>
      `
        : `
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
              <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
              <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
              <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
          </svg>
      `

    this.innerHTML = eyeIcon
  })
})
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258



/************************************************************************/

<<<<<<< HEAD


//btn recargar tabla
function refreshPage(){
    window.location.href = window.location.pathname;
};



/************************************************************************/



//funcion para habilitar o dehabilitar cedula o pasaporte
function mostrarCampos() {

  var idTypeSelect = document.getElementById('tipoId');
  var documentoInput = document.getElementById('documento');

  if (idTypeSelect.value === 'cedula') {
    documentoInput.removeAttribute('disabled');
      // pasaporteInput.setAttribute('disabled', 'disabled');

  } else if (idTypeSelect.value === 'pasaporte') {
    documentoInput.removeAttribute('disabled');
      // pasaporteInput.setAttribute('disabled', 'disabled');

  } else {
    documentoInput.setAttribute('disabled', 'disabled');
      // pasaporteInput.setAttribute('disabled', 'disabled');
  }

};




/************************************************************************/




//boton que expande o achica la sidebar
const toggler = document.querySelector(".btn[data-bs-theme='collapse']");
toggler.addEventListener("click", function(){
  document.querySelector("#sidebar").classList.toggle("collapsed");
  console.log("Sidebar toggled");


  // Metodo para que el calendario se achique/agrande automaticamente al presionar el toggler de la navbar
  setTimeout(() => {
      if (calendar) {
          console.log("Updating calendar size");
          calendar.updateSize();
      } else {
          console.log("Calendar not found");
      }

    /* Tiempo tiene que ser 400 por el calendario */
  }, 400);


});


/************************************************************************/


// Obtener y formatear la fecha actual
const fechaFormateada = new Intl.DateTimeFormat('es-ES', { 
  weekday: 'long', 
  year: 'numeric', 
  month: 'long', 
  day: 'numeric' 
}).format(new Date());

// Insertar la fecha formateada en el HTML
document.getElementById("fecha-actual").innerHTML = fechaFormateada;


/************************************************************************/

/* Nuevas cosas de clases.php */

document.addEventListener('DOMContentLoaded', function() {
  // Configurar las categorías de licencia
  const categoriaSelect = document.getElementById('asignar_categoria');
  const categorias = {
      'Motos': ['G1', 'G2', 'G3'],
      'Autos': ['A1', 'A2', 'A3', 'A4', 'A5'],
      'Especial': ['F']
  };

  // Crear grupos de opciones para las categorías
  for (let grupo in categorias) {
      const optgroup = document.createElement('optgroup');
      optgroup.label = grupo;
      
      categorias[grupo].forEach(cat => {
          const option = document.createElement('option');
          option.value = cat;
          option.textContent = cat;
          optgroup.appendChild(option);
      });
      
      categoriaSelect.appendChild(optgroup);
  }

  // Inicializar Select2 para todos los selectores
  $('#asignar_categoria').select2({
      placeholder: 'Seleccione una categoría...',
      allowClear: true,
      width: '100%'
  });

  $('#nuevo_instructor').select2({
      placeholder: 'Buscar instructor...',
      allowClear: true,
      width: '100%'
  });
  
  $('#nuevo_estudiante').select2({
      placeholder: 'Buscar estudiante...',
      allowClear: true,
      width: '100%'
  });
  
  $('#nuevo_vehiculo').select2({
      placeholder: 'Buscar vehículo...',
      allowClear: true,
      width: '100%'
  });
});
=======
//btn recargar tabla
function refreshPage () {
  window.location.href = window.location.pathname

  // document.getElementById('searchInput').value = '';
  // document.getElementById('limitSelect').value = '';
  // filtrarInstructores();
}

/************************************************************************/

//funcion para habilitar o dehabilitar cedula o pasaporte
function mostrarCampos () {
  var idTypeSelect = document.getElementById('tipoId')
  var documentoInput = document.getElementById('documento')

  if (idTypeSelect.value === 'cedula') {
    documentoInput.removeAttribute('disabled')
    // pasaporteInput.setAttribute('disabled', 'disabled');
  } else if (idTypeSelect.value === 'pasaporte') {
    documentoInput.removeAttribute('disabled')
    // pasaporteInput.setAttribute('disabled', 'disabled');
  } else {
    documentoInput.setAttribute('disabled', 'disabled')
    // pasaporteInput.setAttribute('disabled', 'disabled');
  }
}

/************************************************************************/

const toggler = document.querySelector(".btn[data-bs-theme='collapse']")
const sidebar = document.querySelector('#sidebar')
const main = document.querySelector('.main')

// Crear el overlay
const overlay = document.createElement('div')
overlay.className = 'sidebar-overlay'
document.body.appendChild(overlay)

function toggleSidebar () {
  const isMobile = window.innerWidth <= 768

  //si es un tamaño de celular entonces le agrego la clase show a la sidebar y si es pc se le agrega collapsed
  //esto hace que se generen 2 tipos de sidebar dependiendo del tamaño de la pantalla, gracias a las clases de bootstrap
  if (isMobile) {
    sidebar.classList.toggle('show')
    overlay.classList.toggle('show')
  } else {
    sidebar.classList.toggle('collapsed')
    main.classList.toggle('expanded')
  }

  // Actualizar el calendario si existe
  setTimeout(() => {
    if (typeof calendar !== 'undefined' && calendar) {
      calendar.updateSize()
    }
  }, 400)
}

toggler.addEventListener('click', toggleSidebar)

// Cerrar sidebar al hacer click en el overlay
overlay.addEventListener('click', () => {
  if (sidebar.classList.contains('show')) {
    sidebar.classList.remove('show')
    overlay.classList.remove('show')
  }
})

// Manejar cambios de tamaño de ventana
window.addEventListener('resize', () => {
  const isMobile = window.innerWidth <= 768

  if (!isMobile) {
    overlay.classList.remove('show')
    sidebar.classList.remove('show')
  }
})

/************************************************************************/

// Obtener y formatear la fecha actual
const fechaFormateada = new Intl.DateTimeFormat('es-ES', {
  weekday: 'long',
  year: 'numeric',
  month: 'long',
  day: 'numeric'
}).format(new Date())

// Insertar la fecha formateada en el HTML
document.getElementById('fecha-actual').innerHTML = fechaFormateada

/************************************************************************/
document.addEventListener('DOMContentLoaded', function () {
  cargarGraficaRolesUsuarios()
  cargarGraficaTiposDeClases()
})

function cargarGraficaRolesUsuarios () {
  fetch('graficas.php?action=rolesUsuarios')
    .then(response => response.json())
    .then(data => {
      const ctx = document.getElementById('myChart').getContext('2d')
      new Chart(ctx, {
        type: 'doughnut',

        data: {
          labels: ['Estudiantes', 'Instructores'],
          datasets: [
            {
              data: [data.estudiante, data.instructor],
              backgroundColor: ['#0d6efd', '#ffc107']
            }
          ]
        },

        options: {
          responsive: true,
          maintainAspectRatio: false,

          plugins: {
            legend: { position: 'top' },
            title: { display: true, text: 'Distribución de Usuarios por Rol' },
            tooltip: {
              callbacks: {
                label: function (context) {
                  const label = context.label || ''
                  const value = context.raw
                  const total = context.chart._metasets[0].total
                  const percentage = ((value / total) * 100).toFixed(2)
                  return `${label}: ${value} (${percentage}%)`
                }
              }
            }
          },
          animation: { animateScale: true, animateRotate: true }
        }
      })
    })
    .catch(error => console.error('Error:', error))
}

function cargarGraficaTiposDeClases () {
  fetch('graficas.php?action=tiposDeClases')
    .then(response => response.json())
    .then(data => {
      const ctx = document.getElementById('classChart').getContext('2d')
      new Chart(ctx, {
        type: 'doughnut',

        data: {
          labels: ['Práctico', 'Teórico'],
          datasets: [
            {
              data: [data.Práctico, data.Teórico],
              backgroundColor: ['#3355ff', '#800020']
            }
          ]
        },

        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: { position: 'top' },
            title: { display: true, text: 'Distribución de Clases por Tipo' },

            tooltip: {
              callbacks: {
                label: function (context) {
                  const label = context.label || ''
                  const value = context.raw
                  const total = context.chart._metasets[0].total
                  const percentage = ((value / total) * 100).toFixed(2)
                  return `${label}: ${value} (${percentage}%)`
                }
              }
            }
          },
          animation: { animateScale: true, animateRotate: true }
        }
      })
    })
    .catch(error => console.error('Error:', error))
}

/*!
 * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
 * Copyright 2011-2024 The Bootstrap Authors
 * Licensed under the Creative Commons Attribution 3.0 Unported License.
 */

;(() => {
  'use strict'

  const getStoredTheme = () => localStorage.getItem('theme')
  const setStoredTheme = theme => localStorage.setItem('theme', theme)

  const getPreferredTheme = () => {
    const storedTheme = getStoredTheme()
    if (storedTheme) {
      return storedTheme
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches
      ? 'dark'
      : 'light'
  }

  const setTheme = theme => {
    if (theme === 'auto') {
      document.documentElement.setAttribute(
        'data-bs-theme',
        window.matchMedia('(prefers-color-scheme: dark)').matches
          ? 'dark'
          : 'light'
      )
    } else {
      document.documentElement.setAttribute('data-bs-theme', theme)
    }
  }

  setTheme(getPreferredTheme())

  const showActiveTheme = (theme, focus = false) => {
    const themeSwitcher = document.querySelector('#bd-theme')

    if (!themeSwitcher) {
      return
    }

    const themeSwitcherText = document.querySelector('#bd-theme-text')
    const activeThemeIcon = document.querySelector('.theme-icon-active use')
    const btnToActive = document.querySelector(
      `[data-bs-theme-value="${theme}"]`
    )
    const svgOfActiveBtn = btnToActive
      .querySelector('svg use')
      .getAttribute('href')

    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
      element.classList.remove('active')
      element.setAttribute('aria-pressed', 'false')
    })

    btnToActive.classList.add('active')
    btnToActive.setAttribute('aria-pressed', 'true')
    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
    const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
    themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

    if (focus) {
      themeSwitcher.focus()
    }
  }

  window
    .matchMedia('(prefers-color-scheme: dark)')
    .addEventListener('change', () => {
      const storedTheme = getStoredTheme()
      if (storedTheme !== 'light' && storedTheme !== 'dark') {
        setTheme(getPreferredTheme())
      }
    })

    window.addEventListener('DOMContentLoaded', () => {
      showActiveTheme(getPreferredTheme())
      
      document.querySelectorAll('[data-bs-theme-value]').forEach(toggle => {
        toggle.addEventListener('click', () => {
          const theme = toggle.getAttribute('data-bs-theme-value')
        setStoredTheme(theme)
        setTheme(theme)
        showActiveTheme(theme, true)
      })
    })
  })
})()

/******************************************************************************/
function generarTextoAleatorio (longitud) {
  const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'
  let resultado = ''
  for (let i = 0; i < longitud; i++) {
    resultado += caracteres.charAt(
      Math.floor(Math.random() * caracteres.length)
    )
  }
  return resultado
}

function generarNumeroAleatorio (longitud) {
  const numeros = '0123456789'
  let resultado = ''
  for (let i = 0; i < longitud; i++) {
    resultado += numeros.charAt(Math.floor(Math.random() * numeros.length))
  }
  return resultado
}

/********************************************************************************/
function rellenarCampos () {
  document.getElementById('documento').removeAttribute('disabled')
  document.getElementById('documento').value = generarNumeroAleatorio(8)
  document.getElementById('tipoId').value = 'cedula'
  document.getElementById('primerNombre').value = generarTextoAleatorio(6)
  document.getElementById('segundoNombre').value = generarTextoAleatorio(6)
  document.getElementById('primerApellido').value = generarTextoAleatorio(6)
  document.getElementById('segundoApellido').value = generarTextoAleatorio(6)
  document.getElementById('pass').value = generarTextoAleatorio(8)
  document.getElementById('calle').value = generarTextoAleatorio(10)
  document.getElementById('numeroPuerta').value = generarNumeroAleatorio(4)
  document.getElementById('barrio').value = generarTextoAleatorio(8)
  document.getElementById('localidad').value = generarTextoAleatorio(8)
  document.getElementById('tel').value = generarNumeroAleatorio(8)
  document.getElementById('email').value =
    generarTextoAleatorio(5) + '@example.com'
}
/******************************************************************************/




>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258

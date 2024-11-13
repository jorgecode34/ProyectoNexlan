const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
)
const tooltipList = [...tooltipTriggerList].map(
  tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl)
)

// Example starter JavaScript for disabling form submissions if there are invalid fields
;(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
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



/************************************************************************/


/************************************************************************/

//funcion para habilitar o dehabilitar cedula o pasaporte
function mostrarCampos () {
  var idTypeSelect = document.getElementById('tipoId')
  var documentoInput = document.getElementById('documento')

  if (idTypeSelect.value === 'cedula') {
    documentoInput.removeAttribute('disabled')
    documentoInput.setAttribute('type', 'number')
    // pasaporteInput.setAttribute('disabled', 'disabled');
  } else if (idTypeSelect.value === 'pasaporte') {
    documentoInput.removeAttribute('disabled')
    documentoInput.setAttribute('type', 'text')
    // pasaporteInput.setAttribute('disabled', 'disabled');
  } else {
    documentoInput.setAttribute('disabled', 'disabled')
    documentoInput.setAttribute('type', 'text') // Default type
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
    document.body.classList.toggle('no-scroll') 

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
    document.body.classList.remove('no-scroll') // Quitar la clase no-scroll
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
  cargarGraficaMontoPorMes()
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

function cargarGraficaMontoPorMes() {
  fetch('graficas.php?action=montoPorMes')
    .then(response => response.json())
    .then(data => {
      const ctx = document.getElementById('costChart').getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: Object.keys(data).map(key => `Mes ${key}`),
          datasets: [
            {
              label: 'Costos por Mes',
              data: Object.values(data),
              backgroundColor: '#3355ff',
              borderColor: '#3355ff',
              borderWidth: 2,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true,
              display: true,
              title: {
                display: true,
                text: 'Monto'
              }
            },
            x: {
              display: true,
              title: {
                display: true,
                text: 'Mes'
              }
            }
          },
          plugins: {
            title: {
              display: true,
              text: 'Costos por Mes'
            }
          }
        }
      });
    })
    .catch(error => console.error('Error:', error));
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

/********************************************************************************/
function rellenarCamposEstudiante () {
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

/********************************************************************************/
function rellenarCamposVehiculo() {
  document.getElementById('Matricula').value = generarTextoAleatorio(7).toUpperCase();
  document.getElementById('tipoId').value = 'Auto';
  document.getElementById('Modelo').value = generarTextoAleatorio(6);
  document.getElementById('Marca').value = generarTextoAleatorio(6);
  document.getElementById('AnioFabricacion').value = generarNumeroAleatorio(4);
  document.getElementById('Color').value = generarTextoAleatorio(6);
  document.getElementById('Precio').value = generarNumeroAleatorio(5);
  document.getElementById('kilometraje').value = generarNumeroAleatorio(6);
}
/******************************************************************************/






document.addEventListener('DOMContentLoaded', function() {
  const tipoClase = document.getElementById('asignar_tipo');
  const vehiculoSelect = document.getElementById('nuevo_vehiculo');

  tipoClase.addEventListener('change', function() {
      if (tipoClase.value === 'Teórico') {
          vehiculoSelect.disabled = true;
          vehiculoSelect.removeAttribute('required');
      } else {
          vehiculoSelect.disabled = false;
          vehiculoSelect.setAttribute('required', 'required');
      }
  });
});





document.addEventListener('DOMContentLoaded', function() {

  fetch('graficas.php?action=montoPorMes')
    .then(response => response.json())
    .then(data => {
      const allMonths = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
      const labels = allMonths.map(month => month);
      const seriesData = allMonths.map(month => data[month] || 0);



      const getThemeColors = () => {
        const theme = document.documentElement.getAttribute('data-bs-theme');
        if (theme === 'dark') {
          return {
            textColor: '#ffffff',
            gridColor: '#444444',
            tooltipTheme: 'dark'
          };
        } else {
          return {
            textColor: '#000000',
            gridColor: '#e0e0e0',
            tooltipTheme: 'light'
          };
        }
      };


      
      const updateChartColors = (chart) => {
        const colors = getThemeColors();
        chart.updateOptions({
          chart: {
            foreColor: colors.textColor
          },
        
          grid: {
            borderColor: colors.gridColor
          },

          tooltip: {
            theme: colors.tooltipTheme
          },

          title: {
            style: {
              color: colors.textColor,
              fontFamily: 'Outfit, sans-serif'
            }
          }

        });
      };

      var optionsLineChart = {
        series: [{
          name: 'Monto',
          data: seriesData
        }],

        xaxis: {
          categories: labels, // Usar las etiquetas como categorías en el eje x
          tooltip: {
            enabled: false // Deshabilitar el tooltip
          }
        },

        chart: {
          type: 'area',
          width: "100%",
          height: 360,
          zoom: {
            enabled: false // Deshabilitar el zoom
          },
          events: {
            mounted: function(chartContext, config) {
              updateChartColors(chartContext);
            }
          }
        },

        title: {
          text: 'Ingresos por Mes',
          align: 'left',
          style: {
            fontSize: '16px',
            fontWeight: 'bold',
            color: getThemeColors().textColor,
            fontFamily: 'Outfit, sans-serif'
          }
        },

        theme: {
          monochrome: {
            enabled: true,
            color: '#0d6efd',
          }
        },

        tooltip: {
          fillSeriesColor: false,
          onDatasetHover: {
            highlightDataSeries: false,
          },

          theme: 'light',
          style: {
            fontSize: '12px',
            fontFamily: 'Outfit, sans-serif',
          },
        },

      };

      var lineChartEl = document.getElementById('line-chart-apex');
      if (lineChartEl) {
        var lineChart = new ApexCharts(lineChartEl, optionsLineChart);
        lineChart.render();

        // Escuchar cambios en el tema de Bootstrap
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
          updateChartColors(lineChart);
        });

        document.querySelectorAll('[data-bs-theme-value]').forEach(toggle => {
          toggle.addEventListener('click', () => {
            setTimeout(() => {
              updateChartColors(lineChart);
            }, 100);
          });
        });
        
      }
    })
    .catch(error => console.error('Error:', error));
});

function disableSubmitButton() {
  document.getElementById('submitButton').disabled = true;
}


const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
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




/************************************************************************/



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


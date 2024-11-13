let calendar

document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar')

  calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth dayGridYear'
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
    height: 'auto', // Ajusta la altura automáticamente

    // Hacer el mouse pointer al posarme sobre un evento
    eventMouseEnter: function (info) {
      info.el.style.cursor = 'pointer'
    },
    eventMouseLeave: function (info) {
      info.el.style.cursor = 'default'
    },

    // Hacer el mouse pointer al posarme sobre un día
    dayCellDidMount: function (info) {
      info.el.style.cursor = 'pointer'
    },

    
    dateClick: function (info) {
      console.log(info)

      const visualizarModalDia = new bootstrap.Modal(
        document.getElementById('dayModal')
      )
      document.getElementById('nuevo_fecha').value = info.dateStr
      visualizarModalDia.show()
    },

    eventClick: function (info) {
      console.log(info)

      const visualizarModalEvento = new bootstrap.Modal(
        document.getElementById('eventModal')
      )

      document.getElementById('visualizar_id').value = info.event.id
      const deleteIdField = document.getElementById('delete_id')
      if (deleteIdField) {
        deleteIdField.value = info.event.id
      }

      document.getElementById('visualizar_titulo').value = info.event.title
      document.getElementById('visualizar_inicio').value = moment(
        info.event.start
      ).format('YYYY-MM-DD')
      document.getElementById('visualizar_descripcion').value =
        info.event.extendedProps.descripcion
      document.getElementById('visualizar_time').value = info.event
        .extendedProps.time
        ? moment(info.event.extendedProps.time, 'HH:mm:ss').format('HH:mm')
        : ''

      document.getElementById('visualizar_instructor').value =
        info.event.extendedProps.instructor
      document.getElementById('visualizar_estudiante').value =
        info.event.extendedProps.estudiante
      document.getElementById('visualizar_vehiculo').value =
        info.event.extendedProps.vehiculo
      visualizarModalEvento.show()
    },

    eventDrop: function (info) {
      console.log(info)
    },

    eventResize: function (info) {
      console.log(info)
    },

    events: 'listar-eventos.php'
  })
  calendar.render()
})

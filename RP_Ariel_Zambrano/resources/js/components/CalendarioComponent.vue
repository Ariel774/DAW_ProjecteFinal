<template>
    <FullCalendar :options="calendarOptions"/>
</template>
<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import timeGridPlugin from '@fullcalendar/timegrid'
import allLocales from '@fullcalendar/core/locales-all';



export default {
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
      calendarOptions: {
        // Plugins
        plugins: [ dayGridPlugin, interactionPlugin, timeGridPlugin ],
        // Por defecto ver el mes
        initialView: 'dayGridMonth',
        locales: allLocales,
        locale: 'es',
        // Botones del calendario
        headerToolbar: {
          left: 'dayGridMonth,timeGridWeek,timeGridDay',
          center: 'title',
          right: 'prevYear,prev,next,nextYear'
        },
        dayMaxEvents: true,
        weekends: true, 
        selectable: true,
        editable: false,
        eventTimeFormat: { // like '14:30:00'
        hour: '2-digit',
        minute: '2-digit',
        hour12: false,
        allDay:true,
        expandRows: true
        },
        events: "http://localhost:8000/dashboard/calendario/show",
        // eventDidMount: function(info) {
        //   var tooltip = new Tooltip(info.el, {
        //     title: info.event.extendedProps.description,
        //     placement: 'top',
        //     trigger: 'hover',
        //     container: 'body'
        //   });
        // },
      }
    }
  }
}
</script>

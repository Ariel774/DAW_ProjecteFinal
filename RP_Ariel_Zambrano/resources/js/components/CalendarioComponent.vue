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
        locale: 'cat',
        // Botones del calendario
        headerToolbar: {
          left: 'dayGridMonth,timeGridWeek,timeGridDay',
          center: 'title',
          right: 'prevYear,prev,next,nextYear',
        },
        nowIndicator: true, // Para indicar la hora actual
        dayMaxEvents: true,
        weekends: true, 
        selectable: true,
        editable: false,
        eventTimeFormat: { // like '14:30:00'
        hour: '2-digit',
        minute: '2-digit',
        hour12: false,
        allDay:false,
        expandRows: true
        },
        events: null,
        eventDidMount: function(info) {
          $(info.el).tooltip({ 
            title: info.event.title,
            placement: "top",
            trigger: "hover",
            container: "body"
          });
        },
      },   
    }
  },
  mounted() {
    axios.get("/dashboard/calendario/show")
    .then(calendario => {
      this.calendarOptions.events = calendario.data;

    })
  }
}
</script>

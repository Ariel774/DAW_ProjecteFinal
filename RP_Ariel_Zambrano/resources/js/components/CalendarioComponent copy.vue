<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form @submit.prevent>
          <div class="form-group">
            <label for="event_name">Event Name</label>
            <input type="text" id="event_name" class="form-control" >
            <!-- <input type="text" id="event_name" class="form-control" v-model="newEvent.event_name"> -->
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="start_date">Start Date</label>
                <input
                  type="date"
                  id="start_date"
                  class="form-control"
                  
                >
                <!-- v-model="newEvent.start_date" -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" id="end_date" class="form-control">
                <!-- <input type="date" id="end_date" class="form-control" v-model="newEvent.end_date"> -->
              </div>
            </div>
            <div class="col-md-6 mb-4">
            <!-- <div class="col-md-6 mb-4" v-if="addingMode"> -->
              <button class="btn btn-sm btn-primary" @click="addNewEvent">Save Event</button>
            </div>
            <!-- <template v-else>
              <div class="col-md-6 mb-4">
                <button class="btn btn-sm btn-success" @click="updateEvent">Update</button>
                <button class="btn btn-sm btn-danger" @click="deleteEvent">Delete</button>
                <button class="btn btn-sm btn-secondary" @click="addingMode = !addingMode">Cancel</button>
              </div>
            </template> -->
          </div>
        </form>
      </div>
      <div class="col-md-8">
        <FullCalendar :options="calendarOptions"/>
      </div>
    </div>
  </div>
</template>


<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import timeGridPlugin from '@fullcalendar/timegrid'


export default {
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
      calendarOptions: {
        // Plugins
        plugins: [ dayGridPlugin, interactionPlugin, timeGridPlugin ],
        // Botones del calendario
          headerToolbar: {
          left: 'dayGridMonth,timeGridWeek,timeGridDay',
          center: 'title',
          right: 'prevYear,prev,next,nextYear'
        },
        // Tamaño del calendario
        height: 750,
        // Por defecto ver el mes
        initialView: 'dayGridMonth',
        events: [
          { 
            title: 'Programar', 
            start: '2021-05-23', 
            end: '2021-06-24',
            daysOfWeek: ['4'],
            startTime: '18:00', endTime: '21:00',
            color: 'green'
          },
          // {
          // title: 'event with URL',
          // url: 'https://www.google.com/',
          // start: '2021-05-29'
          // },
        ],
        dayMaxEvents: true,
        weekends: true, 
        selectable: true,
        editable: false,
        eventTimeFormat: { // like '14:30:00'
        hour: '2-digit',
        minute: '2-digit',
        hour12: false
        },
        eventClick: function(info) {
            var eventObj = info.event;
            if (eventObj.url) {
            alert(
              'Clicked ' + eventObj.title + '.\n' +
              'Will open ' + eventObj.url + ' in a new tab'
            );
          }
        }
      }
    }
  },
  methods: {
    addNewEvent() {
      axios.post("/dashboard/calendario", {
          ...this.newEvent
        })
        .then(data => {
          this.getEvents(); // update our list of events
          this.resetForm(); // clear newEvent properties (e.g. title, start_date and end_date)
        })
        .catch(err =>
          console.log("Unable to add new event!", err.response.data)
        );
    }
  }
}
</script>

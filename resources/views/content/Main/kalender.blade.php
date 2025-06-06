@extends('layouts.mainLayout')

@section("css")
<link rel="stylesheet" href="{{asset("assets/css/main.css")}}">
@endsection

@section("content")
<div style="padding-top: 100px;width:100%;display:flex;justify-content:center;">  
        <div style="width: 90%" id="calendar" >

        </div>
</div>
@endsection

@section("js")
<script src="{{asset("assets/js/hero.js")}}"></script>
<script src="{{asset('assets/vendor/fullcalender/dist/index.global.min.js')}}"></script>
<script>
     headerStatus = true;
     hiddenFooter();
    document.addEventListener('DOMContentLoaded', function() {
       let data_jadwal;
       fetch("http://127.0.0.1:8000/api/jadwal")
       .then(response => response.json())
       .then(data => {
           var calendarEl = document.getElementById('calendar');
           var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                    left: '',  // Only show the title in the header
                    center: 'title',
                    right: ''       // No prev/next buttons
                    },
                  
                    eventTimeFormat: { // like '14:30:00'
                    hour: '2-digit',
                    minute: '2-digit',
                    meridiem: false
                },
               eventTimeFormat: { 
                   hour: '2-digit',
                   minute: '2-digit',
                   meridiem: false
               },
               events: data,
               locale: "id",
               eventClick: function(info) {
                   // Show alert with event title, time details, and description
                   let eventTime = info.event.start.toLocaleTimeString('id-ID', {
                       hour: '2-digit',
                       minute: '2-digit'
                   });
                   let eventDescription = info.event.extendedProps.description;
                   alert(`Event: ${info.event.title}\nTime: ${eventTime}\nDescription: ${eventDescription}`);
               }
           });
           calendar.getOption('locale');
           calendar.render();
       });
     });
  </script>
  
  
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

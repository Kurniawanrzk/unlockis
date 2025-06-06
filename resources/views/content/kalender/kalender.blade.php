@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/vendor/fullcalender/dist/index.global.min.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
       let data_jadwal;
       fetch("http://127.0.0.1:8000/api/jadwal")
       .then(response => response.json())
       .then(data => {
           var calendarEl = document.getElementById('calendar');
           var calendar = new FullCalendar.Calendar(calendarEl, {
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

@section('content')
<div class="row gy-4">  
    <div class="card">
        <div id="calendar" class="m-4">

        </div>
    </div>
</div>
@endsection

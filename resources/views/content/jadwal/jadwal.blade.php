@extends('layouts/blankLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
<script src="{{asset('assets/vendor/fullcalender/dist/index.global.min.js')}}"></script>
<script>
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
                events: data,
                locale:"id",
                
            });
            calendar.getOption('locale');
            calendar.render();
        })

      });
</script>
@endsection


@section('content')
<div class="d-flex">
    <div id='calendar' style="width:40%"></div>
    <div class="d-flex m-3 justify-content-center align-item-center"><div class="fc-daygrid-event-dot m-2"></div>: Dipesan</div>
</div>

@endsection

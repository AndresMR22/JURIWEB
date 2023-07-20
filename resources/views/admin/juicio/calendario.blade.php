@extends('home')
@section('pantalla')
    <div class="content-wrapper">
        <div class="container">
            <div id="calendar"></div>
        </div>
    </div>
    <input type="hidden" name="juicios" id="juicios" value="{{$juicios}}">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var citas = document.getElementById('juicios').value;
        citas = JSON.parse(citas);
        console.log(citas)
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth', locale:'es', headerToolbar:
          {
            left:'prev,next today',
            center:'title',
            right:'dayGridMonth,timeGridWeek,timeGridDay'
          },

          events: citas,
          dateClick:function(data)
          {
            // let fecha = data.dateStr
            // document.getElementById('fecha').value = fecha;
            // $('#modalEditar').modal('toggle');
            // $('#modalEditar').modal('show');
            // $('#modalEditar').modal('hide');

          },
          eventOverlap: function(stillEvent, movingEvent) {
    return stillEvent.allDay && movingEvent.allDay;
  }
        });
        calendar.render();
      });
    </script>
@endsection

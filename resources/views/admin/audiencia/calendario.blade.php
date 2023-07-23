@extends('home')
@section('pantalla')
    <div class="content-wrapper">
        <div class="container">
            <div id="calendar"></div>

            <div class="modal" id="modal-default">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                                <h4 class="modal-title ">Datos Audiencia</h4>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span onclick="cerrarModal()" aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="fila">
                            <div class="form-group">
                              <label for="inputName">Fecha</label>
                              <input readonly name="fecha" type="datetime-local" id="fecha"
                                  class="form-control">
                          </div>
                        </div>

                        <div class="fila">
                            <div class="form-group">
                              <label for="inputName">Observación</label>
                              <textarea readonly id="observacion" class="form-control"></textarea>
                          </div>
                        </div>

                        <div class="fila">
                            <div class="form-group">
                              <label for="inputName">Juicio</label>
                              <input readonly name="nro" type="text" id="nro"
                              class="form-control">
                          </div>
                        </div>

                        {{-- <div class="fila">
                            <div class="form-group">
                              <label for="inputName">Materia</label>
                              <input readonly name="materia" type="text" id="materia"
                              class="form-control">
                          </div>
                        </div> --}}

                        <div class="fila">
                            <div class="form-group">
                              <label for="inputName">Proceso</label>
                              <input readonly name="proceso" type="text" id="proceso"
                              class="form-control">
                          </div>
                        </div>

                        <div class="fila">
                            <div class="form-group">
                              <label for="inputName">Abogado</label>
                              <input readonly name="abogado" type="text" id="abogado"
                              class="form-control">
                          </div>
                        </div>

                        <div class="fila">
                            <div class="form-group">
                              <label for="inputName">Cliente</label>
                              <input readonly  name="cliente" type="text" id="cliente"
                              class="form-control">
                          </div>
                        </div>


                          </div>

                        </div>

                      </div>
                      <!-- /.modal-content -->
                    </div>

                <!-- /.modal-dialog -->

              </div>

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
          },
          eventOverlap: function(stillEvent, movingEvent) {
    return stillEvent.allDay && movingEvent.allDay;
  }
        });
        calendar.render();

        document.querySelectorAll('.fc-event-title').forEach((item,i)=>{
           item.addEventListener('click',verDetalle)
        })
      });

      var stateModal = true;

      function verDetalle(e)
      {
        $('#modal-default').show();
        console.log(e.target.textContent)
        let idJuicio = e.target.textContent;
        let id = idJuicio.substr(10)
        $.ajax({
                url: "{{ route('audiencia.verDetalle') }}",
                dataType: "json",
                data: {
                    id
                }
            }).done(function(res) {
                document.getElementById('fecha').value = res[1].fecha;
                document.getElementById('observacion').value = res[1].observacion;
                document.getElementById('nro').value = res[0].nro;
                // document.getElementById('materia').value = res[0].materia;
                document.getElementById('proceso').value = res[0].estadop;
                document.getElementById('abogado').value = res[2].nombres+' '+res[2].apellidos;
                document.getElementById('cliente').value = res[3].nombres+' '+res[3].apellidos;


                $('#modal-default').show();

            });
      }

      function cerrarModal()
      {
        $('#modal-default').hide();
      }

    </script>
@endsection

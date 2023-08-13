@extends('home')
@section('pantalla')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Seguimiento de juicio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
              {{-- <li class="breadcrumb-item active"></li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            {{-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> --}}


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row" style="display:flex; flex-direction:row; justify-content:center; align-items:center;">

                <div class="col-2">
                    <form method="POST" id="formReporteSeguimiento" action ="{{ route('juicio.generarReporteSeguimiento') }}">
                        @csrf
                        <a onclick="generarReporte()" class="btn btn-outline-danger" title="Generar reporte"><i class="fas fa-file-pdf"></i></a>
                        <input type="hidden" name="juicio_id" id="juicio_id" value="{{ $juicio->id }}">
                    </form>

                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                {{-- @if(count($juicios)>0) --}}
                <div class="col-sm-4 invoice-col">
                    {{-- <b>Invoice #007612</b><br> --}}
                    <br>
                    <b>Materia:</b><p id="valorMateria">{{ $juicio->materia }}</p><br>
                    <b>Proceso Judicial:</b><p id="valorProcesoJudicial">{{ $juicio->estadop }}</p><br>
                    <b>Fecha:</b> <p id="valorFecha">{{ $juicio->fecha }}</p><br>
                    <b>Abogado:</b> <p id="valorAbogado">{{ $abogado->nombres.' '.$abogado->apellidos }}</p>
                  </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <br>
                    <b>Cliente:</b> <p id="valorCliente">{{ $juicio->cliente->nombres. ' '.$juicio->cliente->apellidos }}</p><br>
                    <b>Unidad Judicial:</b><p id="valorUnidadJudicial">{{ $unidad->nombre }}</p><br>
                    <b>Estado de Juicio:</b> <p id="valorEstadoJuicio">{{ $juicio->estatus == 1 ? 'En proceso' : ($juicio->estatus == 2 ? 'Archivado' : 'Finalizado')  }}</p>
                </div>

                <div class="avances_by_juicio w-100">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>N°</th>
                          <th>Fecha</th>
                          <th>Observación</th>
                          <th>Archivo</th>
                        </tr>
                        </thead>
                        <tbody>

                          @foreach($archivos as $key => $arch)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $arch->fecha }}</td>
                          <td>{{ $arch->observacion }}</td>
                          <td>
                            @if (Str::endsWith($arch->url, 'pdf'))
                            <a href="{{ $arch->url }}" target="_blank" download class="btn btn-danger"><i class="fas fa-file-pdf"></i></a></td>
                            @elseif (Str::endsWith($arch->url, 'mp4'))
                            <a href="{{ $arch->url }}" target="_blank" download class="btn btn-info"><i class="fas fa-file-video"></i></a></td>
                            @else
                            <a href="{{ $arch->url }}" target="_blank" download class="btn btn-secondary"><i class="fas fa-image"></i></a></td>
                            @endif
                        </tr>

                        @endforeach
                      </table>
                </div>
                {{-- @else
                <div style="display:flex; justify-content:center; align-items:center; color:red;">
                    <p>No tienes juicios a los cuales darle seguimiento</p>
                </div>
                @endif --}}
                <!-- /.col -->
                {{-- <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div> --}}
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="title_avances my-2" id="sinavances"  style="visibility:hidden; display:flex;flex-direction:row; justify-content:center; align-items:center;margin:15px 0px;">
                <h4 style="font-weight: bold; color:orange;">Sin avances</h4>
              </div>

              <div class="container_avances" style="visibility: hidden">
                <div class="title_avances" style="display:flex;flex-direction:row; justify-content:center; align-items:center;margin:15px 0px;">
                  <h4 style="font-weight: bold;">Avances</h4>
                </div>

                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>N°</th>
                        <th>Fecha</th>
                        <th>Observación</th>
                        <th>Archivo</th>
                      </tr>
                      </thead>
                      <tbody id="body_avances">
                      <tr>
                        <td>1</td>
                        <td>Call of Duty</td>
                        <td>455-981-221</td>
                        <td>El snort testosterone trophy driving gloves handsome</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>



            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', e => {
    let select_juicio = document.getElementById('select_juicio').addEventListener('change',cargarAvances);
    });


    function generarReporte()
    {
        document.getElementById('formReporteSeguimiento').submit();
    }

    function cargarAvances(e)
    {
        let nroJuicio = e.target.value;
        document.getElementById('juicio_id').value = nroJuicio;

        $.ajax({
                url: "{{ route('juicio.avancesByJuicio') }}",
                dataType: "json",
                data:
                {
                  juicio_id:nroJuicio
                }
            }).done(function(res)
            {
                console.log(res[0].archivos)

                document.getElementById('valorMateria').textContent = res[0].juicio.materia
                document.getElementById('valorProcesoJudicial').textContent = res[0].juicio.estadop
                document.getElementById('valorFecha').textContent = res[0].juicio.fecha

                document.getElementById('valorCliente').textContent = res[0].cliente.nombres+' '+res[0].cliente.apellidos
                document.getElementById('valorUnidadJudicial').textContent = res[0].unidad.nombre
                document.getElementById('valorEstadoJuicio').textContent = res[0].juicio.estatus==1? 'En proceso' : (res[0].juicio.estatus==2 ? 'Archivado' : 'Finalizado')

                // <b>Materia:</b><p id="valorMateria">-</p><br>
                //     <b>Proceso Judicial:</b><p id="valorProcesoJudicial">-</p><br>
                //     <b>Fecha:</b> <p id="valorFecha">-</p>
                //   </div>
                // <!-- /.col -->
                // <div class="col-sm-4 invoice-col">
                //     <br>
                //     <b>Cliente:</b> <p id="valorCliente">-</p><br>
                //     <b>Unidad Judicial:</b><p id="valorUnidadJudicial">-</p><br>
                //     <b>Estado de Juicio:</b> <p id="valorEstadoJuicio">-</p>



                if(res[0].archivos.length>0)
                {
                    document.getElementById('sinavances').style.visibility='hidden';
                    document.querySelector('.container_avances').style.visibility=''

                    let body = document.getElementById('body_avances');

                    body.innerHTML = '';

                    res['0'].archivos.forEach((item,index)=>
                    {
                        let extension = item.url.substr(-4)
                        let btnArchivo = '';
                        if(extension == '.pdf')
                        {
                            btnArchivo = `<a class="btn btn-danger" href="${item.url}" download target="_blank"><i class="fas fa-file-pdf"></i></a>`
                        }else if (extension == '.gif' || extension == '.png' || extension == '.jpg' || extension== 'jpeg')
                        {
                            btnArchivo = `<a class="btn btn-secondary" href="${item.url}" download target="_blank"><i class="fas fa-image"></i></a>`
                        }else if(extension == '.mp4')
                        {
                            btnArchivo = `<a class="btn btn-info" href="${item.url}" download target="_blank"><i class="fas fa-file-video"></i></a>`
                        }

                        let fila =
                        `<tr>
                        <td>${index+1}</td>
                        <td>${item.fecha}</td>
                        <td>${item.observacion}</td>
                        <td>${btnArchivo}</td>
                      </tr>
                        `;
                        $(body).append(fila)
                    })
                }else
                {
                    // alert('no dispones de avances aún en este juicio')
                    document.getElementById('sinavances').style.visibility='';
                    document.querySelector('.container_avances').style.visibility='hidden'
                    let body = document.getElementById('body_avances');
                    body.innerHTML = '';
                }

            })
    }

  </script>
@endsection

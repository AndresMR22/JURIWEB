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
              <label>Número de juicio</label>
              <div class="row" style="display:flex; flex-direction:row; justify-content:center; align-items:center;">
                <div class="col-3">
                    {{-- <label>Número de juicio</label> --}}
                  <select name="juicio" class="form-control" id="select_juicio">
                    <option selected readonly>Seleccione un número de juicio</option>
                    @foreach($juicios as $juicio)
                    <option value="{{ $juicio->id }}">{{ $juicio->nro }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-2">
                    <a class="btn btn-outline-danger" title="Generar reporte"><i class="fas fa-file-pdf"></i></a>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                @if(count($juicios)>0)
                <div class="col-sm-4 invoice-col">
                    {{-- <b>Invoice #007612</b><br> --}}
                    <br>
                    <b>Materia:</b><p id="valorMateria">-</p><br>
                    <b>Proceso Judicial:</b><p id="valorProcesoJudicial">-</p><br>
                    <b>Fecha:</b> <p id="valorFecha">-</p>
                  </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <br>
                    <b>Cliente:</b> <p id="valorCliente">-</p><br>
                    <b>Unidad Judicial:</b><p id="valorUnidadJudicial">-</p><br>
                    <b>Estado de Juicio:</b> <p id="valorEstadoJuicio">-</p>
                </div>
                @else
                <div style="display:flex; justify-content:center; align-items:center; color:red;">
                    <p>No tienes juicios a los cuales darle seguimiento</p>
                </div>
                @endif
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

    function cargarAvances(e)
    {
        let nroJuicio = e.target.value
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
                document.getElementById('valorProcesoJudicial').textContent = res[0].juicio.nro
                document.getElementById('valorFecha').textContent = res[0].juicio.fecha

                document.getElementById('valorCliente').textContent = res[0].cliente.nombres+' '+res[0].cliente.apellidos
                document.getElementById('valorUnidadJudicial').textContent = res[0].unidad.nombre
                document.getElementById('valorEstadoJuicio').textContent = res[0].juicio.estadop

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
                        }else if (extension == '.gif' || extension == '.png' || extension == '.jpg' || extension== '.jpeg')
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
                    alert('no dispones de avances aún en este juicio')
                    document.querySelector('.container_avances').style.visibility='hidden'
                    let body = document.getElementById('body_avances');
                    body.innerHTML = '';
                }

            })
    }

  </script>
@endsection

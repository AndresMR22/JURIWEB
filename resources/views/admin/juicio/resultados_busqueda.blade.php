@extends('home')
@section('pantalla')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Resultados de búsqueda</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Resultados de búsqueda</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <style>
        .fila
        {
            display:flex;
            justify-content:space-between;
        }
    </style>

@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </ul>
</div>
@endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listado</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>N°</th>
                    <th>Materia</th>
                    <th>nro</th>
                    <th>Proceso</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if(!empty($juicios))
                    @foreach($juicios as $key => $res)
                  <tr>
                    @if(isset($res->materia))
                    <td>{{ $key+1 }}</td>
                    <td>{{ $res->materia }}</td>
                    <td>{{ $res->nro }}</td>
                    <td>{{ $res->estadop }}</td>
                    <td>{{ isset($res->cliente) ? $res->cliente->nombres.' '.$res->cliente->apellidos : '' }}</td>
                    <td>{{ $res->fecha }}</td>
                    <td>
                        <a class="btn btn-info" title = "Ver más" href="{{ route('juicio.avancesByJuicio2',$res->id) }}"><i class="fas fa-eye"></i></a>
                    </td>
                    @else
                    <h5>Sin resultados</h5>
                    @endif
                  </tr>


                  {{-- <div class="modal fade" id="modal-default{{$audiencia->id}}">
                    <form method="POST" id="form{{$audiencia->id}}" action="{{route('audiencia.update',$audiencia->id)}}">
                        @method('patch')
                        @csrf
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Editar audiencia</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <div class="fila">
                                <div class="form-group">
                                    <label for="inputName">Fecha y hora</label>
                                    <input name="fecha" type="datetime-local" min="{{ date('Y-m-d h:i') }}" id="fecha" value="{{$audiencia->fecha}}" class="form-control">
                                </div>
                            </div>
                            <div class="fila">
                                <div class="form-group">
                                    <label for="inputName">Observación</label>
                                    <input name="observacion" type="text" id="observacion" value="{{$audiencia->observacion}}" class="form-control">
                                </div>
                            </div>

                            <div class="fila">
                              <div class="form-group">
                                  <label for="inputName">Materia</label>
                                  <input name="materia" type="text" id="materia" value="{{$audiencia->juicio->materia}}" class="form-control">
                              </div>
                          </div>

                            <div class="fila">
                            <div class="form-group">
                                <label for="inputStatus">Juicio</label>
                                <select id="juicio" name="juicio_id" class="form-control custom-select">
                                  <option selected disabled>Seleccionar nro de juicio</option>
                                  @foreach($juicios as $juicio)
                                  <option value="{{$juicio->id}}" {{$audiencia->juicio_id == $juicio->id ? 'selected' : ''}}>{{$juicio->nro}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>

                    </form>
                    <!-- /.modal-dialog -->

                  </div> --}}




                  {{-- <div class="modal fade" id="modal-danger{{$audiencia->id}}">
                    <form id="formEliminar"{{$audiencia->id}} method="POST" action="{{route('audiencia.destroy',$audiencia->id)}}">
                      @method('delete')
                      @csrf
                      <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                          <div class="modal-header">
                            <h4 class="modal-title">Eliminar audiencia</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>¿Estás seguro de eliminar la audiencia?</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                            <button onclick="eliminar({{$audiencia->id}})" class="btn btn-outline-light">Si, eliminar</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                    </form>

                    <!-- /.modal-dialog -->

                  </div> --}}



                  @endforeach
                  @else
                  <h5>Sin resultados para la búsqueda</h5>
                  @endif
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



  <script>
    function eliminar(id)
    {
        let form = document.getElementById('formEliminar'+id);
        console.log(form)
        form.submit();
    }
  </script>
@endsection

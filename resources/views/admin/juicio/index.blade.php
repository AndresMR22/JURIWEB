@extends('home')
@section('pantalla')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Juicios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Juicios</li>
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
                {{-- "nro",
                "materia",
                "estadop",
                "fecha",
                "estatus",
                "abogado_id",
                "cliente_id",
                "unidad_juidicial_id", --}}
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Número</th>
                    <th>Materia</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Estatus</th>
                    <th>Abogado</th>
                    <th>Cliente</th>
                    {{-- <th>Unidad</th> --}}
                    @if(auth()->user()->hasRole('Abogado'))
                    <th>Acciones</th>
                    @endif
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($juicios as $key => $juicio)
                  <tr>
                    <td>{{$juicio->nro}}</td>
                    <td>{{$juicio->materia}}</td>
                    <td>{{$juicio->estadop}}</td>
                    <td>{{ date('d-m-y h:i', strtotime($juicio->fecha)) }}</td>
                    <td>{{ $juicio->estatus=='1' ? 'En proceso' :($juicio->estatus=='2' ? 'Archivado' :'Finalizado') }} <a title="Cambiar estado" href="{{ route('juicio.cambiarEstado',$juicio->id) }}" class="btn btn-{{ $juicio->estatus=='1' ? 'warning' :($juicio->estatus=='2' ? 'primary' :'success') }}"><i class="fas fa-arrow-right"></i></a></td>
                    <td>{{$juicio->abogado->nombres}}</td>
                    <td>{{$juicio->cliente->nombres}}</td>
                    {{-- <td>{{isset($juicio->unidad_judicial) ? 'si' : 'no'}}</td> --}}
                   @if(auth()->user()->hasRole('Abogado'))
                    <td >
                        <a data-toggle="modal" data-target="#modal-default{{$juicio->id}}" title="Editar" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a data-toggle="modal" data-target="#modal-danger{{$juicio->id}}" title="Eliminar" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                    @endif
                  </tr>

                  <div class="modal fade" id="modal-default{{$juicio->id}}">
                    <form method="POST" id="form{{$juicio->id}}" action="{{route('juicio.update',$juicio->id)}}">
                        @method('patch')
                        @csrf
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Editar juicio</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                                <div class="fila">
                                    <div class="form-group">
                                        <label for="inputName">Número</label>
                                        <input name="nro" type="text" id="nro" readonly value="{{$juicio->nro}}" class="form-control @error('nro') is-invalid @enderror">
                                        @error('nro')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                      </div>
                                    <div class="form-group">
                                         <label for="inputName">Estado</label>
                                         <input name="estadop" type="text" id="estadop" value="{{$juicio->estadop}}" class="form-control @error('estadop') is-invalid @enderror">
                                         @error('estadop')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                        </div>
                                </div>


                            <div class="fila">
                                <div class="form-group">
                                    <label for="inputName">Materia</label>
                                    <input name="materia" type="text" id="materia" value="{{$juicio->materia}}" class="form-control @error('materia') is-invalid @enderror">
                                    @error('materia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  </div>
                                <div class="form-group">
                                     <label for="inputName">Fecha</label>
                                     <input name="fecha" type="datetime-local" min={{ date('Y-m-d h:i') }} value="{{$juicio->fecha}}" class="form-control @error('fecha') is-invalid @enderror">
                                     @error('fecha')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                    </div>
                            </div>
                            <div class="fila">
                                {{-- <div class="form-group">
                                  <label for="inputName">Celular</label>
                                  <input name="celular" type="tel" id="celular" value="{{$juicio->celular}}" class="form-control">
                                </div> --}}
                              {{-- <div class="form-group">
                                  <label for="inputStatus">Abogado</label>
                                  <select id="abogado" name="abogado_id" class="form-control custom-select">
                                    <option selected disabled>Seleccionar abogado</option>
                                    @foreach($abogados as $abogado)
                                    <option value="{{$abogado->id}}" {{$juicio->abogado_id == $abogado->id ? 'selected' : ''}}>{{$abogado->nombres}}</option>
                                    @endforeach
                                  </select>
                                </div> --}}

                                <div class="form-group">
                                    <label for="inputStatus">Cliente</label>
                                    <select id="cliente" name="cliente_id" class="form-control custom-select @error('cliente_id') is-invalid @enderror">
                                      <option selected disabled>Seleccionar cliente</option>
                                      @foreach($clientes as $cliente)
                                      <option value="{{$cliente->id}}" {{$juicio->cliente_id == $cliente->id ? 'selected' : ''}}>{{$cliente->nombres}}</option>
                                      @endforeach
                                    </select>
                                    @error('cliente_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  </div>
                                
                            </div>
                            <div class="fila">
                                {{-- <div class="form-group">
                                  <label for="inputStatus">Empresa</label>
                                  <select id="empresa" name="empresa_id" class="form-control custom-select">
                                    <option selected disabled>Seleccionar empresa</option>
                                    @foreach($empresas as $empresa)
                                    <option value="{{$empresa->id}}" {{$juicio->empresa_id == $empresa->id ? 'selected' : ''}}>{{$empresa->razon}}</option>
                                    @endforeach
                                  </select>
                                </div> --}}
                               {{-- <div class="form-group">
                                 <label for="inputStatus">Estatus</label>
                                 <select id="estatus" name="estatus" class="form-control custom-select">
                                   <option selected disabled>Seleccionar estatus</option>
                                   <option value="1" {{$juicio->estatus == '1' ? 'selected' : ''}}>Estatus 1</option>
                                   <option value="2" {{$juicio->estatus == '2' ? 'selected' : ''}}>Estatus 2</option>
                                   <option value="3" {{$juicio->estatus == '3' ? 'selected' : ''}}>Estatus 3</option>
                                 </select>
                               </div> --}}
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

                  </div>


                  

                  <div class="modal fade" id="modal-danger{{$juicio->id}}">
                    <form id="formEliminar"{{$juicio->id}} method="POST" action="{{route('juicio.destroy',$juicio->id)}}">
                      @method('delete')
                      @csrf
                      <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                          <div class="modal-header">
                            <h4 class="modal-title">Eliminar juicio</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>¿Estás seguro de eliminar al juicio {{$juicio->materia}} ?</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                            <button onclick="eliminar({{$juicio->id}})" class="btn btn-outline-light">Si, eliminar</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                    </form>

                    <!-- /.modal-dialog -->

                  </div>

                  

                  @endforeach
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
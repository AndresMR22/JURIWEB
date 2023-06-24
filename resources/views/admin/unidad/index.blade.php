@extends('home')
@section('pantalla')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Unidades Judiciales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Unidades Judiciales</li>
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
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Dirección</th>
                    {{-- <th>Correo</th> --}}
                    
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($unidades as $key => $unidad)
                  <tr>
                    <td>{{$unidad->nombre}}</td>
                    <td>{{$unidad->ubicacion}}</td>
                    <td>{{$unidad->direccion}}</td>
                    {{-- <td>{{$unidad->correo}}</td> --}}
                    <td >
                    
                        <a data-toggle="modal" data-target="#modal-default{{$unidad->id}}" title="Editar" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a data-toggle="modal" data-target="#modal-danger{{$unidad->id}}" title="Eliminar" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>

                  <div class="modal fade" id="modal-default{{$unidad->id}}">
                    <form method="POST" id="form{{$unidad->id}}" action="{{route('unidad.update',$unidad->id)}}">
                        @method('patch')
                        @csrf
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Editar unidad</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <div class="fila">
                                <div class="form-group">
                                    <label for="inputName">Nombre</label>
                                    <input name="nombre" type="text" id="nombre" value="{{$unidad->nombre}}" class="form-control @error('nombre') is-invalid @enderror">
                                    @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="fila">
                                <div class="form-group">
                                    <label for="inputName">Ubicación</label>
                                    <input name="ubicacion" type="text" id="ubicacion" value="{{$unidad->ubicacion}}" class="form-control @error('ubicacion') is-invalid @enderror">
                                    @error('ubicacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                                  </div>
                            </div>

                            <div class="fila">
                                <div class="form-group">
                                  <label for="inputName">Dirección</label>
                                  <input name="direccion" type="text" id="direccion" value="{{$unidad->direccion}}" class="form-control @error('direccion') is-invalid @enderror">
                                  @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
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

                  </div>


                  

                  <div class="modal fade" id="modal-danger{{$unidad->id}}">
                    <form id="formEliminar"{{$unidad->id}} method="POST" action="{{route('unidad.destroy',$unidad->id)}}">
                      @method('delete')
                      @csrf
                      <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                          <div class="modal-header">
                            <h4 class="modal-title">Eliminar unidad</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>¿Estás seguro de eliminar la unidad {{$unidad->nombre}} ?</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                            <button onclick="eliminar({{$unidad->id}})" class="btn btn-outline-light">Si, eliminar</button>
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
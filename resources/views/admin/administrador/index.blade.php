@extends('home')
@section('pantalla')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administradores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Administradores</li>
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
                    <th>Correo</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($administradores as $key => $admin)
                  <tr>
                    <td>{{$admin->user->name}}</td>
                    <td>{{$admin->user->email}}</td>
                    <td >
                        <a data-toggle="modal" data-target="#modal-default{{$admin->id}}" title="Editar" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a data-toggle="modal" data-target="#modal-danger{{$admin->id}}" title="Eliminar" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>

                  <div class="modal fade" id="modal-default{{$admin->id}}">
                    <form method="POST" id="form{{$admin->id}}" action="{{route('administrador.update',$admin->id)}}">
                        @method('patch')
                        @csrf
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Editar Administrador</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="fila">
                                    <div class="form-group">
                                        <label for="inputName">Nombre de usuario</label>
                                        <input name="username" type="text" id="username" value="{{$admin->user->name}}" class="form-control @error('username') is-invalid @enderror">
                                        @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName">Contraseña</label>
                                        <div style="display:flex; justify-content:space-between; align-items:start;">
                                            <div style="width:100%; margin-right:5px;">
                                                <input type="password" name="password" id="password{{ $key }}" value="{{ old('password') }}"
                                                    style="margin-right:5px;" class="form-control @error('password') is-invalid @enderror">
                                                    @error('password')
                                                    <span  class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div>
                                                <a class="btn btn-info" onclick="verContrasenia({{ $key }})" title="Ver contraseña"><i class="fas fa-eye"></i></a>
                                            </div>
                                        </div>
                                      </div>
                                </div>

                                <div class="fila">
                                    <div class="form-group">
                                        <label for="inputName">Correo</label>
                                        <input name="correo" type="email" id="correo" value="{{$admin->user->email}}" class="form-control @error('correo') is-invalid @enderror">
                                        @error('correo')
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




                  <div class="modal fade" id="modal-danger{{$admin->id}}">
                    <form id="formEliminar"{{$admin->id}} method="POST" action="{{route('administrador.destroy',$admin->id)}}">
                      @method('delete')
                      @csrf
                      <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                          <div class="modal-header">
                            <h4 class="modal-title">Eliminar Administrador</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>¿Estás seguro de eliminar al administrador {{$admin->nombres}} {{$admin->apellidos}} ?</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                            <button onclick="eliminar({{$admin->id}})" class="btn btn-outline-light">Si, eliminar</button>
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

    var show = false;
    function verContrasenia(id)
    {
        if(show )
        {
            // console.log('pasando a pass', document.getElementById('password'))
            document.getElementById('password'+id).type = "password";
            show = false;
        }
        else
        {
            // console.log('pasando a texto', document.getElementById('password'))
            document.getElementById('password'+id).type = "text";
            show = true;
        }
    }

  </script>

@endsection

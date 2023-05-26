@extends('home')
@section('pantalla')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Clientes</li>
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

        /* .modal-content
        {
          height: 700px;;
        } */
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
                    <th>Nombres</th>
                    <th>Celular</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($clientes as $key => $cliente)
                  <tr>
                    <td>{{$cliente->nombres}} {{$cliente->apellidos}}</td>
                    <td>{{$cliente->celular}}</td>
                    <td>{{$cliente->direccion}}</td>
                    {{-- <td>{{$cliente->correo}}</td> --}}
                    <td >
                    
                        <a data-toggle="modal" data-target="#modal-default{{$cliente->id}}" title="Editar" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a data-toggle="modal" data-target="#modal-danger{{$cliente->id}}" title="Eliminar" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>

                  <div class="modal fade" id="modal-default{{$cliente->id}}">
                    <form method="POST" id="form{{$cliente->id}}" action="{{route('cliente.update',$cliente->id)}}">
                        @method('patch')
                        @csrf
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Editar cliente</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="fila">
                                <div class="form-group">
                                  <label for="inputName">Cedula</label>
                                  <input required name="cedula" type="text"
                                      onkeypress="return valideKey(event);"
                                      id="cedula" value="{{ $cliente->cedula }}"
                                      class="form-control @error('cedula') is-invalid @enderror">
                                  @error('cedula')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>
                              <div class="fila">
                                  <div class="form-group">
                                      <label for="inputName">Nombres</label>
                                      <input name="nombres" type="text" id="nombres" value="{{$cliente->nombres}}" class="form-control @error('nombres') is-invalid @enderror">
                                      @error('nombres')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                  </div>
                                  <div class="form-group">
                                       <label for="inputName">Apellidos</label>
                                       <input name="apellidos" type="text" id="apellidos" value="{{$cliente->apellidos}}" class="form-control @error('apellidos') is-invalid @enderror">
                                       @error('apellidos')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                                  </div>
                              </div>
                              <div class="fila">
                                  <div class="form-group">
                                    <label for="inputName">Dirección</label>
                                    <input name="direccion" type="text" id="direccion" value="{{$cliente->direccion}}" class="form-control @error('direccion') is-invalid @enderror">
                                    @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  </div>
  
                                  <div class="form-group">
                                      <label for="inputName">Fecha de nacimiento</label>
                                      <input name="fnacimiento" type="date" id="fnacimiento" value="{{$cliente->fnacimiento}}" class="form-control @error('fnacimiento') is-invalid @enderror">
                                      @error('fnacimiento')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                    </div>
                              </div>
                              <div class="fila">
                                  <div class="form-group">
                                    <label for="inputName">Celular</label>
                                    <input name="celular" type="tel" id="celular" value="{{$cliente->celular}}" class="form-control @error('celular') is-invalid @enderror">
                                    @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="inputStatus">Genero</label>
                                    <select id="genero" name="genero" class="form-control custom-select @error('genero') is-invalid @enderror">
                                      <option selected disabled>Seleccionar genero</option>
                                      <option value="M" {{$cliente->genero == 'M' ? 'selected' : ''}}>Masculino</option>
                                      <option value="F" {{$cliente->genero == 'F' ? 'selected' : ''}}>Femenino</option>
                                      <option value="I" {{$cliente->genero == 'I' ? 'selected' : ''}}>Indefinido</option>
                                    </select>
                                    @error('genero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  </div>
                              </div>
                              <div class="fila">
                                 
                                  <div class="form-group">
                                    <label for="inputStatus">Estado civil</label>
                                    <select id="estado_civil" name="estado_civil" class="form-control custom-select @error('estado_civil') is-invalid @enderror">
                                      <option selected disabled>Seleccionar estado</option>
                                      <option value="soltero" {{$cliente->estatus == 'soltero' ? 'selected' : ''}}>Soltero</option>
                                      <option value="casado" {{$cliente->estatus == 'casado' ? 'selected' : ''}}>Casado</option>
                                      <option value="divorciado" {{$cliente->estatus == 'divorciado' ? 'selected' : ''}}>Divorciado</option>
                                      <option value="viudo" {{$cliente->estatus == 'viudo' ? 'selected' : ''}}>Viudo</option>
                                    </select>
                                    @error('estado_civil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  </div>
                                  <div class="form-group">
                                      <label for="inputStatus">Estatus</label>
                                      <select id="estatus" name="estatus" class="form-control custom-select @error('estatus') is-invalid @enderror">
                                        <option selected disabled>Seleccionar estatus</option>
                                        <option value="1" {{$cliente->estatus == '1' ? 'selected' : ''}}>Estatus 1</option>
                                        <option value="2" {{$cliente->estatus == '2' ? 'selected' : ''}}>Estatus 2</option>
                                        <option value="3" {{$cliente->estatus == '3' ? 'selected' : ''}}>Estatus 3</option>
                                      </select>
                                      @error('estatus')
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
                            
                          </div>
                          <!-- /.modal-content -->
                        </div>
                      
                    </form>
                    <!-- /.modal-dialog -->

                  </div>


                  

                  <div class="modal fade" id="modal-danger{{$cliente->id}}">
                    <form id="formEliminar"{{$cliente->id}} method="POST" action="{{route('cliente.destroy',$cliente->id)}}">
                      @method('delete')
                      @csrf
                      <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                          <div class="modal-header">
                            <h4 class="modal-title">Eliminar cliente</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>¿Estás seguro de eliminar al cliente {{$cliente->nombres}} {{$cliente->apellidos}} ?</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                            <button onclick="eliminar({{$cliente->id}})" class="btn btn-outline-light">Si, eliminar</button>
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

    function valideKey(evt) {
            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 8) { // tecla de borrar
                return true;
            } else if (code >= 48 && code <= 57) { // rango de digitos
                return true;
            } else { // otros caracteres
                return false;
            }
        }

        document.addEventListener('DOMContentLoaded',function()
    {
      document.getElementById('cedula').addEventListener('change',validarCedula)
    })

 function validarCedula(e)
    {
      let inputCedula = document.getElementById('cedula');
      let imgEstadoVisto = document.getElementById('visto');
      let imgEstadoX = document.getElementById('x');
      //ajax
      $.ajax({
                url: "{{ route('abogado.validarCedula') }}",
                dataType: "json",
                data: 
                {
                  cedula:e.target.value
                }
            }).done(function(res)
            {
                if(!res[0])
                {
                  inputCedula.style.border='2px solid red';
                  imgEstadoX.style.display='';
                  imgEstadoX.style.visibility='';
                  imgEstadoVisto.style.display='none';
                  imgEstadoVisto.style.visibility='hidden';
                  cedulaValida=false;
                }else
                {
                  imgEstadoX.style.display='none';
                  imgEstadoX.style.visibility='hidden';
                  imgEstadoVisto.style.display='';
                  imgEstadoVisto.style.visibility='';
                  inputCedula.style.border='2px solid #2ECC71';
                  cedulaValida=true;
                }
                
                if(!res[1])
                {
                  inputCedula.style.border='2px solid red';
                  imgEstadoX.style.display='';
                  imgEstadoX.style.visibility='';
                  imgEstadoVisto.style.display='none';
                  imgEstadoVisto.style.visibility='hidden';
                  cedulaValida=false;
                }else{
                  imgEstadoX.style.display='none';
                  imgEstadoX.style.visibility='hidden';
                  imgEstadoVisto.style.display='';
                  imgEstadoVisto.style.visibility='';
                  inputCedula.style.border='2px solid #2ECC71';
                  cedulaValida=true;
                }
            })

    }
  </script>
@endsection
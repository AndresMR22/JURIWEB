@extends('home')
@section('pantalla')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Abogados</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Abogados</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <style>
            .fila {
                display: flex;
                justify-content: space-between;
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
                                            <th>Cedula</th>
                                            <th>Nombres</th>
                                            <th>Celular</th>
                                            <th>Dirección</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($abogados as $key => $abogado)
                                            <tr>
                                                <td>{{ $abogado->cedula }}</td>
                                                <td>{{ $abogado->nombres }} {{ $abogado->apellidos }}</td>
                                                <td>{{ $abogado->celular }}</td>
                                                <td>{{ $abogado->direccion }}</td>
                                                <td>{{ $abogado->estatus == '1' ? 'Activo' : 'Inactivo' }}</td>
                                                {{-- <td>{{$abogado->correo}}</td> --}}
                                                <td>

                                                    <a data-toggle="modal" data-target="#modal-default{{ $abogado->id }}"
                                                        title="Editar" class="btn btn-warning"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a data-toggle="modal" data-target="#modal-danger{{ $abogado->id }}"
                                                        title="Eliminar" class="btn btn-danger"><i
                                                            class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="modal-default{{ $abogado->id }}">
                                                <form method="POST" id="form{{ $abogado->id }}"
                                                    action="{{ route('abogado.update', $abogado->id) }}">
                                                    @method('patch')
                                                    @csrf
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Editar Abogado</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="fila">

                                                                    <div class="form-group">
                                                                        <label for="inputName">Nombres</label>
                                                                        <input required name="nombres" type="text"
                                                                            id="nombres" value="{{ $abogado->nombres }}"
                                                                            class="form-control @error('nombres') is-invalid @enderror">
                                                                        @error('nombres')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputName">Apellidos</label>
                                                                        <input required name="apellidos" type="text"
                                                                            id="apellidos"
                                                                            value="{{ $abogado->apellidos }}"
                                                                            class="form-control @error('apellidos') is-invalid @enderror">
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
                                                                        <input required name="direccion" type="text"
                                                                            id="direccion"
                                                                            value="{{ $abogado->direccion }}"
                                                                            class="form-control @error('direccion') is-invalid @enderror">
                                                                        @error('direccion')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputName">Cedula</label>
                                                                        <input required name="cedula" type="text"
                                                                            onkeypress="return valideKey(event);"
                                                                            id="cedula" value="{{ $abogado->cedula }}"
                                                                            class="form-control @error('cedula') is-invalid @enderror">
                                                                        @error('cedula')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    {{-- <div class="form-group">
                                  <label for="inputName">Correo</label>
                                  <input name="correo" type="mail" id="correo" value="{{$abogado->correo}}" class="form-control">
                                </div> --}}
                                                                </div>
                                                                <div class="fila">
                                                                    <div class="form-group">
                                                                        <label for="inputName">Celular</label>
                                                                        <input required name="celular" type="tel"
                                                                            id="celular" value="{{ $abogado->celular }}"
                                                                            class="form-control @error('celular') is-invalid @enderror">
                                                                        @error('celular')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputStatus">Genero</label>
                                                                        <select required id="genero" name="genero"
                                                                            class="form-control custom-select @error('genero') is-invalid @enderror">
                                                                            <option selected disabled>Seleccionar genero
                                                                            </option>
                                                                            <option value="M"
                                                                                {{ $abogado->genero == 'M' ? 'selected' : '' }}>
                                                                                Masculino</option>
                                                                            <option value="F"
                                                                                {{ $abogado->genero == 'F' ? 'selected' : '' }}>
                                                                                Femenino</option>
                                                                            <option value="I"
                                                                                {{ $abogado->genero == 'I' ? 'selected' : '' }}>
                                                                                Indefinido</option>
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
                                                                        <label for="inputStatus">Empresa</label>
                                                                        <select required id="empresa" name="empresa_id"
                                                                            class="form-control custom-select @error('empresa_id') is-invalid @enderror">
                                                                            <option selected disabled>Seleccionar empresa
                                                                            </option>
                                                                            @foreach ($empresas as $empresa)
                                                                                <option value="{{ $empresa->id }}"
                                                                                    {{ $abogado->empresa_id == $empresa->id ? 'selected' : '' }}>
                                                                                    {{ $empresa->razon }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('empresa_id')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputStatus">Estatus</label>
                                                                        <select required id="estatus" name="estatus"
                                                                            class="form-control custom-select @error('estatus') is-invalid @enderror">
                                                                            <option selected disabled>Seleccionar estatus
                                                                            </option>
                                                                            <option value="1"
                                                                                {{ $abogado->estatus == '1' ? 'selected' : '' }}>
                                                                                Estatus 1</option>
                                                                            <option value="2"
                                                                                {{ $abogado->estatus == '2' ? 'selected' : '' }}>
                                                                                Estatus 2</option>
                                                                            <option value="3"
                                                                                {{ $abogado->estatus == '3' ? 'selected' : '' }}>
                                                                                Estatus 3</option>
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
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-primary">Guardar
                                                                    cambios</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>

                                                </form>
                                                <!-- /.modal-dialog -->

                                            </div>




                                            <div class="modal fade" id="modal-danger{{ $abogado->id }}">
                                                <form id="formEliminar"{{ $abogado->id }} method="POST"
                                                    action="{{ route('abogado.destroy', $abogado->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-danger">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Eliminar Abogado</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Estás seguro de eliminar al abogado
                                                                    {{ $abogado->nombres }} {{ $abogado->apellidos }} ?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-outline-light"
                                                                    data-dismiss="modal">No</button>
                                                                <button onclick="eliminar({{ $abogado->id }})"
                                                                    class="btn btn-outline-light">Si, eliminar</button>
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
        function eliminar(id) {
            let form = document.getElementById('formEliminar' + id);
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
    </script>
@endsection

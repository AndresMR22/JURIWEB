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
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Juicios</li>
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
                                <div class="botones_filtros">
                                    <a class="btn btn-warning" href="{{ route('juicio.juicioByStatus','P') }}" title="En proceso">P</a>
                                    <a class="btn btn-primary" href="{{ route('juicio.juicioByStatus','A') }}" title="Archivado">A</a>
                                    <a class="btn btn-success" href="{{ route('juicio.juicioByStatus','F') }}" title="Finalizado">F</a>

                                </div>
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
                                            @if (auth()->user()->hasRole('Abogado'))
                                                <th>Estatus</th>
                                                <th>Avance</th>
                                            @endif
                                            <th>Abogado</th>
                                            <th>Cliente</th>
                                            {{-- <th>Unidad</th> --}}
                                            @if (auth()->user()->hasRole('Abogado'))
                                                <th>Acciones</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($juicios as $key => $juicio)
                                        <tr>
                                            <td>{{ $juicio->nro }}</td>
                                            <td>{{ $juicio->materia }}</td>
                                            <td>{{ $juicio->estadop }}</td>
                                            <td>{{ date('d-m-y h:i', strtotime($juicio->fecha)) }}</td>
                                            @if (auth()->user()->hasRole('Abogado'))
                                                <td>
                                                    <a title="{{ $juicio->estatus == '1' ? 'En proceso' : ($juicio->estatus == '2' ? 'Archivado' : 'Finalizado') }}"
                                                        href="{{ route('juicio.cambiarEstado', $juicio->id) }}"
                                                        class="btn btn-{{ $juicio->estatus == '1' ? 'warning' : ($juicio->estatus == '2' ? 'primary' : 'success') }}"><i
                                                            class="fas fa-arrow-right"></i></a>

                                                            @if($juicio->estatus != '3')
                                                    <a title="Finalizar Juicio"
                                                        href="{{ route('juicio.finalizarJuicio', $juicio->id) }}"
                                                        class="btn btn-danger"><i
                                                            class="fas fa-arrow-down"></i></a>
                                                        @endif
                                                </td>
                                                <td>
                                                    @if($juicio->estatus != '3')
                                                    <a class="btn btn-info" title="Abrir avances" data-toggle="modal"
                                                        data-target="#modal-avance{{ $juicio->id }}"><i
                                                            class="fas fa-file"></i></a>
                                                    @endif

                                                        </td>
                                            @endif
                                            <td>{{ $juicio->abogado->nombres }}</td>
                                            <td>{{ $juicio->cliente->nombres }}</td>
                                            {{-- <td>{{isset($juicio->unidad_judicial) ? 'si' : 'no'}}</td> --}}
                                            @if($juicio->estatus != '3')
                                            @if (auth()->user()->hasRole('Abogado'))
                                                <td>
                                                    <a data-toggle="modal"
                                                        data-target="#modal-default{{ $juicio->id }}" title="Editar"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <a data-toggle="modal"
                                                        data-target="#modal-eliminar{{ $juicio->id }}" title="Eliminar"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            @endif
                                            @endif
                                        </tr>

                                            <div class="modal fade" id="modal-eliminar{{ $juicio->id }}">
                                                <form id="formEliminar"{{ $juicio->id }} method="POST"
                                                    action="{{ route('juicio.destroy', $juicio->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-danger">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Eliminar juicio</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Estás seguro de eliminar el juicio ?</p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-outline-light"
                                                                    data-dismiss="modal">No</button>
                                                                <button onclick="eliminar({{ $juicio->id }})"
                                                                    class="btn btn-outline-light">Si, eliminar</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                </form>

                                                <!-- /.modal-dialog -->

                                            </div>

                                            {{-- MODAL PARA EDITAR JUICIO --}}
                                            <div class="modal fade" id="modal-default{{ $juicio->id }}">
                                                <form method="POST" id="form{{ $juicio->id }}"
                                                    action="{{ route('juicio.update', $juicio->id) }}">
                                                    @method('patch')
                                                    @csrf
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Editar juicio</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="fila">
                                                                    <div class="form-group">
                                                                        <label for="inputName">Número</label>
                                                                        <input name="nro" type="text" id="nro"
                                                                            readonly value="{{ $juicio->nro }}"
                                                                            class="form-control @error('nro') is-invalid @enderror">
                                                                        @error('nro')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputName">Estado</label>
                                                                        <input name="estadop" type="text" id="estadop"
                                                                            value="{{ $juicio->estadop }}"
                                                                            class="form-control @error('estadop') is-invalid @enderror">
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
                                                                        <input name="materia" type="text" id="materia"
                                                                            value="{{ $juicio->materia }}"
                                                                            class="form-control @error('materia') is-invalid @enderror">
                                                                        @error('materia')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputName">Fecha</label>
                                                                        <input name="fecha" type="datetime-local"
                                                                            min={{ date('Y-m-d h:i') }}
                                                                            value="{{ $juicio->fecha }}"
                                                                            class="form-control @error('fecha') is-invalid @enderror">
                                                                        @error('fecha')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="fila">


                                                                    <div class="form-group">
                                                                        <label for="inputStatus">Cliente</label>
                                                                        <select id="cliente" name="cliente_id"
                                                                            class="form-control custom-select @error('cliente_id') is-invalid @enderror">
                                                                            <option selected disabled>Seleccionar cliente
                                                                            </option>
                                                                            @foreach ($clientes as $cliente)
                                                                                <option value="{{ $cliente->id }}"
                                                                                    {{ $juicio->cliente_id == $cliente->id ? 'selected' : '' }}>
                                                                                    {{ $cliente->nombres }}</option>
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

                                            {{-- MODAL PARA AVANCES --}}
                                            <div class="modal fade" id="modal-avance{{ $juicio->id }}">
                                                <form method="POST" id="formAvance{{ $juicio->id }}"
                                                    action="{{ route('juicio.cargarAvance') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Avances</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="fila">
                                                                    <div class="form-group">
                                                                        <label for="inputName">Cargar avance</label>
                                                                        <input name="file" type="file"
                                                                            id="file" value="{{ old('file') }}"
                                                                            class="form-control @error('file') is-invalid @enderror">
                                                                        @error('file')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="fila">
                                                                    <div class="form-group">
                                                                        <label for="inputName">Fecha</label>
                                                                        <input name="fecha" type="date"
                                                                            id="fecha" value="{{ old('fecha') }}"
                                                                            class="form-control @error('fecha') is-invalid @enderror">
                                                                        @error('fecha')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="fila">
                                                                    <div class="form-group">
                                                                        <label for="inputName">Observación</label>
                                                                        <textarea class="form-control" name="observacion" id="observacion">{{ old('observacion') }}</textarea>
                                                                        @error('observacion')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" name="juicio_id"
                                                                    value="{{ $juicio->id }}">

                                                                <div class="titulo_archivos_subidos">
                                                                    <h5 class="text-center">Archivos subidos</h5>
                                                                </div>
                                                                <div class="archivos "
                                                                    style="display:flex; flex-wrap:wrap; flex-direction:row; gap:15px; margin:20px 0px; justify-content:center; align-items:center;">
                                                                    @foreach ($juicio->archivos as $archivo)
                                                                        <div class="archivo">
                                                                            @if (Str::endsWith($archivo->url, 'mp4'))
                                                                                <video title="{{ $archivo->observacion }}"
                                                                                    src="{{ $archivo->url }}"
                                                                                    style="max-width: 100px;" autoplay
                                                                                    muted loop controls></video>
                                                                            @elseif(Str::endsWith($archivo->url, 'pdf'))
                                                                                <a class="btn btn-danger"
                                                                                    href="{{ $archivo->url }}"
                                                                                    target="_blank" download><i
                                                                                        class="fas fa-file-pdf"></i></a>
                                                                            @elseif(Str::endsWith($archivo->url, 'temp'))
                                                                                <a class="btn btn-info"
                                                                                    href="{{ $archivo->url }}"
                                                                                    target="_blank" download><i
                                                                                        class="fa-solid fa-file-word"></i></a>
                                                                            @else
                                                                                <img title="observacion"
                                                                                    style="max-width: 100px;"
                                                                                    src="{{ $archivo->url }}"
                                                                                    alt="archivo">
                                                                            @endif
                                                                        </div>
                                                                    @endforeach

                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <a onclick="subir({{ $juicio->id }})"
                                                                        class="btn btn-primary">Subir</a>
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
            form.submit();
        }

        function subir(id) {
            let form = document.getElementById('formAvance' + id);
            form.submit();
        }
    </script>
@endsection

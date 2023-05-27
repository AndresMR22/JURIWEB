@extends('home')
@section('pantalla')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Agregar juicio</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Agregar juicio</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form method="POST" action="{{ route('juicio.store') }}">
            @csrf
            <section class="content">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Juicio</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="inputName">Número</label>
                                    <input name="nro" type="text" id="nro" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Materia</label>
                                    <input name="materia" type="text" id="materia" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Estado</label>
                                    <input name="estadop" type="text" id="estadop" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Fecha</label>
                                    <input name="fecha" min="{{date('Y-m-d')}}" type="date" id="fecha" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Estatus</label>
                                    <select id="estatus" name="estatus" class="form-control custom-select">
                                        <option selected disabled>Seleccionar estatus</option>
                                        <option value="1">Estatus 1</option>
                                        <option value="2">Estatus 2</option>
                                        <option value="3">Estatus 3</option>
                                    </select>
                                </div>
                                
                                @if(isset($esAbogado) && $esAbogado)
                            
                                <input type="hidden" name="abogado_id" value="{{ $abogados->id }}">
                                @else
                                <div class="form-group">
                                    <label for="inputStatus">Abogado</label>
                                    <select id="abogado_id" name="abogado_id" class="form-control custom-select">
                                        <option selected disabled>Seleccionar abogado</option>
                                        @foreach ($abogados as $abogado)
                                            <option value="{{ $abogado->id }}">{{ $abogado->nombres }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                <div class="form-group">
                                    <label for="inputStatus">Cliente</label>
                                    <select id="cliente_id" name="cliente_id" class="form-control custom-select">
                                        <option selected disabled>Seleccionar cliente</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">{{ $cliente->nombres }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Unidad Judicial</label>
                                    <select id="unidad_id" name="unidad_id" class="form-control custom-select">
                                        <option selected disabled>Seleccionar unidad judicial</option>
                                        @foreach ($unidades as $unidad)
                                            <option value="{{ $unidad->id }}">{{ $unidad->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center my-2" style="gap:20px;">
                        <a href="#" class="btn btn-secondary">Cancelar</a>
                        <input type="submit" value="Crear" class="btn btn-success float-right">
                    </div>
                </div>
            </section>
        </form>
        <!-- /.content -->
    </div>
@endsection

@extends('home')
@section('pantalla')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Agregar administrador</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Agregar administrador</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('administrador.store') }}">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Registrar Administrador</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="inputName">Nombre de usuario</label>
                                    <input type="text" value="{{ old('username') }}" name="username" id="username"
                                        class="form-control @error('username') is-invalid @enderror">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Correo electrónico</label>
                                    <input type="mail" value="{{ old('email') }}" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Contraseña</label>
                                    <div style="display:flex; justify-content:space-between; align-items:start;">
                                        <div style="width:100%; margin-right:5px;">
                                            <input type="password" name="password" id="password" value="{{ old('password') }}"
                                                style="margin-right:5px;" class="form-control @error('password') is-invalid @enderror">
                                                @error('password')
                                                <span  class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div>
                                            <a class="btn btn-info" onclick="verContrasenia()" title="Ver contraseña"><i class="fas fa-eye"></i></a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex justify-content-center my-2" style="gap:20px;">
                        <input type="submit" value="Crear" class="btn btn-success float-right">
                    </div>
                </div>
            </form>


        </section>
    </div>

    <script>
        var show = false;
        function verContrasenia()
        {
            if(show)
            {
                document.getElementById('password').type = "password";
                show = false;
            }
            else
            {
                document.getElementById('password').type = "text";
                show = true;
            }
        }
    </script>
@endsection

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
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Agregar administrador</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
    <form method="POST" action="{{route('administrador.store')}}">
      @csrf
    <div class="row d-flex justify-content-center">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Registrar Administrador</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">

            <div class="form-group">
              <label for="inputName">Nombre de usuario</label>
              <input type="text" name="username" id="username" class="form-control">
            </div>

            <div class="form-group">
              <label for="inputName">Correo electrónico</label>
              <input type="mail" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
              <label for="inputName">Contraseña</label>
              <input type="password" name="password" id="password" class="form-control">
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
@endsection
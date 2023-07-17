@extends('home')
@section('pantalla')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Búsqueda avanzada</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Búsqueda avanzada</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <form method="POST" action="{{ route('juicio.buscarSeguimiento') }}">
    @csrf
       <section class="content">
         <div class="row d-flex justify-content-center">
           <div class="col-md-6">
             <div class="card card-primary">
               <div class="card-header">
                 <h3 class="card-title">Búsqueda</h3>

                 <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                     <i class="fas fa-minus"></i>
                   </button>
                 </div>
               </div>
               <div class="card-body">
                 <div class="form-group">
                   <label for="inputName">Cédula del cliente</label>
                   <input name="cedula" placeholder="Ejemplo: 2100463187"  type="text" id="cedula" class="form-control @error('cedula') is-invalid @enderror">
                   @error('cedula')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
                 </div>
                 <div class="form-group">
                    <label for="inputName">Nombres y Apellidos</label>
                    <input name="nombres" placeholder="Ejemplo: Junior Moreira" type="text" id="celular" class="form-control @error('celular') is-invalid @enderror">
                    @error('celular')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="form-group">
                    <label for="inputName">Número de juicio</label>
                    <input name="nro_juicio" placeholder="Ejemplo: JN-1"  type="text" id="nro_juicio" class="form-control @error('nro_juicio') is-invalid @enderror">
                    @error('nro_juicio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
               </div>
               <!-- /.card-body -->
             </div>
             <!-- /.card -->
           </div>

         </div>
         <div class="row">
           <div class="col-12 d-flex justify-content-center my-2" style="gap:20px;">
             <input type="submit" value="Crear" class="btn btn-success float-right">
           </div>
         </div>
       </section>
    </form>
    <!-- /.content -->
  </div>
@endsection

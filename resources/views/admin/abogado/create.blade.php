@extends('home')
@section('pantalla')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar abogado</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Agregar abogado</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
   <form method="POST" action="{{route('abogado.store')}}">
    @csrf
       <section class="content">
         <div class="row d-flex justify-content-center">
           <div class="col-md-6">
             <div class="card card-primary">
               <div class="card-header">
                 <h3 class="card-title">Abogado</h3>
   
                 <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                     <i class="fas fa-minus"></i>
                   </button>
                 </div>
               </div>
               <div class="card-body">
                 <div class="form-group">
                   <label for="inputName">Nombres</label>
                   <input name="nombres" type="text" id="nombres" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="inputName">Apellidos</label>
                    <input name="apellidos" type="text" id="apellidos" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputName">Dirección</label>
                    <input name="direccion" type="text" id="direccion" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputName">Correo</label>
                    <input name="correo" type="mail" id="correo" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputName">Celular</label>
                    <input name="celular" type="tel" id="celular" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Genero</label>
                    <select id="genero" name="genero" class="form-control custom-select">
                      <option selected disabled>Seleccionar genero</option>
                      <option value="M">Masculino</option>
                      <option value="F">Femenino</option>
                      <option value="I">Indefinido</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Empresa</label>
                    <select id="empresa" name="empresa_id" class="form-control custom-select">
                      <option selected disabled>Seleccionar empresa</option>
                      @foreach($empresas as $empresa)
                      <option value="{{$empresa->id}}">{{$empresa->razon}}</option>
                      @endforeach
                    </select>
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
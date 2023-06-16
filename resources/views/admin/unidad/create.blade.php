@extends('home')
@section('pantalla')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar Unidad Judicial</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Agregar Unidad Judicial</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
   <form method="POST" action="{{route('unidad.store')}}">
    @csrf
       <section class="content">
         <div class="row d-flex justify-content-center">
           <div class="col-md-6">
             <div class="card card-primary">
               <div class="card-header">
                 <h3 class="card-title">Unidad Judicial</h3>
   
                 <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                     <i class="fas fa-minus"></i>
                   </button>
                 </div>
               </div>
               <div class="card-body">
                 <div class="form-group">
                   <label for="inputName">Nombre</label>
                   <input name="nombre" type="text" id="nombre" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="inputName">Ubicación</label>
                    <input name="ubicacion" type="text" id="ubicacion" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputName">Dirección</label>
                    <input name="direccion" type="text" id="direccion" class="form-control">
                  </div>
                  
                 
               </div>
               <!-- /.card-body -->
             </div>
             <!-- /.card -->
           </div>
           
         </div>
         <div class="row">
           <div class="col-12 d-flex justify-content-center my-2" style="gap:20px;">
             {{-- <a href="#" class="btn btn-secondary">Cancelar</a> --}}
             <input type="submit" value="Crear" class="btn btn-success float-right">
           </div>
         </div>
       </section>
    </form> 
    <!-- /.content -->
  </div>
@endsection
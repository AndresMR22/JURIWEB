@extends('home')
@section('pantalla')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar audiencia</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Agregar audiencia</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
   <form method="POST" action="{{route('audiencia.store')}}">
    @csrf
       <section class="content">
         <div class="row d-flex justify-content-center">
           <div class="col-md-6">
             <div class="card card-primary">
               <div class="card-header">
                 <h3 class="card-title">Audiencia</h3>
   
                 <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                     <i class="fas fa-minus"></i>
                   </button>
                 </div>
               </div>
               <div class="card-body">
                 <div class="form-group">
                   <label for="inputName">Fecha y hora</label>
                   <input name="fechahora" min="<?=date('Y-m-d\Th:i')?>" type="datetime-local" id="fecha" class="form-control @error('fechahora') is-invalid @enderror">
                   @error('fechahora')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
                 </div>
                 <div class="form-group">
                   <label for="inputDescription">Observación</label>
                   <textarea name="observacion" id="inputDescription" class="form-control @error('observacion') is-invalid @enderror" rows="4"></textarea>
                   @error('observacion')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
                 </div>
                 <div class="form-group">
                   <label for="inputStatus">Juicio</label>
                   <select id="inputStatus" name="juicio_id" class="form-control custom-select @error('juicio_id') is-invalid @enderror">
                     <option selected disabled>Seleccionar juicio</option>
                     @foreach($juicios as $juicio)
                     <option value="{{ $juicio->id }}">{{ $juicio->nro }}</option>
                     @endforeach
                   </select>
                   @error('juicio_id')
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
@extends('home')
@section('pantalla')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pefil Abogado</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Perfil Abogado</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <form method="POST" action="{{route('abogado.editarPerfil')}}">
    @csrf
       <section class="content">
         <div class="row d-flex justify-content-center">
           <div class="col-md-6">
             <div class="card card-primary">
               <div class="card-header">
                 <h3 class="card-title">Contraseña del Abogado</h3>

                 <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                     <i class="fas fa-minus"></i>
                   </button>
                 </div>
               </div>
               <div class="card-body">
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
                 <div class="form-group">
                    <label for="inputName">Confirmar Contraseña</label>
                    <div style="display:flex; justify-content:space-between; align-items:start;">
                        <div style="width:100%; margin-right:5px;">
                            <input type="password" name="password_confirm" id="password_confirm" value="{{ old('password_confirm') }}"
                                style="margin-right:5px;" class="form-control @error('password_confirm') is-invalid @enderror">
                                @error('password_confirm')
                                <span  class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <a class="btn btn-info" onclick="verContraseniaConfirm()" title="Ver contraseña de confirmación"><i class="fas fa-eye"></i></a>
                        </div>
                    </div>
                  </div>
               </div>
               <!-- /.card-body -->
             </div>
             <!-- /.card -->
           </div>

         </div>
         <div class="row">
           <div class="col-12 d-flex justify-content-center my-2" style="gap:20px;">
             <input type="submit" value="Actualizar" class="btn btn-success float-right">
           </div>
         </div>
       </section>
    </form>
    <!-- /.content -->
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
    var show2 = false;
    function verContraseniaConfirm()
    {
        if(show2)
        {
            document.getElementById('password_confirm').type = "password";
            show2 = false;
        }
        else
        {
            document.getElementById('password_confirm').type = "text";
            show2 = true;
        }
    }
</script>
@endsection

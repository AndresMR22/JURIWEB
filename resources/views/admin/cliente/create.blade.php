@extends('home')
@section('pantalla')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar cliente</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Agregar cliente</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
   <form  id="formCrearCliente" method="POST" action="{{route('cliente.store')}}">
    @csrf
       <section class="content">
         <div class="row d-flex justify-content-center">
           <div class="col-md-6">
             <div class="card card-primary">
               <div class="card-header">
                 <h3 class="card-title">Cliente</h3>
   
                 <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                     <i class="fas fa-minus"></i>
                   </button>
                 </div>
               </div>
               <div class="card-body">

                <div class="form-group" style="display:flex; justify-content:flex-start; align-items:center;">
                  <div style="flex:1 0 100px;">
                    <label for="inputName">Cedula</label>
                    <input name="cedula" onkeypress="return valideKey(event);" type="text" id="cedula" value="{{ old('cedula') }}" class="form-control @error('cedula') is-invalid @enderror" minlength="10" maxlength="10">
                    
                    @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                  </div>
                  <div style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
                    <label for="inputName">Estado</label>
                    <div>

                      <img id="visto" style="visibility: hidden;"  src="{{ asset('assets/dist/img/visto.png') }}">
                      <img id="x" style="visibility: hidden; display:none;" src="{{ asset('assets/dist/img/x.png') }}">
                    </div>
                    
                  </div>
                </div>

                 <div class="form-group">
                   <label for="inputName">Nombres</label>
                   <input name="nombres" type="text" id="nombres" class="form-control @error('nombres') is-invalid @enderror">
                   @error('nombres')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
                 </div>
                 <div class="form-group">
                    <label for="inputName">Apellidos</label>
                    <input name="apellidos" type="text" id="apellidos" class="form-control @error('apellidos') is-invalid @enderror">
                    @error('apellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="form-group">
                    <label for="inputName">Celular</label>
                    <input name="celular" type="tel" id="celular" class="form-control @error('celular') is-invalid @enderror">
                    @error('celular')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="form-group">
                    <label for="inputName">Dirección</label>
                    <input name="direccion" type="text" id="direccion" class="form-control @error('direccion') is-invalid @enderror">
                    @error('direccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Genero</label>
                    <select id="genero" name="genero" class="form-control custom-select @error('genero') is-invalid @enderror">
                      <option selected disabled>Seleccionar genero</option>
                      <option value="M">Masculino</option>
                      <option value="F">Femenino</option>
                      <option value="I">Indefinido</option>
                    </select>
                    @error('genero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>

                  <div class="form-group">
                    <label for="inputName">Fecha de nacimiento</label>
                    <input name="fnacimiento" max="{{date('Y-m-d')}}" type="date" id="fnacimiento" class="form-control @error('fnacimiento') is-invalid @enderror">
                    @error('fnacimiento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>

                  <div class="form-group">
                    <label for="inputName">Correo</label>
                    <input name="correo" type="email" id="correo" class="form-control @error('correo') is-invalid @enderror">
                    @error('correo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                 
                
                 
                 <div class="form-group">
                   <label for="inputStatus">Estado civil</label>
                   <select id="estado_civil" name="estado_civil" class="form-control custom-select @error('estado_civil') is-invalid @enderror">
                     <option selected disabled>Seleccionar estado</option>
                     <option value="casado">Casado</option>
                     <option value="soltero">Soltero</option>
                     <option value="divorciado">Divorciado</option>
                     <option value="viudo">Viudo</option>
                   </select>
                   @error('estado_civil')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
                 </div>


                  <div class="form-group">
                    <label for="inputStatus">Provincia</label>
                    <select id="provincia_id" name="provincia_id" class="form-control custom-select @error('provincia_id') is-invalid @enderror">
                    <option selected disabled>Seleccionar provincia</option>
                      @foreach($provincias as $key => $provincia)
                      <option value="{{$provincia->id}}">{{$provincia->nombre}}</option>
                      @endforeach
                    </select>
                    @error('provincia_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>

                  <div class="form-group" id="cantones">
                  </div>
               </div>
               <!-- /.card-body -->
             </div>
             <!-- /.card -->
           </div>
           
         </div>
         <div class="row">
           <div class="col-12 d-flex justify-content-center my-2" style="gap:20px;">
             <a onclick="enviarForm()" class="btn btn-success float-right">Crear</a>
           </div>
         </div>
       </section>
    </form> 
    <!-- /.content -->
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
    integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>

document.addEventListener('DOMContentLoaded',function()
    {
      document.getElementById('cedula').addEventListener('change',validarCedula)
    })

    function valideKey(evt){
      // code is the decimal ASCII representation of the pressed key.
      var code = (evt.which) ? evt.which : evt.keyCode;
      if(code==8) { // tecla de borrar
        return true;
      } else if(code>=48 && code<=57) { // rango de digitos
        return true;
      } else{ // otros caracteres
        return false;
      }
    }

    function enviarForm()
    {
      if(!cedulaValida)
        document.getElementById('formCrearCliente').submit();
    }
   
    var cedulaValida = false;
    function validarCedula(e)
    {
      let inputCedula = document.getElementById('cedula');
      let imgEstadoVisto = document.getElementById('visto');
      let imgEstadoX = document.getElementById('x');
      //ajax
      $.ajax({
                url: "{{ route('abogado.validarCedula') }}",
                dataType: "json",
                data: 
                {
                  cedula:e.target.value
                }
            }).done(function(res)
            {
                if(!res[0])
                {
                  inputCedula.style.border='2px solid red';
                  imgEstadoX.style.display='';
                  imgEstadoX.style.visibility='';
                  imgEstadoVisto.style.display='none';
                  imgEstadoVisto.style.visibility='hidden';
                  cedulaValida=false;
                }else
                {
                  imgEstadoX.style.display='none';
                  imgEstadoX.style.visibility='hidden';
                  imgEstadoVisto.style.display='';
                  imgEstadoVisto.style.visibility='';
                  inputCedula.style.border='2px solid #2ECC71';
                  cedulaValida=true;
                }
                
                if(!res[1])
                {
                  inputCedula.style.border='2px solid red';
                  imgEstadoX.style.display='';
                  imgEstadoX.style.visibility='';
                  imgEstadoVisto.style.display='none';
                  imgEstadoVisto.style.visibility='hidden';
                  cedulaValida=false;
                }else{
                  imgEstadoX.style.display='none';
                  imgEstadoX.style.visibility='hidden';
                  imgEstadoVisto.style.display='';
                  imgEstadoVisto.style.visibility='';
                  inputCedula.style.border='2px solid #2ECC71';
                  cedulaValida=true;
                }
            })

    }

    document.getElementById('provincia_id').addEventListener('change',function(e)
    {
   
      $.ajax({
                url: "{{ route('provincia.cantonesByProvincia') }}",
                dataType: "json",
                data: 
                {
                  id:e.target.value
                }
            }).done(function(res)
            {
              console.log(res)
              let cantones = res;
              var bodyCantones = document.getElementById('cantones')
              bodyCantones.innerHTML = '';
              $(bodyCantones).append(`<label for="inputStatus">Cantones</label>`);
              
              let selectCanton = document.createElement("select");
            selectCanton.className += `form-control custom-select`;
            selectCanton.id = "canton_id"
            selectCanton.name = "canton_id";

              let optionDefault = document.createElement('option')
            optionDefault.setAttribute("selected","selected");
            optionDefault.setAttribute("disabled","disabled");
            let optionTextoDefault = document.createTextNode('Seleccione una');
            optionDefault.appendChild(optionTextoDefault);
            selectCanton.appendChild(optionDefault)

            for (let j = 0; j < cantones.length; j++) {
                //creamos las options para el selectCanton
                let option = document.createElement("option");
                option.setAttribute("value", cantones[j].id);
                let optionTexto = document.createTextNode(cantones[j].canton);
                option.appendChild(optionTexto);
                selectCanton.appendChild(option);
                //fin options para selectCanton
            }

            $(bodyCantones).append(selectCanton);

            }
            )

    });

  </script>
@endsection
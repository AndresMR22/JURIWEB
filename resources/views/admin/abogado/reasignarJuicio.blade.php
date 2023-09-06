@extends('home')
@section('pantalla')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reasignar juicio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Reasignar Juicio</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
   <form id="formReasignarJuicio" method="POST" action="{{route('abogado.reasignarJuicioStore')}}">
    @csrf
       <section class="content">
         <div class="row d-flex justify-content-center">
           <div class="col-md-6">
             <div class="card card-primary">
               <div class="card-header">
                 <h3 class="card-title">Reasignar Juicio</h3>

                 <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                     <i class="fas fa-minus"></i>
                   </button>
                 </div>
               </div>
               <div class="card-body">

                <div class="form-group" style="display:flex; justify-content:center; gap:10px;">
                    <div class="abogados_activos">
                        <label for="inputStatus">Abogados activos</label>
                        <select id="abogado_activo" name="abogado_activo" class="form-control custom-select @error('abogado_activo') is-invalid @enderror">
                          <option selected disabled>Seleccionar abogado</option>
                          @foreach($abogadosactivos as $abogado)
                          <option value="{{ $abogado->id }}">{{ $abogado->nombres.' '.$abogado->apellidos }}</option>
                          @endforeach
                        </select>
                        @error('abogado_activo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>
                    <div class="abogados_inactivos" style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
                        <div class="container_abogados_inactivos">
                            <label for="inputStatus">Abogados inactivos</label>
                            <select id="abogado_inactivo" name="abogado_inactivo" class="form-control custom-select @error('abogado_inactivo') is-invalid @enderror">
                              <option selected disabled>Seleccionar abogado</option>
                              @foreach($abogadosinactivos as $abogado)
                              <option value="{{ $abogado->id }}">{{ $abogado->nombres.' '.$abogado->apellidos }}</option>
                              @endforeach
                            </select>
                            @error('abogado_inactivo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                        <div class="container_juicios_abogados_inactivos" id="container_juicios_abogados_inactivos">



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
             <a onclick="enviarForm()" class="btn btn-success float-right">Reasignar</a>
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

        document.getElementById('abogado_inactivo').addEventListener('change',verJuicios)

    })

    function verJuicios(e)
    {
        $.ajax({
                url: "{{ route('abogado.verJuicios') }}",
                dataType: "json",
                data: {
                    idAbogado: e.target.value
                }
            }).done(function(res) {
                console.log(res)
                let containerJuicios = document.getElementById('container_juicios_abogados_inactivos')
                containerJuicios.innerHTML = '';
                res.forEach((item,index)=>
                {

                $(containerJuicios).append(`
                <div class="datos_juicio my-1" style="background:#d7d7d7; border-radius:10px; padding: 5px 5px; display:flex; flex-direction: column; justify-content:center; align-items:start;">
                                <div class="nro">
                                   N°: ${item.nro}
                                </div>
                                <div class="materia">
                                   Materia: ${item.materia}
                                </div>
                                <div class="estadop">
                                   Estado: ${item.estadop}
                                </div>
                                <div class="fecha">
                                    Fecha: ${item.fecha}
                                </div>
                                <div class="cliente">
                                    Cliente: ${item.cliente.nombres+' '+item.cliente.apellidos}
                                </div>
                                <div class="unidadjuidicial">
                                   Unidad Judicial: ${item.unidad.nombre}
                                </div>
                            </div>
                `);
                })
            })

    }



    function enviarForm()
    {
        console.log(document.getElementById('abogado_activo').value)
        if(document.getElementById('abogado_activo').value != "Seleccionar abogado")
            document.getElementById('formReasignarJuicio').submit();
        else
            alert('Seleccione el abogado al que se le reasignara los juicios.')
    }



  </script>
@endsection

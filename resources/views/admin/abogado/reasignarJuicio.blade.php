@extends('home')
@section('pantalla')
<style>
    /* Estilo para el enlace deshabilitado */
    .disabled {
        pointer-events: none; /* Evita eventos de clic */
        opacity: 0.5; /* Cambia la opacidad para indicar visualmente que está deshabilitado */
    }
</style>
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
                    <div class="juicios_disponibles text-center">
                        <label for="inputStatus">Juicios</label>
                        <select id="juicio_id" name="juicio_id" class="form-control custom-select">
                          <option selected disabled>Seleccionar juicio</option>
                          @foreach($juicios as $juicio)
                          <option value="{{ $juicio->id }}">{{ $juicio->nro }}</option>
                          @endforeach
                        </select>
                    </div>
                </div>

                  <div class="form-group" style="display:flex; justify-content:center; gap:10px; visibility:hidden;" id="container_info_abogado" >

                    <div class="abogados_activos" style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
                        <label for="inputStatus">Abogado</label>
                       <span id="abogado"></span>
                    </div>

                    <div class="abogados_inactivos" style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
                        <label for="inputStatus">Estado</label>
                       <span id="estado"></span>
                    </div>
                  </div>

                  <div class="form-group" style="display:flex; justify-content:center; gap:10px; visibility:hidden;" id="container_abogados_activos" >

                    <div class="abogados_activos" style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
                        <label for="inputStatus">Abogados activos</label>
                       <select name="abogado_activo" id="abogado_activo" class="form-control">
                        <option disabled selected>Seleccione un abogado</option>
                       </select>
                    </div>

                    {{-- <div class="abogados_inactivos" style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
                        <label for="inputStatus">Estado</label>
                       <span id="estado"></span>
                    </div> --}}
                  </div>

               </div>
               <!-- /.card-body -->
             </div>
             <!-- /.card -->
           </div>

         </div>
         {{-- <input type="hidden" name="abogado_activo" id="abogado_activo"> --}}
         <input type="hidden" name="abogado_inactivo" id="abogado_inactivo">

         <div class="row">
           <div class="col-12 d-flex justify-content-center my-2" style="gap:20px;">
             <a onclick="enviarForm()" type="button" id="btnReasignar" class="btn btn-success float-right">Reasignar</a>
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
        document.getElementById("btnReasignar").classList.add("disabled");
        document.getElementById('juicio_id').addEventListener('change',function(e)
        {
            $.ajax({
                url: "{{ route('juicio.infoJuicio') }}",
                dataType: "json",
                data: {
                    juicio_id: e.target.value
                }
            }).done(function(res)
            {
                console.log(res)
                $('#abogado').empty();
                $('#estado').empty();
                if(res.abogado.nombre != '' || res.abogado.nombre != undefined)
                {
                    $('#abogado').text(res.abogado.nombres+' '+res.abogado.apellidos)
                    $('#abogado_inactivo').val(res.abogado.id);
                    let status = res.abogado.estatus == 1 ? 'Activo':'Inactivo';


                    status == 'Activo' ? document.getElementById('btnReasignar').classList.add('disabled') : document.getElementById('btnReasignar').classList.remove('disabled');
                    $('#estado').text(status)
                    $("#container_info_abogado").css("visibility", "visible")
                    $('#container_abogados_activos').css("visibility", "visible")
                    /** Cargamos el select con los abogados activos*/
                    var selectAbogados = $('#abogado_activo');
                    res.abogados_activos.forEach(function(opcion) {
                    selectAbogados.append($('<option>', {
                        value: opcion.id,
                        text: opcion.nombres+' '+opcion.apellidos
                    }));
                    });

                }else
                {
                    document.getElementById('btnReasignar').classList.add('disabled')
                    $("#container_info_abogado").css("visibility", "hidden")
                    $('#container_abogados_activos').css("visibility", "hidden")
                }
            })
        })

        document.getElementById('abogado_activo').addEventListener('change',function(e)
        {
            document.getElementById('abogado_activo').val(e.target.value)
        })

    })

    // function verJuicios(e)
    // {
    //     $.ajax({
    //             url: "{{ route('abogado.verJuicios') }}",
    //             dataType: "json",
    //             data: {
    //                 idAbogado: e.target.value
    //             }
    //         }).done(function(res) {
    //             console.log(res)
    //             let containerJuicios = document.getElementById('container_juicios_abogados_inactivos')
    //             containerJuicios.innerHTML = '';
    //             res.forEach((item,index)=>
    //             {

    //             $(containerJuicios).append(`
    //             <div class="datos_juicio my-1" style="background:#d7d7d7; border-radius:10px; padding: 5px 5px; display:flex; flex-direction: column; justify-content:center; align-items:start;">
    //                             <div class="nro">
    //                                N°: ${item.nro}
    //                             </div>
    //                             <div class="materia">
    //                                Materia: ${item.materia}
    //                             </div>
    //                             <div class="estadop">
    //                                Estado: ${item.estadop}
    //                             </div>
    //                             <div class="fecha">
    //                                 Fecha: ${item.fecha}
    //                             </div>
    //                             <div class="cliente">
    //                                 Cliente: ${item.cliente.nombres+' '+item.cliente.apellidos}
    //                             </div>
    //                             <div class="unidadjuidicial">
    //                                Unidad Judicial: ${item.unidad.nombre}
    //                             </div>
    //                         </div>
    //             `);
    //             })
    //         })

    // }



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

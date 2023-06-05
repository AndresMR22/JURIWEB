@extends('home')
@section('pantalla')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Agregar juicio</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Agregar juicio</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form method="POST" action="{{ route('juicio.store') }}">
            @csrf
            <section class="content">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Juicio</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="inputName">Número</label>
                                    <input name="nro" type="text" id="nro" readonly value="{{ $idSiguiente }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Materia</label>
                                    <input name="materia" type="text" id="materia" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Estado</label>
                                    <input name="estadop" type="text" id="estadop" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Fecha</label>
                                    <input name="fecha" min="{{date('Y-m-d')}}" type="date" id="fecha" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Estatus</label>
                                    <select id="estatus" name="estatus" class="form-control custom-select">
                                        <option selected disabled>Seleccionar estatus</option>
                                        <option value="1">En proceso</option>
                                        <option value="2">Archivado</option>
                                        <option value="3">Finalizado</option>
                                    </select>
                                </div>
                                
                                @if(isset($esAbogado) && $esAbogado)
                            
                                <input type="hidden" name="abogado_id" value="{{ $abogados->id }}">
                                @else
                                <div class="form-group">
                                    <label for="inputStatus">Abogado</label>
                                    <select id="abogado_id" name="abogado_id" class="form-control custom-select">
                                        <option selected disabled>Seleccionar abogado</option>
                                        @foreach ($abogados as $abogado)
                                            <option value="{{ $abogado->id }}">{{ $abogado->nombres }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                <div class="form-group">
                                    <label for="inputStatus">Cliente</label>
                                    <input name="cliente" type="text" id="cliente" class="form-control">
                                    <input name="cliente_id" type="hidden" id="cliente_id" class="form-control">
                                    <div id="resultado_clientes" style="display:flex;justify-content:flex-start;flex-flow:wrap;">

                                    </div>
                                    {{-- <select id="cliente_id" name="cliente_id" class="form-control custom-select">
                                        <option selected disabled>Seleccionar cliente</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">{{ $cliente->nombres }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Unidad Judicial</label>
                                    <select id="unidad_id" name="unidad_id" class="form-control custom-select">
                                        <option selected disabled>Seleccionar unidad judicial</option>
                                        @foreach ($unidades as $unidad)
                                            <option value="{{ $unidad->id }}">{{ $unidad->nombre }}</option>
                                        @endforeach
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

    <script>
        document.addEventListener('DOMContentLoaded',e=>
        {
           document.getElementById('cliente').addEventListener('change',traer)
        //    document.querySelectorAll('.clienteItem').forEach((item,i)=>
        //    {
        //     console.log(item)
        //    })
        })

        function traer(e)
        {
           let palabra = e.target.value

           $.ajax({
                url: "{{ route('cliente.buscarCliente') }}",
                dataType: "json",
                data: 
                {
                  palabra
                }
            }).done(function(res)
            {
                
                if(res.length > 0)
                {
                    let resClientes = document.getElementById('resultado_clientes')
                    resClientes.innerHTML = ''
     
                    res.forEach(item=>
                    {
                   
                     let cliente = `
                     <span id="${item.id}" onclick="seleccionarCliente('${item.nombres}','${item.apellidos}',${item.id})" style="margin:10px 5px; background-color:white; border-radius:10px; padding:0px 5px; cursor:pointer;">${item.nombres} ${item.apellidos}</span>
                     `;
                     $(resClientes).append(cliente);
     
                    }
               
                    )
                    resClientes.style.background = '#85929E';
                    resClientes.style.borderRadius = '10px';
                    resClientes.style.marginTop = '10px';
                    resClientes.style.padding = '10px 10px';
                }else
                {
                    let resClientes = document.getElementById('resultado_clientes')
                    resClientes.style.background = '#85929E';
                    resClientes.style.borderRadius = '10px';
                    resClientes.style.marginTop = '10px';
                    resClientes.style.padding = '10px 10px';
                    let cliente = `
                        <span style="color:white;margin-left:35%; font-weight:500">Sin resultados</span>
                     `;
                     $(resClientes).append(cliente);
                    
                }
         
            })
        }

        function seleccionarCliente(nombres,apellidos,id)
        {
            let inputCliente = document.getElementById('cliente').value = nombres+' '+apellidos
            document.getElementById('cliente_id').value = id

        }


    </script>
@endsection

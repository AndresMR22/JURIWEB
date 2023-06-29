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


        {{-- @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif --}}

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
                                    <input name="nro" type="text" id="nro" readonly value="{{ $idSiguiente }}" class="form-control @error('nro') is-invalid @enderror">
                                    @error('nro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Materia</label>
                                    <input name="materia" type="text" id="materia" class="form-control @error('materia') is-invalid @enderror">
                                    @error('materia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Estado</label>
                                    <input name="estadop" type="text" id="estadop" class="form-control @error('estadop') is-invalid @enderror">
                                    @error('estadop')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Fecha</label>
                                    <input name="fecha" min="{{date('Y-m-d h:i')}}" type="datetime-local" id="fecha" class="form-control @error('fecha') is-invalid @enderror">
                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                @if(isset($esAbogado) && $esAbogado)

                                <input type="hidden" name="abogado_id" value="{{ $abogados->id }}">
                                @else
                                <div class="form-group">
                                    <label for="inputStatus">Abogado</label>
                                    <select id="abogado_id" name="abogado_id" class="form-control custom-select @error('abogado_id') is-invalid @enderror">
                                        <option selected disabled>Seleccionar abogado</option>
                                        @foreach ($abogados as $abogado)
                                            <option value="{{ $abogado->id }}">{{ $abogado->nombres }}</option>
                                        @endforeach
                                    </select>
                                    @error('abogado_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @endif

                                <div class="form-group">
                                    <label for="inputStatus">Cliente</label>
                                    <input name="cliente" type="text" id="cliente" class="form-control ">
                                    <input name="cliente_id" type="hidden" id="cliente_id" class="form-control @error('cliente_id') is-invalid @enderror">
                                    <div id="resultado_clientes" style="display:flex;justify-content:flex-start;flex-flow:wrap;">

                                    </div>
                                    {{-- <select id="cliente_id" name="cliente_id" class="form-control custom-select">
                                        <option selected disabled>Seleccionar cliente</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">{{ $cliente->nombres }}</option>
                                        @endforeach
                                    </select> --}}
                                    @error('cliente_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Unidad Judicial</label>
                                    <select id="unidad_id" name="unidad_id" class="form-control custom-select @error('unidad_id') is-invalid @enderror">
                                        <option selected disabled>Seleccionar unidad judicial</option>
                                        @foreach ($unidades as $unidad)
                                            <option value="{{ $unidad->id }}">{{ $unidad->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('unidad_id')
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
                        <a href="#" class="btn btn-secondary">Cancelar</a>
                        <input type="submit" value="Crear" class="btn btn-success float-right">
                    </div>
                </div>
            </section>
        </form>
        <!-- /.content -->


        <div class="modal fade" id="modal-default">
            <form id="formCrearCliente" method="POST" action="{{ route('cliente.store') }}">
              @csrf
              <div class="modal-dialog">
                <div class="modal-content bg-default">
                  <div class="modal-header">
                    <h4 class="modal-title">Registrar cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group"
                                    style="display:flex; justify-content:flex-start; align-items:center;">
                                    <div style="flex:1 0 100px;">
                                        <label for="inputName">Cedula</label>
                                        <input name="cedula" onkeypress="return valideKey(event);" type="text"
                                            id="cedula" value="{{ old('cedula') }}"
                                            class="form-control @error('cedula') is-invalid @enderror" minlength="10"
                                            maxlength="10">

                                        @error('cedula')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div
                                        style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
                                        <label for="inputName">Estado</label>
                                        <div>

                                            <img id="visto" style="visibility: hidden;"
                                                src="{{ asset('assets/dist/img/visto.png') }}">
                                            <img id="x" style="visibility: hidden; display:none;"
                                                src="{{ asset('assets/dist/img/x.png') }}">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Nombres</label>
                                    <input name="nombres" type="text" id="nombres"
                                        class="form-control @error('nombres') is-invalid @enderror">
                                    @error('nombres')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Apellidos</label>
                                    <input name="apellidos" type="text" id="apellidos"
                                        class="form-control @error('apellidos') is-invalid @enderror">
                                    @error('apellidos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Celular</label>
                                    <input name="celular" type="tel" id="celular"
                                        class="form-control @error('celular') is-invalid @enderror">
                                    @error('celular')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Dirección</label>
                                    <input name="direccion" type="text" id="direccion"
                                        class="form-control @error('direccion') is-invalid @enderror">
                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Genero</label>
                                    <select id="genero" name="genero"
                                        class="form-control custom-select @error('genero') is-invalid @enderror">
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
                                    <input name="fnacimiento" max="{{ date('Y-m-d') }}" type="date" id="fnacimiento"
                                        class="form-control @error('fnacimiento') is-invalid @enderror">
                                    @error('fnacimiento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Correo</label>
                                    <input name="correo" type="email" id="correo"
                                        class="form-control @error('correo') is-invalid @enderror">
                                    @error('correo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="inputStatus">Estado civil</label>
                                    <select id="estado_civil" name="estado_civil"
                                        class="form-control custom-select @error('estado_civil') is-invalid @enderror">
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
                                    <select id="provincia_id" name="provincia_id"
                                        class="form-control custom-select @error('provincia_id') is-invalid @enderror">
                                        <option selected disabled>Seleccionar provincia</option>
                                        @foreach ($provincias as $key => $provincia)
                                            <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
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
                  <div class="modal-footer justify-content-center">
                    <a onclick="crearCliente()" id="btnCrearCliente" class="btn btn-outline-success">Crear</a>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
            </form>

            <!-- /.modal-dialog -->

          </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded',e=>
        {
           document.getElementById('cliente').addEventListener('change',traer);
           document.getElementById('cedula').addEventListener('change',validarCedula );;
        //    document.getElementById('btnCrearCliente').addEventListener('click',crearCliente)
        //    document.querySelectorAll('.clienteItem').forEach((item,i)=>
        //    {
        //     console.log(item)
        //    })validarCedula
        })

        function crearCliente()
        {
            // let formCliente = document.getElementById('formCrearCliente')

            console.log($('input[name="_token"]').val())
            $.ajax({
                url: "{{ route('cliente.storeAsync') }}",
                dataType: "json",
                type:'GET',
                data:{
                    // token:$('input[name=_token]'),
                    cedula:document.getElementById('cedula').value,
                    nombres:document.getElementById('nombres').value,
                    apellidos:document.getElementById('apellidos').value,
                    celular:document.getElementById('celular').value,
                    direccion:document.getElementById('direccion').value,
                    genero:document.getElementById('genero').value,
                    fnacimiento:document.getElementById('fnacimiento').value,
                    correo:document.getElementById('correo').value,
                    estado_civil:document.getElementById('estado_civil').value,
                    provincia_id:document.getElementById('provincia_id').value,
                }
            }).done(function(res) {
                if(res)
                    alert('cliente creado exitosamente')
                else
                    alert('problema al crear el cliente')
            })


        }

        function validarCedula(e)
        {
            let inputCedula = document.getElementById('cedula');
            let imgEstadoVisto = document.getElementById('visto');
            let imgEstadoX = document.getElementById('x');
            //ajax
            $.ajax({
                url: "{{ route('abogado.validarCedula') }}",
                dataType: "json",
                data: {
                    cedula: e.target.value
                }
            }).done(function(res) {
                if (res[0] == false || res[1] == false) {
                    inputCedula.style.border = '2px solid red';
                    imgEstadoX.style.display = '';
                    imgEstadoX.style.visibility = '';
                    imgEstadoVisto.style.display = 'none';
                    imgEstadoVisto.style.visibility = 'hidden';
                    cedulaValida = false;
                }else if (e.target.value.length == 0) {
                    imgEstadoX.style.display = 'none';
                    imgEstadoX.style.visibility = 'hidden';
                    imgEstadoVisto.style.display = '';
                    imgEstadoVisto.style.visibility = '';
                    inputCedula.style.border = '2px solid #2ECC71';
                    cedulaValida = true;
                }else {
                    imgEstadoX.style.display = 'none';
                    imgEstadoX.style.visibility = 'hidden';
                    imgEstadoVisto.style.display = '';
                    imgEstadoVisto.style.visibility = '';
                    inputCedula.style.border = '2px solid #2ECC71';
                    cedulaValida = true;
                }


            })


        }

        function valideKey(evt) {
            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 8) { // tecla de borrar
                return true;
            } else if (code >= 48 && code <= 57) { // rango de digitos
                return true;
            } else { // otros caracteres
                return false;
            }
        }

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
                    resClientes.innerHTML= '';
                    resClientes.style.background = '#85929E';
                    resClientes.style.borderRadius = '10px';
                    resClientes.style.marginTop = '10px';
                    resClientes.style.padding = '10px 10px';
                    let cliente = `
                        <span style="color:white;margin-left:35%; font-weight:500">Sin resultados, <a data-toggle="modal" data-target="#modal-default" class='btn btn-info'>Agregar cliente</a></span>
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

        document.getElementById('provincia_id').addEventListener('change', function(e)
        {

            $.ajax({
                url: "{{ route('provincia.cantonesByProvincia') }}",
                dataType: "json",
                data: {
                    id: e.target.value
                }
            }).done(function(res) {
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
                optionDefault.setAttribute("selected", "selected");
                optionDefault.setAttribute("disabled", "disabled");
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

            })

        });


    </script>
@endsection

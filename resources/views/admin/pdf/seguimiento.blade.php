<!DOCTYPE html>
<html lang="es">

<head>
    <title>Reporte de Seguimiento</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7c93de4bfc.js" crossorigin="anonymous"></script>
    <style type="text/css">
        body {
            color: black;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            font-size: 12px;
        }

        th {
            background-color: #f2f2f2;
        }

        .file-icon {
            font-size: 18px;
        }

        .no-border-table th,
        .no-border-table td {
            border: none !important; /* Importante para anular las reglas generales de borde */
        }

        .logo-img {
            width: 50px; /* Ajusta el tamaño según tus necesidades */
        }
        .fa {
          display: inline;
          font-style: normal;
          font-variant: normal;
          font-weight: normal;
          font-size: 14px;
          line-height: 1;
          font-family: FontAwesome;
          font-size: inherit;
          text-rendering: auto;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
        }
    </style>
</head>

<body>

    <div class="container">
        <h5 align="center">JURIWEB</h5>
        <h5 align="center">Riobamba-Ecuador</h5>

        {{-- <img src="{{ public_path('../../../../public/iniciosesion/images/auth/logojuriweb3.jpeg') }}"> --}}

        {{-- <table class="table no-border-table" width="900px;">
            <tbody>
                <tr>
                    <td>JURIWEB</td>
                    <td><img class="logo-img" src="ruta_de_la_imagen.jpg" alt="Logo"></td>
                </tr>
            </tbody>
        </table> --}}

        <table class="table no-border-table">
            <tbody>
                <tr>
                    <td>Cliente: {{$cliente->nombres.' '.$cliente->apellidos}}</td>
                    <td>Proceso Judicial: {{$juicio->estadop}}</td>
                </tr>
                <tr>
                    <td>Unidad Judicial: {{$unidad->nombre}}</td>
                    <td>Fecha: {{$juicio->fecha}}</td>
                </tr>
                <tr>
                    <td>Estado del juicio: {{$juicio->estatus==1 ? 'En proceso' : 'Finalizado'}}</td>
                    <td>Abogado: {{$abogado->nombres.' '.$abogado->apellidos}}</td>
                </tr>
                <tr>
                    <td>Materia: {{$juicio->materia}}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>FECHA</th>
                    <th>OBSERVACIÓN</th>
                    <th>ARCHIVO</th>
                </tr>
            </thead>
            <tbody>
                @foreach($archivos as $key => $archivo)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$archivo->fecha}}</td>
                    <td>{{$archivo->observacion}}</td>
                    <td style="font-size: 5px;"><a class="btn btn-info" target="_blank" href="{{ $archivo->url }}">
                        @if(Str::endsWith($archivo->url,'pdf'))
                        <i class="fa fa-file-pdf-o"></i>
                        @elseif(Str::endsWith($archivo->url,'mp4'))
                        <i class="fa fa-file-video-o"></i>
                        @elseif(Str::endsWith($archivo->url,'jpg'))
                        <i class="fa fa-image"></i>
                        @elseif(Str::endsWith($archivo->url,'png'))
                        <i class="fa fa-image"></i>
                        @elseif(Str::endsWith($archivo->url,'gif'))
                        <i class="fa fa-image"></i>
                        @endif
                    </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JURIWEB</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>JURI</b>WEB</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Recuperar Contraseña</p>

      <form >

        <div class="input-group mb-3">
          <input type="email" name="email" id="email" placeholder="correo electrónico" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>

        <div class="input-group mb-3">
            <input type="number" name="telefono" placeholder="593988703044" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}" id="telefono" required autocomplete="telefono" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                    <a id="enlaceEnviar">E</a>
              </div>
            </div>
            @error('telefono')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
          </div>

        <div class="row" style="display:flex; justify-content:center; ">

          <!-- /.col -->
          <div class="col-12">
            <a onclick="enviar()" target="_blank"  class="btn btn-primary btn-block">Enviar</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script>


    function enviar()
    {
        let form = document.getElementById('formRecuperarContrasenia');
        let telefono = document.getElementById('telefono').value
        let email = document.getElementById('email').value
        if(telefono == "" || email == '')
        {
            alert('Asegurese de ingresar el número de telefono y correo')
        }else if(telefono.length!=12)
        {
            alert('La longitud del número de teléfono no es la correcta.')
        }else
        {
            window.location.href='https://api.whatsapp.com/send?phone='+telefono+'&text=http://localhost:8000/actualizarClave/'+email;
        }

    }



</script>
</body>
</html>

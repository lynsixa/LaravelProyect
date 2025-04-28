<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('img/log.png') }}">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login-registro.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="form-container">
                    <center><img class="imagen" src="{{ asset('img/log.png') }}" width="80" height="70" alt="Logo"></center>
                    <h1>Inicia sesión</h1>

                    {{-- Mensaje de éxito desde la sesión --}}
                    @if(session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    {{-- Errores de validación --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="loginEmail">Correo:</label>
                            <input type="email" class="form-control" id="loginEmail" name="correo" placeholder="Ingrese su correo" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Contraseña:</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Ingrese su contraseña" required>
                        </div>
                        <button type="submit" class="submit-button mt-3 btn btn-primary w-100">
                            Ingresar
                        </button>
                        <div class="mt-2 d-flex justify-content-between">
                            <a href="{{ url('/recuperar') }}">¿Olvidaste tu contraseña?</a>
                            <a href="{{ url('/registro') }}">Registrarse</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>
</html>

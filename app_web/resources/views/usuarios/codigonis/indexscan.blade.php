<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Código Validado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h1>Código Validado Correctamente</h1>
        <p>Bienvenido, tu código ha sido validado.</p>
        <a href="{{ route('usuarios.codigonis.cerrar_sesion') }}" class="btn btn-danger">Cerrar sesión</a>
    </div>
</body>
</html>

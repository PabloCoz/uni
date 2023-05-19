<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aprobación de usuario</title>
</head>

<body>

    <div>
        <h1>¡Hola {{ $user->name }}!</h1>
        <p>Te informamos que tu cuenta ha sido aprobada.</p>
        <p>Ya puedes ingresar a la plataforma.</p>
        <p>¡Bienvenido!</p>

        <div>
            <p>Usuario: {{ $user->username }}</p>
            <p>Contraseña: password</p>
        </div>

        <p>Saludos cordiales,</p>


    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[url(https://64.media.tumblr.com/70ebd1f6d3a29d019de127909e8ed94f/tumblr_oya8gndrCI1qeyvpto1_500.gifv)] flex justify-center items-center flex-col w-screen h-screen gap-6"> 
    <div class="w-3/12 flex justify-center items-center gap-4 bg-slate-800 p-4 rounded-lg border-solid border-2 border-black scale-125">
        <div class="select-none flex items-center flex-col justify-center gap-4">
            <div class="bg-red-300 w-36 h-8 rounded-md p-4 flex flex-col justify-center items-center gap-3 group hover:bg-red-500 transition duration-500 hover:scale-110 border-solid border-2 border-black"
                id="iniciarSesionBtn">
                <p class="text-center p-0 m-0 font-semibold text">Iniciar Sesión</p>
            </div>

            <div class="bg-red-300 w-32 h-8 rounded-md p-4 flex flex-col justify-center items-center gap-3 group hover:bg-red-500 transition duration-500 hover:scale-110 border-solid border-2 border-black"
                id="registrarseBtn">
                <p class="text-center p-0 m-0 font-semibold text">Registrarse</p>
            </div>
        </div>
        
        <!-- Aquí tenemos a nuestro Form de Login -->
        <!-- ¿Qué procedimientos especiales aparte de sus estilos fueron los que aplicamos? -->
        <!-- 1. Un id con el cuál podremos hacer referencia a el y mostrar u ocultar dependiendo de la acción del usuario. -->
        <!-- 2. Agregamos la propieda 'method' en 'GET' para hacer la peticion de datos al hacer el Login.  -->
        <!-- 3. Y asignamos una ruta a la cual debera de acceder una vez inicie sesion. -->
        <!-- 4. A cada uno de los campos de nuestro input lee pusimos un nombre y el tipo de dato que deberia de llevar -->
        <!-- 5. A nuestro boton, tenemos que ponerlo de tipo 'Submit' pues asi, nuestro programa detecta que es el boton de enviar. -->
        <!-- 6. Agregamos el marcados @csrf antes de nuestro primer input para que englobe a todos estos. -->
        <div id="inicioSesionForm" class="select-none bg-blue-400 w-auto rounded-md p-4 flex-col gap-3 group hover:bg-blue-950 transition duration-500 hover:scale-110 border-solid border-2 border-black {{ old('form_type') === 'login' ? '' : 'hidden' }}">
            <p class="text-center text-2xl font-bold group-hover:text-white transition duration-500">Inicio de Sesión</p>
            <form class="flex flex-col gap-2" method="GET" action="{{ route('login-form') }}">
                @csrf
                <input name="name" type="text" placeholder="Nombre de Usuario" class="text-center rounded-sm border-solid border-2 border-black peer">
                <input name="password"type="password" placeholder="Contraseña" class="text-center rounded-sm border-solid border-2 border-black">
                <button type="submit" class="bg-green-200 font-semibold border-solid border-2 border-black group-hover:bg-green-400">Entrar</button>
            </form>
        </div>

        <!-- Agregamos la siguiente linea en la lista de clases: -->
        <!--  {{ old('form_type') === 'register' ? '' : 'hidden' }} -->
        <!-- Lo cual es un operador condicional que usa la sintaxis de blade.php para realizar una operacion logica. -->
        <!-- De esta manera es que nuestros Form pueden estar ocultar al empezar la sesion aun cuando la pagina es recargada o se rechaza una peticion. -->
        <!-- Aunque la comparacion tiene su logica, en este caso solo se esta usando para que siempre nos devuelva Falso, y nuestros Forms comiencen estando ocultos siempre. -->
        
        <!-- Implementamos una sección en nuestro HTML para mostrar los errores en caso de que existan al momento de efectuar el registro. -->
        <!-- 1. Asignamos un id para acceder a ella como objeto en nuestro script. -->
        <!-- 2. Utilizamos los operadores lógicos proporcionados por Blade. -->
        <!-- $'errors es una variable que Laravel crea automáticamente para capturar los errores que puedan surgir al enviar un formulario. -->
        <!-- Interactuamos con ella usando el método any'(), que devuelve true o false si hubo errores. -->
        <!-- Luego, usamos JavaScript para asignar nuestro DIV de errores a una variable y luego agregamos los informes de $errors a él. -->
        <!-- Para agregar los errores, utilizamos la estructura @'foreach y el método all'() de $'errors, y lo recorremos uno por uno usando la variable $'error. -->
        <!-- De esta forma, todos los errores se mostrarán de manera individual hasta el último, proporcionando un resumen de lo que salió mal al usuario. -->


        <div id="registroForm" class="select-none bg-blue-400 w-auto rounded-md p-4 flex-col gap-3 group hover:bg-blue-950 transition duration-500 hover:scale-110 border-solid border-2 border-black {{ old('form_type') === 'register' ? '' : 'hidden' }}">
            <p class="text-center text-2xl font-bold group-hover:text-white transition duration-500">Registro</p>
            <form class="flex flex-col gap-2" method="POST" action="{{ route('register-form') }}">
                @csrf
                <input name="name" type="text" placeholder="Nombre de usuario" class="text-center rounded-sm border-solid border-2 border-black peer">
                <input name="age" type="number" placeholder="Edad" class="text-center rounded-sm border-solid border-2 border-black peer">
                <input name="email" type="email" placeholder="Correo Electrónico" class="text-center rounded-sm border-solid border-2 border-black peer">
                <input name="password" type="password" placeholder="Contraseña" class="text-center rounded-sm border-solid border-2 border-black">
                <button type="submit" class="bg-green-200 font-semibold border-solid border-2 border-black group-hover:bg-green-400">Registrarse</button>
            </form>
        </div>
        <div id="validationErrors" class="bg-white p-2 hidden">
            @if($errors->any())
                <script>
                    let errores2 = document.getElementById('validationErrors');
                    errores2.style.display = 'block';
                </script>
                <div class="alert alert-danger">
                    <ul>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <!-- Un script sencillo, que lo que busca hacer es simplemente dar un evento alos botones de Inicio de Sesion o Registro -->
    <!-- Para que estos puedan ocultar y mostrar al uno u al otro dependiendo de lo que eliga el usuario. -->
    <!-- Asi como ocultar los mensajes de error en caso de haber fallado con alguno de los dos -->
    <script>
        //caja
        let errores = document.getElementById('validationErrors');

        // Botones
        const iniciarSesionBtn = document.getElementById('iniciarSesionBtn');
        const registrarseBtn = document.getElementById('registrarseBtn');

        // Forms
        const inicioSesionForm = document.getElementById('inicioSesionForm');
        const registroForm = document.getElementById('registroForm');

        // Agregamos eventos de clic a los botones
        iniciarSesionBtn.addEventListener('click', function () {
            errores.style.display = 'none';
            inicioSesionForm.style.display = 'flex';
            registroForm.style.display = 'none';
        });

        registrarseBtn.addEventListener('click', function () {
            errores.style.display = 'none';
            inicioSesionForm.style.display = 'none';
            registroForm.style.display = 'flex';
        });
    </script>

</body>
</html>
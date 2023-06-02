<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-violet-300 flex flex-col justify-start items-center h-screen w-screen">
    @livewireStyles
    @livewireScripts
    <header class="bg-black text-white px-4 py-2 w-screen text-center flex justify-between items-center">
        <p>Bienvenido, {{ session('user') }}</p>
        <button id="CloseSession" class="bg-white text-black p-1 rounded-xl hover:bg-blue-600 transition duration-500 hover:text-white">Cerrar Sesion</button>
    </header>
    <div id="MainContainer" class="bg-gray-100 w-screen h-screen flex justify-center gap-3 p-4 items-center box-border border-x-8 border-solid border-black">
        <div id="GamePannel" class="w-full h-full bg-white flex justify-center flex-col items-center border-solid border-8 border-black box-border">
                @livewire("situacion")
        </div>
        <div id="ChatPannel" class="w-2/5 h-full bg-white flex flex-col justify-center items-center border-solid border-8 border-black box-border">
            <button id="chatButton" class="w-full bg-black text-white flex justify-center items-center p-1 text-3xl font-bold" onclick="foldUnfoldChat()">Chat</button>
            <div id="ChatRoom" class="h-full w-full bg-gray-200 transition duration-300 flex flex-col justify-end overflow-hidden shadow-inner">
                @livewire("chat-list")
                @livewire("chat-form")
            </div>
            <button id="socialButton" class="w-full bg-black text-white flex justify-center items-center p-1 text-3xl font-bold" onclick="foldUnfoldChat()">Social</button>
            <div id="SocialRoom" class=" w-full bg-blue-400 transition duration-300">
                
            </div>
        </div>
    </div>
    <div id="footer" class="bg-black w-screen text-center text-white p-2">
        <p>Creado y Desarrollado por Victor Rodriguez.</p>
    </div>
    <!-- Agregamos un formulario invisible en nuestro html para poder mandar una peticion de cerrado de sesion a nuestro controlador el cuál pasara por
        la ruta especificada en nuestro web.php, dirigiendonos después al método de la clase especificada en la Ruta, siendo en este caso el FormController.
        Una vez allí, nuestro método se encargara de borrar los datos de sesión y de redirigir al usuario a la pestaña de inicio de sesión. -->
    <form id="logoutForm" action="{{ route('logout-form') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- Utilizamos el siguiente script para poder activar el envio de nuestro formulario que nos ayudara a eliminar la sesion actual del usuario. -->
    <script>

        let chat = document.getElementById("ChatRoom");
        let social = document.getElementById("SocialRoom");
        let chatBool = true;
        chat.style.transition = '2s';
        social.style.transition = '2s';

        function foldUnfoldChat(){
            if (!chatBool){
                chatBool = true;
                social.style.height = "100%";
                chat.style.height = "0"
                setTimeout(function() {
                    social.style.height = "0%";
                    chat.style.height = "100%";
                }, 10);
            }else{
                chatBool = false;
                social.style.height = "0%";
                chat.style.height = "100%";
                setTimeout(function() {
                    social.style.height = "100%";
                    chat.style.height = "0%";
                }, 10);
            }
        }


        let btnClose = document.getElementById('CloseSession');
        btnClose.addEventListener('click', function(){
            event.preventDefault();
            document.getElementById('logoutForm').submit();
        });
    </script>

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L I F E - Index</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-violet-300 flex flex-col justify-start items-center h-screen w-screen">
    @livewireStyles
    @livewireScripts
    <!-- HEADER -->
    
    <header class="bg-black text-white px-4 py-2 w-screen text-center flex justify-between gap-3 items-center select-none border-b-2 border-solid border-white">
        <a class="hover:text-black hover:bg-white transition duration-700 p-2
            text-2xl hover:shadow-lg shadow-sm shadow-white hover:shadow-white" href="./user-profile"> 
            <strong>Bienvenido, {{ session('user') }}</strong>
        </a>
       <div class="flex gap-5">
        
                <button id="ChatB" onclick="showSection()" class="hidden opacity-0 hover:text-black hover:bg-white transition duration-700 p-2
                text-2xl hover:shadow-lg shadow-sm shadow-white hover:shadow-white"><strong> Chat </strong></button>
                @if(session('role') === "admin")
                    <a href="./administrator" class="hover:text-black hover:bg-white transition duration-700 p-2
                text-2xl hover:shadow-lg shadow-sm shadow-white hover:shadow-white">
                        <strong>Panel Administrador</strong>
                    </a>
                @endif
                <button id="encuesta" class=" hover:text-black hover:bg-white transition duration-700 p-2
                text-2xl hover:shadow-lg shadow-sm shadow-white hover:shadow-white"><strong> <a href="./paravotar">Encuestas</a> </strong></button>
                <button id="CloseSession" class="hover:text-black hover:bg-white transition duration-700 p-2
                text-2xl hover:shadow-lg shadow-sm shadow-white hover:shadow-white">
                    <strong>Cerrar Sesion</strong>
                </button>
        </div>
    </header>
    <!-- Contenido en general -->
    <div id="MainContainer" class="bg-black w-screen h-screen flex justify-center gap-3 p-4 items-center box-border">
        <div id="GamePannel" class="w-full h-full bg-black flex justify-center flex-col items-center box-border">
                @livewire("situacion")
        </div>
        <div id="ChatPannel" class="w-2/5 h-full bg-white flex flex-col justify-center items-center border-8 box-border
        shadow-lg shadow-white border-x-2 border-solid border-black overflow-hidden">
            <div class="flex w-full">
                <button id="chatButton" class="w-full bg-black text-white flex justify-center items-center p-1 text-3xl font-bold" onclick="foldUnfoldChat()">Chat</button>
                <button id="cerrar" class="w-1/6 p-2 bg-black text-white flex justify-center items-center text-sm font-bold" onclick="hideSection()">Cerrar</button>
            </div>
            <div id="ChatRoom" class="h-full w-full bg-gray-200 transition duration-300 flex flex-col justify-end overflow-hidden">
                @livewire("chat-list")
                @livewire("chat-form")
            </div>
            <button id="socialButton" class=" w-full bg-black text-white flex justify-center items-center p-1 text-3xl font-bold" onclick="foldUnfoldChat()">Social</button>
            <div id="SocialRoom" class="w-full bg-blue-400 transition duration-300 h-0">
                @livewire("social")
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <div id="footer" class="bg-black w-screen text-center text-white p-2 select-none">
        <strong>Creado y Desarrollado por Victor Rodriguez, Jose Hiram y Jorge Barajas.</strong>
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
        let chatP = document.getElementById("ChatPannel");
        let chatB = document.getElementById("ChatB");
        let mensaje2 = document.getElementById("mensaje");
        let chatBool = true;
        chat.style.transition = '0.2s';
        social.style.transition = '0.2s';
        chatP.style.transition = '0.4s';

        function foldUnfoldChat(){
            if (!chatBool){
                chatP.style.height = "70%";
                chatBool = true;
                social.style.height = "40%";
                chat.style.height = "0"
                setTimeout(function() {
                    social.style.height = "0%";
                    chat.style.height = "100%";
                    chatP.style.height = "100%";
                }, 10);
            }else{
                chatBool = false;
                setTimeout(function() {
                    chatP.style.height = "30%";
                    social.style.height = "70%";
                    chat.style.height = "0%";
                }, 10);
            }
        }


        let btnClose = document.getElementById('CloseSession');
        btnClose.addEventListener('click', function(){
            event.preventDefault();
            document.getElementById('logoutForm').submit();
        });
        let flag69 = false;
        function hideSection(){
            if(!flag69){
                chatB.style.display = 'block';
                chatB.style.opacity = 0;
                flag69 = !flag69;
                chatP.style.width = "40%";
                setTimeout(function() {
                        chatP.style.width = "0%";
                        chatB.style.opacity = 100;
                    }, 10);
            }
        }
        function showSection(){
            if(flag69){
                chatB.style.opacity = 100;
                flag69 = !flag69;
                    chatP.style.width = "0%";
                setTimeout(function() {
                    chatP.style.width = "40%";
                    chatB.style.opacity = 0;
                }, 10);
                setTimeout(function() {
                chatB.style.display = 'none';
                }, 500);
            }
        }
    </script>

</body>
</html>
<div class="bg-black flex flex-wrap justify-evenly gap-10 h-screen overflow-x-hidden overflow-y-auto pb-10">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
        <p class="text-8xl bg-black text-white p-4 w-full text-center flex gap-4 justify-center items-center select-none">
            Panel de administrador
            <a href="./index" class="hover:text-black hover:bg-white transition duration-700 p-2
                text-2xl hover:shadow-lg shadow-sm shadow-white hover:shadow-white">
                    <strong>Regresar</strong>
            </a>
        </p>
        <!-- Lista de usuarios -->
        <div class="group flex flex-col items-center w-2/5 bg-black shadow-lg 
        shadow-white hover:bg-slate-700 transition duration-700 hover:scale-110">
            <p class="w-full text-center text-white text-4xl font-semibold border-b-2  duration-700
             group-hover:border-b-2 ">Lista de Administradores.<p>
            <div class="overflow-y-auto overflow-x-hidden p-2 flex gap-2 h-72 flex-wrap justify-evenly w-full pt-4">
                    @foreach ($users as $user)
                        @if($user->role === 'admin')
                        <div class="flex flex-col bg-slate-200">
                            <div class="p-2  w-full flex flex-col gap-1 overflow-hidden h-full">
                                <p class="">Estatus: 
                                    @if($user->status === 'offline')
                                    🔴
                                    @else
                                    🟢
                                    @endif
                                </p>
                                <p>Nombre: {{ $user->name }}</p>
                                <p>Rol: {{ $user->role }}</p>
                                <p>Edad: {{ $user->age }}</p>
                                <p>Email: </p>
                                <p>{{ $user->email }}</p>
                            </div>
                            <button class="bg-yellow-300 p-1 text-black hover:bg-yellow-200" onclick="retirarAdministrador('{{$user->email}}')"> Remover Administrador </button>
                        </div>
                        @endif
                    @endforeach
            </div>
        </div>

        <div class="border-solid border-black border-2 w-2/5 bg-white">
            <button id="frases" class="w-full text-center bg-black text-white h-full flex shadow-lg shadow-white 
            justify-center items-center text-6xl font-semibold hover:bg-slate-700 transition duration-700 hover:scale-110 select-none">Frases del Día</button>
        </div>
        <div class="border-solid border-black border-2 w-2/5 bg-white">
            <button id="votaciones" class="w-full text-center bg-black text-white h-full flex shadow-lg shadow-white
            justify-center items-center text-6xl font-semibold hover:bg-slate-700 transition duration-700 hover:scale-110 select-none">Votaciones</button>
        </div>
        <div class="group flex flex-col items-center w-2/5 bg-black shadow-lg 
        shadow-white hover:bg-slate-700 transition duration-700 hover:scale-110">
            <p class="w-full text-center text-white text-4xl font-semibold border-b-2  duration-700
             group-hover:border-b-2 ">Usuarios dados de baja<p>
            <div class="overflow-y-auto overflow-x-hidden p-2 flex gap-2 flex-wrap justify-evenly w-full h-72">
                @foreach ($deletedUsers as $user)
                    <div class="p-2 border-solid border-2 border-black flex flex-col gap-1 overflow-hidden bg-slate-200">
                        <p>Nombre: {{ $user->name }}</p>
                        <p>Email: </p>
                        <p>{{ $user->email }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="group flex flex-col items-center w-2/5 bg-black shadow-lg 
        shadow-white hover:bg-slate-700 transition duration-700 hover:scale-110">
            <p class="w-full text-center text-white text-4xl font-semibold border-b-2  duration-700
             group-hover:border-b-2 ">Lista de mejores usuarios<p>
            <div class="overflow-y-auto overflow-x-hidden p-2 flex gap-2 flex-wrap justify-evenly w-full">
                @foreach ($bestUsers as $user)
                    <div class="p-1 bg-slate-200 flex flex-col gap-1 overflow-hidden">
                        <p>Nombre: {{ $user->name }}</p>
                        <p>Email: </p>
                        <p>{{ $user->email }}</p>
                        <button class="bg-black p-1  hover:bg-slate-500 text-white duration-700" onclick="removerMejor('{{$user->email}}')"> Remover de Mejores Usuarios</button>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="group flex flex-col items-center w-2/5 bg-black shadow-lg 
        shadow-white hover:bg-slate-700 transition duration-700 hover:scale-110">
            <p class="w-full text-center text-white text-4xl font-semibold border-b-2  duration-700
             group-hover:border-b-2 ">Lista de Usuarios.<p>
            <div class="overflow-y-auto overflow-x-hidden p-2 flex gap-2 flex-wrap justify-evenly w-full h-72">
                @foreach ($users as $user)
                    @if($user->role === 'admin')
                    @else
                    <div class="flex border-solid bg-slate-200">
                        <div class="p-2  w-full flex flex-col gap-1 overflow-hidden">
                            <p class="">Estatus: 
                                @if($user->status === 'offline')
                                🔴
                                @else
                                🟢
                                @endif
                            </p>
                            <p>Nombre: {{ $user->name }}</p>
                            <p>Rol: {{ $user->role }}</p>
                            <p>Edad: {{ $user->age }}</p>
                            <p>Email: </p>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="flex flex-col border-l-2 border-black border-solid">
                            <button class="bg-pink-300 p-1 text-black border-solid border-black hover:bg-pink-200 hover:text-black" onclick="mandarAlerta('{{$user->email}}')"> Mandar Alerta</button>
                            <button class="bg-yellow-300 p-1 text-black hover:bg-yellow-200" onclick="agregarAdministrador('{{$user->email}}')"> Asignar Admin </button>
                            <button class="bg-green-400 p-1 border-solid border-black hover:bg-green-300" onclick="topUsuario('{{ $user->name }}', '{{ $user->email }}')">Ascender a mejor Usuario</button>
                            <button class="bg-red-400 p-1 border-solid border-black hover:bg-red-300" onclick="banearUsuario('{{ $user->id }}')"> Banear Usuario</button>
                            <button class="bg-black p-1 text-white border-solid border-black hover:bg-slate-800" onclick="eliminarUsuario('{{$user->email}}','{{$user->name}}')"> Eliminar Usuario</button>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="group flex flex-col items-center w-2/5 bg-black shadow-lg 
        shadow-white hover:bg-slate-700 transition duration-700 hover:scale-110 h-72">
            <p class="w-full text-center text-white text-4xl font-semibold border-b-2  duration-700
             group-hover:border-b-2 ">Lista de Usuario Baneados<p>
            <div class="overflow-y-auto overflow-x-hidden p-2 flex gap-2 flex-wrap justify-evenly w-full">
                @foreach ($users as $user)
                    @if($user->banned == "yes")
                        <div class="p-1 bg-slate-200 flex flex-col gap-1 overflow-hidden">
                            <p>Nombre: {{ $user->name }}</p>
                            <p>Email: </p>
                            <p>{{ $user->email }}</p>
                            <button class="bg-black p-1  hover:bg-slate-500 text-white duration-700" onclick="removerBaneo('{{$user->id}}')">Quitar Baneo</button>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        @if (session()->has('message') && session('message') != null)
            <script>
                let flashMessage = "{{ session('message') }}";
                window.location.reload();
            </script>
        @endif


    <script>
        function eliminarUsuario(email,name){
            window.livewire.emit("eliminarUsuario",email,name);
        }
        function removerMejor(email){
            window.livewire.emit("removerBuenUsuario",email);
        }
        function topUsuario(nombre, correo){
            window.livewire.emit("agregarBuenUsuario",nombre,correo);
        }
        function agregarAdministrador(email){
            window.livewire.emit("agregarAdministrador",email);
        }
        function retirarAdministrador(email){
            window.livewire.emit("retirarAdministrador",email);
        }
        function removerBaneo(id){
            window.livewire.emit("removerBaneo",id);

        }
        function mandarAlerta(email){
            console.log("alerta");
            let mensaje = prompt("Ingrese el mensaje al usuario.");
            window.livewire.emit("modificarMensaje",email,mensaje);
        }
        function banearUsuario(id){
            window.livewire.emit("banearUsuario",id);
        }
        
        window.onload = function(){
            let detector = window.navigator.onLine;
        };

        let btnVota = document.getElementById('votaciones');
        btnVota.addEventListener('click', function(){
            window.location.href = "/votaciones";
        });
        let btnFrases = document.getElementById('frases');
        btnFrases.addEventListener('click', function(){
            window.location.href = "/frases";
        });
    </script>
</div>

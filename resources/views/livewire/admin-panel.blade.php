<div class="bg-slate-300 flex flex-wrap justify-evenly gap-2 pb-2 h-screen overflow-x-hidden overflow-y-auto">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <p class="text-8xl bg-black text-white p-4 w-full text-center">Panel de administrador</p>
        <div class="border-solid border-black border-2 w-2/5 bg-white">
            <p class="w-full text-center bg-black text-white">Administrar cuentas de Administrador<p>
            <h1>Asignar Administrador</h1>
            <h1>Modificar Administrador</h1>
            <h1>Eliminar Administrador</h1>
        </div>
        <div class="border-solid border-black border-2 w-2/5 bg-white">
            <p class="w-full text-center bg-black text-white">Editar frases del dia<p>
        </div>
        <div class="border-solid border-black border-2 w-2/5 bg-white">
            <p class="w-full text-center bg-black text-white">Mandar alerta a usuario<p>
        </div>
        <div class="border-solid border-black border-2 w-2/5 bg-white">
            <p class="w-full text-center bg-black text-white">Votaciones<p>
            <h1>Añadir opciones de votacion</h1>
            <h1>Cambiar opciones de la votación</h1>
            <h1>Quitar opciones de votaciones</h1>
        </div>
        <div class="border-solid border-black border-2 flex flex-col items-center w-2/5 bg-white overflow-x-hidden h-">
            <p class="w-full text-center bg-black text-white">Usuarios dados de baja<p>
            <div class="overflow-y-auto overflow-x-hidden p-2 flex gap-2 flex-wrap justify-evenly w-full h-72">
                @foreach ($deletedUsers as $user)
                    <div class="p-2 border-solid border-2 border-black flex flex-col gap-1 overflow-hidden">
                        <p>Nombre: {{ $user->name }}</p>
                        <p>Email: </p>
                        <p>{{ $user->email }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="border-solid border-black border-2 flex flex-col items-center w-2/5 bg-white">
            <p class="w-full text-center bg-black text-white">Lista de mejores usuarios<p>
            <div class="overflow-y-auto overflow-x-hidden p-2 flex gap-2 flex-wrap justify-evenly w-full">
                @foreach ($bestUsers as $user)
                    <div class="p-2 border-solid border-2 border-black flex flex-col gap-1 overflow-hidden">
                        <p>Nombre: {{ $user->name }}</p>
                        <p>Email: </p>
                        <p>{{ $user->email }}</p>
                        <button class="bg-blue-400 p-1 border-solid border-black hover:bg-blue-300" onclick="removerMejor('{{$user->email}}')"> Remover de Mejores Usuarios</button>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="border-solid border-black border-2 flex flex-col items-center w-2/5 bg-white">
            <p class="w-full text-center bg-black text-white">Lista de Usuarios.<p>
            <div class="overflow-y-auto overflow-x-hidden p-2 flex gap-2 h-72 flex-wrap justify-evenly w-full">
                @foreach ($users as $user)
                    <div class="flex border-solid border-2 border-black flex-col">
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
                        
                        <button class="bg-green-400 p-1 border-solid border-black hover:bg-green-300" onclick="topUsuario('{{ $user->name }}', '{{ $user->email }}')">Ascender a mejor Usuario</button>
                        <button class="bg-red-400 p-1 border-solid border-black hover:bg-red-300"> Banear Usuario</button>
                        <button class="bg-black p-1 text-white border-solid border-black hover:bg-white hover:border-solid border-2 hover:text-black" onclick="eliminarUsuario('{{$user->email}}','{{$user->name}}')"> Eliminar Usuario</button>
                    </div>
                @endforeach
            </div>
        </div>
        @if (session()->has('message') && session('message') != null)
            <script>
                let flashMessage = "{{ session('message') }}";
                alert(flashMessage);
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

        window.onload = function(){
            let detector = window.navigator.onLine;
        };
    </script>
</div>

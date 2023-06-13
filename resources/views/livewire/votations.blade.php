<div class="w-full h-full bg-black flex justify-center items-center gap-4 flex-col box-border overflow-auto">
    {{-- Be like water. --}}
    <div class="border-solid border-black border-2 w-2/5 bg-white">
            <button id="votaciones" class="w-full text-center bg-black text-white h-full flex 
            justify-center items-center text-6xl font-semibold hover:bg-slate-700 transition duration-700 hover:scale-110 select-none">Votaciones</button>
    </div>
    <div class="border-solid border-black border-2 w-2/5 bg-white">
            <button id="regresar" class="w-full text-center bg-black text-white h-8 flex 
            justify-center items-center font-semibold hover:bg-slate-700 transition duration-700 hover:scale-110 select-none">Regresar</button>
    </div>
    <div class="flex flex-col gap-8">
        <div class="bg-black text-white flex flex-col justify-center items-center pb-6 shadow-md shadow-white hover:scale-110 transition duration-500 select-none">
            <p class="p-2 text-3xl font-semibold">Añadir Votacion</p>
            <div class="bg-white w-11/12 flex flex-col justify-center items-center text-black">
                <input id="pregunta" placeholder="Pregunta" class="w-full text-center hover:bg-slate-100"></input>
                <input id="r1" placeholder="Respuesta 1" class="w-full text-center hover:bg-slate-100"></input>
                <input id="r2" placeholder="Respuesta 2" class="w-full text-center hover:bg-slate-100"></input>
                <input id="r3" placeholder="Respuesta 3" class="w-full text-center hover:bg-slate-100"></input>
                <button class="bg-black text-white font-semibol text-xl w-full hover:bg-slate-600 duration-700" onclick="agregarVotacion()">Añadir</button>
            </div>
        </div>
        <div class="bg-black text-white flex flex-col justify-center items-center pb-6 shadow-md shadow-white hover:scale-110 transition duration-500 select-none">
            <p class="p-2 text-3xl font-semibold">Modificar Votacion</p>
            <div class="bg-white w-11/12 flex flex-col justify-center items-center text-black">
                <input id="pregunta2" placeholder="Pregunta" class="w-full text-center hover:bg-slate-100" value="{{ $sacada ? $sacada->pregunta : '' }}">
                <input id="r11" placeholder="Respuesta 1" class="w-full text-center hover:bg-slate-100" value="{{ $sacada ? $sacada->respuesta1 : '' }}">
                <input id="r22" placeholder="Respuesta 2" class="w-full text-center hover:bg-slate-100" value="{{ $sacada ? $sacada->respuesta2 : '' }}">
                <input id="r33" placeholder="Respuesta 3" class="w-full text-center hover:bg-slate-100" value="{{ $sacada ? $sacada->respuesta3 : '' }}">
                <button class="bg-black text-white font-semibol text-xl w-full hover:bg-slate-600 duration-700" onclick="modificarVotacion({{ $sacada ? $sacada->id : '' }})">Confirmar</button>
            </div>
        </div>
        <div class="bg-black text-white p-2 flex flex-col shadow-md shadow-white hover:scale-110 transition duration-500 select-none h-72 overflow-y-auto">
                @foreach ($tvotaciones as $votacion)
                    <p class="text-center border-t-2 border-x-2 border-solid border-white select-none">N. {{ $votacion->id }}</p>
                    <div class="flex bg-black p-2 border-2 border-white border-solid select-none">
                        <div class="p-2  w-full flex flex-col gap-1 overflow-hidden">
                            <p>Pregunta: {{ $votacion->pregunta }}</p>
                            <p>Respuesta 1: {{ $votacion->respuesta1 }}</p>
                            <p>Respuesta 2: {{ $votacion->respuesta2 }}</p>
                            <p>Respuesta 3: {{ $votacion->respuesta3 }}</p>
                            <p>Votos de Respuesta 1: {{ $votacion->r1votos }}</p>
                            <p>Votos de Respuesta 2: {{ $votacion->r2votos }}</p>
                            <p>Votos de Respuesta 3: {{ $votacion->r3votos }}</p>
                        </div>
                        <div class="flex flex-col border-l-2 border-black border-solid justify-center items-center">
                            <button class="bg-pink-300 p-1 text-black border-solid border-black hover:bg-pink-200
                             hover:text-black" onclick="sacarDatos('{{$votacion->id}}')"> 
                                Modificar Votacion
                            </button>
                            <button class="bg-slate-900 p-1 text-white border-solid border-black 
                            hover:bg-slate-700" onclick="eliminarVotacion('{{$votacion->id}}')"> 
                                Eliminar Votacion
                            </button>
                        </div>
                    </div><br>
                @endforeach
        </div>
    </div>
    <script>
        let preg = document.getElementById("pregunta");
        let r1 = document.getElementById("r1");
        let r2 = document.getElementById("r2");
        let r3 = document.getElementById("r3");
        function agregarVotacion(){
            window.livewire.emit("agergarVotacion",preg.value, r1.value, r2.value, r3.value);
            let timer = setInterval(function(){
                clearInterval(timer);
                location.reload();
            },5000);
        }

        let preg2 = document.getElementById("pregunta2");
        let r11 = document.getElementById("r11");
        let r22 = document.getElementById("r22");
        let r33 = document.getElementById("r33");
        function modificarVotacion(id){
            window.livewire.emit("modificarVotacion",id, preg2.value, r11.value, r22.value, r33.value);
            let timer = setInterval(function(){
                clearInterval(timer);
                location.reload();
            },5000);
        }
        function sacarDatos(id){
            window.livewire.emit("sacarDatos",id);
        }
        function eliminarVotacion(id){
            window.livewire.emit("eliminarVotacion",id);
            let timer = setInterval(function(){
                clearInterval(timer);
                location.reload();
            },5000);
        }
        let btnRegresar = document.getElementById('regresar');
        btnRegresar.addEventListener('click', function(){
            window.location.href = "/administrator";
        });
    </script>
</div>

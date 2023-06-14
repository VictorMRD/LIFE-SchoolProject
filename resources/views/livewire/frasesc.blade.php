<div class="w-full h-full bg-black flex justify-center items-center gap-4 flex-col">
    {{-- Be like water. --}}
    <div class="border-solid border-black border-2 w-2/5 bg-white">
            <button id="votaciones" class="w-full text-center bg-black text-white h-full flex 
            justify-center items-center text-6xl font-semibold hover:bg-slate-700 transition duration-700 hover:scale-110 select-none">Frases del día</button>
        </div>
        <div class="border-solid border-black border-2 w-2/5 bg-white">
            <button id="regresar" class="w-full text-center bg-black text-white h-8 flex 
            justify-center items-center font-semibold hover:bg-slate-700 transition duration-700 hover:scale-110 select-none">Regresar</button>
        </div>
    <div class="flex flex-col gap-8 justify-center items-center">
        <div class="bg-black text-white flex flex-col justify-center items-center pb-6 shadow-md shadow-white hover:scale-110 transition duration-500 select-none">
            <p class="p-2 text-3xl font-semibold">Añadir Frase</p>
            <div class="bg-white w-11/12 flex flex-col justify-center items-center text-black">
                <input id="frase" placeholder="Frase" class="w-full text-center hover:bg-slate-100"></input>
                <button class="bg-black text-white font-semibol text-xl w-full hover:bg-slate-600 duration-700" onclick="agregarFrase()">Añadir</button>
            </div>
        </div>
        <div class="bg-black text-white flex flex-col justify-center items-center pb-6 shadow-md shadow-white hover:scale-110 transition duration-500 select-none">
            <p class="p-2 text-3xl font-semibold">Modificar Frase</p>
            <div class="bg-white w-11/12 flex flex-col justify-center items-center text-black">
                <input id="frase2" placeholder="Frase" class="w-full text-center hover:bg-slate-100" value="{{ $ff ? $ff->frase : '' }}">
                <button class="bg-black text-white font-semibol text-xl w-full hover:bg-slate-600 duration-700" onclick="modificarFrase({{ $ff ? $ff->id : '' }})">Confirmar</button>
            </div>
        </div>
        <div class="bg-black text-white p-2 flex flex-col shadow-md shadow-white hover:scale-110 transition duration-500 select-none h-72 overflow-y-auto w-1/2">
            @foreach ($frases as $votacion)
                    <p class="text-center border-t-2 border-x-2 border-solid border-white select-none">N. {{ $votacion->id }}</p>
                    <div class="flex bg-black p-2 border-2 border-white border-solid select-none">
                        <div class="p-2  w-full flex flex-col gap-1 overflow-hidden">
                            <p>Frase: {{ $votacion->frase }}</p>
                        </div>
                        <div class="flex flex-col border-l-2 border-black border-solid justify-center items-center">
                            <button class="bg-pink-300 p-1 text-black border-solid border-black hover:bg-pink-200
                             hover:text-black" onclick="sacarDatos('{{$votacion->id}}')"> 
                                Modificar Frase
                            </button>
                            <button class="bg-slate-900 p-1 text-white border-solid border-black 
                            hover:bg-slate-700" onclick="eliminarFrase('{{$votacion->id}}')"> 
                                Eliminar Frase
                            </button>
                        </div>
                    </div><br>
                @endforeach
        </div>
    </div>
    <script>
        let frase = document.getElementById("frase");
        let frase2 = document.getElementById("frase2");
        function agregarFrase(){
            window.livewire.emit("agregarFrase",frase.value);
            let timer = setInterval(function(){
                clearInterval(timer);
                location.reload();
            },5000);
        }

        function modificarFrase(id){
            window.livewire.emit("modificarFrase",id,frase2.value);
            let timer = setInterval(function(){
                clearInterval(timer);
                location.reload();
            },5000);
        }
        function sacarDatos(id){
            console.log("sacando");
            console.log(id);
            window.livewire.emit("getFrase",id);
        }
        function eliminarFrase(id){
            console.log("eliminando");
            console.log(id);
            window.livewire.emit("eliminarFrase",id);
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

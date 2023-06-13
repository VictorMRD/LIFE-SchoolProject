<div class="w-screen h-screen overflow-auto box-border">
    {{-- Success is as dangerous as failure. --}}
    <div class="flex flex-col gap-10 bg-black justify-center items-center h-screen w-screen overflow-auto">
        <p class="text-white font-semibold text-6xl">Votaciones</p>
        <p class="text-white font-semibold text-4xl"><a href="/index">Regresar</a></p>
        <div class="flex flex-col gap-5 pt-10 bg-black justify-center items-center h-96 w-screen overflow-auto">
            @foreach ($votaciones as $encuesta)
                <div class="w-2/4 flex flex-col justify-center items-center bg-black text-white gap-6
                    shadow-md shadow-white select-none p-8">
                    <p class="text-4xl text-center font-semibold">{{ $encuesta->pregunta }}</p>
                    <div class="flex text-center justify-center items-center gap-6">
                        <div class="hover:scale-110">
                            <button onclick="votar({{ $encuesta->id }},1)" class="text-xl font-semibold">{{ $encuesta->respuesta1 }}</button>
                        </div>
                        <div class="hover:scale-110">
                            <button onclick="votar({{ $encuesta->id }},2)" class="text-xl font-semibold">{{ $encuesta->respuesta2 }}</button>
                        </div>
                        <div class="hover:scale-110">
                            <button onclick="votar({{ $encuesta->id }},3)" class="text-xl font-semibold">{{ $encuesta->respuesta3 }}</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function votar(id, opcion){
        console.log("votando")
            window.livewire.emit("votar", id, opcion);
            let timer = setInterval(function(){
                clearInterval(timer);
                document.location.href = "/index";
            },5000);
        }
    </script>
</div>

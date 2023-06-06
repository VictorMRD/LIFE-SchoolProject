<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div id="message-form" class="flex">
            <input type="text" id="mensaje" class="w-full p-2 border-t-8 border-black">
            <button id="boton" class="bg-blue-600 text-white p-2 border-t-8 border-black border-l-4 text-xl">Send</button>
    </div>
    <script>

    </script>
    <script>
        let btn = document.getElementById("boton");
        let txt = document.getElementById("mensaje");
        let mensaje;
        btn.addEventListener('click', enviarMensaje);
        function enviarMensaje(){
            mensaje = txt.value;
            txt.value = "";
            
            // Emit Livewire event with the mensaje value
            window.livewire.emit('enviarMensaje', mensaje);
        }
        txt.addEventListener("keydown", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                enviarMensaje();
            }
        });
    </script>
</div>
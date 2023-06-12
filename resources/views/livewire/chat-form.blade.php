<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div id="message-form" class="flex">
            <input type="textbox2" id="textbox" class="w-full p-2 border-t-8 border-black"></input>
            <button id="boton" class="bg-blue-600 text-white p-2 border-t-8 border-black border-l-4 text-xl">Send</button>
    </div>
    <script>

    </script>
    <script>
        let btn = document.getElementById("boton");
        let txt = document.getElementById("textbox");
        let mensajezz;
        btn.addEventListener('click', enviarMensaje);
        function enviarMensaje(){
            mensajezz = txt.value;
            txt.value = "";
            console.log(mensajezz);
            // Emit Livewire event with the mensaje value
            window.livewire.emit('enviarMensaje', mensajezz);
        }
        txt.addEventListener("keydown", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                enviarMensaje();
            }
        });
    </script>
</div>
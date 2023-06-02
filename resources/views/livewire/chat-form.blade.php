<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div id="message-form" class="flex">
            <input type="text" id="mensaje" class="w-full p-2 border-t-8 border-black" wire:model="mensaje" wire:keydown.enter="enviarMensaje">
            <button id="boton" class="bg-blue-600 text-white p-2 border-t-8 border-black border-l-4 text-xl" wire:click="enviarMensaje">Send</button>
    </div>
    <script>
        let btn = document.getElementById("boton");
        let txt = document.getElementById("mensaje");
        btn.addEventListener('click', limpiarTextBox);
        function limpiarTextBox(){
            txt.value="";
        }
        txt.addEventListener("keydown", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                txt.value="";
            }
        });
    </script>
</div>
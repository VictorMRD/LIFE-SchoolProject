<?php
    // Assuming you have a model named Message that represents your messages table
    use App\Models\Message;

    // Fetch the messages from the database
    $messages = Message::all();
?>

<div id="ChatRoom" class="h-full w-full bg-gray-200 transition duration-300 flex flex-col justify-end overflow-hidden relative">
    <div id="caja" class="flex flex-col justify-end bg-red-800 overflow-hidden">
        {{-- Success is as dangerous as failure. --}}

        <ul id="lista" class="flex flex-col gap-2 p-2 overflow-y-auto overflow-x-hidden absolute top-0 left-0 right-0 bottom-0 ">
            @foreach($messages as $message)
                <li class="bg-white p-2 border-solid border-black border-2 flex flex-col items-start shadow-2xl max-w-max">
                    <p class="font-bold border-b-2 border-black">{{ $message->usuario }}</p>
                    <p class="text-ellipsis overflow-hidden">{{ $message->mensaje }}</p>
                </li>
                <script>
                    var lista = document.getElementById("lista");
                    lista.scrollTop = lista.scrollHeight;
                </script>
            @endforeach
        </ul>
    </div>


    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('f3dce411400be5b772a8', {
        cluster: 'us2'
        });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
            window.livewire.emit('mensajeRecibido', data.mensaje);
        });
    </script>
</div>

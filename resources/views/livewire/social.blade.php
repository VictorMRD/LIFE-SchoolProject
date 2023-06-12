<div class="box-border overflow-y-auto">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="group flex flex-col items-center w-full h-96 bg-black shadow-lg 
        shadow-white overflow-y-auto box-border">
            <div class=" overflow-x-hidden p-2 flex gap-1 flex-wrap justify-evenly w-full h-full ">
                @foreach ($users as $user)
                    <div class="flex border-solid bg-slate-200 w-5/6 h-24 hover:bg-white transition duration-700 hover:scale-110 select-none">
                        <div class="p-2  w-full flex flex-col gap-1 overflow-hidden">
                            <p class="">Estatus: 
                                @if($user->status === 'offline')
                                🔴 Offline
                                @else
                                🟢 Online
                                @endif
                            </p>
                            <p>Nombre: {{ $user->name }}</p>
                            <p>Edad: {{ $user->age }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</div>

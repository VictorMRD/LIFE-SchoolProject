<div id="content" class="w-full h-full bg-gray-500 flex justify-center items-end flex-col p-8 px-32 gap-4 blur-none transiotion duration-500">
    <div class="flex justify-start w-full">
        <div class="flex gap-2 text-white bg-black p-2 rounded-2xl">
            <p>Caminos elegidos:</p>
            <p id="contador">0</p>
        </div>
    </div>
    <p class="text-4xl bg-white p-6 text-center border-solid border-black border-4 rounded-xl select-none">
    {{ $options->Description }}
    </p>
    <button id="btnMostrar" class="p-2 bg-black text-white rounded-xl shadow-2xl hover:scale-125 duration-500" onclick="mostrar()">
        Tus opciones.
    </button>
    <div id="opt" class="w-full bg-white overflow-hidden transition-all duration-300 flex justify-center items-center border-box select-none" style="max-height: 0px;">
        <button id="opt1" class="white w-full h-full text-center group transition duration-300 blur-sm hover:blur-none">
            <p id="titulo" class="transition duration-500 w-full bg-gray-700 text-white font-bold text-2xl group-hover:bg-black ">
                {{$options->Option1_title}}
            </p>
            <p id="accion" class="transition duration-500 border-x-8 border-solid border-gray-700 border-b-8 text-xl font-bold group-hover:border-black">
                {{$options->Option1_Action}}
            </p>
            <p id="consecuencia" class="transition duration-500 border-b-8 border-solid border-x-8 border-gray-700 text-lg group-hover:border-black">
                {{$options->Option1_Description}}
            </p>
        </button>
        <button id="opt2" class="white w-full h-full text-center bg-black group transition duration-300 blur-sm hover:blur-none">
            <p id="titulo" class="transition duration-300 w-full bg-gray-300 text-black font-bold text-2xl group-hover:bg-white">
                {{$options->Option2_title}}
            </p>
            <p id="accion" class="transition duration-300 border-x-8 border-solid border-gray-300 border-b-8 text-xl font-bold text-white group-hover:border-white">
                {{$options->Option2_Action}}
            </p>
            <p id="consecuencia" class="transition duration-300 border-b-8 border-solid border-x-8 text-lg text-white group-hover:border-white">
                {{$options->Option1_Description}}
        </p>
        </button>
        <button id="opt3" class="white w-full h-full text-center group transition duration-300 blur-sm hover:blur-none">
            <p id="titulo" class="transition duration-300 w-full bg-gray-700 text-white font-bold text-2xl group-hover:bg-black ">
                {{$options->Option3_title}}
            </p>
            <p id="accion" class="transition duration-300 border-x-8 border-solid border-gray-700 border-b-8 text-xl font-bold group-hover:border-black">
                {{$options->Option3_Action}}
            </p>
            <p id="consecuencia" class="transition duration-300 border-b-8 border-solid border-x-8 border-gray-700 text-lg group-hover:border-black">
                {{$options->Option1_Description}}
            </p>
        </button>
    </div>
    <script>
        let userID = {{ session('id') }};
        console.log(userID);
        window.onload = function() {
            window.livewire.emit('getTheUser', userID);
        };

        let opciones = document.getElementById("opt");
        let show = false;

        //History path selection
        let option1 = document.getElementById("opt1");
        let option2 = document.getElementById("opt2");
        let option3 = document.getElementById("opt3");

        //Option button events
        option1.addEventListener('click', function(){
            mostrar();
            animation(1);
        });
        option2.addEventListener('click', function(){
            mostrar();
            animation(2);
        });
        option3.addEventListener('click', function(){
            mostrar();
            animation(3);
        });

        function mostrar() {
            show = !show;
            if (show) {
                opciones.style.maxHeight = opciones.scrollHeight + "px";
            } else {
                opciones.style.maxHeight = "0";
            }
        }
        let optionPanel = document.getElementById("content");
        function animation(opcionElegida){
            optionPanel.style.filter = "blur(1.4em)";
            optionPanel.style.background ="black";
            let timer = setInterval(function(){
                optionPanel.style.filter = "blur(0em)";
                optionPanel.style.background ="rgb(107 114 128 / var(--tw-bg-opacity))";
                clearInterval(timer);
                //Aca va el cambio de opciones
                window.livewire.emit('nextOption',opcionElegida);
            },550);
            console.log("animation");
        }
    </script>
</div>
<div id="content" class="group bg-slate-900 flex justify-center items-end flex-col p-8 px-32 gap-4 blur-none transiotion duration-700 rounded-sm hover:shadow-lg hover:shadow-white shadow-md shadow-white w-5/6 hover:bg-slate-100">
    <!-- Contador -->
    <p id="mensaje">{{$user->alert}}</p>
    <!-- Descripcion de la historia -->
    <p class="text-4xl  text-white font-semibold p-6 text-center border-solid select-none group-hover:text-black duration-700">
        {{ $options->Description }}
    </p>
    <!-- Boton de opciones -->
    <button id="btnMostrar" class="p-2 bg-black text-white rounded-xl shadow-2xl hover:scale-125 duration-500" onclick="mostrar()">
        Tus opciones.
    </button>
    <!-- Menu desplegable de opciones -->
    <div id="opt" class="w-full h-full bg-black overflow-hidden transition-all duration-500 flex justify-center items-center border-box select-none rounded-xl" style="max-height: 0px;">
        <button id="opt1" class="rounded-xl white w-full h-full text-center group/second transition duration-500 blur-sm hover:blur-none bg-black hover:bg-white text-white hover:text-black border-2 border-solid border-black">
            <p id="titulo" class="border-b-2 border-solid border-transparent w-full  font-bold text-2xl group-hover/second:border-b-2 group-hover/second:border-solid group-hover/second:border-black">
                {{$options->Option1_title}}
            </p>
            <p id="titulo" class="border-b-2 border-solid border-transparent w-full  font-bold text-2xl group-hover/second:border-b-2 group-hover/second:border-solid group-hover/second:border-black">
                {{$options->Option1_Action}}
            </p>
            <p id="consecuencia" class="text-lg h-full">
                {{$options->Option1_Description}}
            </p>
        </button>
        <button id="opt2" class="rounded-xl white w-full h-full text-center group/second transition duration-500 blur-sm hover:blur-none bg-black hover:bg-white text-white hover:text-black border-2 border-solid border-black">
            <p id="titulo" class="border-b-2 border-solid border-transparent w-full  font-bold text-2xl group-hover/second:border-b-2 group-hover/second:border-solid group-hover/second:border-black">
                {{$options->Option2_title}}
            </p>
            <p id="titulo" class="border-b-2 border-solid border-transparent w-full  font-bold text-2xl group-hover/second:border-b-2 group-hover/second:border-solid group-hover/second:border-black">
                {{$options->Option2_Action}}
            </p>
            <p id="consecuencia" class="text-lg">
                {{$options->Option2_Description}}
            </p>
        </button>
        <button id="opt3" class="rounded-xl white w-full h-full text-center group/second transition duration-500 blur-sm hover:blur-none bg-black hover:bg-white text-white hover:text-black border-2 border-solid border-black">
            <p id="titulo" class="border-b-2 border-solid border-transparent w-full  font-bold text-2xl group-hover/second:border-b-2 group-hover/second:border-solid group-hover/second:border-black">
                {{$options->Option3_title}}
            </p>
            <p id="titulo" class="border-b-2 border-solid border-transparent w-full  font-bold text-2xl group-hover/second:border-b-2 group-hover/second:border-solid group-hover/second:border-black">
                {{$options->Option3_Action}}
            </p>
            <p id="consecuencia" class="text-lg">
                {{$options->Option3_Description}}
            </p>
        </button>
    </div>
    <script>
        let userID = {{ session('id') }};
        console.log(userID);
        window.onload = function() {
            window.livewire.emit('getTheUser', userID);
            console.log(mensaje2.textContext)
            if(mensaje2.textContent !== ""){
                console.log("Mensaje");
                alert("MENSAJE DE ADMINISTRACION ->" + mensaje2.textContent);
                mensaje2.textContent = null;
                window.livewire.emit('quitarMensaje', userID);
                console.log("hola mundo");
                console.log({{ session('alerta') }});
            }
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
                opciones.style.maxHeight = "300px";
            } else {
                opciones.style.maxHeight = "0";
            }
        }
        let optionPanel = document.getElementById("content");
        function animation(opcionElegida){
            optionPanel.style.filter = "blur(0.4em)";
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
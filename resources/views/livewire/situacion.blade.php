<div id="content" class="overflow-hidden group bg-slate-900 flex justify-center items-end flex-col p-8 px-32 gap-4 blur-none transiotion duration-700 rounded-sm hover:shadow-lg hover:shadow-white shadow-md shadow-white w-5/6 hover:bg-slate-100">
    <!-- Contador -->
    <div id="graficas" class="text-center hidden w-full h-full flex-col justify-center items-center p-2 select-none transition duration-500 text-white group-hover:text-black">
        <p class="text-4xl font-semibold p-1">Este es tu resumen</p>
        <p class="text-2xl font-semibold">Total de decisiones: {{ $emotion->Felicidad + $emotion->Sorpresa + $emotion->Ira + $emotion->Miedo + $emotion->Disgusto + $emotion->Tristeza }}</p>
            <p class="text-2xl font-semibold">Decisiones por emocion</p>
        <div class="flex justify-center items-center w-1/2 flex-col text-xl font-semibold">
            <p>Felicidad: {{ $emotion->Felicidad }}</p>
            <p>Sorpresa: {{ $emotion->Sorpresa }}</p>
            <p>Ira: {{ $emotion->Ira }}</p>
            <p>Miedo: {{ $emotion->Miedo }}</p>
            <p>Disgusto: {{ $emotion->Disgusto }}</p>
            <p>Tristeza: {{ $emotion->Tristeza }}</p>
        </div>
        <p class="text-2xl font-semibold">¿Qué nos dice de ti?</p>
        @if($emotion->Felicidad > $emotion->Sorpresa 
        && $emotion->Felicidad > $emotion->Ira 
        && $emotion->Felicidad > $emotion->Miedo 
        && $emotion->Felicidad > $emotion->Disgusto 
        && $emotion->Felicidad > $emotion->Tristeza)
            <p class="font-semibold flex justify-center items-center text-center p-1 text-xl">Al abrazar la senda de la Felicidad, 
                te conviertes en un arquitecto del alma, construyendo con cada decisión un edificio sólido y hermoso de dicha y plenitud. 
                En tu camino, descubres que la auténtica victoria reside en encontrar el éxtasis 
                en las pequeñas y simples cosas, en tejer una red de momentos luminosos y en desatar 
                el poder transformador de la sonrisa.</p>
        @elseif($emotion->Sorpresa > $emotion->Felicidad 
        && $emotion->Sorpresa > $emotion->Ira 
        && $emotion->Sorpresa > $emotion->Miedo 
        && $emotion->Sorpresa > $emotion->Disgusto 
        && $emotion->Sorpresa > $emotion->Tristeza)
        <p class="font-semibold flex justify-center items-center text-center p-2 text-sm"> Con valentía y curiosidad, se adentra en los territorios inexplorados de la incertidumbre, 
            sabiendo que allí se ocultan los tesoros más extraordinarios. En cada giro y cada grito de 
            asombro, se descubre a sí mismo renovado, despertando la chispa de la maravilla que yace 
            dentro. A través de la sorpresa, el jugador rompe las barreras de lo esperado y abre las 
            puertas de la creatividad y la innovación.</p>
        @elseif($emotion->Ira > $emotion->Sorpresa 
        && $emotion->Ira > $emotion->Felicidad 
        && $emotion->Ira > $emotion->Miedo 
        && $emotion->Ira > $emotion->Disgusto 
        && $emotion->Ira > $emotion->Tristeza)
        <p class="font-semibold flex justify-center items-center text-center p-2 text-sm"> Contemplando con asombro las elecciones del jugador, quien opta por explorar las facetas 
            de la ira, se revela un viajero intrépido en busca de la transformación interna. A través 
            de la confrontación con la ira, descubre la verdadera fuerza que yace en el dominio de las 
            emociones. Embrujado por el fuego ardiente, aprende a canalizar la ira en una fuerza constructiva, 
            trascendiendo así los límites de la furia y abriendo el camino hacia la sabiduría y el autodominio.</p>
        @elseif($emotion->Miedo > $emotion->Sorpresa 
        && $emotion->Miedo > $emotion->Ira 
        && $emotion->Miedo > $emotion->Felicidad 
        && $emotion->Miedo > $emotion->Disgusto 
        && $emotion->Miedo > $emotion->Tristeza)
        <p class="font-semibold flex justify-center items-center text-center p-2 text-sm"> Contemplando con admiración las elecciones del jugador, quien se adentra valientemente en 
            la oscuridad del miedo, descubre que dentro de la sombra reside el verdadero coraje. Al 
            enfrentar sus temores más profundos, el jugador despierta a su fuerza interior, trascendiendo 
            los límites de la autoduda y abriendo el camino hacia la autenticidad y el crecimiento personal.</p>
        @elseif($emotion->Disgusto > $emotion->Sorpresa 
        && $emotion->Disgusto > $emotion->Ira 
        && $emotion->Disgusto > $emotion->Miedo 
        && $emotion->Disgusto > $emotion->Felicidad 
        && $emotion->Disgusto > $emotion->Tristeza)
        <p class="font-semibold flex justify-center items-center text-center p-2 text-sm"> El jugador, explorando con valentía las profundidades del disgusto, descubre que en la oscuridad 
            reside la semilla de la transformación. Al enfrentar el descontento con determinación, se nutre 
            de fortaleza interior y emerge renovado. En ese camino de autodescubrimiento, el jugador despierta 
            a la belleza de la resiliencia, forjando un nuevo sendero hacia la plenitud y la redención.</p>
        @elseif($emotion->Tristeza > $emotion->Sorpresa 
        && $emotion->Tristeza > $emotion->Ira 
        && $emotion->Tristeza > $emotion->Miedo 
        && $emotion->Tristeza > $emotion->Disgusto 
        && $emotion->Tristeza > $emotion->Felicidad)
        <p class="font-semibold flex justify-center items-center text-center p-2 text-sm"> El jugador, inmerso en la enigmática esencia de la tristeza, se convierte en un viajero del alma. 
            Al sumergirse en la profundidad de la melancolía, descubre la belleza oculta en los momentos de 
            quietud y reflexión. A través de la tristeza, el jugador despierta a la sensibilidad que yace en 
            lo más profundo de su ser, tejiendo así una conexión más íntima con la fragilidad humana.</p>
        @else
        <p class="font-semibold flex justify-center items-center text-center p-2 text-sm"> El jugador, inmerso en 
            un misterioso equilibrio emocional, se adentra en un viaje de autodescubrimiento. En medio de la difusión 
            de las emociones, encuentra un terreno fértil para explorar la complejidad de su ser. En este estado de 
            amalgama emocional, el jugador se sumerge en las profundidades de la introspección, descubriendo la riqueza 
            de la experiencia humana.</p>        
        @endif
        <button class="p-2 bg-black text-white rounded-xl shadow-2xl hover:scale-125 duration-500" onclick="reiniciar()">Reiniciar</button>
    </div>
    <p id="mensaje">{{$user->alert}}</p>
    <!-- Descripcion de la historia -->
    <p id="desc" class="w-full text-4xl text-white font-semibold p-6 text-center select-none group-hover:text-black duration-700 flex justify-center items-center">
        {{ $options->Description }}
    </p>
    <!-- Boton de opciones -->
        @if( $options->Option1_Nextpart === null || $options->Option1_Nextpart == null || $options->Option2_Nextpart === null ||
        $options->Option2_Nextpart === null || $options->Option3_Nextpart === null)
    <button id="btnMostrar" class="p-2 bg-black text-white rounded-xl shadow-2xl hover:scale-125 duration-500" onclick="resumen()">
            Resumen de tu juego.
        @elseif( $options->Option1_Nextpart === $options->Option2_Nextpart && $options->Option1_Nextpart !== null)
    <button id="btnMostrar" class="p-2 bg-black text-white rounded-xl shadow-2xl hover:scale-125 duration-500" onclick="siguiente()">
            Siguiente
        @else
    <button id="btnMostrar" class="p-2 bg-black text-white rounded-xl shadow-2xl hover:scale-125 duration-500" onclick="mostrar()">
            Opciones
        @endif
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
        let desc = document.getElementById("desc");
        let btnMostrar = document.getElementById("btnMostrar");
        let opciones = document.getElementById("opt");
        let graficas = document.getElementById("graficas");

        let option1 = document.getElementById("opt1");
        let option2 = document.getElementById("opt2");
        let option3 = document.getElementById("opt3");

        let optionPanel = document.getElementById("content");

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
                console.log("hola mundo v");
                console.log({{ session('alerta') }});
            }
        };

        let show = false;

        //History path selection
        
        //Option button events
        //Se llama la funcion de mostrar una vez seleccionada una opción, para que se oculten las mismas opciones
        //Una vez se seleccione
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
            console.log("animation v");
        }
        function resumen() {
            optionPanel.style.filter = "blur(0.4em)";
            optionPanel.style.background = "black";
            let timer = setInterval(function() {
                graficas.style.display = "flex";

                btnMostrar.style.display = "none";
                desc.style.display= "none";
                opciones.style.maxHeight= "0px";
                optionPanel.style.filter = "blur(0em)";
                clearInterval(timer);
            }, 550);
            console.log("resumen");
                window.livewire.emit('quitar');
        }

        function reiniciar() {
            desc.style.display= "flex";
            btnMostrar.style.display = "flex";
            opciones.style.maxHeight= "0px";
            graficas.style.display = "none";
            window.livewire.emit('reiniciar');
        }
        function siguiente() {
            animation(1);
        }
    </script>
</div>
<div class="w-full h-full bg-gray-500 flex justify-center items-end flex-col p-8 px-32 gap-4">
    <div class="flex justify-start w-full">
        <div class="flex gap-2 text-white bg-black p-2 rounded-2xl">
            <p>Caminos elegidos:</p>
            <p id="contador">0</p>
        </div>
    </div>
    <p class="text-4xl bg-white p-6 text-center border-solid border-black border-4 rounded-xl select-none">
        Intentaste evitarlo, pero al final la situación se sobrepuso a tu persona. La puerta no cierra, y ellos ya vienen. "¿Qué es lo que me espera?" es lo único que tienes en tu cabeza mientras escuchas los pasos fuera del pasillo acercándose a ti.
    </p>
    <button id="btnMostrar" class="p-2 bg-black text-white rounded-xl shadow-2xl hover:scale-125 duration-500" onclick="mostrar()">
        Tus opciones.
    </button>
    <div id="opt" class="w-full bg-white overflow-hidden transition-all duration-300 flex justify-center items-center border-box select-none" style="max-height: 0;">
        <div class="white w-full h-full text-center group transition duration-300 blur-sm hover:blur-none">
            <p id="titulo" class="transition duration-500 w-full bg-gray-700 text-white font-bold text-2xl group-hover:bg-black ">Titulo1</p>
            <p id="accion" class="transition duration-500 border-x-8 border-solid border-gray-700 border-b-8 text-xl font-bold group-hover:border-black">Acción</p>
            <p id="consecuencia" class="transition duration-500 border-b-8 border-solid border-x-8 border-gray-700 text-lg group-hover:border-black">No lo volveras a ver</p>
        </div>
        <div class="white w-full h-full text-center bg-black group transition duration-300 blur-sm hover:blur-none">
            <p id="titulo" class="transition duration-300 w-full bg-gray-300 text-black font-bold text-2xl group-hover:bg-white">Titulo1</p>
            <p id="accion" class="transition duration-300 border-x-8 border-solid border-gray-300 border-b-8 text-xl font-bold text-white group-hover:border-white">Acción</p>
            <p id="consecuencia" class="transition duration-300 border-b-8 border-solid border-x-8 text-lg text-white group-hover:border-white"">No lo volveras a ver</p>
        </div>
        <div class="white w-full h-full text-center group transition duration-300 blur-sm hover:blur-none">
            <p id="titulo" class="transition duration-300 w-full bg-gray-700 text-white font-bold text-2xl group-hover:bg-black ">Titulo1</p>
            <p id="accion" class="transition duration-300 border-x-8 border-solid border-gray-700 border-b-8 text-xl font-bold group-hover:border-black">Acción</p>
            <p id="consecuencia" class="transition duration-300 border-b-8 border-solid border-x-8 border-gray-700 text-lg group-hover:border-black">No lo volveras a ver</p>
        </div>
    </div>
</div>

<script>
    let opciones = document.getElementById("opt");
    let flag = false;

    function mostrar() {
        flag = !flag;
        if (flag) {
            opciones.style.maxHeight = opciones.scrollHeight + "px";
        } else {
            opciones.style.maxHeight = "0";
        }
    }
</script>
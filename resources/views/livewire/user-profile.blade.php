<div class="w-1/2 h-96 justify-start items-center flex-col flex bg-black">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <p class="text-4xl font-bold text-white">Perfil de usuario</p>
    <div class="text-2xl flex justify-start items-start bg-slate-800 text-white w-full p-2 py-3 h-full gap-2">
        <div class="flex flex-col justify-evenly gap-2 w-1/3 text-start">
            <p>Nombre</p>
            <p>Correo </p>
            <p>Edad  </p>
            <p>Descripción</p>
        </div>
        <div class="flex flex-col justify-evenly gap-2 w-4/5">
            <input id="txtName" class="border-solid border-black border-1 text-center h-5/6 bg-gray-600"></input>
            <input id="txtEmail" class="border-solid border-black border-1 text-center h-5/6 bg-gray-600"></input>
            <input id="txtAge" class="border-solid border-black border-1 text-center h-5/6 bg-gray-600"></input>
            <textarea id="txtDescription" class="border-solid border-black border-1 h-56 w-full resize-none bg-gray-600"></textarea>
        </div>
        <div class="w-1/5 gap-2 text-white flex flex-col">
            <button id="editar" class="bg-black hover:bg-blue-400">Editar</button>
            <button id="cancelar" class="bg-black hover:bg-red-300">Cancelar</button>
            <button id="confirmar" class="bg-black hover:bg-green-400">Confirmar</button>
            <button id="salir" class="bg-black hover:bg-green-400">Salir</button>
        </div>
    </div>
    <script>
        let txtN = document.getElementById('txtName');
        let txtE = document.getElementById('txtEmail');
        let txtA = document.getElementById('txtAge');
        let txtD = document.getElementById('txtDescription');
        window.onload = function(){
            txtN.value = "{{ session('user') }}";
            txtN.disabled = true;
            txtE.value = "{{ session('email') }}";
            txtE.disabled = true;
            txtA.value = "{{ session('age') }}";
            txtA.disabled = true;
            txtD.value = "{{ session('description') }}";
            txtD.disabled = true;
        };

        let btnEditar = document.getElementById('editar');
        let btnConfirmar = document.getElementById('confirmar');
        let btnCancelar = document.getElementById('cancelar');
        let btnSalir = document.getElementById('salir');
        let bandera = false;
        btnEditar.addEventListener("click", function(){
            bandera = false;
            if(!bandera){
                txtN.disabled = false;
                txtN.style.background = "lightslategray";
                txtE.disabled = false;
                txtE.style.background = "lightslategray";
                txtA.disabled = false;
                txtA.style.background = "lightslategray";
                txtD.disabled = false;
                txtD.style.background = "lightslategray";
            }else{
                cancelar();
            }
        });
        let rgb = "rgb(75, 85, 99)";
        btnCancelar.addEventListener('click', function(){
            cancelar();
        });

        function cancelar(){
            if(!bandera){
                bandera = !bandera;
                txtN.disabled = true;
                txtN.style.background = rgb;
                txtE.disabled = true;
                txtE.style.background = rgb;
                txtA.disabled = true;
                txtA.style.background = rgb;
                txtD.disabled = true;
                txtD.style.background = rgb;

                txtN.value = "{{ session('user') }}";
                txtE.value = "{{ session('email') }}";
                txtA.value = "{{ session('age') }}";
                txtD.value = "{{ session('description') }}";
            }
        }
        btnConfirmar.addEventListener('click', function(){
            let uID = {{ session('id')}};
            let name = txtN.value;
            let email = txtE.value;
            let age = txtA.value;
            let description = txtD.value;
            window.livewire.emit('saveChanges', uID, name, email, age, description);
            let timer = setInterval(function(){
                clearInterval(timer);
                location.reload(true);
                alert("La pagina se recargara para guardar los cambios.");
            },8000);
        });
        btnSalir.addEventListener('click', function(){
            window.location = "/index";
        });
    </script>
</div>

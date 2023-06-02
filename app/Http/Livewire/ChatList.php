<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatList extends Component
{
    //cualquier variable publica declarada en el objeto, puede luego 
    //ser referenciada en cualquier parte de nuestro archivo
    public $mensajes = [];
    
    //Este array cumplee una funcion muy curiosa
    //Lo que hace es que cualquier nombre que tenga dentro, se espera que sea una funcion de otro lado
    //que al hacer el emit, aqui nos llegara una notificacion
    //Y para quee haga algo cuando llegue a suceder esta funcion, tendremos que crear una funcion aqui mismo 
    //Que tenga el mismo nombre que el evento
    protected $listeners = ["mensajeRecibido"];

    public function mensajeRecibido($mensaje){
        $this->mensajes[] = $mensaje;
    }

    public function mount(){
        $this->mensajes = [];
    }

    public function render()
    {
        return view('livewire.chat-list');
    }
}

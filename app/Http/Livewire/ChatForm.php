<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatForm extends Component
{

    //Basicamanete es un metodo que se ejecuta una unica vez
    //unico lugar donde podemos tener acceso al request, pues sucede cuando se carga la pagina
    public $mensaje;
    
    public function mount(){
        $this->mensaje = "";
    }

    public function render()
    {
        return view('livewire.chat-form');
    }

    public function enviarMensaje(){
        //Al reaelizar este emision desde esta clase, alertamos a todas las otras que esten escuchando por este evento
        //Y como lo que queremos en este caso es mandar el mensaje que el usuario a escrito, lo que tenemos que hacer es
        //Junto al emit, mandar la variable que contenga el mensaje

        $this->emit("mensajeRecibido", $this->mensaje); 

        event(new \App\Events\EnviarMensaje(($username = session('user')),$this->mensaje));

    }
}

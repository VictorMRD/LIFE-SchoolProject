<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\option;
use App\Models\User;

class Situacion extends Component
{
    public $options;
    public $user;
    protected $listeners = ['nextOption','getTheUser','quitarMensaje'];

    public function render()
    {
        return view('livewire.situacion');
    }
    
    public function mount(){
        $this->options = option::getById(session('position'));
        $this->user = User::getUser(session('id'));
    }

    //Le pasamos la eleccion que tomo nuestro usuario
    public function nextOption($optionSelec){
        $this->options = option::getById($this->user->position);
        if($optionSelec == 3){
            $this->user->position = $this->options->Option3_Nextpart;
            if($this->options->Option3_Nextpart == null)
                return;
            $this->reLoadPage($this->user->position);
            logger('Opcion 3 seleccionada.');
        }else if($optionSelec == 2){
            if($this->options->Option2_Nextpart == null)
                return;
            $this->user->position = $this->options->Option2_Nextpart;
            $this->reLoadPage($this->user->position);
        }else{
            if($this->options->Option1_Nextpart == null)
                return;
            $this->user->position = $this->options->Option1_Nextpart;
            $this->reLoadPage($this->user->position);
        }
        $this->user->save();
    }
    //Funcion para recargar el juego despues de haber cambiar una decision o para montar la imagen
    public function reLoadPage($id){
        $this->options = option::getById($id);
    }
    //Funcion para poder obtener el usuario
    public function getTheUser($id){
        $this->user = User::getUser($id);
        if($this->user){
            $this->reLoadPage($this->user->position);
        }
        return $this->user;
    }
    public function quitarMensaje($id)
    {
        $this->user = User::getUser($id);
        if ($this->user) {
            $this->user->alert = "";
            $this->user->save();
            logger("Here is the alert before:");
            logger(session('alerta'));
            session(['alerta' => null]);
            session(['alerta' => ""]);
            logger("Here is the alert after:");
            logger(session('alerta'));
        }
    }
    
}

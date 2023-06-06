<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Option;
use App\Models\User;

class Situacion extends Component
{
    public $options;
    public $user;
    protected $listeners = ['nextOption','getTheUser'];

    public function render()
    {
        return view('livewire.situacion');
    }
    
    public function mount(){
        logger('Objeto montado correctamente.');
        logger('Posicion del usuario:');
        logger(session('position'));
        $this->options = Option::getById(session('position'));
        
    }

    //Le pasamos la eleccion que tomo nuestro usuario
    public function nextOption($optionSelec){
        logger('Obteniendo opciones nuevo codigo.');
        logger($this->user->position);
        $this->options = Option::getById($this->user->position);
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
        logger('Recarga realizada.');
        $this->options = Option::getById($id);
    }
    //Funcion para poder obtener el usuario
    public function getTheUser($id){
        logger('Obteniendo usuario.');
        $this->user = User::getUser($id);
        if($this->user){
            $this->reLoadPage($this->user->position);
        }
        return $this->user;
    }
}

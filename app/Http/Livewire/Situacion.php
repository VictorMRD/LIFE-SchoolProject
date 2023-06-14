<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\option;
use App\Models\User;
use App\Models\Emotions;

class Situacion extends Component
{
    public $options;
    public $user;
    public $emotion;
    protected $listeners = ['nextOption','getTheUser','quitarMensaje','quitar','reiniciar'];

    public function render()
    {
        return view('livewire.situacion');
    }
    
    public function mount(){
        $this->emotion = Emotions::getById(session('emotions_id'));
        $this->options = option::getById(session('position'));
        $this->user = User::getUser(session('id'));
    }

    //Le pasamos la eleccion que tomo nuestro usuario
    public function nextOption($optionSelec){
        logger("--------------------------------------------------------");
        logger("DATO RECIBIDO: ");
        logger($optionSelec);
        $this->options = option::getById($this->user->position);
        $this->emotion = Emotions::getById($this->user->emotions_id);

                //Verificamos que emocion eligio, y sumamos
                switch($optionSelec){
                    case 1:
                        logger($this->options->Option1_title);
                        if($this->options->Option1_title === "Felicidad"){
                            $this->emotion->Felicidad = $this->emotion->Felicidad+1;
                        }else if($this->options->Option1_title === "Ira"){
                            $this->emotion->Ira = $this->emotion->Ira+1;
                        }else if($this->options->Option1_title === "Tristeza"){
                            $this->emotion->Tristeza = $this->emotion->Tristeza+1;
                        }else if($this->options->Option1_title === "Disgusto"){
                            $this->emotion->Disgusto = $this->emotion->Disgusto+1;
                        }else if($this->options->Option1_title === "Sorpresa"){
                            $this->emotion->Sorpresa = $this->emotion->Sorpresa+1;
                        }else if($this->options->Option1_title === "Miedo"){
                            $this->emotion->Miedo = $this->emotion->Miedo+1;
                        }else{
                            logger($this->options->Option1_title);
                        }
                        break;
                    case 2:
                        logger($this->options->Option2_title);
                        if($this->options->Option2_title === "Felicidad"){
                            $this->emotion->Felicidad = $this->emotion->Felicidad+1;
                        }else if($this->options->Option2_title === "Ira"){
                            $this->emotion->Ira = $this->emotion->Ira+1;
                        }else if($this->options->Option2_title === "Tristeza"){
                            $this->emotion->Tristeza = $this->emotion->Tristeza+1;
                        }else if($this->options->Option2_title === "Disgusto"){
                            $this->emotion->Disgusto = $this->emotion->Disgusto+1;
                        }else if($this->options->Option2_title === "Sorpresa"){
                            $this->emotion->Sorpresa = $this->emotion->Sorpresa+1;
                        }else if($this->options->Option2_title === "Miedo"){
                            $this->emotion->Miedo = $this->emotion->Miedo+1;
                        }else{
                            logger($this->options->Option2_title);
                        }
                        break;
                    case 3:
                        logger($this->options->Option3_title);
                        if($this->options->Option3_title === "Felicidad"){
                            $this->emotion->Felicidad = $this->emotion->Felicidad+1;
                        }else if($this->options->Option3_title === "Ira"){
                            $this->emotion->Ira = $this->emotion->Ira+1;
                        }else if($this->options->Option3_title === "Tristeza"){
                            $this->emotion->Tristeza = $this->emotion->Tristeza+1;
                        }else if($this->options->Option3_title === "Disgusto"){
                            $this->emotion->Disgusto = $this->emotion->Disgusto+1;
                        }else if($this->options->Option3_title === "Sorpresa"){
                            $this->emotion->Sorpresa = $this->emotion->Sorpresa+1;
                        }else if($this->options->Option3_title === "Miedo"){
                            $this->emotion->Miedo = $this->emotion->Miedo+1;
                        }else{
                            logger($this->options->Option3_title);
                        }
                        break;
                }
                $this->emotion->save();

        if($optionSelec == 3){
            if($this->options->Option3_Nextpart == null)
                return;
            $this->user->position = $this->options->Option3_Nextpart;    
            $this->reLoadPage($this->user->position);
            logger('Opcion 3 seleccionada.');
        }else if($optionSelec == 2){
            if($this->options->Option2_Nextpart == null)
                return;
            $this->user->position = $this->options->Option2_Nextpart;
            $this->reLoadPage($this->user->position);
            logger('Opcion 2 seleccionada.');
        }else{
            if($this->options->Option1_Nextpart == null)
                return;
            $this->user->position = $this->options->Option1_Nextpart;
            $this->reLoadPage($this->user->position);
            logger('Opcion 1 seleccionada.');
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

    public function quitar(){
        $this->options = new option();
    }

    public function reiniciar(){
        $this->user->position = 4;
        $this->user->save();
        $this->reLoadPage(4);
    }
    
}

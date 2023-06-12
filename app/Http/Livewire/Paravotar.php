<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\votationtable;

class Paravotar extends Component
{
    public $votaciones = [];
    protected $listeners = ["votar"];
    public function render()
    {
        return view('livewire.paravotar');
    }
    public function mount(){
        $this->votaciones = votationtable::getAllVotations();
    }
    public function votar($id, $opcion){
        logger("VOTAANDO");
        logger($id);
        logger($opcion);
        if($opcion == 1){
            $sumar = votationtable::getVotacion($id);
            $sumar->r1votos = $sumar->r1votos+1;
        }else if($opcion == 2){
            $sumar = votationtable::getVotacion($id);
            $sumar->r2votos += 1;
        }else{
            $sumar = votationtable::getVotacion($id);
            $sumar->r3votos += 1;
        }
        $sumar->save();
    }
}

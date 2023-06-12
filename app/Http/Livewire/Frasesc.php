<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\frasesz;

class Frasesc extends Component
{
    protected $listeners = ["agregarFrase","eliminarFrase","getFrase","modificarFrase"];
    public $frases = [];
    public $fraset;
    public $ff;
    public function render()
    {
        return view('livewire.frasesc');
    }

    public function mount(){
        $this->frases = frasesz::getAllFrases();
    }

    public function getFrase($id){
        logger("idextraido");
        $this->ff = frasesz::getFrase($id);
    }

    public function eliminarFrase($id){
        logger($id);
        $this->fraset = frasesz::getFrase($id);
        $this->fraset->delete();
    }

    public function agregarFrase($fraze){
        $nueva = new frasesz;
        $nueva->frase = $fraze;
        $nueva->save();
    }

    public function modificarFrase($id, $mensaje){
        $nueva = frasesz::getFrase($id);
        $nueva->frase = $mensaje;
        $nueva->save();
    }
}

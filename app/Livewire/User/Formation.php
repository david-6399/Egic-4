<?php

namespace App\Livewire\User;

use App\Models\comment;
use App\Models\formation as ModelsFormation;
use App\Models\nivEtud;
use App\Models\typeFormation;
use Livewire\Component;

class Formation extends Component
{

    public $perNiv = '';
    public $perType = '';
    public $perTarif = '';
    public $perTarifMin = '';


    public function openFormation($id){
        return redirect()->route('formation.show',['id'=>$id]);
    }



    public function render()
    {
        $data = ModelsFormation::query()
                ->when(!empty($this->perType), function($query){
                    $query->where('typeFormation_id','=',$this->perType);
                })
                ->when(!empty($this->perTarif), function($query){
                    $query->where('tarif','<=',$this->perTarif);
                })
                ->get();

        $nivEtuds = nivEtud::get();
        $typeFormations = typeFormation::get();


        return view('livewire.user.formation.index',[
            'formations' => $data,
            'nivEtuds' => $nivEtuds,
            'typeFormations' => $typeFormations,
        ])
                ->extends('livewire.user.index')
                ->section('content');
    }
}

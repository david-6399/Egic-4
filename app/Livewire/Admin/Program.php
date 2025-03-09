<?php

namespace App\Livewire\Admin;

use App\Models\formation;
use App\Models\module;
use App\Models\program as ModelsProgram;
use Livewire\Component;
use Livewire\WithFileUploads;

use function PHPUnit\Framework\isEmpty;

class Program extends Component
{
    use WithFileUploads ;
    
    public $getFormationId = null;

    public $getProgramId = null;

    public $module = [];

    public $moduleImage = null ;

    public $search = '' ;

    public $showInput = false ;

    public $programName = '' ;


    public function showInputForAdd(){
        $this->showInput = true ;
    }

    public function addNewProgram(){
        $this->validate([
            'programName'=> 'required|string|max:30'
        ]);
        
        ModelsProgram::create([
            'titre' => $this->programName,
            'formation_id' => $this->getFormationId->id
        ]);

        $this->programName = '' ;
        $this->showInput = false;
    }

    public function addProgramAnnuler(){
        $this->programName = '';
        $this->showInput = false;
    }


    public function modal_programAndModule($id){
        $this->dispatch('openModal');
        $this->getFormationId = formation::find($id);
        
    }

    public function addNewModule($id){
        $this->getProgramId = ModelsProgram::find($id);
        $this->dispatch('openModal');
    }

    public function submitNewModule(){
        if($this->moduleImage != null){
            $storeImage = $this->moduleImage->store('moduleImages','public');
            $path = 'storage/'.$storeImage;
        }
        

        $data = $this->validate([
            'module.name' => 'required',
            'module.coefficient' => 'required',
            'moduleImage' => 'required',
        ]);
        
        module::create([
            ...$this->module,
            'program_id' => $this->getProgramId->id,
            'document' => $path
        ]);

        $this->dispatch('test');
        $this->moduleImage = null ;
        $this->module = [];
    }



    public function render()
    {
        $formation = formation::with('programs')->get();
        $programs = ModelsProgram::with('module')
                ->where('formation_id',optional($this->getFormationId)->id)
                ->get();
        

        return view('livewire.admin.program.index',[
            'formations' => $formation,
            'programs' => $programs
        ])
            ->extends('livewire.admin.app')
            ->section('content');
    }
}

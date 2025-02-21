<?php

namespace App\Livewire\Admin;

use App\Models\debouche;
use App\Models\formation as ModelsFormation;
use App\Models\program;
use App\Models\typeFormation;
use Livewire\Component;
use Livewire\WithFileUploads;

class Formation extends Component
{
    use WithFileUploads;

    public $formation = [];

    public $addImage = null ;
    public $editImage = null ;

    public $editFormation = [];

    public $program = [];
    public $listOfPrograms = [];
    public $editProgram = [];

    public $newTypeFormation = '';

    public $debouche = [];
    public $listOfDebouches = [];
    public $editDebouche = [];

    public $search = '';

    public $pageStatus = 'list';

    public $perPage = '';
    
    
    // start create section

        public function addProgramToList(){
            $this->validate([
                'program.titre' => 'string|nullable'
            ]);

            array_push($this->listOfPrograms, $this->program['titre']);
            
            $this->program = [];
        }

        public function deleteProgram($index){
            foreach($this->listOfPrograms as $key => $program){
                if($key == $index){
                    unset($this->listOfPrograms[$key]);
                }
            }
        }

        public function addTypeFormation(){
            $this->validate([
                'newTypeFormation' => 'required|string'
            ]);
            
            typeFormation::create([
                'name' => $this->newTypeFormation
            ]);

            $this->newTypeFormation = '';
        }

        public function addDeboucheToList(){
        
            $this->validate([
                'debouche.titre' => 'required|string',
            ]);

            array_push($this->listOfDebouches, $this->debouche['titre']);

            $this->debouche = [];
        }

        public function deleteDebouche($index){
            foreach($this->listOfDebouches as $key => $program){
                if($key == $index){
                    unset($this->listOfDebouches[$key]);
                }
            }
        }

        public function newFormation(){

            $image = $this->addImage->store('formations', 'public');
            $path = 'storage/'.$image ;
            
            $validateFormation = $this->validate([
                'formation.nome' => 'required',
                'formation.duree' => 'required|numeric',
                'formation.tarif' => 'required|numeric',
                'formation.typeFormation_id' => 'required|exists:type_formations,id',
                'addImage' => 'image|max:1024|mimes:jpeg,png,jpg'
            ]);
            
            $newFormation = ModelsFormation::create([
                ...$validateFormation['formation'],
                'image_path' => $path
            ]);
            
            foreach($this->listOfPrograms as $program){
                program::create([
                    'titre' => $program,
                    'formation_id' => $newFormation->id
                ]);
            }

            foreach($this->listOfDebouches as $debouche){
                debouche::create([
                    'titre' => $debouche,
                    'formation_id' => $newFormation->id
                ]);
            }

            $this->listOfPrograms = [];
            $this->listOfDebouches = [];
            $this->formation = [];
            $this->addImage = null ;
            
            $this->dispatch('formationCreated');        
            
        }

    // end create section
    
// ---------------------------------------------------------------------------------------- //


    // start Edit Section
        

        public function updateFormation(){

            if($this->editImage != null){
                $image = $this->editImage->store('formations', 'public');
                $path = 'storage/'.$image ;
            }
            

            $this->validate([
                'editFormation.nome' => 'required',
                'editFormation.duree' => 'required|numeric',
                'editFormation.tarif' => 'required|numeric',
                'editFormation.typeFormation_id' => 'required|exists:type_formations,id',
                'editImage' => 'image|max:1024|mimes:jpeg,png,jpg|nullable'
            ]);

            $formation = ModelsFormation::find($this->editFormation['id'])->update([
                ...$this->editFormation,
                'image_path' => $this->editImage != null ? $path : $this->editFormation['image_path']
            ]);
            
            program::where('formation_id', $this->editFormation['id'])->delete();

            foreach($this->listOfPrograms as $program){
                program::create([
                    'titre' => $program,
                    'formation_id' => $this->editFormation['id']
                ]);
            }

            debouche::where('formation_id', $this->editFormation['id'])->delete();

            foreach($this->listOfDebouches as $debouche){
                debouche::create([
                    'titre' => $debouche,
                    'formation_id'=> $this->editFormation['id']
                ]);
            }

            $this->listOfPrograms = [];
            $this->listOfDebouches = [];
            $this->editFormation = [];

            $this->dispatch('formationUpdated');
            $this->pageStatus = 'list';

        }
        

    // end Edit Section


// ---------------------------------------------------------------------------------------- //
    public function switchToCreate(){
        $this->pageStatus = 'create';
    }
    
    public function switchToEdit($id){
        $this->editFormation = ModelsFormation::find($id)->toArray();
        $this->editProgram = program::select('titre')->where('formation_id', $id)->get()->toArray();
        foreach($this->editProgram as $program){
            array_push($this->listOfPrograms, $program['titre']);
        }

        $this->editDebouche = debouche::select('titre')->where('formation_id', $id)->get()->toArray();
        foreach($this->editDebouche as $debouche){
            array_push($this->listOfDebouches, $debouche['titre']);
        }

        $this->editDebouche = [];
        $this->editProgram = [];
        $this->pageStatus = 'edit';
    }
    
    public function switchToList(){
        $this->pageStatus = 'list';
    }

    public function render()
    {
        $typeFormations = \App\Models\typeFormation::all();
        $formations = ModelsFormation::with('typeFormation')
                        ->where('nome', 'like', '%'.$this->search.'%')
                        ->where('typeFormation_id','like','%'.$this->perPage.'%')
                        ->get();

        return view('livewire.admin.formations.index', [
            'typeFormations' => $typeFormations,
            'formations' => $formations
        ])
                ->extends('livewire.admin.app')
                ->section('content');
    }
}

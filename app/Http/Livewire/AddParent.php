<?php

namespace App\Http\Livewire;

use App\Models\Blood;
use App\Models\Nationality;
use App\Models\Religion;
use Livewire\Component;

class AddParent extends Component
{
    public $currentStep = 1;
    public $email,$password,$father_name,$father_name_en,$father_job,$father_job_en,
           $father_id,$father_passport,$father_phone,$father_nationality_id,$father_blood_id,
           $father_religion_id,$father_address;
    public $mother_name,$mother_name_en,$mother_job,$mother_job_en,
           $mother_id,$mother_passport,$mother_phone,$mother_nationality_id,$mother_blood_id,
           $mother_religion_id,$mother_address;


    public function render()
    {
        $nationalities = Nationality::all();
        $religions     = Religion::all();
        $bloods        = Blood::all();
        return view('livewire.add-parent',compact('nationalities','religions','bloods'));
    }

    public function firstStep(){
        $this->currentStep = 2;
    }

    public function secondStep(){
        $this->currentStep = 3;
    }

    public function back($step){
         $this->currentStep = $step;
    }
}

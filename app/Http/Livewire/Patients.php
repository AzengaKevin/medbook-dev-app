<?php

namespace App\Http\Livewire;

use App\Models\Gender;
use App\Models\Patient;
use App\Models\Service;
use Livewire\Component;

class Patients extends Component
{
    
    public $name;
    public $date_of_birth;
    public $gender_id;
    public $service_id;
    public $comments;

    public function render()
    {
        return view('livewire.patients', [
            'patients' => Patient::all(),
            'genders' => Gender::all(),
            'services' => Service::all()
        ])->extends('layouts.app');
    }

    /**
     * Persists new patient data to the database
     */
    public function savePatient()
    {
        $data = $this->validate();

        Patient::create($data);
    }

    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'string', 'max:64'],
            'date_of_birth' => ['bail', 'required', 'date'],
            'gender_id' => ['bail', 'required', 'numeric'],
            'service_id' => ['bail', 'required', 'numeric'],
            'comments' => ['bail', 'required']
        ];
    }
}

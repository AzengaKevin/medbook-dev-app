<?php

namespace App\Http\Livewire;

use App\Models\Gender;
use App\Models\Patient;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Patients extends Component
{
    
    public $name;
    public $date_of_birth;
    public $gender_id;
    public $service_id;
    public $comments;

    public $patientId;

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

        //Closing the modal, should be handle in JavaScript
        $this->emit('closeUpsertPatientModal');
    }

    /**
     * Validation rules
     */
    public function rules()
    {
        return [
            'name' => ['bail', 'required', Rule::unique('tbl_patient')->ignore($this->patientId), 'string', 'max:64'],
            'date_of_birth' => ['bail', 'required', 'date'],
            'gender_id' => ['bail', 'required', 'numeric'],
            'service_id' => ['bail', 'required', 'numeric'],
            'comments' => ['bail', 'required']
        ];
    }

    public function showUpsertModal(Patient $patient)
    {
        $this->patientId = $patient->id;
        $this->name = $patient->name;
        $this->date_of_birth = $patient->date_of_birth->format('Y-m-d');
        $this->gender_id = $patient->gender_id;
        $this->service_id = $patient->service_id;
        $this->comments = $patient->comments;

        //Closing the modal, should be handle in JavaScript
        $this->emit('showUpsertPatientModal');
    }

    public function updatePatient()
    {
        $data = $this->validate();

        if(!is_null($this->patientId)){
            Patient::findOrFail($this->patientId)
                ->update($data);

            $this->reset();

            $this->emit('closeUpsertPatientModal');
        }

    }
}

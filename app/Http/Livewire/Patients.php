<?php

namespace App\Http\Livewire;

use App\Models\Gender;
use App\Models\Patient;
use App\Models\Service;
use Livewire\Component;

class Patients extends Component
{

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
        info('Patient' . $this->name);
    }
}

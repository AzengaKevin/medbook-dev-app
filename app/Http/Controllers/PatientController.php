<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data  = $request->validate([
            'name' => ['bail', 'string', 'required', 'max:64'],
            'date_of_birth' => ['bail', 'required'],
            'gender_id' => ['bail', 'numeric', 'required'],
            'service_id' => ['bail', 'numeric', 'required'],
            'comments' => ['required']
        ]);

        Patient::create($data);

        return back();
    }
}

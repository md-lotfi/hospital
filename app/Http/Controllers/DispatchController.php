<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispatchController extends Controller
{
    public function dispatch($id) {
        $listpatient = Patient::all();

        return view('patient.index', ['patients' => $listpatient ]);
    }
}

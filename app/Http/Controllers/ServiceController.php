<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
class ServiceController extends Controller
{
    public function index() {
    
    }

    public function create() {
        return view('service.create');
        
    }

    public function store(Request $request) {
        $service = new Service();

        $service->nom = $request->input('nom');
        
        $service->save();
        

        
    }

    public function edit() {
        
    }

    public function update() {
        
    }

    public function destroy() {
        
    }
}

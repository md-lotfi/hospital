<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
class ServiceController extends Controller
{
    public function index() {
        $services = Service::all();
        return view('service.index', ['services' => $services]);
    }

    public function list($id) {
        $services = Service::where('services.id_service', $id);
        return view('service.index', ['services' => $services]);
    }

    public function create() {
        return view('service.create');
    }

    public function store(Request $request) {
        $service = new Service();
        $service->nom = $request->input('nom');
        $service->save();
        return redirect('service');
    }

    public function edit($id) {
        $service = Service::where('services.id_service', $id)->first();
        return view('service.edit', ['service' => $service]);
    }

    public function update(Request $request) {
        $service = Service::where('services.id_service', $request->input('id_service'))->update(['nom' => $request->input('nom')]);
        return redirect('service');
    }

    public function destroy($id) {
        Service::where('services.id_service', $id)->delete();
        return redirect('service');
    }
}

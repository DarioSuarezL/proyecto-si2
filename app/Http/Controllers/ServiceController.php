<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['services'] = Service::paginate();
        return view('service.service_index',$data);
    }

    public function create()
    {
        return view('service.service_create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'description' => 'min:3|max:50|required',
            'type_id' => 'exists:service_types,id',
            'client_id' => 'exists:users,id|required',
        ]);

        Service::create([
            'description' => $request->description,
            'type_id' => $request->type_id,
            'client_id' => $request->client_id,
            'status' => 'No atendido'
        ]);

        return redirect()->route('service.index');
    }

    public function edit()
    {
        //
    }

    public function destroy()
    {
        //
    }

    public function update()
    {
        //
    }
}

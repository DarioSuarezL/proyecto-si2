<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Service_type;
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
            'description' => 'min:3|max:70|required',
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

    public function destroy(Service $service)
    {
        Service::destroy($service->id);
        return redirect()->route('service.index');
    }

    public function edit(Service $service)
    {
        return view('service.service_edit',compact('service'));
    }

    public function update(Request $request,Service $service)
    {
        $this->validate($request,[
            'description' => 'min:3|max:70',
            'type_id' => 'exists:service_types,id',
            'client_id' => 'exists:users,id',
        ]);

        $request = request()->except(['_token','_method']);
        Service::where('id','=',$service->id)->update($request);

        return redirect()->route('service.index');
    }
}

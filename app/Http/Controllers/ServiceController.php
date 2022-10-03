<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if (auth()->user()->hasRole('cliente')){
            $data['services'] = auth()->user()->services;
        }else{
            $data['services'] = Service::paginate();
        }

        return view('service.service_index',$data);
    }

    public function create()
    {
        $data['service_types'] = Service_type::paginate();
        $data['clients'] = User::paginate();
        return view('service.service_create',$data);
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
            'number_of_workers' => '0',
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
        $data['service_types'] = Service_type::paginate();
        $data['clients'] = User::paginate();
        return view('service.service_edit',compact('service'),$data);
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

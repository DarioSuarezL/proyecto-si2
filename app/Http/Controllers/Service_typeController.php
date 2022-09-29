<?php

namespace App\Http\Controllers;

use App\Models\Service_type;
use Illuminate\Http\Request;

class Service_typeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['service_types'] = Service_type::paginate();
        return view('service_type.service_type_index',$data);
    }

    public function create()
    {
        return view('service_type.service_type_create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'min:3|max:50|required',
            'description' =>'required',
            'price' => 'numeric|required'
        ]);

        Service_type::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return redirect()->route('service_type.index');
    }

    public function destroy(Service_type $service_type)
    {
        Service_type::destroy($service_type->id);
        return redirect()->route('service_type.index');
    }

    public function edit(Service_type $service_type)
    {
        return view('service_type.service_type_edit',compact('service_type'));
    }

    public function update(Request $request, Service_type $service_type)
    {
        $this->validate($request,[
            'name' =>'min:3|max:50',
            'price' => 'numeric'
        ]);

        if($request->name != $service_type->name){
            $this->validate($request,[
                'name' =>'unique:service_types'
            ]);
        }

        if($request->description != $service_type->description){
            $this->validate($request,[
                'description' =>'unique:service_types'
            ]);
        }
        $request = request()->except(['_token','_method']);
        Service_type::where('id','=',$service_type->id)->update($request);

        return redirect()->route('service_type.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Assignment;
use App\Models\Service;
use App\Models\Worker;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['assignments'] = Assignment::paginate();
        return view('assignment.assignment_index',$data);
    }

    public function create()
    {
        $data['techs'] = Worker::where('occupied','!=','1')->paginate();
        $data['services'] = Service::paginate();
        return view('assignment.assignment_create',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'tech_id' => 'exists:users,id',
            'service_id' => 'exists:services,id'
        ]);

        $tech = Worker::find($request->tech_id);
        $tech->occupied = '1';
        $tech->save();

        $service = Service::find($request->service_id);
        $service->number_of_workers++;
        $service->status = "En proceso"." - ".$service->number_of_workers." tecnico(s)";
        $service->save();

        Assignment::create([
            'service_id' => $request->service_id,
            'tech_id' => $request->tech_id,
        ]);


        return redirect()->route('assignment.index');
    }

    public function destroy()
    {
        
    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }
}

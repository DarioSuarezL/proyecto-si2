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
        if(auth()->user()->hasRole('tecnico')){
            $data['assignments'] = auth()->user()->worker->assignments;
        }else{
            $data['assignments'] = Assignment::paginate();
        }
        return view('assignment.assignment_index',$data);
    }

    public function create()
    {
        $data['techs'] = Worker::where('occupied','!=','1')->paginate();
        $data['services'] = Service::where('status','!=','Finalizado')->paginate();
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

    public function destroy(Assignment $assignment)
    {
        $worker = Worker::find($assignment->tech_id);
        $worker->occupied = '0';
        $worker->save();

        $service = Service::find($assignment->service_id);
        $service->number_of_workers--;
        if($service->number_of_workers == 0)
        {
            $service->status = 'No atendido';
        }else{
            $service->status = "En proceso"." - ".$service->number_of_workers." tecnico(s)";
        }
        $service->save();
        
        Assignment::destroy($assignment->id);
        return redirect()->route('assignment.index');
    }

    public function edit(Assignment $assignment)
    {
        $data['techs'] = Worker::where('occupied','!=','1')->paginate();
        $data['services'] = Service::paginate();
        return view('assignment.assignment_edit',compact('assignment'));
    }

    public function update(Request $request, Assignment $assignment)
    {
        $this->validate($request,[

        ]);
    }

    public function setEnd(Assignment $assignment){
        $worker = Worker::find(auth()->user()->worker->id);
        $worker->occupied = '0';
        $worker->save();
        
        $service = Service::find($assignment->service->id);
        $service->status = 'Finalizado';
        $service->save();

        return redirect()->route('assignment.index');
    }
}

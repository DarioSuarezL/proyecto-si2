@can('assignment.edit')
@extends('layouts.sidebar')

@section('contents')
    <h1 class="text-white text-lg text-center">Editando la asignación <span class="text-gray-300 font-mono">{{$assignment->id}}</span></h1>

    <form class="mt-8 space-y-6" action="{{route('assignment.store')}}" method="POST" novalidate>
        @csrf
    <div class="-space-y-px rounded-md shadow-sm">
    
        <div>
            <select name="tech_id" id="tech_id" class="relative block w-full appearance-none rounded-none rounded-b-sm border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('type_id') border-red-700 @enderror">
                <option hidden selected value="1"><span class="text-gray-300"> --Seleccione el técnico-- </span></option>
                @foreach ($techs as $tech)
                    <option value="{{$tech->id}}">{{$tech->user->name." ".$tech->user->lastname}}</option>
                @endforeach
            </select>
        </div>
    
        <div>
            <select name="service_id" id="service_id" class="relative block w-full appearance-none rounded-none rounded-b-sm border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('type_id') border-red-700 @enderror">
                <option hidden selected value="1"><span class="text-gray-300"> --Seleccione el servicio-- </span></option>
                @foreach ($services as $service)
                    <option value="{{$service->id}}">{{$service->description}}</option>
                @endforeach
            </select>
        </div>
    
    
    
    </div>
    
    <div>
        <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <!-- Heroicon name: mini/lock-closed -->
                <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                </svg>
            </span>
            Actualizar
        </button>
    </div>
    </form>
@endsection
@endcan
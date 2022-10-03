@can('service.edit')
@extends('layouts.sidebar')

@section('contents')
    <h1 class="text-white text-lg text-center">Editando el servicio número: <span class="text-gray-300 font-mono">{{$service->id}}</span></h1>

    <form class="mt-8 space-y-6" action="{{route('service.update',$service)}}" method="POST" novalidate enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
    <div class="-space-y-px rounded-md shadow-sm">
        <div>
            <input id="description" name="description" type="text" autocomplete="description" required class="relative block w-full appearance-none rounded-none rounded-t-md border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('description') border-red-700 @enderror" placeholder="Descripción" value="{{$service->description}}">
        </div>
        @error('description')
            <p class=" text-red-600 flex p-2 gap-2 items-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>{{$message}}</span>
            </p>
        @enderror

        <div>
            <select name="type_id" id="type_id" class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('type_id') border-red-700 @enderror">
                <option hidden selected value="{{$service->service_type->id}}"><span class="text-gray-300">{{$service->service_type->name}}</span></option>
                @foreach ($service_types as $service_type)
                    <option value="{{$service_type->id}}">{{$service_type->name}}</option>
                @endforeach
            </select>
        </div>
        @error('type_id')
            <p class=" text-white text-bold flex p-2 gap-2 items-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>{{$message}}</span>
            </p>
        @enderror

        <div>
            <select name="client_id" id="client_id" class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('type_id') border-red-700 @enderror">
                <option hidden selected value="{{$service->client->id}}"><span class="text-gray-300">{{$service->client->name." ".$service->client->lastname}}</span></option>
                @foreach ($clients as $client)
                    <option value="{{$client->id}}">{{$client->name." ".$client->lastname}}</option>
                @endforeach
            </select>
        </div>
        @error('client_id')
            <p class=" text-red-600 flex p-2 gap-2 items-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>{{$message}}</span>
            </p>
        @enderror

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
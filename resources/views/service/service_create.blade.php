@extends('layouts.sidebar')

@section('contents')
    <h1 class="text-white text-lg">Formulario de creación</h1>

    <form class="mt-8 space-y-6" action="{{route('service.store')}}" method="POST" novalidate>
        @csrf
    <div class="-space-y-px rounded-md shadow-sm">
        <div>
            <input id="description" name="description" type="description" autocomplete="description" required class="relative block w-full appearance-none rounded-none rounded-t-md border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('description') border-red-700 @enderror" placeholder="Descripción" value="{{old('description')}}">
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
            <input id="type_id" name="type_id" type="type_id" autocomplete="type_id" required class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('type_id') border-red-700 @enderror" placeholder="Tipo de servicio" value="{{old('type_id')}}">
        </div>
        @error('type_id')
            <p class=" text-red-600 flex p-2 gap-2 items-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>{{$message}}</span>
            </p>
        @enderror

        <div>
            <input id="client_id" name="client_id" type="text" autocomplete="client_id" required class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('client_id') border-red-700 @enderror" placeholder="ID del cliente" value="{{old('client_id')}}">
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
            Solicitar nuevo servicio
        </button>
    </div>
    </form>

@endsection
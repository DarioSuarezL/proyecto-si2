@extends('layouts.sidebar')

@section('contents')
    <h1 class="text-white text-lg text-center">Editando al usuario: <span class="text-gray-300 font-mono">{{$user->name." ".$user->lastname}}</span></h1>

    <form class="mt-8 space-y-6" action="{{route('user.update',$user)}}" method="POST" novalidate enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
    <div class="-space-y-px rounded-md shadow-sm">
        <div>
            <input id="name" name="name" type="name" autocomplete="name" required class="relative block w-full appearance-none rounded-none rounded-t-md border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('name') border-red-700 @enderror" placeholder="Nombre(s)" value="{{$user->name}}">
        </div>
        @error('name')
            <p class=" text-white text-bold flex p-2 gap-2 items-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>{{$message}}</span>
            </p>
        @enderror

        <div>
            <input id="lastname" name="lastname" type="lastname" autocomplete="lastname" required class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('lastname') border-red-700 @enderror" placeholder="Apellidos" value="{{$user->lastname}}">
        </div>
        @error('lastname')
            <p class=" text-white text-bold flex p-2 gap-2 items-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>{{$message}}</span>
            </p>
        @enderror

        <div>
            <input id="ci" name="ci" type="text" autocomplete="ci" required class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('ci') border-red-700 @enderror" placeholder="Número de cédula de identidad" value="{{$user->CI}}">
        </div>
        @error('ci')
            <p class=" text-white text-bold flex p-2 gap-2 items-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>{{$message}}</span>
            </p>
        @enderror

        <div>
            <input id="email-address" name="email" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('email') border-red-700 @enderror" placeholder="Correo electrónico" value="{{$user->email}}">
        </div>
        @error('email')
        <p class=" text-white text-bold flex p-2 gap-2 items-center"> 
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
            </svg>
            <span>{{$message}}</span>
        </p>
        @enderror

        <div>
            <input id="phone" name="phone" type="text" autocomplete="phone" required class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('phone') border-red-700 @enderror" placeholder="Número de teléfono" value="{{$user->phone}}">
        </div>
        @error('phone')
            <p class=" text-white text-bold flex p-2 gap-2 items-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>{{$message}}</span>
            </p>
        @enderror
    </div>


    
    <div class="flex gap-3 items-center justify-center">
        <img src="{{asset('storage'.'/'.$user->photo)}}" alt="foto de perfil" class="w-1/5">
        <div class="bg-white border px-5 py-3 rounded-lg">
            <label for="photo" class="font-bold text-gray-700">Cambiar foto de perfil (opcional)</label>
            <input id="photo" name="photo" type="file" class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('photo') border-red-700 @enderror" value="{{old('photo')}}">
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
@extends('layouts.app')
@section('contents')
<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
    <div>
        <img class="mx-auto h-12 w-auto" src="{{asset("electrical-energy.png")}}" alt="Your Company">
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-white">Crear cuenta de cliente</h2>
    </div>

    <form class="mt-8 space-y-6" action="{{route('register.store')}}" method="POST" novalidate>
        @csrf
    <div class="-space-y-px rounded-md shadow-sm">
        <div>
            <input id="name" name="name" type="name" autocomplete="name" required class="relative block w-full appearance-none rounded-none rounded-t-md border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('name') border-red-700 @enderror" placeholder="Nombre completo" value="{{old('name')}}">
        </div>
        @error('name')
            <p class=" text-red-600 flex p-2 gap-2 items-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>{{$message}}</span>
            </p>
        @enderror

        <div>
            <input id="ci" name="ci" type="text" autocomplete="ci" required class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('ci') border-red-700 @enderror" placeholder="Número de cédula de identidad" value="{{old('ci')}}">
        </div>
        @error('ci')
            <p class=" text-red-600 flex p-2 gap-2 items-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>{{$message}}</span>
            </p>
        @enderror

        <div>
            <input id="email-address" name="email" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('email') border-red-700 @enderror" placeholder="Correo electrónico" value="{{old('email')}}">
        </div>
        @error('email')
        <p class=" text-red-600 flex p-2 gap-2 items-center"> 
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
            </svg>
            <span>{{$message}}</span>
        </p>
        @enderror

        <div>
            <input id="phone" name="phone" type="text" autocomplete="phone" required class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('phone') border-red-700 @enderror" placeholder="Número de teléfono" value="{{old('phone')}}">
        </div>
        @error('phone')
            <p class=" text-red-600 flex p-2 gap-2 items-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>{{$message}}</span>
            </p>
        @enderror

        <div>
            <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('email') border-red-700 @enderror" placeholder="Contraseña">
        </div>
        <div>
            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-none rounded-b-md border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('email') border-red-700 @enderror" placeholder="Repita la contraseña">
        </div>
        @error('password')
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
            Registrarse
        </button>
    </div>
    </form>

    </div>
</div>
@endsection
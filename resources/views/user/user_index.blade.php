@extends('layouts.sidebar')

@section('contents')
    <div class="flex justify-between items-center">
        <h1 class="text-white text-lg">Lista de usuarios</h1>
        <a href="{{route('user.create')}}" class="text-white border p-2 my-2 bg-blue-900">Crear usuario</a>
    </div>
    <table class="border">
        <tr class="bg-blue-900">
            <th class="px-3 border text-white">Foto</th>
            <th class="px-3 border text-white">Nombre</th>
            <th class="px-3 border text-white">Apellidos</th>
            <th class="px-3 border text-white">CI</th>
            <th class="px-3 border text-white">Teléfono</th>
            <th class="px-3 border text-white">Email</th>
            <th class="px-3 border text-white">Acciones</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td class="px-3 border text-white">
                    <img src="{{asset('storage'.'/'.$user->photo)}}" alt="foto de perfil" width="150" height="150">
                </td>
                <td class="px-3 border text-white">{{$user->name}}</td>
                <td class="px-3 border text-white">{{$user->lastname}}</td>
                <td class="px-3 border text-white">{{$user->CI}}</td>
                <td class="px-3 border text-white">{{$user->phone}}</td>
                <td class="px-3 border text-white">{{$user->email}}</td>
                <td class="px-3 border text-white">
                    <div class="flex gap-2">
                        <a href="{{route('user.edit',$user)}}" class="border px-3 py-1 my-1 bg-blue-900" >Editar</a>
                        <form action="{{route('user.destroy',$user)}}" method="POST">
                            @csrf
                            {{ method_field('DELETE')}}
                            <input type="submit" 
                                    onclick="return confirm('¿Desea borrar la cuenta con nombre {{$user->name}}?')" 
                                    value="Eliminar"
                                    class="border px-3 py-1 my-1 hover:cursor-pointer bg-blue-900">
                    </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
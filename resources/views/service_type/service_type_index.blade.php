@can('service_type.index')
@extends('layouts.sidebar')

@section('contents')
    <div class="flex justify-between items-center">
        <h1 class="text-white text-lg">Lista de tipos de servicio</h1>
        @can('service_type.create')
        <a href="{{route('service_type.create')}}" class="text-white border p-2 my-2 bg-blue-900">Crear nuevo tipo de servicio</a>
        @endcan
    </div>
    <table class="border">
        <tr class="bg-blue-900">
            <th class="px-3 border text-white">ID</th>
            <th class="px-3 border text-white">Nombre</th>
            <th class="px-3 border text-white">Descripción</th>
            <th class="px-3 border text-white">Precio (Bs.)</th>
            <th class="px-3 border text-white">Acciones</th>
        </tr>
        @foreach ($service_types as $service_type)
            <tr>
                <td class="px-3 border text-white text-sm">{{$service_type->id}}</td>
                <td class="px-3 border text-white text-sm">{{$service_type->name}}</td>
                <td class="px-3 border text-white text-sm">{{$service_type->description}}</td>
                <td class="px-3 border text-white text-sm">{{$service_type->price}}</td>
                <td class="px-3 border text-white text-sm">
                    <div class="flex gap-2">
                        @can('service_type.edit')
                        <a href="{{route('service_type.edit',$service_type)}}" class="border px-3 py-1 my-1 bg-blue-900" >Editar</a>
                        @endcan
                        @can('service_type.destroy')
                        <form action="{{route('service_type.destroy',$service_type)}}" method="POST">
                            @csrf
                            {{ method_field('DELETE')}}
                            <input type="submit" 
                                    onclick="return confirm('¿Desea borrar el tipo de servicio: {{$service_type->name}}?')" 
                                    value="Eliminar"
                                    class="border px-3 py-1 my-1 hover:cursor-pointer bg-blue-900">
                        @endcan
                    </div>
                    </form>
                </td>
            </tr>
        @endforeach
        <div>{{$service_types->links('pagination::tailwind')}}</div>
    </table>
@endsection
@endcan
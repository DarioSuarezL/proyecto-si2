@extends('layouts.sidebar')

@section('contents')
    <div class="flex justify-between items-center">
        <h1 class="text-white text-lg">Lista de servicios</h1>
        <a href="{{route('service.create')}}" class="text-white border p-2 my-2 bg-blue-900">Crear nuevo servicio</a>
    </div>
    <table class="border">
        <tr class="bg-blue-900">
            <th class="px-3 border text-white">Descripción</th>
            <th class="px-3 border text-white">Tipo de servicio</th>
            <th class="px-3 border text-white">Cliente</th>
            <th class="px-3 border text-white">Estado</th>
            <th class="px-3 border text-white">Acciones</th>
        </tr>
        @foreach ($services as $service)
            <tr>
                <td class="px-3 border text-white">{{$service->description}}</td>
                <td class="px-3 border text-white">{{$service->type_id}}</td>
                <td class="px-3 border text-white">{{$service->client_id}}</td>
                <td class="px-3 border text-white">{{$service->status}}</td>
                <td class="px-3 border text-white">
                    <div class="flex gap-2">
                        <a href="{{route('service.edit',$service)}}" class="border px-3 py-1 my-1 bg-blue-900" >Editar</a>
                        <form action="{{route('service.destroy',$service)}}" method="POST">
                            @csrf
                            {{ method_field('DELETE')}}
                            <input type="submit" 
                                    onclick="return confirm('¿Desea borrar el servicio?')" 
                                    value="Eliminar"
                                    class="border px-3 py-1 my-1 hover:cursor-pointer bg-blue-900">
                    </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
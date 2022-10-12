@can('assignment.index')  
@extends('layouts.sidebar')

@section('contents')
<div class="flex justify-between items-center">
    <h1 class="text-white text-lg">Lista de asignaciones</h1>
    @can('assignment.create')
    <a href="{{route('assignment.create')}}" class="text-white border p-2 my-2 bg-blue-900">Asignar</a>
    @endcan
</div>
<table class="border">
    <tr class="bg-blue-900">
        <th class="px-3 border text-white">Técnico(s)</th>
        <th class="px-3 border text-white">Servicio</th>
        <th class="px-3 border text-white">Cliente</th>
        <th class="px-3 border text-white">Estado - Servicio</th>
        <th class="px-3 border text-white">Acciones</th>
    </tr>
    @foreach ($assignments as $assignment)
        <tr>
            <td class="px-3 border text-white">{{$assignment->tech->user->name." ".$assignment->tech->user->lastname}}</td>
            <td class="px-3 border text-white">{{$assignment->service->description}}</td>
            <td class="px-3 border text-white">{{$assignment->service->client->name." ".$assignment->service->client->lastname}}</td>
            <td class="px-3 border text-white">{{$assignment->service->status}}</td>
            <td class="px-3 border text-white">
                <div class="flex gap-2">
                    @can('assignment.edit')
                    <a href="{{route('assignment.edit',$assignment)}}" class="border px-3 py-1 my-1 bg-blue-900" >Editar</a>
                    @endcan
                    @can('assignment.destroy')
                    <form action="{{route('assignment.destroy',$assignment)}}" method="POST">
                        @csrf
                        {{ method_field('DELETE')}}
                        <input type="submit" 
                        onclick="return confirm('¿Desea borrar la asignación {{$assignment->id}}?')" 
                        value="Eliminar"
                        class="border px-3 py-1 my-1 hover:cursor-pointer bg-blue-900">
                        @endcan
                    @can('assignment.end')
                    @if ($assignment->service->status != 'Finalizado')                        
                    <a href="{{route('assignment.setEnd',$assignment)}}" class="border px-3 py-1 my-1 bg-blue-900" 
                        onclick="return confirm('¿Desea finalizar con la asignación {{$assignment->id}}?')"
                        >Finalizar</a>
                    @endif
                    @endcan
                </div>
                </form>
            </td>
        </tr>
    @endforeach
    <div>{{$assignments->links('pagination::tailwind')}}</div>
</table>
@endsection
@endcan
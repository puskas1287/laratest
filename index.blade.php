@extends('layouts.app')
@section('content')
    <div class="row">
        <a href="{{route('reservas.create')}}" class="btn btn-warning col-md-offset-8">AGREGAR RESERVA</a>
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>DOCENTE</th>
                    <th>MATERIA</th>
                    <th>AULA</th>
                    <th>TURNO</th>
                    <th>FECHA SOLICITADA</th>
                </tr>
                </thead>
                <tbody>

                @foreach($reservas as $reserva)

                    <tr>
                        <td>{{$reserva->users->name}}</td>
                        <td>{{$reserva->users->name}}</td>
                        <td>{{$reserva->materia->nombre}}</td>
                        <td>{{$reserva->aula->nombre}}</td>
                        <td>{{$reserva->turno->nombre}}</td>
                        <td>{{$reserva->fecha_solicitada}}</td>
                        {{dd($reserva->fecha_solicitada)}}
                        <td>
                            <a href="{{route('reservas.edit', ['reservas' =>$reserva->id])}}" class="btn btn-info">Editar</a>
                            <form action="{{route('reservas.destroy', ['reservas' => $reserva->id])}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" value="Eliminar" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
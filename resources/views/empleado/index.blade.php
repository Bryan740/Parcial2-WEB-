@extends('layouts.app')
@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif


<body style="background-color:steelblue">
<a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar Nuevo Usuario</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto Empleado</th>
            <th>Nombre Empleado</th>
            <th>Apellido Empleado</th>
            <th>Correo Empleado</th>
            <th>Acciones</th>
            
        </tr>
    </thead>

    <tbody>
        <tbody style="background-color:paleturquoise">
        @foreach( $empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>
                   
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100" alt="">
                </td>
                <td>{{ $empleado->Nombre }}</td>
                <td>{{ $empleado->Apellido }}</td>
                <td>{{ $empleado->Correo }}</td>
                <td>
                    <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
                        Editar
                    </a>
                    |
                    <form action="{{ url('/empleado/'.$empleado->id) }}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar este dato?')"  value="Borrar">
                </form>

                </td>
            </tr>
        @endforeach

    </tbody>
</table>
{!! $empleados->links() !!}
</div>
@endsection
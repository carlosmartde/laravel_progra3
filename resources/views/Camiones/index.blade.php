@extends('layout')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Listado de Camiones</h1>
            <a href="{{ route('camiones.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Agregar Camión
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Transporte</th>
                    <th scope="col">Capacidad (toneladas)</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($camiones as $camion)
                    <tr>
                        <td>{{ $camion->id_camion }}</td>
                        <td>{{ $camion->placa }}</td>
                        <td>{{ $camion->modelo }}</td>
                        <td>{{ $camion->marca->descripcion }}</td>
                        <td>{{ $camion->transporte->nombre }}</td>
                        <td>{{ $camion->capacidad_toneladas }}</td>
                        <td>
                            <a href="{{ route('camiones.edit', $camion->id_camion) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('camiones.destroy', $camion->id_camion) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este camión?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $camiones->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
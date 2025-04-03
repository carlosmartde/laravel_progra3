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
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Placa</th>
                    <th scope="col" class="text-center">Modelo</th>
                    <th scope="col" class="text-center">Color</th>
                    <th scope="col" class="text-center">Codigo interno</th>
                    <th scope="col" class="text-center">Marca</th>
                    <th scope="col" class="text-center">Transporte</th>
                    <th scope="col" class="text-center">Capacidad (toneladas)</th>
                    <th scope="col" class="text-center">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($camiones as $camion)
                    <tr>
                        <td class="text-center">{{ $camion->id_camion }}</td>
                        <td class="text-center">{{ $camion->placa }}</td>
                        <td class="text-center">{{ $camion->modelo }}</td>
                        <td class="text-center">{{ $camion->color }}</td>
                        <td class="text-center">{{ $camion->codig_interno }}</td>
                        <td class="text-center">{{ $camion->marca->descripcion }}</td>
                        <td class="text-center">{{ $camion->transporte->nombre }}</td>
                        <td class="text-center">{{ $camion->capacidad_toneladas }}</td>
                        <td class="text-center">
                            <a href="{{ route('camiones.edit', $camion->id_camion) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form id="delete-form-{{ $camion->id_camion }}" action="{{ route('camiones.destroy', $camion->id_camion) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $camion->id_camion }})">
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(camionId) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + camionId).submit();
                }
            });
        }
    </script>
@endsection
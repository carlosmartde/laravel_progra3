@extends('layout')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Listado de Transportes</h1>
            <a href="{{ route('transportes.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Agregar Transporte
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Código</th>
                    <th scope="col" class="text-center">Nombre</th>
                    <th scope="col" class="text-center">Razón Social</th>
                    <th scope="col" class="text-center">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($transportes as $transporte)
                    <tr>
                        <td class="text-center">{{ $transporte->id_transporte }}</td>
                        <td class="text-center">{{ $transporte->codigo }}</td>
                        <td class="text-center">{{ $transporte->nombre }}</td>
                        <td class="text-center">{{ $transporte->razon_social }}</td>
                        <td class="text-center">
                            <a href="{{ route('transportes.edit', $transporte->id_transporte) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form id="delete-form-{{ $transporte->id_transporte }}" action="{{ route('transportes.destroy', $transporte->id_transporte) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $transporte->id_transporte }})">
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
            {{ $transportes->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(transporteId) {
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
                    document.getElementById('delete-form-' + transporteId).submit();
                }
            });
        }
    </script>
@endsection
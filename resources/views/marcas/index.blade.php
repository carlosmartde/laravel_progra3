@extends('layout')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Listado de Marcas</h1>
            <a href="{{ route('marcas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Agregar Marca
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Descripción</th>
                    <th scope="col" class="text-center">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($marcas as $marca)
                    <tr>
                        <td class="text-center">{{ $marca->id_marca }}</td>
                        <td class="text-center">{{ $marca->descripcion }}</td>
                        <td class="text-center">
                            <a href="{{ route('marcas.edit', $marca->id_marca) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form id="delete-form-{{ $marca->id_marca }}" action="{{ route('marcas.destroy', $marca->id_marca) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $marca->id_marca }})">
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
            {{ $marcas->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(marcaId) {
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
                    document.getElementById('delete-form-' + marcaId).submit();
                }
            });
        }
    </script>
@endsection
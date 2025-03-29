@extends('layout')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Listado de Productos</h1>
            <a href="{{ route('productos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Agregar Producto
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio Costo</th>
                    <th scope="col">Precio Venta</th>
                    <th scope="col">Fecha Vencimiento</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>{{ $producto->descripcion_producto }}</td>
                        <td>Q{{ number_format($producto->precio_producto, 2) }}</td>
                        <td>Q{{ number_format($producto->precio_venta_producto, 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($producto->fecha_vencimiento_producto)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
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
            {{ $productos->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection


@extends('layout')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h3 class="mb-0">Editar Camión</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('camiones.update', $camion->id_camion) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="placa" class="form-label">Placa</label>
                                <input type="text" class="form-control @error('placa') is-invalid @enderror" id="placa" name="placa" value="{{ old('placa', $camion->placa) }}" required>
                                @error('placa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="codig_interno" class="form-label">Codigo Interno</label>
                                <input type="text" class="form-control @error('codig_interno') is-invalid @enderror" id="codig_interno" name="codig_interno" value="{{ old('codig_interno', $camion->codig_interno) }}" required>
                                @error('codig_interno')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="id_transporte" class="form-label">Transporte</label>
                                <select class="form-select @error('id_transporte') is-invalid @enderror" id="id_transporte" name="id_transporte" required>
                                    <option value="">Seleccione un transporte</option>
                                    @foreach ($transportes as $transporte)
                                        <option value="{{ $transporte->id_transporte }}" {{ old('id_transporte', $camion->id_transporte) == $transporte->id_transporte ? 'selected' : '' }}>
                                            {{ $transporte->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_transporte')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color', $camion->color) }}" required>
                                @error('color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="modelo" class="form-label">Modelo</label>
                                <input type="text" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" value="{{ old('modelo', $camion->modelo) }}" required>
                                @error('modelo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="id_marca" class="form-label">Marca</label>
                                <select class="form-select @error('id_marca') is-invalid @enderror" id="id_marca" name="id_marca" required>
                                    <option value="">Seleccione una marca</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id_marca }}" {{ old('id_marca', $camion->id_marca) == $marca->id_marca ? 'selected' : '' }}>
                                            {{ $marca->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_marca')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="capacidad_toneladas" class="form-label">Capacidad (toneladas)</label>
                                <input type="number" step="0.01" class="form-control @error('capacidad_toneladas') is-invalid @enderror" id="capacidad_toneladas" name="capacidad_toneladas" value="{{ old('capacidad_toneladas', $camion->capacidad_toneladas) }}" required>
                                @error('capacidad_toneladas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('camiones.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                                <button type="submit" class="btn btn-warning">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
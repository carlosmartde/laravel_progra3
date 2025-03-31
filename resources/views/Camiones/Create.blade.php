@extends('layout')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Agregar Nuevo Camión</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('camiones.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="placa" class="form-label">Placa</label>
                                <input type="text" class="form-control @error('placa') is-invalid @enderror" id="placa" name="placa" value="{{ old('placa') }}" required>
                                @error('placa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="modelo" class="form-label">Modelo</label>
                                <input type="text" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" value="{{ old('modelo') }}" required>
                                @error('modelo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="id_marca" class="form-label">Marca</label>
                                <select class="form-select @error('id_marca') is-invalid @enderror" id="id_marca" name="id_marca" required>
                                    <option value="">Seleccione una marca</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id_marca }}" {{ old('id_marca') == $marca->id_marca ? 'selected' : '' }}>
                                            {{ $marca->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_marca')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="id_transporte" class="form-label">Transporte</label>
                                <select class="form-select @error('id_transporte') is-invalid @enderror" id="id_transporte" name="id_transporte" required>
                                    <option value="">Seleccione un transporte</option>
                                    @foreach ($transportes as $transporte)
                                        <option value="{{ $transporte->id_transporte }}" {{ old('id_transporte') == $transporte->id_transporte ? 'selected' : '' }}>
                                            {{ $transporte->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_transporte')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="capacidad" class="form-label">Capacidad (toneladas)</label>
                                <input type="number" step="0.01" class="form-control @error('capacidad') is-invalid @enderror" id="capacidad" name="capacidad" value="{{ old('capacidad') }}" required>
                                @error('capacidad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('camiones.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
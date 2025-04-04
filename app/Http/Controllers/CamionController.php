<?php
namespace App\Http\Controllers;

use App\Models\Camion;
use App\Models\Marca;
use App\Models\Transporte;
use Illuminate\Http\Request;

class CamionController extends Controller
{
    public function index()
    {
        $camiones = Camion::with(['marca', 'transporte'])->paginate(10);
        return view('camiones.index', compact('camiones'));
    }

    public function create()
    {
        $marcas = Marca::all();
        $transportes = Transporte::all();
        return view('camiones.create', compact('marcas', 'transportes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|max:10|unique:camion',
            'codig_interno' => 'required|string|max:8',
            'modelo' => 'required|string|max:50',
            'id_marca' => 'required|exists:marca,id_marca',
            'id_transporte' => 'required|exists:transporte,id_transporte',
            'capacidad_toneladas' => 'required|numeric|min:0',
            'color' => 'required|string|max:35',
        ]);

        Camion::create($request->all());

        return redirect()->route('camiones.index')->with('success', 'Camión agregado correctamente.');
    }

    public function edit(Camion $camion)
    {
        $marcas = Marca::all();
        $transportes = Transporte::all();
        return view('camiones.edit', compact('camion', 'marcas', 'transportes'));
    }

    public function update(Request $request, Camion $camion)
    {
        $request->validate([
            'placa' => 'required|string|max:10|unique:camion,placa,'.$camion->id_camion.',id_camion',
            'codig_interno' => 'required|string|max:8',
            'modelo' => 'required|string|max:50',
            'id_marca' => 'required|exists:marca,id_marca',
            'id_transporte' => 'required|exists:transporte,id_transporte',
            'capacidad_toneladas' => 'required|numeric|min:0',
            'color' => 'required|string|max:35',
        ]);

        $camion->update($request->all());

        return redirect()->route('camiones.index')->with('success', 'Camión actualizado correctamente.');
    }

    public function destroy($id)
    {
        $camion = Camion::findOrFail($id);
        $camion->delete();
        return redirect()->route('camiones.index')->with('success', 'Camión eliminado correctamente.');
    }
}
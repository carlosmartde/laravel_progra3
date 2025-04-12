<?php
namespace App\Http\Controllers;

use App\Models\Transporte;
use Illuminate\Http\Request;

class TransporteController extends Controller
{
    public function index()
    {
        $transportes = Transporte::paginate(10);
        return view('transportes.index', compact('transportes'));
    }

    public function create()
    {
        return view('transportes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:20|unique:transporte',
            'nombre' => 'required|string|max:100',
            'razon_social' => 'required|string|max:200',
        ]);

        Transporte::create($request->all());

        return redirect()->route('transportes.index')->with('success', 'Transporte agregado correctamente.');
    }

    public function edit(Transporte $transporte)
    {
        return view('transportes.edit', compact('transporte'));
    }

    public function update(Request $request, Transporte $transporte)
    {
        $request->validate([
            'codigo' => 'required|string|max:20|unique:transporte,codigo,'.$transporte->id_transporte.',id_transporte',
            'nombre' => 'required|string|max:100',
            'razon_social' => 'required|string|max:200',
        ]);

        $transporte->update($request->all());

        return redirect()->route('transportes.index')->with('success', 'Transporte actualizado correctamente.');
    }

    public function destroy($id)
    {
        $transporte = Transporte::findOrFail($id);
        $transporte->delete();
        return redirect()->route('transportes.index')->with('success', 'Transporte eliminado correctamente.');
    }
}
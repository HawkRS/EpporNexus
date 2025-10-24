<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    private $f = 'nexus.clientes.';

    public function index()
    {
        $clientes = Clientes::all();
        //dd($clientes);
        return view($this->f.'index', compact('clientes'));
    }

    public function create()
    {
        return view($this->f.'create');
    }

    public function store(Request $request)
    {
        // FIX: Usamos $request->validate() en lugar de $this->validate()
        $request->validate([
            'identificador' => 'required|unique:clientes',
            'razonsocial' => 'required|unique:clientes',
            'rfc' => 'nullable|unique:clientes',
        ]);

        Clientes::create($request->all());

        return redirect()->route('cliente.index');
    }

    public function show($id)
    {
        $cliente = Clientes::findOrFail($id);
        // NOTA: Asumiendo que 'pedidos()' es un método de relación en tu modelo Cliente
        $pedidos = $cliente->pedidos();
        $saldo = $cliente->saldo($pedidos);
        //dd($pedidos);
        return view($this->f.'show', compact('cliente', 'pedidos', 'saldo'));
    }

    public function edit($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view($this->f.'edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        // FIX: Usamos $request->validate() en lugar de $this->validate()
        $request->validate([
            'identificador' => 'required|unique:clientes,identificador,' . $id,
            'razonsocial' => 'required|unique:clientes,razonsocial,' . $id,
            // NOTA: Cambié 'required' a 'nullable' aquí si el campo es opcional
            'rfc' => 'nullable|unique:clientes,rfc,' . $id,
        ]);

        $cliente = Clientes::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('cliente.index');
    }
}

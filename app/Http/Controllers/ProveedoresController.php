<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Proveedores;

class ProveedoresController extends Controller
{
  private $f = 'nexus.provee.';

  public function index()
  {
    $proveedores = Proveedores::all();
    return view($this->f.'index', [
      'proveedores' => $proveedores,
    ]);
  }

  public function show($id)
  {
    $proveedor = Proveedores::findOrFail($id);
    return view($this->f.'show', [
      'proveedor' => $proveedor,
    ]);
  }

  public function create()
  {
    return view($this->f.'create');
  }

  public function store(Request $request)
  {
    $messages = [
      'required' => 'El campo :attribute es obligatorio.',
      'numeric' => 'El campo :attribute debe ser un número.',
      'min' => 'Debes elegir una opción en el campo :attribute.',
      'max' => 'El campo :attribute está fuera de rango.',
      'date' => 'Formato o fecha inválido, el formato correcto es dd/mm/aaaa',
    ];

    $this->validate($request, [
      'identificador' => 'required|unique:proveedores,identificador',
      'razonsocial' => 'required|unique:proveedores,razonsocial',
      'rfc' => 'required|unique:proveedores,rfc',
      'correo' => 'nullable|email:rfc,dns',
      'codigopostal' => 'nullable|numeric',
      ], $messages);

      $newProveedor = Proveedores::create($request->all());

      return redirect()->route('provee.index');
    }

    public function edit($id)
    {
      $proveedor = Proveedores::findOrFail($id);
      return view($this->f.'edit', [
      'proveedor' => $proveedor,
      ]);
    }

    public function update($id, Request $request)
    {
      $messages = [
      'required' => 'El campo :attribute es obligatorio.',
      'numeric' => 'El campo :attribute debe ser un número.',
      'min' => 'Debes elegir una opción en el campo :attribute.',
      'max' => 'El campo :attribute está fuera de rango.',
      'date' => 'Formato o fecha inválido, el formato correcto es dd/mm/aaaa',
      ];

      $this->validate($request, [
      'identificador' => ['required', Rule::unique('proveedores')->ignore($id)],
      'razonsocial' => ['required', Rule::unique('proveedores')->ignore($id)],
      'rfc' => ['required', Rule::unique('proveedores')->ignore($id)],
      'correo' => 'nullable|email:rfc,dns',
      'codigopostal' => 'nullable|numeric',
      ], $messages);

      $proveedor = Proveedores::findOrFail($id);
      $proveedor->update($request->all());

      return redirect()->route('provee.show', ['id' => $proveedor->id]);
    }
  }

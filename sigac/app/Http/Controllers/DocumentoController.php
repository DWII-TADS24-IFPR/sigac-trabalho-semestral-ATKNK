<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Categoria;
use App\Models\User;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::all();
        return view('documento.index', compact('documentos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $users = User::all();

        return view('documento.create', compact('categorias', 'users'));
    }

    public function store(Request $request)
    {
        $documento = new Documento();

        $documento->url = $request->url;
        $documento->descricao = $request->descricao;
        $documento->horas_in = $request->horas_in;
        $documento->status = $request->status;
        $documento->comentario = $request->comentario;
        $documento->horas_out = $request->horas_out;
        $documento->categoria_id = $request->categoria_id;
        $documento->user_id = $request->user_id;

        $documento->save();

        return redirect()->route('documento.index')->with('success', 'Documento criado com sucesso!');
    }

    public function show(Documento $documento)
    {
        return view('documento.show', compact('documento'));
    }

    public function edit(Documento $documento)
    {
        $categorias = Categoria::all();
        $users = User::all();

        return view('documento.edit', compact('documento', 'categorias', 'users'));
    }

    public function update(Request $request, $id)
    {
        $documento = Documento::find($id);
        $documento->update($request->all());
        $documento->save();

        return redirect()->route('documento.index')->with('success', 'Documento atualizado com sucesso!');
    }

    public function destroy(Documento $documento)
    {
        $documento->delete();

        return redirect()->route('documento.index')->with('success', 'Documento deletado com sucesso!');
    }
}

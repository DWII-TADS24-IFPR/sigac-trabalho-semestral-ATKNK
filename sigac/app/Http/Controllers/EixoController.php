<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eixo;

class EixoController extends Controller
{
    public function index()
    {
        $eixos = Eixo::whereNull('deleted_at')->get();
        return view('eixo.index')->with(['eixos' => $eixos]);
    }

    public function create()
    {
        return view('eixo.create');
    }

    public function store(Request $request)
    {
        $nome = $request->nome;

        $eixo = new Eixo();
        $eixo->nome = $nome;

        $eixo->save();

        return redirect()->route('eixo.index')->with('success', 'Eixo criado com sucesso!');
    }

    public function edit($id)
    {
        $eixo = Eixo::find($id);
        return view('eixo.edit', compact('eixo'));
    }

    public function update(Request $request, $id)
    {
        $eixo = Eixo::find($id);
        $eixo->update($request->all());
        $eixo->save();

        return redirect()->route('eixo.index')->with('success', 'Eixo atualizado com sucesso!');
    }

    public function destroy(Eixo $eixo)
    {
        $eixo->delete();

        return redirect()->route('eixo.index')->with('success', 'Eixo deletado com sucesso!');
    }
}

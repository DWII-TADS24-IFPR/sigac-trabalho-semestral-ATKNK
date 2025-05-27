<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index(){
        $niveis = Nivel::whereNull('deleted_at')->get();
        return view('nivel.index')->with(['niveis' => $niveis]);
    }

    public function create(){
        return view('nivel.create');
    }

    public function store(Request $request){
        $nome = $request->nome;

        $nivel = new Nivel();
        $nivel->nome = $nome;

        $nivel->save();

        return redirect()->route('nivel.index')->with('success', 'Nivel criado com sucesso!');
    }

    public function edit($id){
        $nivel = Nivel::find($id);
        return view('nivel.edit', compact('nivel'));
    }

    public function update(Request $request, $id){
        $nivel = Nivel::find($id);
        $nivel->update($request->all());
        $nivel->save();

        return redirect()->route('nivel.index')->with('success', 'Nivel atualizado com sucesso!');
    }

        public function destroy(Nivel $nivel)
    {
        $nivel->delete();

        return redirect()->route('nivel.index')->with('success', 'Nivel deletado com sucesso!');
    }
}
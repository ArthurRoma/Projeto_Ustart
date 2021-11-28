<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Locadora;

class LocadoraController extends Controller
{
    
    public function criar()
    {
        return view('locadora.criar')->with([]);
    }

    public function inserir(Request $request)
    {
        $mensagem = [
            'required' => 'Preencha todos os campos obrigatórios!',
        ];

        $request->validate([
            'filme' => 'required',
            'genero' => 'required',
            'descricao' => 'required',
            'data_de_lancamento' => 'required'
        ], $mensagem);

        try{
            Locadora::create([
                'filme' => $request->get('filme'),
                'genero' => $request->get('genero'),
                'descricao' => $request->get('descricao'),
                'data_de_lancamento' => $request->get('data_de_lancamento'),
                'usuario' => Auth::user()->id
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('resposta',[
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador!'
            ]); 
        }
        return redirect()->route('home')->with('resposta',[
            'status' => 200,
            'mensagem' => 'Locadora criada!'
        ]);
    }




    public function editar($id)
    {
        $locadora = Locadora::where("id",$id)->get();

        if ($locadora->isEmpty()) {
            return redirect()->route('home')-with('resposta', [
                'status' => 400,
                'mensagem' => 'Acesso indevido!'
            ]);
        }

        return view("locadora.editar")->with([
            "locadora"=>$locadora[0]
        ]);
    }






    public function atualizar(Request $request, $id)
    {
        $mensagem = [
            'required' => 'Preencha todos os camppos obrigatórios!',
        ];

        $request->validate([
            'filme' => 'required',
            'genero' => 'required',
            'descricao' => 'required',
            'data_de_lancamento' => 'required'
        ], $mensagem);

        try {
            $locadora = Locadora::find($id)->update([
                'filme' => $request->get('descricao'),
                'genero' => $request->get('genero'),
                'descricao' => $request->get('descricao'),
                'data_de_lancamento' => $request->get('data_de_lancamento')
                
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('resposta',[
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador!'
            ]);
        }
        return redirect()->route('home')->with('resposta',[
            'status' => 200,
            'mensagem' => 'Locadora atualizada!'
        ]);
    }





    public function excluir($id)
    {
        try{
            Locadora::find($id)->delete();
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('resposta',[
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador!'
            ]);
        }

        return redirect()->route('home')->with('resposta',[
            'status' => 200,
            'mensagem' => 'Filme excluído!'
        ]);
    }

}

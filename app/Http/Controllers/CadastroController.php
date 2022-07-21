<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cadastros = Cadastro::selectRaw("*, TIMESTAMPDIFF(YEAR, DATE(data_nascimento), current_date) AS idade")
                              ->get(['*', 'NOW() as ano'])->toJson(JSON_PRETTY_PRINT);
        return response($cadastros, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cadastro = new Cadastro;
        $cadastro->nome = $request->nome;
        $cadastro->data_nascimento = $request->data_nascimento;
        $cadastro->save();

        return response()->json(["message" => "Cadastro criado com sucesso!"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Cadastro::where('id', $id)->exists()) {
            $cadastro = Cadastro::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($cadastro, 200);
        }

        return response()->json(["message" => "Cadastro não encontrado!"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Cadastro::where('id', $id)->exists()) {
            $cadastro = Cadastro::find($id);
            $cadastro->nome = is_null($request->nome) ? $cadastro->nome : $request->nome;
            $cadastro->data_nascimento = is_null($request->data_nascimento) ? $cadastro->data_nascimento : $request->data_nascimento;
            $cadastro->save();

            return response()->json(["message" => "Cadastro atualizado com sucesso!"], 200);
        }

        return response()->json(["message" => "Cadastro não econtrado!"], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Cadastro::where('id', $id)->exists()) {
            $cadastro = Cadastro::find($id);
            $cadastro->delete();

            return response()->json(["message" => "Cadastro removido com sucesso!"], 202);
        }

        return response()->json(["message" => "Cadastro não econtrado!"], 404);
    }
}

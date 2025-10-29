<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function listar()
    {
        $clientes = Cliente::orderBy('nome')->get();
        return view('clientes')->with('clientes', $clientes);
    }

    public function cadastrar()
    {
        return view('clienteCadastrar');
    }

    public function editar($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clienteEditar')->with('cliente', $cliente);
    }

    public function  destroy ($id){
        $cliente = Cliente::find($id);

        if(empty($cliente)){
            return "<h2>Erro ao consultar o id informado</h2>";
        }
        $cliente->delete();
        return redirect()->route('cliente.listar')->with('success', 'Cliente deletado com sucesso!');
    }
    
    public function salvar(Request $request, $id = null)
    {
        if ($id) {

            $cliente = Cliente::findOrFail($id);
        } else {

            $cliente = new Cliente();
        }

        $cliente->nome = $request->input('nome');
        $cliente->telefone = $request->input('telefone');
        $cliente->cpf = $request->input('cpf');
        $cliente->genero = $request->input('genero');
        $cliente->email = $request->input('email');
        $cliente->save();

        return redirect()->route('cliente.listar');
    }

    public function update(Request $request, $id)
    {
    $cliente = Cliente::findOrFail($id);

    $cliente->nome = $request->input('nome');
    $cliente->telefone = $request->input('telefone');
    $cliente->cpf = $request->input('cpf');
    $cliente->genero = $request->input('genero');
    $cliente->email = $request->input('email');
    $cliente->save();

    return redirect()->route('cliente.listar')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function buscar(Request $request)
    {
    if (!empty($request->valor)) {
        $dados = Cliente::where(
            $request->tipo,
            'like',
            "%$request->valor%"
        )->get();
    } else {
        $dados = Cliente::all();
    }

    return view('clientes', ["clientes" => $dados]);
    }


    
}
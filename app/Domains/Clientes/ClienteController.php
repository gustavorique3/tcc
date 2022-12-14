<?php

namespace App\Domains\Clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
      $query = Cliente::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
        }

        $clientes = $query->paginate(5);

        return view('clientes.index', [
          'clientes' => $clientes,
          'filter'=> $request->get('filter')
        ]);
    }

    public function create()
    {
        return $this->form(new Cliente());
    }

    public function store(Cliente $request)
    {
      if ($request->get('id')) {
            return $this->save(Cliente::find($request->get('id')), $request);
        }
        return $this->save(new Cliente(), $request);
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', [
          'cliente' => $cliente
        ]);
    }

    public function edit(Cliente $cliente)
    {
      return $this->form($cliente);
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
      return $this->save($cliente, $request);
    }

    public function destroy(Cliente $cliente)
    {
        //$produto = Produto::where('cliente', $cliente->id)->get();

        /*if ($produto->count() > 0) {
          return redirect()->route('clientes.index')->with('error', 'Não pode excluir Cliente vinculado à um Produto');
        }*/

         $cliente->delete();
         return redirect()->route('clientes.index')->with('success', 'Cliente excluido com sucesso');

    }

    private function form(Cliente $cliente) {
        return view('clientes.form', [
          'cliente' => $cliente,
        ]);
    }

    private function save(Cliente $cliente, ClienteRequest $request)
    {
        try{

        $cliente->nome = $request->get('nome');
        $cliente->sobrenome = $request->get('sobrenome');
        $cliente->telefone = $request->get('telefone');
        $cliente->email = $request->get('email');
        $cliente->cidade = $request->get('cidade');
        $cliente->estado = $request->get('estado');
        $cliente->cep = $request->get('cep');
        $cliente->cnpj = $request->get('cnpj');
        $cliente->cpf = $request->get('cpf');
        $cliente->bairro = $request->get('bairro');
        $cliente->numero = $request->get('numero');
        $cliente->status = $request->get('status');
    
        $cliente->save();
    
        return redirect()->route('clientes.index', ['id' => $cliente->id]);
    
        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

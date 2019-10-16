<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App;
use App\Cliente;
use App\Telefone;
use App\Endereco;

class ClienteController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $inputs = $request->all();
        $clientes = DB::table('clientes')
        ->select('clientes.cpf', 'clientes.nome', 'clientes.status', 'clientes.data_nascimento', 'telefones.telefone', 'enderecos.cidade')
        ->join('telefones', 'clientes.cod_telefone', '=', 'telefones.codigo')
        ->join('enderecos', 'clientes.cod_endereco', '=', 'enderecos.codigo')
        ->orderBy('cpf', 'desc')
        ->get();
        return view('clientes', ['clientes' => $clientes]);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('cliente-form');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        
        // Store phone
        $telefone = new Telefone();
        $telefone->fill($request->all());
        $telefone->save();
        
        // Store address
        $endereco = new Endereco();
        $endereco->fill($request->all());
        $endereco->save();
        
        // Store client
        $cliente = new Cliente();
        $cliente->fill($request->all());
        $cliente->cod_telefone = $telefone->codigo;
        $cliente->cod_endereco = $telefone->codigo;
        $cliente->save();
        return redirect('/cliente');
    }
    
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  string  $cpf
    * @return \Illuminate\Http\Response
    */
    public function edit($cpf)
    {
        $cliente = DB::table('clientes')
        ->select('clientes.*', 'telefones.telefone', 'telefones.tipo', 'enderecos.logradouro', 'enderecos.cep', 'enderecos.logradouro', 'enderecos.bairro', 'enderecos.cidade', 'enderecos.estado')
        ->join('telefones', 'clientes.cod_telefone', '=', 'telefones.codigo')
        ->join('enderecos', 'clientes.cod_endereco', '=', 'enderecos.codigo')
        ->where('cpf', '=', $cpf)
        ->first();
        return view('cliente-form', ['cliente' => $cliente]);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  string  $cpf
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $cpf)
    {
        // Store client
        $cliente = App\Cliente::find($cpf);
        $cliente->fill($request->all());
        $cliente->save();
        
        // Store phone
        $telefone = App\Telefone::find($cliente->cod_telefone);
        $telefone->fill($request->all());
        $telefone->save();
        
        // Store address
        $endereco = App\Endereco::find($cliente->cod_endereco);
        $endereco->fill($request->all());
        $endereco->save();
        return redirect('/cliente');
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  string  $cpf
    * @return \Illuminate\Http\Response
    */
    public function destroy($cpf)
    {
        $cliente = App\Cliente::find($cpf);
        $cliente->delete();
        return redirect('/cliente');
    }
    
    /**
    * Create a xls with clients to export.
    *
    * @return null
    */
    public function exportarXLS()
    {
        $html = '';
        $html .= '<table>';
        $html .= '<tr>';
        $html .= '<td colspan="6">Planilha de Clientes</tr>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td><b>Código</b></td>';
        $html .= '<td><b>Nome</b></td>';
        $html .= '<td><b>Data de Nascimento</b></td>';
        $html .= '<td><b>Telefone</b></td>';
        $html .= '<td><b>Tipo</b></td>';
        $html .= '<td><b>Logradouro</b></td>';
        $html .= '<td><b>Bairro</b></td>';
        $html .= '<td><b>Cidade</b></td>';
        $html .= '<td><b>Estado</b></td>';
        $html .= '<td><b>Status</b></td>';
        
        $clientes = DB::table('clientes')
        ->select('clientes.cpf', 'clientes.nome', 'clientes.status', 'clientes.data_nascimento', 'telefones.*', 'enderecos.*')
        ->join('telefones', 'clientes.cod_telefone', '=', 'telefones.codigo')
        ->join('enderecos', 'clientes.cod_endereco', '=', 'enderecos.codigo')
        ->orderBy('cpf', 'desc')
        ->get();
        foreach($clientes as $cliente){
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>' . $cliente->cpf . '</td>';
            $html .= '<td>' . $cliente->nome . '</td>';
            $html .= '<td>' . $cliente->data_nascimento . '</td>';
            $html .= '<td>' . $cliente->telefone . '</td>';
            $html .= '<td>' . $cliente->tipo . '</td>';
            $html .= '<td>' . $cliente->logradouro . '</td>';
            $html .= '<td>' . $cliente->bairro . '</td>';
            $html .= '<td>' . $cliente->cidade . '</td>';
            $html .= '<td>' . $cliente->estado . '</td>';
            $html .= '<td>' . $cliente->status . '</td>';
            $html .= '</tr>';
        }
        
        $html .= '</table>';
        
        header ("Content-type: application/x-msexcel");
        header ("Content-Disposition: attachment; filename=\"clientes.xls\"" );
        header ("Content-Description: Tabela de clientes" );
        header ("Content-Encoding: UTF-8");
        header ("Cache-Control: no-cache, must-revalidate");
        header ("Pragma: no-cache");
        
        echo $html;
        exit;
    }
}

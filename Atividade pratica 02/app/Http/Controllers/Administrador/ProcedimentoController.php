<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Procedure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class ProcedimentoController extends Controller
{
    public function index(){
        $procedimentos = DB::select('select procedures.* , users.name as nameuser from procedures , users where procedures.user_id = users.id order by procedures.name');
        return view('administrador.procedimento.index',['procedimentos' => $procedimentos]);
    }

    public function show($id){
        $procedimentos = DB::select('select procedures.* , users.name as nameuser from procedures , users where procedures.user_id = users.id and procedures.id = ? order by procedures.name',[$id]);
        if($procedimentos == null){
            session()->flash('mensagem_show_error', 'Id inválido para acessar esta página!');
            return redirect()->route('procedures.index');
        }
        return view('administrador.procedimento.show',['procedimentos' => $procedimentos]);
    }

    public function create(){
        return view('administrador.procedimento.create');
    }

    public function store(Request $request){
        if($request -> name == "" || $request -> price == ""){
            session()->flash('mensagem_store_error_vazio', 'Erro ao cadastrar procedimento!');
            return redirect()->route('procedures.index');
        }
        $price = str_replace(",", ".", $request -> price);
        if(!is_numeric($price)){
            session()->flash('mensagem_store_error_number', 'Erro ao cadastrar procedimento!');
            return redirect()->route('procedures.index');
        }
        $procedimento = new Procedure();
        $procedimento -> name = $request -> name;
        $procedimento -> price = $price;
        $procedimento -> user_id = Auth::user()->id;

        $procedimento -> save();

        session()->flash('mensagem_store_sucesso', 'Procedimento cadastrado com sucesso!');
        return redirect()->route('procedures.index');
    }

    public function edit($id){
        $procedimento = Procedure::find($id);
        if($procedimento == null){
            session()->flash('mensagem_edit_error', 'Id inválido para acessar esta página!');
            return redirect()->route('procedures.index');
        }
        return view('administrador.procedimento.edit' , ['procedimento' => $procedimento]);
    }

    public function update(Request $request , $id){
        if($request -> name == "" || $request -> price == ""){
            session()->flash('mensagem_update_error_vazio', 'Erro ao editar procedimento!');
            return redirect()->route('procedures.index');
        }
        $price = str_replace(",", ".", $request -> price);
        if(!is_numeric($price)){
            session()->flash('mensagem_update_error_number', 'Erro ao editar procedimento!');
            return redirect()->route('procedures.index');
        }

        $procedimento = Procedure::find($id);
        $procedimento -> name = $request -> name;
        $procedimento -> price = $price;

        $procedimento -> save();

        session()->flash('mensagem_update_sucesso', 'Procedimento editado com sucesso!');
        return redirect()->route('procedures.index');
    }

    public function destroy($id){
        $procedimento = Procedure::find($id);
        try{
            $procedimento -> delete();

        } catch (QueryException $e){
            session()->flash('mensagem_destroy_error', 'Erro ao excluir procedimento!');
            return redirect()->route('procedures.index');
        }
        session()->flash('mensagem_destroy_sucesso', 'Procedimento excluido com sucesso!');
        return redirect()->route('procedures.index');
    }
}

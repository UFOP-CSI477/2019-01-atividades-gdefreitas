<?php

namespace App\Http\Controllers\Operador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Procedure;

class ProcedimentoController extends Controller
{
    public function index(){
        $procedimentos = DB::select('select procedures.* , users.name as nameuser from procedures , users where procedures.user_id = users.id order by procedures.name');
        return view('operador.procedimento.index',['procedimentos' => $procedimentos]);
    }

    public function edit($id){
        $procedimento = Procedure::find($id);
        if($procedimento == null){
            session()->flash('mensagem_edit_error', 'Id inválido para acessar esta página!');
            return redirect()->route('procedure.index');
        }
        return view('operador.procedimento.edit' , ['procedimento' => $procedimento]);
    }

    public function update(Request $request , $id){
        if($request -> price == ""){
            session()->flash('mensagem_update_error_vazio', 'Erro ao editar procedimento!');
            return redirect()->route('procedure.index');
        }
        $price = str_replace(",", ".", $request -> price);
        if(!is_numeric($price)){
            session()->flash('mensagem_update_error_number', 'Erro ao editar procedimento!');
            return redirect()->route('procedure.index');
        }

        $procedimento = Procedure::find($id);
        $procedimento -> price = $price;

        $procedimento -> save();

        session()->flash('mensagem_update_sucesso', 'Preço do procedimento editado com sucesso!');
        return redirect()->route('procedure.index');
    }
}

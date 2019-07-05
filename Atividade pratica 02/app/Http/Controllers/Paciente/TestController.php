<?php

namespace App\Http\Controllers\Paciente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Procedure;
use App\Test;

class TestController extends Controller
{
    public function index(){
        $tests = DB::select('select tests.* , users.name as nameu , procedures.name as namep from tests , users , procedures where tests.user_id = users.id and tests.procedure_id = procedures.id and tests.user_id = ? order by tests.date desc , procedures.name asc ' , [Auth::user()->id]);
        return view('paciente.test.index' , ['tests' => $tests]);
    }

    public function create(){
        $procedimentos = Procedure::orderby('name')->get();
        return view('paciente.test.create' , ['procedimentos' => $procedimentos]);
    }

    public function store(Request $request){
        if($request -> procedimento == null || $request -> date == null){
            session()->flash('mensagem_store_error', 'Erro ao cadastrar o exame!');
            return redirect()->route('test.index');
        }
        $tests = new Test();
        $tests -> procedure_id = $request -> procedimento;
        $tests -> user_id = Auth::user()->id;
        $tests -> date = $request -> date;

        $tests -> save();

        session()->flash('mensagem_store_sucesso', 'Exame cadastrado com sucesso!');
        return redirect()->route('test.index');
    }

    public function edit($id){
        $tests = Test::find($id);

        if($tests == null){
            session()->flash('mensagem_edit_error', 'Impossivel acessar à página de edição por meio deste id!');
            return redirect()->route('test.index');
        }
        $procedimentos = Procedure::orderby('name') -> get();
        return view('paciente.test.edit' , ['tests' => $tests , 'procedimentos' => $procedimentos]);
    }

    public function update(Request $request , $id){
        if($request -> procedimento == null || $request -> date == null){
            session()->flash('mensagem_update_error', 'Erro ao atualizar o exame!');
            return redirect()->route('test.index');
        }

        $tests = Test::find($id);
        $tests -> procedure_id = $request -> procedimento;
        $tests -> date = $request -> date;

        $tests -> save();

        session()->flash('mensagem_update_sucesso', 'Exame editado com sucesso!');
        return redirect()->route('test.index');
    }

    public function destroy($id){
        $tests = Test::find($id);
        $tests -> delete();

        session()->flash('mensagem_destroy_sucesso', 'Exame excluido com sucesso!');
        return redirect()->route('test.index');
    }
}

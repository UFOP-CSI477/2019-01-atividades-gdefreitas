<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Procedure;
use Illuminate\Support\Facades\DB;

class AreaGeralController extends Controller
{
    public function index(){
        $procedimentos = DB::select('select procedures.* , users.name as nameuser from procedures , users where procedures.user_id = users.id order by procedures.name');
        return view('areageral.index',['procedimentos' => $procedimentos]);
    }
}

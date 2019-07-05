<?php

namespace App\Http\Controllers\Operador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){
        $tests = DB::select('select tests.* , users.name as nameu , procedures.name as namep from tests , users , procedures where tests.user_id = users.id and tests.procedure_id = procedures.id order by tests.date ');
        return view('operador.test.index' , ['tests' => $tests]);
    }
}

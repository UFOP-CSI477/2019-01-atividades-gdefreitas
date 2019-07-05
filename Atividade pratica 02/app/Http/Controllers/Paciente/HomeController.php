<?php

namespace App\Http\Controllers\Paciente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('paciente.home');
    }
}

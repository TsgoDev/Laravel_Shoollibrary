<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function index(){

        $emprestimos = Emprestimo::orderBy('created_at', 'desc')->get();
        return view('emprestimos.index', compact('emprestimos'));
    
    }
}

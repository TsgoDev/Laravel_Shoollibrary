<?php

namespace App\Http\Controllers;
use App\Models\Obra;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    /**
     * Exibe a lista de todos os obras ativos cadastrados, ordenados pela data de criação.
     */
    public function index()
    {
        $obras = Obra::with(['autor', 'acervo', 'genero', 'editora']) // carrega as relações
            ->where('status_obra', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.obras.index', compact('obras'));
    }




    /**
     * Exibe a lista de todos os obras inativos.
     */
    public function inativos()
    {
        $obras = Obra::where('status_obra', 0)->orderBy('created_at', 'desc')->get();
        return view('pages.obras.index', compact('obras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

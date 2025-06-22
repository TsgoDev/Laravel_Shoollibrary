<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObraController extends Controller
{
    /**
     * Exibe a lista de todos os obras ativos cadastrados, ordenados pela data de criação.
     */
    public function index()
    {
        $obras = Obra::with(['autores', 'acervo', 'genero', 'editora']) // carrega as relações
            ->where('status_obra', true)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($obra) {
                $obra->tem_observacao = !empty($obra->observacoes);
                return $obra;
            });

        return view('pages.obras.index', compact('obras'));
    }




    /**
     * Exibe a lista de todos os obras inativos.
     */
    public function inativos()
    {
        $obras = Obra::with(['autores', 'acervo', 'genero', 'editora'])
            ->where('status_obra', 0)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($obra) {
                $obra->tem_observacao = !empty($obra->observacoes);
                return $obra;
            });
        return view('pages.obras.index', compact('obras'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'edit_isbn' => 'required|string|max:13|unique:obras,isbn,' . $id,
            'edit_titulo' => 'required|string|max:100',
            'edit_edicao' => 'required|string|max:50',
            'edit_ano' => 'required|numeric',
            'edit_status_obra' => 'required|boolean',
            'edit_observacao' => 'nullable|string|max:200',
            'edit_autores' => 'required|array',
            'edit_autores.*' => 'exists:autores,id',
            'edit_editora_id' => 'required|exists:editoras,id',
            'edit_acervo_id' => 'required|exists:acervos,id',
            'edit_genero_id' => 'required|exists:generos,id',
        ]);

        $obra = Obra::findOrFail($id);

        $obra->update([
            'isbn' => $validated['edit_isbn'],
            'titulo' => $validated['edit_titulo'],
            'edicao' => $validated['edit_edicao'],
            'ano' => $validated['edit_ano'],
            'status_obra' => $validated['edit_status_obra'],
            'observacoes' => $validated['edit_observacao'],
            'editora_id' => $validated['edit_editora_id'],
            'acervo_id' => $validated['edit_acervo_id'],
            'genero_id' => $validated['edit_genero_id'],
        ]);

        $obra->autores()->sync($validated['edit_autores']);

        return redirect()->route('obras.index')->with('message', 'Obra atualizada com sucesso!');
    }

    public function store(Request $request)
    {
        $rules = [
            'isbn' => 'required|string|max:13|unique:obras,isbn',
            'titulo' => 'required|string|max:100',
            'edicao' => 'required|string|max:50',
            'ano' => 'required|numeric',
            'copia' => 'required|numeric',
            'status_obra' => 'required|boolean',
            'observacoes' => 'nullable|string|max:200',
            'autores' => 'required|array',
            'autores.*' => 'exists:autores,id',
            'editora_id' => 'required|exists:editoras,id',
            'acervo_id' => 'required|exists:acervos,id',
            'genero_id' => 'required|exists:generos,id',
        ];

        $messages = [
            'isbn.unique' => 'ISBN Já cadastrado.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();

            // Se o erro específico de ISBN único existir, ele será tratado pelo SweetAlert.
            if ($errors->has('isbn') && $errors->first('isbn') === $messages['isbn.unique']) {
                $isbnErrorMessage = $errors->first('isbn');
                $errors->forget('isbn'); // Remove o erro para não ser exibido novamente pela validação padrão

                return redirect()->back()
                    ->with('error', $isbnErrorMessage)
                    ->withErrors($errors)
                    ->withInput();
            }

            // Para outros erros de validação, redireciona normalmente.
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $obra = Obra::create([
            'isbn' => $request->isbn,
            'titulo' => $request->titulo,
            'edicao' => $request->edicao,
            'ano' => $request->ano,
            'copia' => $request->copia,
            'status_obra' => $request->status_obra,
            'observacoes' => $request->observacoes,
            'editora_id' => $request->editora_id,
            'acervo_id' => $request->acervo_id,
            'genero_id' => $request->genero_id,
        ]);

        $obra->autores()->attach($request->autores);

        return redirect()->route('obras.index')->with('message', 'Obra cadastrada com sucesso!');
    }
}

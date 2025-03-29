<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            // Validação dos dados
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Aceita apenas imagens de até 2MB
                'status' => 'required|in:0,1', // Garantir que o valor seja 0 ou 1
            ]);

            // Upload da imagem
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/products', 'public'); // Salva em storage/app/public/images/products
            } else {
                $imagePath = null;
            }
    
            // Criar produto no banco de dados
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'category' => $request->category,
                'price' => $request->price,
                'image' => $imagePath, // Caminho salvo no banco
                'status' => $request->status,
            ]);
    
            return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
        }
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
    public function update(Request $request) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Busca o produto pelo ID
        $products = Product::find($id);

        if ($products) {
            // Deleta o produto
            $products->delete();
            return redirect()->route('products.index');
        }

        // Caso o produto não seja encontrado
        return redirect()->route('products.index')->with('error', 'Produto não encontrado.');
    }
}

@extends('layouts.main')

@section('product')
<div class="container mx-auto mt-5 p-6">
    <!-- Input Pesquisa -->
    <div class="mb-4 flex items-center gap-4 px-4">
        <input type="text" id="searchInput" class="w-full max-w-md px-3 py-2 border border-gray-600 rounded-lg bg-white text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md" placeholder="Buscar produtos...">
        <!-- Botão Novo Produto -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="px-4 py-2 bg-gray-700 text-white rounded-lg shadow-lg hover:bg-gray-800 transition">
            + Novo Produto
        </button>
    </div>

    <!-- Tabela -->
    <section class="container px-4 mx-auto">
        <div class="flex items-center gap-x-3 mb-6">
            <h2 class="text-lg font-medium text-gray-800 white:text-white">Produtos</h2>
            <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full white:bg-gray-800 white:text-blue-400">{{ count($products) }} registros</span>
        </div>

        <div class="flex flex-col">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 white:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 white:divide-gray-700">
                            <thead class="bg-gray-50 white:bg-gray-800">
                                <tr>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>ID</span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <button class="flex items-center gap-x-2">
                                            <span>Imagem</span>
                                            <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <!-- SVG do ícone de ordenação -->
                                            </svg>
                                        </button>
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <button class="flex items-center gap-x-2">
                                            <span>Nome</span>
                                            <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <!-- SVG do ícone de ordenação -->
                                            </svg>
                                        </button>
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <button class="flex items-center gap-x-2">
                                            <span>Descrição</span>
                                            <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <!-- SVG do ícone de ordenação -->
                                            </svg>
                                        </button>
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <button class="flex items-center gap-x-2">
                                            <span>Preço</span>
                                            <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <!-- SVG do ícone de ordenação -->
                                            </svg>
                                        </button>
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <button class="flex items-center gap-x-2">
                                            <span>Quantidade</span>
                                            <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <!-- SVG do ícone de ordenação -->
                                            </svg>
                                        </button>
                                    </th>

                                    <th scope="col" class="px-8 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <button class="flex items-center gap-x-2">
                                            <span>Status</span>
                                            <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <!-- SVG do ícone de ordenação -->
                                            </svg>
                                        </button>
                                    </th>

                                    <th scope="col" class="relative py-3.5 px-4">
                                        <span class="sr-only">Ações</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 white:divide-gray-700 white:bg-gray-900">
                                @foreach($products as $product)
                                <tr>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                        {{ $product->id }}
                                    </td>

                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                        @if($product->image)
                                        <img src="{{ asset($product->image) }}" alt="Imagem do produto" class="w-12 h-12 object-cover rounded-lg">
                                        @else
                                        <span class="text-sm text-gray-500 white:text-gray-400">Sem imagem</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                        {{ $product->name }}
                                    </td>

                                    <td class="px-4 py-4 text-sm text-gray-500 white:text-gray-400 whitespace-nowrap">
                                        {{ $product->description }}
                                    </td>

                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                        R$ {{ number_format($product->price, 2, ',', '.') }}
                                    </td>

                                    <td class="px-10 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                        {{ $product->stock_quantity }}
                                    </td>

                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 
                                        {{ $product->status ? 'bg-emerald-100/60 white:bg-gray-600' : 'bg-red-100/60 white:bg-gray-800' }}">
                                            <span class="h-1.5 w-1.5 rounded-full 
                                            {{ $product->status ? 'bg-emerald-600' : 'bg-red-600' }}"></span>
                                            <span class="text-sm font-semibold 
                                            {{ $product->status ? 'text-emerald-600 white:text-emerald-600' : 'text-red-600 white:text-red-300' }}">
                                                {{ $product->status ? 'Disponível' : 'Indisponível' }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-2">
                                            
                                            <!-- Botão Editar -->
                                            <a href=""
                                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 w-10"
                                                data-modal-toggle="form-e">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil h-4 w-4">
                                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                                    <path d="m15 5 4 4" />
                                                </svg>
                                            </a>


                                            <!-- Botão Excluir -->
                                            <form id="formExcluir{{$product->id}}" action="{{ route('products-destroy',['id'=>$product->id])}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="inline-flex items-center justify-center gap-2 whitespace-nowrap 
                                                rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none 
                                                focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none 
                                                disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border 
                                                border-input bg-background h-10 w-10 text-destructive hover:text-destructive hover:bg-destructive/10" 
                                                onclick="confirmarExclusao(event, {{$product->id}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2 h-4 w-4">
                                                    <path d="M3 6h18" />
                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                    <line x1="10" x2="10" y1="11" y2="17" />
                                                    <line x1="14" x2="14" y1="11" y2="17" />
                                                </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('products.create_product')
    </section>
    @endsection
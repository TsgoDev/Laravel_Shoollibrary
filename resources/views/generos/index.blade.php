@extends('layouts.main')

@section('content')
<div class="container mx-auto mt-5 p-6">
    <!-- Input Pesquisa -->
    <div class="mb-4 flex items-center gap-4 px-4">
        <input type="text" id="searchInput"
            class="w-full max-w-md px-3 py-2 border border-gray-600 rounded-lg bg-white text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md"
            placeholder="Buscar generos..." autocomplete="off">
        <!-- Botão Novo Genero -->
        <button data-modal-target="crud-modal-create" data-modal-toggle="crud-modal-create"
            class="px-4 py-2 bg-gray-700 text-white rounded-lg shadow-lg hover:bg-gray-800 transition">
            + Adicionar
        </button>
    </div>

    <!-- Tabela -->
    <section class="container px-7 mx-auto">
        <div class="flex items-center gap-x-3 mb-6">
            <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full white:bg-gray-800 white:text-blue-400">
                {{ count($generos) }} registros
            </span>
        </div>

        <!-- Botão para alternar entre listas -->
        <div class="mb-6">
            @if(request()->routeIs('generos.inativos'))
            <a href="{{ route('generos.index') }}"
                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500 transition">

                Ver Generos Ativos
            </a>
            @else
            <a href="{{ route('generos.inativos') }}"
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">

                Ver Generos Inativos
            </a>
            @endif
        </div>

        <div class="flex flex-col">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 white:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 white:divide-gray-700">
                            <thead class="bg-gray-50 white:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>ID</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <button class="flex items-center gap-x-2">
                                            <span>Genero</span>
                                            <svg class="h-3" viewBox="0 0 10 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                            </svg>
                                        </button>
                                    </th>
                                    <th scope="col"
                                        class="px-8 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <button class="flex items-center gap-x-2">
                                            <span>Status</span>
                                            <svg class="h-3" viewBox="0 0 10 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                            </svg>
                                        </button>
                                    </th>
                                    <th scope="col"
                                        class="px-8 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <button class="flex items-center gap-x-50">
                                            <span>Ação</span>
                                            <svg class="h-3" viewBox="0 0 10 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                            </svg>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 white:divide-gray-700 white:bg-gray-900">
                                @foreach ($generos as $genero)
                                <tr>
                                    <td
                                        class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                        {{ $genero->id }}
                                    </td>

                                    <td
                                        class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                        {{ $genero->nome_genero }}
                                    </td>

                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300"
                                        data-status-id="{{ $genero->id }}">
                                        <div
                                            class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 
                                                {{ $genero->status_genero ? 'bg-emerald-100/60 white:bg-gray-600' : 'bg-red-100/60 white:bg-gray-800' }}">
                                            <span
                                                class="h-1.5 w-1.5 rounded-full 
                                                    {{ $genero->status_genero ? 'bg-emerald-600' : 'bg-red-600' }}">
                                            </span> <span
                                                class="text-sm font-semibold 
                                                    {{ $genero->status_genero ? 'text-emerald-600 white:text-emerald-600' : 'text-red-600 white:text-red-300' }}">
                                                {{ $genero->status_genero ? 'Ativo' : 'Indisponível' }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-2">
                                            <!-- Botão Editar -->
                                            <button type="button"
                                                class="btn-editar-genero px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform
                                                bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80"
                                                data-id="{{ $genero->id }}"
                                                data-nome="{{ $genero->nome_genero }}"
                                                data-status="{{ $genero->status_genero ? '1' : '0' }}"
                                                data-modal-target="crud-modal-edit"
                                                data-modal-toggle="crud-modal-edit">
                                                Editar
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('generos.form_create_genero')
    @include('generos.form_edite_genero')
    @endsection

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Quando o botão de editar for clicado
            document.querySelectorAll('.btn-editar-genero').forEach(button => {
                button.addEventListener('click', function() {
                    const generoId = this.getAttribute('data-id');
                    const form = document.getElementById('form-editar-genero');

                    // Configura a action do formulário
                    form.action = `/generos/${generoId}`;

                    // Preenche os campos do formulário instantaneamente
                    document.getElementById('genero_id').value = generoId;
                    document.getElementById('genero').value = this.getAttribute('data-nome');
                    document.getElementById('situacao').value = this.getAttribute('data-status');
                });
            });
        });
    </script>
    @endpush
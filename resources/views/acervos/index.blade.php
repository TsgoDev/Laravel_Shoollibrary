@extends('layouts.main')

@section('content')
<div class="container mx-auto mt-5 p-6">
    <!-- Input Pesquisa -->
    <div class="mb-4 flex items-center gap-4 px-4">
        <input type="text" id="searchInput"
            class="w-full max-w-md px-3 py-2 border border-gray-600 rounded-lg bg-white text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md"
            placeholder="Buscar acervos..." autocomplete="off">
        <!-- Botão Novo Acervo -->
        <button data-modal-target="crud-modal-create" data-modal-toggle="crud-modal-create"
            class="px-4 py-2 bg-gray-700 text-white rounded-lg shadow-lg hover:bg-gray-800 transition">
            + Adicionar
        </button>
    </div>

    <!-- Tabela -->
    <section class="container px-7 mx-auto">
        <div class="flex items-center gap-x-3 mb-6">
            <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full white:bg-gray-800 white:text-blue-400">
                {{ count($acervos) }} registros
            </span>
        </div>

        <!-- Botão para alternar entre listas -->
        <div class="mb-6">
            @if(request()->routeIs('acervos.inativos'))
            <a href="{{ route('acervos.index') }}"
                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500 transition">

                Ver Acervos Ativos
            </a>
            @else
            <a href="{{ route('acervos.inativos') }}"
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">

                Ver Acervos Inativos
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
                                            <span>Autor</span>
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
                                @foreach ($acervos as $acervo)
                                <tr>
                                    <td
                                        class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                        {{ $acervo->id }}
                                    </td>

                                    <td
                                        class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                        {{ $acervo->nome_acervo }}
                                    </td>

                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300"
                                        data-status-id="{{ $acervo->id }}">
                                        <div
                                            class="inline-flex items-center px-3 py-1 rounded-full gap-x-2
                                                {{ $acervo->status_acervo ? 'bg-emerald-100/60 white:bg-gray-600' : 'bg-red-100/60 white:bg-gray-800' }}">
                                            <span
                                                class="h-1.5 w-1.5 rounded-full
                                                    {{ $acervo->status_acervo ? 'bg-emerald-600' : 'bg-red-600' }}">
                                            </span> <span
                                                class="text-sm font-semibold
                                                    {{ $acervo->status_acervo ? 'text-emerald-600 white:text-emerald-600' : 'text-red-600 white:text-red-300' }}">
                                                {{ $acervo->status_acervo ? 'Ativo' : 'Indisponível' }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-2">
                                            <!-- Botão Editar -->
                                            <button type="button"
                                                class="btn-editar-acervo px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform
                                                bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80"
                                                data-id="{{ $acervo->id }}"
                                                data-nome="{{ $acervo->nome_acervo }}"
                                                data-status="{{ $acervo->status_acervo ? '1' : '0' }}"
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
    @include('acervos.form_create_acervo')
    @include('acervos.form_edite_acervo')
    @endsection

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Quando o botão de editar for clicado
            document.querySelectorAll('.btn-editar-acervo').forEach(button => {
                button.addEventListener('click', function() {
                    const acervoId = this.getAttribute('data-id');
                    const form = document.getElementById('form-editar-acervo');

                    // Configura a action do formulário
                    form.action = `/acervos/${acervoId}`;

                    // Preenche os campos do formulário instantaneamente
                    document.getElementById('acervo_id').value = acervoId;
                    document.getElementById('edit_acervo').value = this.getAttribute('data-nome');
                    document.getElementById('status_acervo').value = this.getAttribute('data-status');
                });
            });
        });
    </script>
    @endpush
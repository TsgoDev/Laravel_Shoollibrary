@extends('layouts.main')

@section('content')
<div class="container mx-auto mt-5 p-6">
    <!-- Input Pesquisa -->
    <div class="mb-4 flex items-center gap-4 px-4">
        <input type="text" id="searchInput"
            class="w-full max-w-md px-3 py-2 border border-gray-600 rounded-lg bg-white text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md"
            placeholder="Buscar obras..." autocomplete="off">
        <!-- Botão Novo Autor -->
        <button data-modal-target="crud-modal-create" data-modal-toggle="crud-modal-create"
            class="px-4 py-2 bg-gray-700 text-white rounded-lg shadow-lg hover:bg-gray-800 transition">
            + Adicionar
        </button>
    </div>

        <!-- Tabela -->
        <section class="container px-7 mx-auto">
            <div class="flex items-center gap-x-3 mb-6">
                <span
                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full white:bg-gray-800 white:text-blue-400">
                    {{ count($obras) }} registros
                </span>
            </div>

            <!-- Botão para alternar entre listas -->
            <div class="mb-6">
                @if (request()->routeIs('obras.inativos'))
                    <a href="{{ route('obras.index') }}"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500 transition">

                        Ver Obras Ativas
                    </a>
                @else
                    <a href="{{ route('obras.inativos') }}"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">

                        Ver Obras Inativas
                    </a>
                @endif
            </div>

            <div class="flex flex-col">
                <div class="inline-block w-full py-2 align-middle">
                    <div class="overflow-hidden border border-gray-200 white:border-gray-700 md:rounded-lg">
                        <table class="w-full divide-y divide-gray-200 white:divide-gray-700">
                            <thead class="bg-gray-50 white:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>ID</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Título</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Autor</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-1 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Edição</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Ano</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Editora</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Status</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-9 text-sm font-normal text-center text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Ação</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 white:divide-gray-700 white:bg-gray-900">
                                @foreach ($obras as $obra)
                                    <tr>
                                        <td
                                            class="px-2 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            {{ $obra->id }}
                                        </td>

                                        <td
                                            class="px-2 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            {{ $obra->titulo }}
                                        </td>

                                        <td
                                            class="px-2 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            {{ $obra->autor->nome_autor ?? '—' }}
                                        </td>

                                        <td
                                            class="px-2 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            {{ $obra->edicao }}
                                        </td>

                                        <td
                                            class="px-2 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            {{ $obra->ano }}
                                        </td>

                                        <td
                                            class="px-2 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            {{ $obra->editora->nome_editora ?? '—' }}
                                        </td>

                                        <td class="px-2 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300"
                                            data-status-id="{{ $obra->id }}">
                                            <div
                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2
                                                {{ $obra->status_obra ? 'bg-emerald-100/60 white:bg-gray-600' : 'bg-red-100/60 white:bg-gray-800' }}">
                                                <span
                                                    class="h-1.5 w-1.5 rounded-full
                                                    {{ $obra->status_obra ? 'bg-emerald-600' : 'bg-red-600' }}">
                                                </span>
                                                <span
                                                    class="text-sm font-semibold
                                                    {{ $obra->status_obra ? 'text-emerald-600 white:text-emerald-600' : 'text-red-600 white:text-red-300' }}">
                                                    {{ $obra->status_obra ? 'Ativo' : 'Indisponível' }}
                                                </span>
                                            </div>
                                        </td>

                                        <td class="px-2 py-2 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-2">
                                                <!-- Botão Editar -->
                                                <button type="button"
                                                    class="btn-editar-obra px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform
                                                    bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80"
                                                    data-id="{{ $obra->id }}" data-isbn="{{ $obra->isbn }}"
                                                    data-autor="{{ $obra->autor->nome_autor ?? '—' }}"
                                                    data-titulo="{{ $obra->titulo }}" data-edicao="{{ $obra->edicao }}"
                                                    data-ano="{{ $obra->ano }}" data-copia="{{ $obra->copia }}"
                                                    data-editora="{{ $obra->editora->nome_editora ?? '—' }}"
                                                    data-acervo="{{ $obra->acervo->nome_acervo ?? '—' }}"
                                                    data-genero="{{ $obra->genero->nome_genero ?? '—' }}"
                                                    data-observacao="{{ $obra->observacao }}"
                                                    data-status="{{ $obra->status_obra }}"
                                                    data-modal-target="crud-modal-edit" data-modal-toggle="crud-modal-edit">
                                                    Editar
                                                </button>
                                                <!-- Botão Detalhes -->
                                                <button type="button"
                                                    class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform
                                                    bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80"
                                                    data-id="{{ $obra->id }}" data-isbn="{{ $obra->isbn }}"
                                                    data-acervo="{{ $obra->acervo->nome_acervo ?? '—' }}"
                                                    data-genero="{{ $obra->genero->nome_genero ?? '—' }}"
                                                    data-copia="{{ $obra->copia }}" data-modal-target="detalhes-modal"
                                                    data-modal-toggle="detalhes-modal">
                                                    Detalhes
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
        </section>
        @include('pages.obras.form_create_obra')
        @include('pages.obras.form_edite_obra')
    </div>

    <!-- Modal Detalhes -->
    <div id="detalhes-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
        <div class="relative w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex justify-between items-center p-5 rounded-t border-b">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path
                                d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                        </svg>
                        <h3 class="text-xl font-medium text-black">
                            Detalhes da Obra
                        </h3>
                    </div>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-hide="detalhes-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 space-y-4 text-black">
                    <div>
                        <span class="font-semibold">ISBN:</span>
                        <span id="detalhes-isbn" class="ml-2">-</span>
                    </div>
                    <div>
                        <span class="font-semibold">Acervo:</span>
                        <span id="detalhes-acervo" class="ml-2">-</span>
                    </div>
                    <div>
                        <span class="font-semibold">Gênero:</span>
                        <span id="detalhes-genero" class="ml-2">-</span>
                    </div>
                    <div>
                        <span class="font-semibold">Cópia:</span>
                        <span id="detalhes-copia" class="ml-2">-</span>
                    </div>
                </div>
                <div class="flex justify-end p-4">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Script existente para editar
            document.querySelectorAll('.btn-editar-obra').forEach(button => {
                button.addEventListener('click', function() {
                    const obraId = this.getAttribute('data-id');
                    const form = document.getElementById('form-editar-obra');
                    form.action = `/obras/${obraId}`;
                    document.getElementById('obra_id').value = obraId;
                    document.getElementById('edit_isbn').value = this.getAttribute('data-isbn');
                    document.getElementById('edit_titulo').value = this.getAttribute('data-titulo');
                    document.getElementById('edit_edicao').value = this.getAttribute('data-edicao');
                    document.getElementById('edit_ano').value = this.getAttribute('data-ano');
                    document.getElementById('edit_copia').value = this.getAttribute('data-copia');
                    document.getElementById('edit_observacao').value = this.getAttribute(
                        'data-observacao');
                    document.getElementById('edit_status_obra').value = this.getAttribute(
                        'data-status');
                });
            });

            // Script para o modal de detalhes
            document.querySelectorAll('button[data-modal-target="detalhes-modal"]').forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('detalhes-isbn').textContent = this.getAttribute(
                        'data-isbn') || '-';
                    document.getElementById('detalhes-acervo').textContent = this.getAttribute(
                        'data-acervo') || '-';
                    document.getElementById('detalhes-genero').textContent = this.getAttribute(
                        'data-genero') || '-';
                    document.getElementById('detalhes-copia').textContent = this.getAttribute(
                        'data-copia') || '-';
                });
            });
        });
    </script>
@endpush

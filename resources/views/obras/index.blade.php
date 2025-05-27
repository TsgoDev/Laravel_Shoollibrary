@extends('layouts.main')

@section('content')
    <div class="mt-5 ml-2 container mx-auto">
        <!-- Input Pesquisa -->
        <div class="mb-4 flex items-center gap-4">
            <input type="text" id="searchInput"
                class="w-full max-w-md px-3 py-2 border border-gray-600 rounded-lg bg-white text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md !ml-0"
                placeholder="Buscar obras..." autocomplete="off">
            <!-- Botão Nova Obra -->
            <button data-modal-target="crud-modal-create" data-modal-toggle="crud-modal-create"
                class="px-4 py-2 bg-gray-700 text-white rounded-lg shadow-lg hover:bg-gray-800 transition">
                + Adicionar
            </button>
        </div>

        <!-- Tabela -->
        <section class="w-full px-0">
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
                                            <span>ISBN</span>
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
                                    <th class="px-2 py-2 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Cópia</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Acervo</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Gênero</span>
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
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
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
                                            {{ $obra->isbn }}
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
                                            {{ $obra->copia }}
                                        </td>

                                        <td
                                            class="px-2 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            {{ $obra->acervo->nome_acervo ?? '—' }}
                                        </td>

                                        <td
                                            class="px-2 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            {{ $obra->genero->nome_genero ?? '—' }}
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
                                                </span> <span
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
                                                    class="btn-editar-aluno px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform
                                                bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80"
                                                    data-id="{{ $obra->id }}" data-isbn="{{ $obra->isbn }}"
                                                    data-titulo="{{ $obra->titulo }}" data-edicao="{{ $obra->edicao }}"
                                                    data-ano="{{ $obra->ano }}" data-copia="{{ $obra->copia }}"
                                                    data-observacao="{{ $obra->observacao }}"
                                                    data-status="{{ $obra->status_obra }}"
                                                    data-modal-target="crud-modal-edit" data-modal-toggle="crud-modal-edit">
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
        </section>
        @include('obras.form_create_obra')
        @include('obras.form_edite_obra')
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Quando o botão de editar for clicado
            document.querySelectorAll('.btn-editar-obra').forEach(button => {
                button.addEventListener('click', function() {
                    const obraId = this.getAttribute('data-id');
                    const form = document.getElementById('form-editar-obra');

                    // Configura a action do formulário
                    form.action = `/obras/${obraId}`;

                    // Preenche os campos do formulário instantaneamente
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
        });
    </script>
@endpush

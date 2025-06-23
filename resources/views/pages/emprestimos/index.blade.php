@extends('layouts.main')

@section('content')
    <div class="container mx-auto mt-5 p-6">
        <!-- Input Pesquisa -->
        <div class="mb-4 flex items-center gap-4 px-4">
            <input type="text" id="searchInput"
                class="w-full max-w-md px-3 py-2 border border-gray-600 rounded-lg bg-white text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md"
                placeholder="Buscar emprestimos..." autocomplete="off">
            <!-- Botão Novo Emprestimo -->
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
                    {{ count($emprestimos) }} registros
                </span>
            </div>

            <!-- Botão para alternar entre listas -->
            <div class="mb-6">
                @if (request()->routeIs('emprestimos.inativos'))
                    <a href="{{ route('emprestimos.index') }}"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500 transition">

                        Ver Emprestimos Ativos
                    </a>
                @else
                    <a href="{{ route('emprestimos.inativos') }}"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">

                        Ver Emprestimos Inativos
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
                                            <span>Matrícula</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-2 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Turma</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-6 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Aluno</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Título Livro</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Data Emprestimo</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Data Devolução</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Situação</span>
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
                                @foreach ($emprestimos as $emprestimo)
                                    <tr>
                                        <td
                                            class="px-2 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            {{ $emprestimo->id }}
                                        </td>

                                        <td
                                            class="px-4 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            {{ $emprestimo->matricula_aluno }}
                                        </td>

                                        <td
                                            class="px-4 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            {{ $emprestimo->turma_aluno }}
                                        </td>

                                        <td
                                            class="px-6 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            <div class="flex items-center">
                                                <span>{{ $emprestimo->nome_aluno }}</span>
                                                @if ($emprestimo->observacoes)
                                                    <span class="ml-2" aria-label="{{ $emprestimo->observacoes }}"
                                                        data-microtip-position="top" role="tooltip">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-orange-500" viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M18 10c0 3.866-3.582 7-8 7a8.948 8.948 0 01-4.131-1.033l-3.21.942a.5.5 0 00-.559.559l.942-3.21A8.948 8.948 0 012 10c0-4.418 4.477-8 10-8s8 3.582 8 8zM6 10a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                @else
                                                    <span class="ml-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M18 10c0 3.866-3.582 7-8 7a8.948 8.948 0 01-4.131-1.033l-3.21.942a.5.5 0 00-.559.559l.942-3.21A8.948 8.948 0 012 10c0-4.418 4.477-8 10-8s8 3.582 8 8zM6 10a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                @endif
                                            </div>
                                        </td>

                                        <td
                                            class="px-5 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            {{ $emprestimo->titulo_livro }}
                                        </td>

                                            <td
                                                class="px-5 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                                {{ $emprestimo->data_emprestimo->format('d/m/Y') }}
                                            </td>

                                        <td
                                            class="px-5 py-2 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                            {{ $emprestimo->data_devolucao->format('d/m/Y') }}
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300"
                                        data-status-id="{{ $emprestimo->id }}">
                                        <div
                                            class="inline-flex items-center px-3 py-1 rounded-full gap-x-2
                                                {{ $emprestimo->status_emprestimo ? 'bg-emerald-100/60 white:bg-gray-600' : 'bg-red-100/60 white:bg-gray-800' }}">
                                            <span
                                                class="h-1.5 w-1.5 rounded-full
                                                    {{ $emprestimo->status_emprestimo ? 'bg-emerald-600' : 'bg-red-600' }}">
                                            </span> <span
                                                class="text-sm font-semibold
                                                    {{ $emprestimo->status_emprestimo ? 'text-emerald-600 white:text-emerald-600' : 'text-red-600 white:text-red-300' }}">
                                                {{ $emprestimo->status_emprestimo ? 'Ativo' : 'Indisponível' }}
                                            </span>
                                        </div>
                                    </td>

                                        <td class="px-2 py-2 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-2">
                                                <!-- Botão Editar -->
                                                <button type="button"
                                                    class="btn-editar-obra px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform
                                                    bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80"
                                                    data-id="{{ $emprestimo->id }}"
                                                    data-matricula="{{ $emprestimo->matricula_aluno }}"
                                                    data-turma="{{ $emprestimo->turma_aluno }}"
                                                    data-nome="{{ $emprestimo->nome_aluno }}"
                                                    data-titulo="{{ $emprestimo->titulo_livro }}"
                                                    data-data-emprestimo="{{ $emprestimo->data_emprestimo }}"
                                                    data-data-devolucao="{{ $emprestimo->data_devolucao }}"
                                                    data-status="{{ (int) $emprestimo->status_emprestimo }}"
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
        </section>
        @include('pages.emprestimos.form_create_emprestimo')
        @include('pages.emprestimos.form_edite_emprestimo')
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Script existente para editar
            document.querySelectorAll('.btn-editar-emprestimo').forEach(button => {
                button.addEventListener('click', function() {
                    const emprestimoId = this.getAttribute('data-id');
                    const form = document.getElementById('form-editar-emprestimo');
                    form.action = `/emprestimos/update/${emprestimoId}`;

                    // Popula os campos normais
                    document.getElementById('emprestimo_id').value = emprestimoId;
                    document.getElementById('edit_matricula').value = this.getAttribute('data-matricula');
                    document.getElementById('edit_turma').value = this.getAttribute('data-turma');
                    document.getElementById('edit_nome_aluno').value = this.getAttribute('data-nome');
                    document.getElementById('edit_titulo_livro').value = this.getAttribute('data-titulo');
                    document.getElementById('edit_data_emprestimo').value = this.getAttribute('data-data-emprestimo');
                    document.getElementById('edit_data_devolucao').value = this.getAttribute('data-data-devolucao');
                    document.getElementById('edit_status_emprestimo').value = this.getAttribute('data-status');

                    // Popula o campo de observações
                    document.getElementById('edit_observacao').value = this.getAttribute('data-observacao') || '';
                    if (window.popularAutores) {
                        window.popularAutores(autoresData);
                    }
                });
            });
        });
    </script>
@endpush

@extends('layouts.main')

@section('content')
    <div class="container mx-auto mt-5 p-6">
        <!-- Input Pesquisa -->
        <div class="mb-4 flex items-center gap-4 px-4">
            <input type="text" id="searchInput"
                class="w-full max-w-md px-3 py-2 border border-gray-600 rounded-lg bg-white text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md"
                placeholder="Buscar alunos..." autocomplete="off">
            <!-- Botão Novo Aluno -->
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
                    {{ count($alunos) }} registros
                </span>
            </div>

            <!-- Botão para alternar entre listas -->
            <div class="mb-6">
                @if (request()->routeIs('alunos.inativos'))
                    <a href="{{ route('alunos.index') }}"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500 transition">

                        Ver Alunos Ativos
                    </a>
                @else
                    <a href="{{ route('alunos.inativos') }}"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">

                        Ver Alunos Inativos
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
                                                <span>Matricula</span>
                                                <svg class="h-3" viewBox="0 0 10 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                </svg>
                                            </button>
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                            <button class="flex items-center gap-x-2">
                                                <span>Turma</span>
                                                <svg class="h-3" viewBox="0 0 10 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                </svg>
                                            </button>
                                        </th>
                                        <th scope="col"
                                            class="px-8 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                            <button class="flex items-center gap-x-50">
                                                <span>Nome</span>
                                                <svg class="h-3" viewBox="0 0 10 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                </svg>
                                            </button>
                                        </th>
                                        <th scope="col"
                                            class="px-8 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                            <button class="flex items-center gap-x-50">
                                                <span>Telefone</span>
                                                <svg class="h-3" viewBox="0 0 10 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                </svg>
                                            </button>
                                        </th>
                                        <th scope="col"
                                            class="px-8 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                            <button class="flex items-center gap-x-50">
                                                <span>Email</span>
                                                <svg class="h-3" viewBox="0 0 10 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                </svg>
                                            </button>
                                        </th>
                                        <th scope="col"
                                            class="px-8 py-3.5 text-sm font-normal text-left text-gray-500 white:text-gray-400">
                                            <button class="flex items-center gap-x-50">
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
                                    @foreach ($alunos as $aluno)
                                        <tr>
                                            <td
                                                class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                                {{ $aluno->id }}
                                            </td>

                                            <td
                                                class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                                {{ $aluno->matricula_aluno }}
                                            </td>

                                            <td
                                                class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                                {{ $aluno->turma_aluno }}
                                            </td>

                                            <td
                                                class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                                <div class="flex items-center">
                                                    <span>{{ $aluno->nome_aluno }}</span>
                                                    @if ($aluno->tem_observacao)
                                                        <span class="ml-2" aria-label="{{ $aluno->observacoes }}"
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
                                                class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                                {{ $aluno->telefone_aluno }}
                                            </td>

                                            <td
                                                class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300">
                                                {{ $aluno->email_aluno }}
                                            </td>

                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap white:text-gray-300"
                                                data-status-id="{{ $aluno->id }}">
                                                <div
                                                    class="inline-flex items-center px-3 py-1 rounded-full gap-x-2
                                                {{ $aluno->status_aluno ? 'bg-emerald-100/60 white:bg-gray-600' : 'bg-red-100/60 white:bg-gray-800' }}">
                                                    <span
                                                        class="h-1.5 w-1.5 rounded-full
                                                    {{ $aluno->status_aluno ? 'bg-emerald-600' : 'bg-red-600' }}">
                                                    </span> <span
                                                        class="text-sm font-semibold
                                                    {{ $aluno->status_aluno ? 'text-emerald-600 white:text-emerald-600' : 'text-red-600 white:text-red-300' }}">
                                                        {{ $aluno->status_aluno ? 'Ativo' : 'Indisponível' }}
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div class="flex items-center gap-x-2">
                                                    <!-- Botão Editar -->
                                                    <button type="button"
                                                        class="btn-editar-aluno px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform
                                                bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80"
                                                        data-id="{{ $aluno->id }}"
                                                        data-matricula="{{ $aluno->matricula_aluno }}"
                                                        data-turma="{{ $aluno->turma_aluno }}"
                                                        data-nome="{{ $aluno->nome_aluno }}"
                                                        data-telefone="{{ $aluno->telefone_aluno }}"
                                                        data-email="{{ $aluno->email_aluno }}"
                                                        data-status="{{ $aluno->status_aluno ? '1' : '0' }}"
                                                        data-observacoes="{{ $aluno->observacoes }}"
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
        @include('pages.alunos.form_create_aluno')
        @include('pages.alunos.form_edite_aluno')
    @endsection

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Quando o botão de editar for clicado
                document.querySelectorAll('.btn-editar-aluno').forEach(button => {
                    button.addEventListener('click', function() {
                        const alunoId = this.getAttribute('data-id');
                        const form = document.getElementById('form-editar-aluno');

                        // Configura a action do formulário
                        form.action = `/alunos/${alunoId}`;

                        // Preenche os campos do formulário instantaneamente
                        document.getElementById('aluno_id').value = alunoId;
                        document.getElementById('edit_matricula').value = this.getAttribute('data-matricula');
                        document.getElementById('edit_turma').value = this.getAttribute('data-turma');
                        document.getElementById('edit_nome').value = this.getAttribute('data-nome');
                        document.getElementById('edit_telefone').value = this.getAttribute('data-telefone');
                        document.getElementById('edit_email').value = this.getAttribute('data-email');
                        document.getElementById('edit_status_aluno').value = this.getAttribute('data-status');
                        document.getElementById('edit_observacoes').value = this.getAttribute('data-observacoes');
                    });
                });
            });
        </script>
    @endpush

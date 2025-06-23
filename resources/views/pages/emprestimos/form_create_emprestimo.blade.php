<!-----Modal create emprestimo------->
<div id="crud-modal-create" tabindex="-1" aria-hidden="true"
    class="hidden flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm"></div>
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm white:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t white:border-gray-600 border-gray-200">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 white:text-white">
                        Adicionar Empréstimos
                    </h3>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center white:hover:bg-gray-600 white:hover:text-white"
                    data-modal-toggle="crud-modal-create">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('emprestimos-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-3">
                    <!-- Matrícula -->
                    <div>
                        <label for="matricula"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Matrícula</label>
                        <input type="number" name="matricula" id="matricula"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="9" placeholder="Ex: 123456789">
                    </div>

                    <!-- Turma -->
                    <div>
                        <label for="turma_aluno"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Turma</label>
                        <input type="text" name="turma_aluno" id="turma_aluno"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            required maxlength="100" placeholder="1° A">
                    </div>

                    <!-- Nome do Aluno -->
                    <div>
                        <label for="nome_aluno"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Aluno</label>
                        <input type="text" name="nome_aluno" id="nome_aluno"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            required maxlength="100" placeholder="Ex: João da Silva">
                    </div>

                     <!-- Título do Livro -->
                     <div>
                        <label for="titulo_livro"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Título do Livro</label>
                            <input type="text" name="titulo_livro" id="titulo_livro"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            required maxlength="100" placeholder="Ex: O Senhor dos Anéis">
                    </div>

                    <!-- Data de Emprestimo -->
                    <div>
                        <label for="data_emprestimo"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Data de Emprestimo</label>
                        <input type="date" name="data_emprestimo" id="data_emprestimo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="50" placeholder="Ex: 10/06/2025">
                    </div>

                    <!-- Data de Devolução -->
                    <div>
                        <label for="data_devolucao"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Data de Devolução</label>
                        <input type="date" name="data_devolucao" id="data_devolucao"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="50" placeholder="Ex: 10/06/2025">
                    </div>

                    <!-- Status do Empréstimo -->
                    <div class="col-span-2">
                        <label for="status_emprestimo" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Status</label>
                        <select id="status_emprestimo" name="status_emprestimo" class="bg-white
                         text-black border border-gray-300 text-sm rounded-lg block w-56 p-2.5" required>
                            <option value="">Escolha um opção</option>
                            <option value="Em andamento">Em andamento</option>
                            <option value="Devolvido">Devolvido</option>
                            <option value="Atrasado">Atrasado</option>
                        </select>
                    </div>


                    <!-- Observações -->
                    <div class="col-span-3">
                        <label for="observacoes"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Observações</label>
                        <textarea name="observacoes" id="observacoes" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="200" placeholder="Observações sobre a obra"></textarea>
                    </div>
                </div>

                <!-- Botão -->
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center white:bg-blue-600 white:hover:bg-blue-700 white:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Adicionar
                </button>
            </form>
            <!-----SweetAlert Insert obra------->
            @if (Session::has('message'))
                <script>
                    swal({
                        title: "Mensagem",
                        text: "{{ Session::get('message') }}",
                        icon: "success",
                        buttons: {
                            confirm: {
                                text: "OK",
                                value: true,
                                visible: true,
                                className: "btn btn-success",
                                closeModal: true
                            }
                        }
                    });
                </script>
            @endif
            @if (Session::has('error'))
                <script>
                    swal({
                        title: "Atenção",
                        text: "{{ Session::get('error') }}",
                        icon: "error",
                        buttons: {
                            confirm: {
                                text: "OK",
                                value: true,
                                visible: true,
                                className: "btn btn-danger",
                                closeModal: true
                            }
                        }
                    });
                </script>
            @endif
        </div>
    </div>
</div>


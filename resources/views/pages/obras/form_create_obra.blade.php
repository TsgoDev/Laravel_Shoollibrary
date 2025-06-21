<!-----Modal create obra------->
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
                        Adicionar Obra
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
            <form class="p-4 md:p-5" action="{{ route('obras-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-3">
                    <!-- ISBN -->
                    <div>
                        <label for="isbn"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">ISBN</label>
                        <input type="text" name="isbn" id="isbn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="13" placeholder="Ex: 9788535909555">
                    </div>

                    <!-- Título da Obra -->
                    <div>
                        <label for="titulo"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Título</label>
                        <input type="text" name="titulo" id="titulo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            required maxlength="100" placeholder="Ex: Dom Casmurro">
                    </div>

                    <!-- Autor da Obra -->
                    <div>
                        <label for="autor"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Autor</label>
                        <div class="flex">
                            <input type="text" name="autor" id="autor" readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-48 p-2.5"
                                placeholder="Selecione um autor">
                            <button type="button" data-modal-target="modal-busca-autor"
                                data-modal-toggle="modal-busca-autor"
                                class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Edição -->
                    <div>
                        <label for="edicao"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Edição</label>
                        <input type="text" name="edicao" id="edicao"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="50" placeholder="Ex: 1ª edição">
                    </div>

                    <!-- Ano -->
                    <div>
                        <label for="ano"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Ano</label>
                        <input type="number" name="ano" id="ano"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="4" placeholder="Ex: 2023">
                    </div>

                    <!-- Editora -->
                    <div>
                        <label for="editora"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Editora</label>
                        <div class="flex">
                            <input type="text" name="editora" id="editora" readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-48 p-2.5"
                                placeholder="Selecione uma editora">
                            <button type="button" data-modal-target="modal-busca-editora"
                                data-modal-toggle="modal-busca-editora"
                                class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Acervo -->
                    <div>
                        <label for="acervo"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Acervo</label>
                        <div class="flex">
                            <input type="text" name="acervo" id="acervo" readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-48 p-2.5"
                                placeholder="Selecione um acervo">
                            <button type="button" data-modal-target="modal-busca-acervo"
                                data-modal-toggle="modal-busca-acervo"
                                class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Gênero -->
                    <div>
                        <label for="genero"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Gênero</label>
                        <div class="flex">
                            <input type="text" name="genero" id="genero" readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-48 p-2.5"
                                placeholder="Selecione um gênero">
                            <button type="button" data-modal-target="modal-busca-genero"
                                data-modal-toggle="modal-busca-genero"
                                class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Cópia -->
                    <div>
                        <label for="copia"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Cópia</label>
                        <input type="text" name="copia" id="copia"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="50" placeholder="Ex: Cópia 1">
                    </div>

                    <!-- Status da Obra -->
                    <div>
                        <label for="status_obra"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Status</label>
                        <select id="status_obra" name="status_obra"
                            class="bg-white text-black border border-gray-300 text-sm rounded-lg block w-48 p-2.5"
                            required>
                            <option value="">Escolha uma opção</option>
                            <option value="1">Ativo</option>
                            <option value="0">Indisponível</option>
                        </select>
                    </div>

                    <!-- Observações -->
                    <div class="col-span-3">
                        <label for="observacao"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Observações</label>
                        <textarea name="observacao" id="observacao" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="200" placeholder="Observações sobre a obra"></textarea>
                    </div>
                </div>

                <!-- Botão -->
                <button type="submit" name="submit"
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

<!-- Modal de Busca de Editora -->
<div id="modal-busca-editora" tabindex="-1" aria-hidden="true"
    class="hidden flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm"></div>
        <div class="relative bg-white rounded-lg shadow-sm white:bg-gray-700">
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t white:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 white:text-white">Selecionar Editora</h3>
                <button type="button" data-modal-hide="modal-busca-editora"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center white:hover:bg-gray-600 white:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <div class="mb-4">
                    <input type="text" id="busca-editora" placeholder="Digite para buscar editoras..."
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div id="lista-editoras" class="max-h-60 overflow-y-auto">
                    <!-- Lista será carregada via JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Busca de Acervo -->
<div id="modal-busca-acervo" tabindex="-1" aria-hidden="true"
    class="hidden flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm"></div>
        <div class="relative bg-white rounded-lg shadow-sm white:bg-gray-700">
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t white:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 white:text-white">Selecionar Acervo</h3>
                <button type="button" data-modal-hide="modal-busca-acervo"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center white:hover:bg-gray-600 white:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <div class="mb-4">
                    <input type="text" id="busca-acervo" placeholder="Digite para buscar acervos..."
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div id="lista-acervos" class="max-h-60 overflow-y-auto">
                    <!-- Lista será carregada via JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Busca de Gênero -->
<div id="modal-busca-genero" tabindex="-1" aria-hidden="true"
    class="hidden flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm"></div>
        <div class="relative bg-white rounded-lg shadow-sm white:bg-gray-700">
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t white:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 white:text-white">Selecionar Gênero</h3>
                <button type="button" data-modal-hide="modal-busca-genero"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center white:hover:bg-gray-600 white:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <div class="mb-4">
                    <input type="text" id="busca-genero" placeholder="Digite para buscar gêneros..."
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div id="lista-generos" class="max-h-60 overflow-y-auto">
                    <!-- Lista será carregada via JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Busca de Autor -->
<div id="modal-busca-autor" tabindex="-1" aria-hidden="true"
    class="hidden flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm"></div>
        <div class="relative bg-white rounded-lg shadow-sm white:bg-gray-700">
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t white:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 white:text-white">Selecionar Autor</h3>
                <button type="button" data-modal-hide="modal-busca-autor"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center white:hover:bg-gray-600 white:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <div class="mb-4">
                    <input type="text" id="busca-autor" placeholder="Digite para buscar autores..."
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div id="lista-autores" class="max-h-60 overflow-y-auto">
                    <!-- Lista será carregada via JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-----Modal edita obra------->
<div id="crud-modal-edit" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm"></div>
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm white:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t white:border-gray-600 border-gray-200">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 white:text-white">
                        Editar Obra
                    </h3>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center white:hover:bg-gray-600 white:hover:text-white"
                    data-modal-toggle="crud-modal-edit">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal de Edição -->
            <form id="form-editar-obra" action="" method="POST" class="p-4 md:p-5" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- ID oculto para ser usado no JS -->
                <input type="hidden" id="obra_id" name="obra_id">
                <div class="grid gap-4 mb-4 grid-cols-3">
                    <!-- ISBN -->
                    <div>
                        <label for="edit_isbn"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">ISBN</label>
                        <input type="text" name="edit_isbn" id="edit_isbn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="13">
                    </div>

                    <!-- Título da Obra -->
                    <div>
                        <label for="edit_titulo"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Título</label>
                        <input type="text" name="edit_titulo" id="edit_titulo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="100">
                    </div>

                    <!-- Autor da Obra -->
                    <div>
                        <label for="edit_autores"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Autor(es)</label>
                        <div class="flex">
                            <input type="text" name="edit_autores" id="edit_autores"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Selecione um ou mais autores">
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
                        <label for="edit_edicao"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Edição</label>
                        <input type="text" name="edit_edicao" id="edit_edicao"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="50">
                    </div>

                    <!-- Ano -->
                    <div>
                        <label for="edit_ano"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Ano</label>
                        <input type="number" name="edit_ano" id="edit_ano"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="4">
                    </div>

                    <!-- Editora -->
                    <div>
                        <label for="edit_editora_nome"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Editora</label>
                        <div class="flex">
                            <input type="text" name="edit_editora_nome" id="edit_editora_nome" readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
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
                        <input type="hidden" name="edit_editora_id" id="edit_editora_id">
                    </div>

                    <!-- Acervo -->
                    <div>
                        <label for="edit_acervo_nome"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Acervo</label>
                        <div class="flex">
                            <input type="text" name="edit_acervo_nome" id="edit_acervo_nome" readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
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
                        <input type="hidden" name="edit_acervo_id" id="edit_acervo_id">
                    </div>

                    <!-- Gênero -->
                    <div>
                        <label for="edit_genero_nome"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Gênero</label>
                        <div class="flex">
                            <input type="text" name="edit_genero_nome" id="edit_genero_nome" readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
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
                        <input type="hidden" name="edit_genero_id" id="edit_genero_id">
                    </div>

                    <!-- Cópia -->
                    <div>
                        <label for="edit_copia"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Cópia</label>
                        <input type="number" name="edit_copia" id="edit_copia"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="50">
                    </div>

                    <!-- Status da Obra -->
                    <div>
                        <label for="edit_status_obra"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Status</label>
                        <select id="edit_status_obra" name="edit_status_obra"
                            class="bg-white text-black border border-gray-300 text-sm rounded-lg block w-48 p-2.5">
                            <option value="1">Ativo</option>
                            <option value="0">Indisponível</option>
                        </select>
                    </div>

                    <!-- Observações -->
                    <div class="col-span-3">
                        <label for="edit_observacao"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Observações</label>
                        <textarea name="edit_observacao" id="edit_observacao" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="200"></textarea>
                    </div>
                </div>

                <!-- Botão -->
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center white:bg-blue-600 white:hover:bg-blue-700 white:focus:ring-blue-800">
                    Atualizar
                </button>
            </form>
            <!-----SweetAlert Editar obra------->
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var autoresEditInput = document.querySelector('#edit_autores');
        if (autoresEditInput) {
            var tagifyEdit = new Tagify(autoresEditInput, {
                whitelist: [], // A lista será preenchida dinamicamente
                dropdown: {
                    maxItems: 20,
                    classname: 'tags-look',
                    enabled: 0,
                    closeOnSelect: false
                }
            });

            // Função global para popular as tags
            window.popularAutores = function(autores) {
                tagifyEdit.removeAllTags();
                tagifyEdit.addTags(autores);
            };

            // Adiciona autores selecionados no modal de busca
            window.adicionarAutorEdit = function(id, nome) {
                tagifyEdit.addTags([{
                    value: nome,
                    id: id
                }]);
                // Fecha o modal de busca de autor
                document.querySelector('[data-modal-hide="modal-busca-autor"]').click();
            };

            var formEdit = document.querySelector('#form-editar-obra');
            formEdit.addEventListener('submit', function(e) {
                e.preventDefault();

                var autoresValues = tagifyEdit.value.map(item => item.id);

                // Limpa inputs antigos se existirem
                formEdit.querySelectorAll('input[name="edit_autores[]"]').forEach(el => el.remove());

                autoresValues.forEach(function(id) {
                    var hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'edit_autores[]';
                    hiddenInput.value = id;
                    formEdit.appendChild(hiddenInput);
                });

                autoresEditInput.name = '';
                formEdit.submit();
            });
        }
    });
</script>

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
            <form id="form-editar-aluno" action="" method="POST" class="p-4 md:p-5" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- ID oculto para ser usado no JS -->
                <input type="hidden" id="obra_id" name="obra_id">
                <div class="grid gap-4 mb-4 grid-cols-3">
                    <!-- Matrícula da Obra -->
                    <div>
                        <label for="edit_matricula"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Matrícula</label>
                        <input type="text" name="edit_matricula" id="edit_matricula"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>

                    <!-- Titulo da Obra -->
                    <div>
                        <label for="edit_titulo"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Titulo</label>
                        <input type="text" name="edit_titulo" id="edit_titulo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="100">
                    </div>

                    <!-- Autor da Obra -->
                    <div>
                        <label for="edit_autor"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Autor</label>
                        <input type="text" name="edit_autor" id="edit_autor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="2">
                    </div>

                    <!-- Telefone do Aluno -->
                    <div>
                        <label for="edit_telefone"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Telefone</label>
                        <input type="text" name="edit_telefone" id="edit_telefone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500 phone_with_ddd"
                            maxlength="15">
                    </div>

                    <!-- Email do Aluno -->
                    <div class="col-span-1">
                        <label for="edit_email"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Email</label>
                        <input type="email" name="edit_email" id="edit_email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-64 p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="100">
                    </div>

                    <!-- Status do Aluno -->
                    <div class="col-span-1">
                        <label for="status_aluno"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Status</label>
                        <select id="edit_status_aluno" name="edit_status_aluno"
                            class="bg-white text-black border border-gray-300 text-sm rounded-lg block w-48 p-2.5">
                            <option value="1">Ativo</option>
                            <option value="0">Indisponível</option>
                        </select>
                    </div>

                    <!-- Observações do Aluno (linha inteira) -->
                    <div class="col-span-2">
                        <label for="edit_observacoes"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Observações</label>
                        <input type="text" name="edit_observacoes" id="edit_observacoes"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            maxlength="200">
                    </div>
                </div>

                <!-- Botão -->
                <button type="submit" name="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center white:bg-blue-600 white:hover:bg-blue-700 white:focus:ring-blue-800">
                    Atualizar
                </button>
            </form>
            <!-----SweetAlert Editar aluno------->
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

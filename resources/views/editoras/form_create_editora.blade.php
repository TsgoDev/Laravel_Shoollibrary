<!-----Modal create editora------->
<div id="crud-modal-create" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm"></div>
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm white:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t white:border-gray-600 border-gray-200">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 white:text-white">
                        Adicionar Editora
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
            <form class="p-4 md:p-5" action="{{ route('editoras-store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-6 grid-cols-2">
                    <!-- Nome da Editora -->
                    <div class="col-span-2">
                        <label for="nome_editora" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Nome da Editora</label>
                        <input type="text" name="nome_editora" id="nome_editora"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-600 
                            white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 
                            white:focus:border-primary-500"
                            required="" maxlength="100" placeholder="Ex: Editora A" autocomplete="nome_editora">
                    </div>

                    <!-- Cidade da Editora -->
                    <div class="col-span-2">
                        <label for="nome_cidade" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Cidade da Editora</label>
                        <input type="text" name="nome_cidade" id="nome_cidade"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-600 
                            white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 
                            white:focus:border-primary-500"
                            required="" maxlength="70" placeholder="Ex: São Paulo" autocomplete="nome_cidade">
                    </div>

                    <!-- Estado da Editora -->
                    <div class="col-span-2">
                        <label for="estado_id" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Estado da Editora</label>
                        <select id="estado_id" name="estado_id" class="bg-white text-black border
                         border-gray-300 text-sm rounded-lg block w-72 p-2.5" required>
                            <option value="">Escolha um estado</option>
                            @foreach($estados as $estado)
                            <option value="{{ $estado->id }}" {{ old('estado_id') == $estado->id ? 'selected' : '' }}>
                                {{ $estado->nome_estado }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Situacao da Editora -->
                    <div class="col-span-2">
                        <label for="status_editora" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Status</label>
                        <select id="status_editora" name="status_editora" class="bg-white text-black border
                         border-gray-300 text-sm rounded-lg block w-1/2 p-2.5" required>
                            <option value="">Escolha um opção</option>
                            <option value="1">Ativo</option>
                            <option value="0">Indisponível</option>
                        </select>
                    </div>
                </div>

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
            <!-----SweetAlert Insert editora------->
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
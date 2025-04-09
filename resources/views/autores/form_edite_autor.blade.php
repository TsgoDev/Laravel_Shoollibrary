<!-----Modal edite autor------->
<div id="crud-modal-edit" tabindex="-1" aria-hidden="true"
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
                    Editar Autor
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
            <!-- Modal body -->
            <form action="" method="POST"  class="p-4 md:p-5" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-6 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Nome do autor</label>
                        <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                        value="{{ $autor->nome_autor }}" maxlength="100" placeholder="Ex: Machado de Assis">
                    </div>

                    <!-- Select situação --->
                    <div class="col-span-2">
                        <label for="situacao" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Status</label>
                        <select id="situacao" name="situacao"
                            class="bg-white text-black border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5">
                            <option value="1" {{ $autor->status_autor == 1 ? 'selected' : '' }}>Ativo</option>
                            <option value="0" {{ $autor->status_autor == 0 ? 'selected' : '' }}>Indisponível</option>
                        </select>
                    </div>
                </div>

                <button type="submit" name="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center white:bg-blue-600 white:hover:bg-blue-700 white:focus:ring-blue-800">
                    Atualizar
                </button>
            </form>
        </div>
    </div>
</div>
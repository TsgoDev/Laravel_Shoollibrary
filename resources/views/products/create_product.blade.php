<!-----Modal create products------->
<div id="crud-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm white:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t white:border-gray-600 border-gray-200">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 white:text-white">
                        Novo Produto
                    </h3>
                    <p class="text-sm font-normal text-gray-500 white:text-gray-400">
                    Preencha os detalhes do produto abaixo
                    </p>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center white:hover:bg-gray-600 white:hover:text-white"
                    data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('products-store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Nome
                            do Produto</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Preço</label>
                        <input type="number" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500"
                            required="">
                    </div>
                    
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Categoria</label>
                        <select name="category" id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500">
                            <option selected="">Selecione Categoria</option>
                            <option value="Jantinha">Jantinha</option>
                            <option value="Espetos">Espetos</option>
                            <option value="Espetinho com mandioca">Espetinho com mandioca</option>
                            <option value="Porções">Porções</option>
                            <option value="Combo/refigerante lata">Combo/refigerante lata</option>
                            <option value="Bebidas">Bebidas</option>
                            <option value="Bebidas alcoólicas">Bebidas alcoólicas</option>
                            <option value="Porções">Porções</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Descrição</label>
                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500"
                            placeholder="Descrição do produto"></textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Foto
                        do Produto</label>
                        <input type="file" name="image" id="image"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-600 white:border-gray-500 white:placeholder-gray-400 white:text-white white:focus:ring-primary-500 white:focus:border-primary-500">
                        <p class="text-sm font-normal text-gray-500 white:text-gray-400">
                        Formato de imagem aceito: JPG, JPEG, PNG, WEBP.
                        </p>
                    </div>

                    <!-- Radio para Status Disponível (Lado a Lado) -->
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Disponível para
                            Venda?</label>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <input id="available-yes" type="radio" value="1" name="status"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    checked>
                                <label for="available-yes"
                                    class="ms-2 text-sm font-medium text-gray-900 white:text-gray-300">
                                    Sim
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="available-no" type="radio" value="0" name="status"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="available-no"
                                    class="ms-2 text-sm font-medium text-gray-900 white:text-gray-300">
                                    Não
                                </label>
                            </div>
                        </div>
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
                    Adicionar produto
                </button>
            </form>
        </div>
    </div>
</div>

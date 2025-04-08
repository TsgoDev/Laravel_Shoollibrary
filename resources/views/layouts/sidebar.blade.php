<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/sytle.css">
</head>

<body>
    <aside class="flex flex-col w-64 h-screen px-5 py-8 overflow-y-auto bg-white border-r white:bg-gray-900 white:border-gray-700">
        <a href="/dashboard" class="flex items-center gap-x-2">
            <img class="w-auto h-7" src="/img/logo-colegio.png" width="20" alt="">
            <p class="text-base font-medium">School Library</p>
        </a>

        <div class="flex flex-col justify-between flex-1 mt-6">
            <nav class="-mx-3 space-y-3">
                <!-- ícone HOME -->
                <a class="flex items-center px-3 py-2 transition hover:bg-gray-100 rounded-lg text-black" href="/dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-black">
                        <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                        <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                    </svg>
                    <span class="ml-2 text-sm font-medium">Home</span>
                </a>

                <!-- Primeiro submenu itens de cadadastros -->
                <div x-data="{ open: false }" class="space-y-1">
                    <button @click="open = !open"
                        class="flex items-center justify-between w-full px-3 py-2 text-sm font-medium text-black hover:text-black transition rounded-lg hover:bg-gray-100 white:hover:bg-gray-800">
                        <div class="flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                        </svg>
                            <span>Cadastros</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" x-collapse class="pl-6 space-y-2">
                        <a class="flex items-center px-3 py-2 dark:text-black transition-colors duration-300 transform rounded-lg dark:dark:text-black-200 
                        hover:bg-gray-100 dark:hover:dark:text-black-200 hover:dark:text-black-700" href="/emprestimos">

                            <span class="text-sm font-medium">Empréstimos</span>
                        </a>
                        <a class="flex items-center px-3 py-2 dark:text-black transition-colors duration-300 transform rounded-lg dark:dark:text-black-200 
                        hover:bg-gray-100 dark:hover:dark:text-black-200 hover:dark:text-black-700" href="#">

                            <span class="text-sm font-medium">Reservas</span>
                        </a>

                        <a class="flex items-center px-3 py-2 dark:text-black transition-colors duration-300 transform rounded-lg dark:dark:text-black-200 
                        hover:bg-gray-100 dark:hover:dark:text-black-200 hover:dark:text-black-700" href="#">

                            <span class="text-sm font-medium">Obras</span>
                        </a>

                        <a class="flex items-center px-3 py-2 dark:text-black transition-colors duration-300 transform rounded-lg dark:dark:text-black-200 
                        hover:bg-gray-100 dark:hover:dark:text-black-200 hover:dark:text-black-700" href="#">

                            <span class="text-sm font-medium">Autores</span>
                        </a>

                        <a class="flex items-center px-3 py-2 dark:text-black transition-colors duration-300 transform rounded-lg dark:dark:text-black-200 
                        hover:bg-gray-100 dark:hover:dark:text-black-200 hover:dark:text-black-700" href="#">

                            <span class="text-sm font-medium">Acervos</span>
                        </a>

                        <a class="flex items-center px-3 py-2 dark:text-black transition-colors duration-300 transform rounded-lg dark:dark:text-black-200 
                        hover:bg-gray-100 dark:hover:dark:text-black-200 hover:dark:text-black-700" href="#">

                            <span class="text-sm font-medium">Gêneros</span>
                        </a>
                        <a class="flex items-center px-3 py-2 dark:text-black transition-colors duration-300 transform rounded-lg dark:dark:text-black-200 
                        hover:bg-gray-100 dark:hover:dark:text-black-200 hover:dark:text-black-700" href="#">

                            <span class="text-sm font-medium">Alunos</span>
                        </a>
                    </div>

                </div>

                <!-- Segundo submenu itens Inativos-->
                <div x-data="{ open: false }" class="space-y-1">
                    <button @click="open = !open"
                        class="flex items-center justify-between w-full px-3 py-2 text-sm font-medium text-black hover:text-black transition rounded-lg hover:bg-gray-100 white:hover:bg-gray-800">
                        <div class="flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                        </svg>

                            <span>Itens Inativos</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                        </svg>

                    </button>

                    <div x-show="open" x-collapse class="pl-6 space-y-2">
                        <a class="flex items-center px-3 py-2 dark:text-black transition-colors duration-300 transform rounded-lg dark:dark:text-black-200 
                        hover:bg-gray-100 dark:hover:dark:text-black-200 hover:dark:text-black-700" href="#">

                            <span class="text-sm font-medium">Obras</span>
                        </a>
                        <a class="flex items-center px-3 py-2 dark:text-black transition-colors duration-300 transform rounded-lg dark:dark:text-black-200 
                        hover:bg-gray-100 dark:hover:dark:text-black-200 hover:dark:text-black-700" href="#">

                            <span class="text-sm font-medium">Autores</span>
                        </a>
                        <a class="flex items-center px-3 py-2 dark:text-black transition-colors duration-300 transform rounded-lg dark:dark:text-black-200 
                        hover:bg-gray-100 dark:hover:dark:text-black-200 hover:dark:text-black-700" href="#">

                            <span class="text-sm font-medium">Editoras</span>
                        </a>
                        <a class="flex items-center px-3 py-2 dark:text-black transition-colors duration-300 transform rounded-lg dark:dark:text-black-200 
                        hover:bg-gray-100 dark:hover:dark:text-black-200 hover:dark:text-black-700" href="#">

                            <span class="text-sm font-medium">Acervos</span>
                        </a>
                        <a class="flex items-center px-3 py-2 dark:text-black transition-colors duration-300 transform rounded-lg dark:dark:text-black-200 
                        hover:bg-gray-100 dark:hover:dark:text-black-200 hover:dark:text-black-700" href="#">

                            <span class="text-sm font-medium">Alunos</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </aside>
</body>
</html>
// Funções para controlar os modais de busca
function abrirModalBusca(tipo) {
    // Esta função é chamada quando o botão de busca é clicado.
    // A exibição do modal é controlada pelo atributo `data-modal-toggle` do HTML (Flowbite).
    // O papel desta função é carregar os dados dinamicamente, se necessário.

    const listaId = tipo === 'autor' ? 'lista-autores' : `lista-${tipo}s`;
    const listaElement = document.getElementById(listaId);

    if (!listaElement) {
        // Se o elemento da lista não for encontrado no DOM, não faz nada.
        return;
    }

    // Carrega os dados apenas se a lista estiver vazia ou se um erro foi exibido anteriormente.
    if (listaElement.children.length === 0 || listaElement.querySelector('.text-red-500')) {
        carregarDados(tipo);
    }
}

function fecharModalBusca(tipo) {
    const modalId = `modal-busca-${tipo}`;
    const closeButton = document.querySelector(`[data-modal-hide="${modalId}"]`);
    if (closeButton) {
        closeButton.click();
    }
}

async function carregarDados(tipo) {
    const listaId = tipo === 'autor' ? 'lista-autores' : `lista-${tipo}s`;
    const listaElement = document.getElementById(listaId);
    listaElement.innerHTML = '<p class="text-center text-gray-500">Carregando...</p>';

    // URLs para buscar os dados
    const urls = {
        'editora': '/buscar-editoras',
        'acervo': '/buscar-acervos',
        'genero': '/buscar-generos',
        'autor': '/buscar-autores'
    };

    try {
        const response = await fetch(urls[tipo]);
        const dados = await response.json();

        let html = '';

        if (dados.length > 0) {
            dados.forEach(item => {
                let nome;
                switch (tipo) {
                    case 'editora':
                        nome = item.nome_editora;
                        break;
                    case 'acervo':
                        nome = item.nome_acervo;
                        break;
                    case 'genero':
                        nome = item.nome_genero;
                        break;
                    case 'autor':
                        nome = item.nome_autor;
                        break;
                }

                html += `
                    <div class="p-3 border-b border-gray-200 hover:bg-gray-50 cursor-pointer"
                         data-tipo="${tipo}" data-id="${item.id}" data-nome="${nome.replace(/"/g, '&quot;')}">
                        <div class="font-medium text-gray-900">${nome}</div>
                    </div>
                `;
            });
        } else {
            html = '<p class="text-center text-gray-500">Nenhum dado encontrado.</p>';
        }

        listaElement.innerHTML = html;
    } catch (error) {
        listaElement.innerHTML = '<p class="text-center text-red-500">Erro ao carregar dados.</p>';
        console.error('Erro ao buscar dados:', error);
    }
}

function selecionarItem(tipo, id, nome) {
    // Caso especial para autor, que usa Tagify
    if (tipo === 'autor') {
        // Verifica qual modal está ativo para chamar a função correta
        if (document.getElementById('crud-modal-create') && !document.getElementById('crud-modal-create').classList.contains('hidden')) {
            if (window.adicionarAutorCreate) {
                window.adicionarAutorCreate(id, nome);
            }
        } else if (document.getElementById('crud-modal-edit') && !document.getElementById('crud-modal-edit').classList.contains('hidden')) {
            if (window.adicionarAutorEdit) {
                window.adicionarAutorEdit(id, nome);
            }
        }
        return; // Retorna para não executar o código abaixo para autores
    }

    // Identifica se estamos no modal de criação ou edição
    const isCreateMode = document.getElementById('crud-modal-create') && !document.getElementById('crud-modal-create').classList.contains('hidden');

    // Define os IDs dos campos com base no modo (criação ou edição)
    const nameInputId = isCreateMode ? tipo : `edit_${tipo}_nome`;
    const idInputId = isCreateMode ? `${tipo}_id` : `edit_${tipo}_id`;

    const nameInput = document.getElementById(nameInputId);
    const idInput = document.getElementById(idInputId);

    if (nameInput) {
        nameInput.value = nome;
    }
    if (idInput) {
        idInput.value = id;
    }

    fecharModalBusca(tipo);
}

// Adicionar funcionalidade de busca em tempo real
document.addEventListener('DOMContentLoaded', function () {
    const setupModalTrigger = (selector, type) => {
        document.querySelectorAll(selector).forEach(button => {
            button.addEventListener('click', () => abrirModalBusca(type));
        });
    };

    // Adiciona os event listeners para os botões de busca em ambos os formulários
    setupModalTrigger('[data-modal-toggle="modal-busca-editora"]', 'editora');
    setupModalTrigger('[data-modal-toggle="modal-busca-acervo"]', 'acervo');
    setupModalTrigger('[data-modal-toggle="modal-busca-genero"]', 'genero');
    setupModalTrigger('[data-modal-toggle="modal-busca-autor"]', 'autor');

    const tipos = ['editora', 'acervo', 'genero', 'autor'];

    tipos.forEach(tipo => {
        const inputBusca = document.getElementById(`busca-${tipo}`);
        const listaId = tipo === 'autor' ? 'lista-autores' : `lista-${tipo}s`;
        const listaElement = document.getElementById(listaId);

        if (inputBusca) {
            inputBusca.addEventListener('input', function () {
                const termo = this.value.toLowerCase();
                const itens = document.querySelectorAll(`#${listaId} > div`);

                itens.forEach(item => {
                    const texto = item.textContent.toLowerCase();
                    if (texto.includes(termo)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        }

        if (listaElement) {
            listaElement.addEventListener('click', function (event) {
                const targetItem = event.target.closest('[data-nome]');
                if (targetItem) {
                    const itemType = targetItem.dataset.tipo;
                    const itemName = targetItem.dataset.nome;
                    const itemId = targetItem.dataset.id; // Captura o ID do item

                    selecionarItem(itemType, itemId, itemName); // Passa o ID e o nome
                }
            });
        }
    });
});

 // Funções para controlar os modais de busca
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
                         data-tipo="${tipo}" data-nome="${nome.replace(/"/g, '&quot;')}">
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

function selecionarItem(tipo, nome) {
    document.getElementById(tipo).value = nome;
    fecharModalBusca(tipo);
}

// Adicionar funcionalidade de busca em tempo real
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('[data-modal-toggle="modal-busca-editora"]').addEventListener('click',
        function() {
            carregarDados('editora');
        });

    document.querySelector('[data-modal-toggle="modal-busca-acervo"]').addEventListener('click',
        function() {
            carregarDados('acervo');
        });

    document.querySelector('[data-modal-toggle="modal-busca-genero"]').addEventListener('click',
        function() {
            carregarDados('genero');
        });

    document.querySelector('[data-modal-toggle="modal-busca-autor"]').addEventListener('click', function() {
        carregarDados('autor');
    });

    const tipos = ['editora', 'acervo', 'genero', 'autor'];

    tipos.forEach(tipo => {
        const inputBusca = document.getElementById(`busca-${tipo}`);
        const listaId = tipo === 'autor' ? 'lista-autores' : `lista-${tipo}s`;
        const listaElement = document.getElementById(listaId);

        if (inputBusca) {
            inputBusca.addEventListener('input', function() {
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
            listaElement.addEventListener('click', function(event) {
                const targetItem = event.target.closest('[data-nome]');
                if (targetItem) {
                    const itemType = targetItem.dataset.tipo;
                    const itemName = targetItem.dataset.nome;
                    selecionarItem(itemType, itemName);
                }
            });
        }
    });
});
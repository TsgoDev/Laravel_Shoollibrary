// Funções para controlar os modais de busca
function abrirModalBusca(tipo) {
    document.getElementById(`modal-busca-${tipo}`).classList.remove('hidden');
    carregarDados(tipo);
}

function fecharModalBusca(tipo) {
    document.getElementById(`modal-busca-${tipo}`).classList.add('hidden');
}

function carregarDados(tipo) {
    const listaElement = document.getElementById(`lista-${tipo}s`);

    // URLs para buscar os dados
    const urls = {
        'editora': '/editoras',
        'acervo': '/acervos',
        'genero': '/generos'
    };

    // Por enquanto, vamos simular os dados
    // Em uma implementação real, você faria uma requisição AJAX
    const dadosSimulados = {
        'editora': [
            { id: 1, nome: 'Editora Record' },
            { id: 2, nome: 'Companhia das Letras' },
            { id: 3, nome: 'Editora Globo' },
            { id: 4, nome: 'Editora Nova Fronteira' },
            { id: 5, nome: 'Editora Rocco' }
        ],
        'acervo': [
            { id: 1, nome: 'Literatura Brasileira' },
            { id: 2, nome: 'Literatura Estrangeira' },
            { id: 3, nome: 'Ciências' },
            { id: 4, nome: 'História' },
            { id: 5, nome: 'Filosofia' }
        ],
        'genero': [
            { id: 1, nome: 'Romance' },
            { id: 2, nome: 'Ficção Científica' },
            { id: 3, nome: 'Biografia' },
            { id: 4, nome: 'Poesia' },
            { id: 5, nome: 'Drama' }
        ]
    };

    const dados = dadosSimulados[tipo];
    let html = '';

    dados.forEach(item => {
        html += `
            <div class="p-3 border-b border-gray-200 hover:bg-gray-50 cursor-pointer"
                 onclick="selecionarItem('${tipo}', '${item.nome}')">
                <div class="font-medium text-gray-900">${item.nome}</div>
            </div>
        `;
    });

    listaElement.innerHTML = html;
}

function selecionarItem(tipo, nome) {
    document.getElementById(tipo).value = nome;
    fecharModalBusca(tipo);
}

// Adicionar funcionalidade de busca em tempo real
document.addEventListener('DOMContentLoaded', function() {
    const tipos = ['editora', 'acervo', 'genero'];

    tipos.forEach(tipo => {
        const inputBusca = document.getElementById(`busca-${tipo}`);
        if (inputBusca) {
            inputBusca.addEventListener('input', function() {
                const termo = this.value.toLowerCase();
                const itens = document.querySelectorAll(`#lista-${tipo}s > div`);

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
    });
});
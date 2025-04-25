document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-editar-autor').forEach(button => {
        button.addEventListener('click', async function() {
            const autorId = this.dataset.id;

            try {
                const response = await fetch(`/autores/${autorId}/json`);
                const autor = await response.json();

                // Preenche os campos do modal corretamente
                const modal = document.querySelector('#form-editar-autor');
                modal.querySelector('#name').value = autor.nome_autor;
                modal.querySelector('#autor_id').value = autor.id;
                modal.querySelector('#situacao').value = autor.status_autor;
                modal.action = `/autores/${autor.id}`;

                // Atualiza a action do formulário
                document.getElementById('form-editar-autor').action = `/autores/${autor.id}`;
            } catch (error) {
                console.error('Erro ao buscar dados do autor:', error);
                alert('Erro ao carregar dados do autor.');
            }
        });
    });
});
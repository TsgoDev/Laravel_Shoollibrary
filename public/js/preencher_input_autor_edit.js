document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-editar-autor').forEach(button => {
        button.addEventListener('click', function() {
            const autorId = this.dataset.id;
            const nomeAutor = this.dataset.nome;
            const statusAutor = this.dataset.status;

            // Preenche os campos do modal diretamente com os dados
            const modal = document.querySelector('#form-editar-autor');
            modal.querySelector('#name').value = nomeAutor;
            modal.querySelector('#autor_id').value = autorId;
            modal.querySelector('#situacao').value = statusAutor;
            modal.action = `/autores/${autorId}`;

            // Exibe o modal com os dados preenchidos
            const modalElement = document.querySelector('#crud-modal-edit');
            if (modalElement) {
                const modalInstance = window.flowbite.Modal.getInstance(modalElement);
                if (modalInstance) {
                    modalInstance.show();
                }
            }
        });
    });
});

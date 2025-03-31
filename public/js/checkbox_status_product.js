// Checkbox atualiza status do produtos página index
document.addEventListener('DOMContentLoaded', function() {
    // Selecionando todos os checkboxes de status
    const statusCheckboxes = document.querySelectorAll('input[type="checkbox"]');

    statusCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const productId = this.getAttribute('data-id');
            const status = this.checked ? 1 : 0;

            // Enviando a requisição AJAX para atualizar o status
            fetch(`/products/update-status/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector(
                            'meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        status: status
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Atualização visual imediata do checkbox
                        if (status === 1) {
                            checkbox.checked =
                            true; // Marca o checkbox se a atualização for bem-sucedida
                        } else {
                            checkbox.checked =
                            false; // Desmarca o checkbox se a atualização for bem-sucedida
                        }

                        // Atualização do status na tabela
                        const statusCell = document.querySelector(
                            `td[data-status-id="${productId}"]`);
                        if (statusCell) {
                            const statusSpan = statusCell.querySelector(
                                'span:nth-child(2)');
                            const statusDiv = statusCell.querySelector('div');
                            const statusDot = statusCell.querySelector(
                                'span:nth-child(1)');

                            if (status === 1) {
                                statusDiv.classList.remove('bg-red-100/60',
                                    'white:bg-gray-800');
                                statusDiv.classList.add('bg-emerald-100/60',
                                    'white:bg-gray-600');
                                statusDot.classList.remove('bg-red-600');
                                statusDot.classList.add('bg-emerald-600');
                                statusSpan.classList.remove('text-red-600',
                                    'white:text-red-300');
                                statusSpan.classList.add('text-emerald-600',
                                    'white:text-emerald-600');
                                statusSpan.textContent = 'Disponível';
                            } else {
                                statusDiv.classList.remove('bg-emerald-100/60',
                                    'white:bg-gray-600');
                                statusDiv.classList.add('bg-red-100/60',
                                    'white:bg-gray-800');
                                statusDot.classList.remove('bg-emerald-600');
                                statusDot.classList.add('bg-red-600');
                                statusSpan.classList.remove('text-emerald-600',
                                    'white:text-emerald-600');
                                statusSpan.classList.add('text-red-600',
                                    'white:text-red-300');
                                statusSpan.textContent = 'Indisponível';
                            }
                        }

                        console.log('Status atualizado com sucesso!');
                    } else {
                        console.error('Falha ao atualizar status.');
                        // Reverte a mudança no checkbox em caso de erro
                        checkbox.checked = !checkbox.checked;
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    // Reverte a mudança no checkbox em caso de erro
                    checkbox.checked = !checkbox.checked;
                });
        });
    });
});
function confirmarExclusao(event, jogoId){
    event.preventDefault();

    Swal.fire({
        icon: 'question',
        title: 'Tem certeza?',
        text: 'Você não poderá reverter isso!',
        showCancelButton: true,
        cancelButtonColor: '#0d6efd',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Sim, excluir!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário clicou em "Sim, excluir!", envie o formulário de exclusão
            document.getElementById('formExcluir' + jogoId).submit();
        }
    });
}

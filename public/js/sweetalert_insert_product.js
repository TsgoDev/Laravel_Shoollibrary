// Estrutura Sweetalert cadastrar produto página index
swal({
    title: "Mensagem",
    text: "{{ Session::get('message') }}",
    icon: "success",
    buttons: {
        confirm: {
            text: "OK",
            value: true,
            visible: true,
            className: "btn btn-success",
            closeModal: true
        }
    }
});
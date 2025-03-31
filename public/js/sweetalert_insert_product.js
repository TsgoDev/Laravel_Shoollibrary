@if(Session::has('message'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                title: "Sucesso!",
                text: {!! json_encode(Session::get('message')) !!}, 
                icon: "success",
                confirmButtonText: "Fechar",
                width: 'auto', // Ajusta a largura automaticamente para melhor centralização
                buttonsStyling: false, // Remove o estilo padrão para personalizar melhor
                confirmButtonColor: '#8b5cf6' // Define a cor do botão para ficar semelhante ao print
            });
        });
    </script>
@endif

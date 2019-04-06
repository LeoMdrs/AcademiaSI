$('#delete-modal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var matricula = button.data('matricula');
	var modal = $(this);
	modal.find('.modal-title').text('Excluir usuário #' + matricula);
	modal.find('#confirm').attr('href', 'removerUsuario?matricula=' + matricula + '&tipo=' + "<?php echo (isset($_GET['tipo']) ? $_GET['tipo'] : ""); ?>" );
})
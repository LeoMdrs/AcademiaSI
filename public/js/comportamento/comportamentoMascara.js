$(document).ready(function () {
	$("#sidebar").mCustomScrollbar({
		theme: "minimal"
	});

	$('#sidebarCollapse').on('click', function () {
		$('#sidebar, #content').toggleClass('active');
		$('.collapse.in').toggleClass('in');
		$('a[aria-expanded=true]').attr('aria-expanded', 'false');
	});
	
	$('#cpf').mask('000.000.000-00');
	$('#telefone').mask('(000)00000-0000');
	$('#nascimento').mask('0000-00-00');
	$('#cep').mask('00000-000');

})
$(function(){
	$('.js-print').click(function(){
		$('a').attr('href', '');
		window.print();
	});
});
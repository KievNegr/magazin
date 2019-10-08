$(document).ready(function()
{
	$('#product-more li').click(function()
	{
		showClass = $(this).attr('id');

		$('#product-more li').css({'border-color': '', 'background': ''});
		$(this).css({'border-color': 'rgb(100, 100, 100)', 'background': '#F7F7F7'});
		$('.sub-product-more').css('display', 'none');

		$('.' + showClass).show();
	});
});
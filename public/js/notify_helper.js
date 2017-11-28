/* 
	I did this for D.R.Y
*/

function notification(message,type,placement_from,placement_align) 
{
	$.notify({
		message: message
	},{
		type: type,
		allow_dismiss: true,
		placement: {
			from: placement_from, // top or bottom
			align: placement_align //left or right
		},
		delay: 4000,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		}
	})
}

function alert_error_message(classOrIdName,message) 
{
	$('html, body').animate({
   		scrollTop: 0  }, "slow");
	$(classOrIdName).html('<div class="alert alert-danger" role="alert">'  + message +
		'</div>');
}

function scrollTop() 
{
	$('html, body').animate({
   		scrollTop: 0  }, "slow");
}

function addClassIsInvalid(classOrIdName)
{
	$(classOrIdName).addClass('is-invalid');
}

function removeClassIsInvalid(classOrIdName)
{
	$(classOrIdName).removeClass('is-invalid');
}

function addClassIsValid(classOrIdName)
{
	$(classOrIdName).addClass('is-valid');
}

function removeClassIsValid(classOrIdName)
{
	$(classOrIdName).removeClass('is-valid');
}


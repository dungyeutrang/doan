var token = $('input[name="_token"]').val();
var checkSendAjax = false;
$(function() {
	$('#student_id').select2();
	$('#priod_id').select2();		
	$('#student_id').change(function() {
		value = $(this).val();
		sendAjax(value);
	});
	value =$('#student_id').val();
	sendAjax(value);
});

function sendAjax(value) {
	if (!checkSendAjax) {
		checkSendAjax = true;
		$.ajax({
			url : urlProfile,
			type : "POST",
			data : {
				_token : token,
				index : value
			},
			complete : function() {
				checkSendAjax = false;
			},
			success : function(data) {
				$('#modal-profile').find('.modal-body').empty();
				$('#modal-profile').find('.modal-body').append(data);
			},
			error : function(data) {
				alert('Cannot connect to sever. Please try again !');
			}
		});

	}// end check send ajax
}

/**
 * show profile popup
 */
function showProfile() {
	$('#modal-profile').modal('show');

}
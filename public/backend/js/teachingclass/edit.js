var token = $('input[name="_token"]').val();
var checkSendAjax = false;
$(function() {
	$('#teacher_leaning_subjects_id').select2();
	$('#class_id').select2();		
	$('#teacher_leaning_subjects_id').change(function() {
		value = $('#teacher_leaning_subjects_id option:selected').attr('teacherid');
		sendAjax(value);
	});
	value =$('#teacher_leaning_subjects_id option:selected').attr('teacherid');
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
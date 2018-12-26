function changePass()
{
	var oldPass = $('#old_pass').val();
	var newPass = $('#new_pass').val();
	var reNewPass = $('#re_new_pass').val();
	if(oldPass==''||newPass==''||reNewPass=='')
	{
		$('#formChangePass .alert').removeClass('hidden');
		$('#formChangePass .alert').html('Vui lòng điền đầy đủ thông tin bên trên');
	}else{
		$.ajax({
			url:'change-pass.php',
			type: 'POST',
			data: {
				old_pass : oldPass,
				new_pass : newPass,
				re_new_pass : reNewPass
			},success: function(data){
				$('#formChangePass .alert').removeClass('hidden');
				$('#formChangePass').html(data);

			}
		});
	}
}
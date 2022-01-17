$(document).ready(function(){
    $('#register').on('click',function(){
   
	var register=$('#register').val()
	var name=$('#name').val()
	var city=$('#city').val()
	var country=$('#country').val()
	var country_code=$('#country option:selected').text()
	var email=$('#email').val()
	var password=$('#password').val()
	var confirm_password=$('#cpass').val()

	console.log(country_code)
	$.ajax({
		type: "POST",
		url: "checkregister.php",
		data: {name, country, country_code, city, email, password, confirm_password, register},
		success: function (rezult) {
			if(rezult==1){
				$('#ard').html("Please check your inputs!")

			}else if(rezult==2){
				$('#ard').html("Password dont matched!")
			}else if(rezult==3){
				$('#ard').html("Email already exists in the database!!")

			}else if(rezult==5){
				$('#ard').html("You should enter more then 6 letter")
			}
			else if(rezult==4){
				$('#ard').html("If you dont get email please try again. ")
				$('#myModal').modal('show')

			}
		},
	});
	
	
    })
})

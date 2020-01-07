$(document).ready(function()
	{    
		$('#signup').click(function()
		{
		        $("#signup").css("display","none");
		        $("#signup_form").css("display","block");
		        $("#signup_div").removeClass("rond_blanc");
		        $("#signup_div").addClass("boudin_blanc");
		});

		$('#close_signup').click(function()
		{
		        $("#signup").css("display","block");
		        $("#signup_form").css("display","none");
		        $("#signup_div").removeClass("boudin_blanc");
		        $("#signup_div").addClass("rond_blanc");
		});

		$('#signin').click(function()
		{
		        $("#signin").css("display","none");
		        $("#signin_form").css("display","block");
		        $("#signin_div").removeClass("rond_blanc");
		        $("#signin_div").addClass("boudin_blanc");
		});

		$('#close_signin').click(function()
		{
		        $("#signin").css("display","block");
		        $("#signin_form").css("display","none");
		        $("#signin_div").removeClass("boudin_blanc");
		        $("#signin_div").addClass("rond_blanc");
		});

		$('#basket_icon').click(function()
		{
			var display = $("#basket_div").css("display")

			if(display == "none")
			{
				$("#basket_div").css("display","block");
			}
			else
			{
				$("#basket_div").css("display","none");
			}
		});

		$('#users_btn').click(function()
		{
			var display = $("#users_div").css("display")

			if(display == "none")
			{
				$("#users_div").css("display","block");
			}
			else
			{
				$("#users_div").css("display","none");
			}
		});

		$('#products_btn').click(function()
		{
			var display = $("#products_div").css("display")

			if(display == "none")
			{
				$("#products_div").css("display","block");
			}
			else
			{
				$("#products_div").css("display","none");
			}
		});

		$('#categ_btn').click(function()
		{
			var display = $("#categ_div").css("display")

			if(display == "none")
			{
				$("#categ_div").css("display","block");
			}
			else
			{
				$("#categ_div").css("display","none");
			}
		});

		$('#rank_btn').click(function()
		{
			var display = $("#rank_div").css("display")

			if(display == "none")
			{
				$("#rank_div").css("display","block");
			}
			else
			{
				$("#rank_div").css("display","none");
			}
		});

		$('#orders_btn').click(function()
		{
			var display = $("#orders_div").css("display")

			if(display == "none")
			{
				$("#orders_div").css("display","block");
			}
			else
			{
				$("#orders_div").css("display","none");
			}
		});

		$('#discount_btn').click(function()
		{
			var display = $("#discount_div").css("display")

			if(display == "none")
			{
				$("#discount_div").css("display","block");
			}
			else
			{
				$("#discount_div").css("display","none");
			}
		});

		$('#info_profile_btn').click(function()
		{
			var display = $("#info_profile_div").css("display")

			if(display == "none")
			{
				$("#info_profile_div").css("display","block");
			}
			else
			{
				$("#info_profile_div").css("display","none");
			}
		});

		$('#adress_profile_btn').click(function()
		{
			var display = $("#adress_profile_div").css("display")

			if(display == "none")
			{
				$("#adress_profile_div").css("display","block");
			}
			else
			{
				$("#adress_profile_div").css("display","none");
			}
		});

		$('#orders_profile_btn').click(function()
		{
			var display = $("#orders_profile_div").css("display")

			if(display == "none")
			{
				$("#orders_profile_div").css("display","block");
			}
			else
			{
				$("#orders_profile_div").css("display","none");
			}
		});

		$('#phone_btn').click(function()
		{		
			if($('#phone_div').css('display') == 'block')
			{
				$('#phone_div').toggle('',function()
				{
					$('#phone_field').toggle('');
				});
			}
			else{
				$('#phone_field').toggle('',function()
				{
					$('#phone_div').toggle('');
				});
			}		
		});

		// // form validation : sign up
		// $('#user_firstname').keyup(function()
		// {
		// 	var get = document.location.pathname.split('/');
		// 	var url = document.location.protocol + '//' + document.location.host + '/' + get[1] + '/' + get[2] + '/';

		// 	$.ajax({
		// 		method: "POST",
		// 		url: url + 'Brain/signup/user_firstname',
		// 		data: {user_firstname: $(this).val()}
		// 		})
		// 		.done(function(data) {
					
		// 			$('#user_firstname_span').html(data);
		// 	});
		// });

		$('#passwordConfirm').keyup(function()
		{
			var pwd = $('#password').val();
			var pwdC = $(this).val();

			if(pwdC != "")
			{
				if(pwd != pwdC)
				{
					$('#passwordConfirm_span').html('Différent du premier mot de passe');
				}
				else
				{
					$('#passwordConfirm_span').html('');
				}	
			}
			else
			{
				$('#passwordConfirm_span').html('Confirmation du mot de passe manquante');
			}
		});

		$('.form_signup').keyup(function()
		{
			var field = $(this).attr('name');
			var get = document.location.pathname.split('/');
			var url = document.location.protocol + '//' + document.location.host + '/' + get[1] + '/' + get[2] + '/';

			$.ajax({
				method: "POST",
				url: url + 'Brain/signup',
				data: {input_name: field, input_value: $(this).val()}
			})
				.done(function(data)
				{
					$('#'+ field + '_span').html(data);
				});
		});

		$('.basketAdd').click(function()
		{
			console.log($(this).val());
			var get = document.location.pathname.split('/');
			var url = document.location.protocol + '//' + document.location.host + '/' + get[1] + '/' + get[2] + '/';

			$.ajax({
				method: "POST",
				url: url + 'Brain/addToBasket',
				data: {addToBasket: $(this).val()}
			})
				.done(function()
				{
					//comment refresh le panier en ajax, donc refresh l'affichage html avec l'appel en php du contenu de SESSION basket ? refresh seulement 1 div

					$('#basket_div').load(location.href+'#basket_div>*','');


					// $('#basket_div').load('../../application/views/basket.php');
					$("#basket_div").css("display","block");
				});
		});
	});
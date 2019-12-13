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
    });
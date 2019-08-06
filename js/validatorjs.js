$(document).ready(function ()
{
   var username = $('#username').val();
   var password = $('#password').val();
   var confirmPassword = $('#confirm_password').val();
   var email = $('#email').val();

   $('#confirm_password').focus(function()
   {
      if (confirmPassword !== password)
      {
         $('#confirm-password-error-span').val("Passwords do not match");
      }
   });
   $('#password').focus(function()
   {
      if (password.length < 8 )
      {
         $('#password-error-span').val("Password needs to be 8 character or more");
      }
   });

});
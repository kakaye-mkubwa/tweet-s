$(document).ready(function()
{
   var username = $('#login_username').val();
   var password = $('#login_password').val();

   $('#login_username').focus(function()
   {
        if (username === '')
        {
            $('#username-error').val("Username is required");
        }
   });
});
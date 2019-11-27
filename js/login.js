
$(function()
{
   $("#login_submit").bind('click',function()
    {
        let username = $("#uname").val(); // get input from field
        let pass = $("#pass").val();
        console.log(username+":"+pass);
        $.ajax(
            {
                type:"POST",
                url:"../php/scripts/login.php",
                data:({
                    uname:username,
                    pass:pass                    
                }),
                cache:false,
                dataType:"text",
                success:function(data)
                {
                    if(data==="success")
                    {
                        window.location = "dashboard.html";
                    }else if(data==="failed")
                    {
                        $("#message").append("<p class='message_error'>Wrong e-mail or password!<br>Try again</p>");
                    }else
                    {
                        console.log("nope, nothing at all");
                    }
               }
           });
    });

    $("#register_submit").bind('click',function()
    {
        let username = $("#uname").val(); // get input from field
        let pass = $("#pass").val();
        
        $.ajax(
            {
                type:"POST",
                url:"../php/scripts/register.php",
                data:({
                    uname:username,
                    pass:pass
                }),
                cache:false,
                dataType:"text",
                success:function(data)
                {
                    if(data==="success")
                    {
                        $("#message").append("<p class='message'>Successfully registered!<br>Login using your credentials</p>")
                    }else if(data==="failed")
                    {
                        $("#message").append("<p class='message_error'>User already exists</p>");
                    }else
                    {
                        console.log("nope, nothing at all");
                    }
                }
            });
    });
});
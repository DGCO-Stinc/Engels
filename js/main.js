/**
 * @author G0x209C
 * @comment This file is meant to contain the ajax calls, perhaps I could call it AJAX.js.. but too lazy.
 * */

$(function()
    {
        $("#input_submit").bind('click',function()
        {
            let name = $("#input_name").val();
            let amnt = $("#input_amount").val();
            let type = $("#input_type").val();
            let sprd = $("#input_spread").val();

            let canContinue = true;

            if(!name.length > 0 || !amnt.length > 0 || !type.length > 0)
            {
                canContinue = false;
            }



            if(type==="expence")
            {
                type = 1;
            }else if(type==="income")
            {
                type = 0;
            }else {
                canContinue = false;
            }

            switch(sprd)
            {
                case "spread_single":
                    break;
                case "spread_daily":
                    break;
                case "spread_weekly":
                    break;
                case "spread_monthly":
                    break;
                case "spread_yearly":
                    break;
                default:
                    canContinue = false;
                    console.log("whoa, something terribly weird is going on with your input");

            }

            if(canContinue === true){
            $.ajax(
                {
                    type: "POST",
                    url: "../php/scripts/register_item.php",
                    data: ({
                        type: type,
                        name: name,
                        amnt: amnt,
                        sprd: sprd
                    }),
                    cache: false,
                    dataType: "text",
                    success: function (data) {
                        console.log("This still needs to do something");
                        // if (data === "success") {
                        //     window.location = "dashboard.html";
                        // } else if (data === "failed") {
                        //     $("#message").append("<p class='message_error'>Wrong e-mail or password!<br>Try again</p>");
                        // } else {
                        //     console.log("nope, nothing at all");
                        // }
                    }
                });
            }
        });
    });
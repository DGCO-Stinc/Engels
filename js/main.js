/**
 * @author G0x209C
 * @comment This file is meant to contain the ajax calls, perhaps I could call it AJAX.js.. but too lazy.
 * */

let getItems = function()
{
    $.ajax(
        {
            type: "POST",
            url:'../php/scripts/get_items.php',
            data: ({}),
            cache: true,
            dataType: "text",
            success: function(data)
            {
                if(data==="no-items")
                {
                    console.log("No-Items");
                }else
                {
                    let json = JSON.parse(data);

                    for(id in json)
                    {
                        console.log("id:"+id+";stored:"+json[id]);
                    }
                }

            }
        });
};

$(function()
    {

        $("#input_submit").bind('click',function()
        {
            let name = $("#input_name").val();
            let amnt = $("#input_amount").val();
            let type = $("#input_type").val();
            let sprd = $("#input_spread").val();

            //console.log("Name:"+name+";amnt:"+amnt+";type:"+type+";sprd:"+sprd);

            let canContinue = true;

            if(!name.length > 0 || !amnt.length > 0 || !type.length > 0)
            {
                canContinue = false;
            }

            if(type=="expence")
            {
                type = 1;
            }else if(type=="income")
            {
                type = 0;
            }else {
                canContinue = false;
            }

            switch(sprd)
            {
                case "spread_single":
                    sprd = 0;
                    break;
                case "spread_daily":
                    sprd = 1;
                    break;
                case "spread_weekly":
                    sprd = 2;
                    break;
                case "spread_monthly":
                    sprd = 3;
                    break;
                case "spread_yearly":
                    sprd = 4;
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
                        //console.log(data);
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

        $("#test_button").bind('click',function()
        {
            $.ajax(
                {
                    type: "POST",
                    url:'../php/scripts/get_items.php',
                    data: ({}),
                    cache: true,
                    dataType: "text",
                    complete:getItems,
                    success: function(data)
                    {

                    }
                });
        })


    });
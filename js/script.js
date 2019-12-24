function hidetext1() {
    let x = document.getElementById("main1");
    let y = document.getElementById("nav1");
    if(!x.classList.contains("active"))
    {
        let currActive = document.getElementsByClassName("hidden active");
        currActive[0].classList.remove("active");
        x.classList.add("active");
    }

    if(!y.classList.contains("actief")) {
        let currActief = document.getElementsByClassName("nav actief");
        currActief[0].classList.remove("actief");
        y.classList.add("actief");
    }

}

function hidetext2() {
    let x = document.getElementById("main2");
    let y = document.getElementById("nav2");
    if(!x.classList.contains("active"))
    {
        let currActive = document.getElementsByClassName("hidden active");
        currActive[0].classList.remove("active");
        x.classList.add("active");
    }

    if(!y.classList.contains("actief")) {
        let currActief = document.getElementsByClassName("nav actief");
        currActief[0].classList.remove("actief");
        y.classList.add("actief");
    }
}

function hidetext3() {
    let x = document.getElementById("main3");
    let y = document.getElementById("nav3");
    if(!x.classList.contains("active"))
    {
        let currActive = document.getElementsByClassName("active");
        currActive[0].classList.remove("active");
        x.classList.add("active");
    }

    if(!y.classList.contains("actief")) {
        let currActief = document.getElementsByClassName("nav actief");
        currActief[0].classList.remove("actief");
        y.classList.add("actief");
    }
}

function hidetext4() {
    let x = document.getElementById("main4");
    let y = document.getElementById("nav4");
    if(!x.classList.contains("active"))
    {
        let currActive = document.getElementsByClassName("active");
        currActive[0].classList.remove("active");
        x.classList.add("active");
    }


    if(!y.classList.contains("actief")) {
        let currActief = document.getElementsByClassName("nav actief");
        currActief[0].classList.remove("actief");
        y.classList.add("actief");
    }
}

function clearInput() {
    document.getElementById('input_name').value = '';
    document.getElementById('input_amount').value = null;
}

function hideAdd() {
    let x = document.getElementsByClassName("form");
    let y = document.getElementsByClassName("content2");
    let z = document.getElementById("btn");
    if(!x[0].classList.contains("visi")) {        
        y[0].style.width = "20%";
        y[0].style.left = "80%";
        setTimeout(function() {
            x[0].classList.add("visi");
        }, 300);
        z.style.transform = "rotate(180deg)";
    } else {
        y[0].style.width = "5%";
        y[0].style.left = "95%";
        x[0].classList.remove("visi");
        z.style.transform = "rotate(0deg)";
    }
}

function submitData() {
    //Get Input Values
    let name = document.getElementById("name");
    let amount = document.getElementById("amount");
    let type = document.getElementById("type");
}


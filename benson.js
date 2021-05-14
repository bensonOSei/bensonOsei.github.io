function openNav() {
    document.getElementById("sideNav").style.width = "250px";
    document.getElementById("bars").style.display = "none";
}

function closeNav() {
    document.getElementById("sideNav").style.width = "0";
    document.getElementById("bars").style.display = "block";

}

window.onscroll = function () {scrollFunc()};

function scrollFunc() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
        //document.getElementById("cont").innerHTML="Lets Begin";
        document.getElementById("cont").style.display="none";
       
    } else {
        //document.getElementById("cont").innerHTML="Scroll Down To Begin";
        document.getElementById("cont").style.display="block";
    }

    if (document.body.scrollTop > 110 || document.documentElement.scrollTop > 110){
        //document.getElementById("cont").innerHTML="Lets Begin";
        document.getElementById("choice").style.display="grid";
       
    } else {
        //document.getElementById("cont").innerHTML="Scroll Down To Begin";
        document.getElementById("choice").style.display="none";
    }

}

function cppForm(){
    document.getElementById("cpp").style.display = "block";
    document.getElementById("head").style.display = "block";
    document.getElementById("head2").style.display = "block";
    document.getElementById("back").style.display = "block";

    document.getElementById("choice").style.display = "none";
}

function webDev(){
    document.getElementById("web").style.display = "block";
    document.getElementById("head").style.display = "block";
    document.getElementById("head2").style.display = "block";
    document.getElementById("back").style.display = "block";
    document.getElementById("choice").style.display = "none";
}

function backToLearn(){
    document.getElementById("web").style.display = "none";
    document.getElementById("cpp").style.display = "none";
    document.getElementById("head").style.display = "none";
    document.getElementById("head2").style.display = "none";
    document.getElementById("back").style.display = "none";
    document.getElementById("choice").style.display = "grid";

}

function formValidate() {
    var fname = document.forms["myForm"]["fname"].value;
    var lname = document.forms["myForm"]["lname"].value;
    var email = document.forms["myForm"]["email"].value;
    var pnumber = document.forms["myForm"]["pnumber"].value;
    var message = document.forms["myForm"]["message"].value
    var city = document.forms["myForm"]["city"].value;
    var validPhone = /^\d{10}$/;

    if (fname == "") {
        alert("First name must be filled");
        return false;
    } else if (validName.test(fname)) {
        alert("First name must contain letters  only");
    }
    if (lname == "") {
        alert("Last name must be filled");
        return false;
    }
    if (email == "") {
        alert("Email must be filled");
        return false;
    } else if (validEmail.test(email)){
        alert("Invalid Email \nEmail form = example@email.com");

        return false;
    }
    if ( !(pnumber.match(validPhone))  ) {
        alert("Invalid number");
        return false;
    } 
    if (city = "") {
        alert("City must be filled");
        return false
    }
    if (message = "") {
        alert("Message is required");
        return false;
    }

    return true; 
}

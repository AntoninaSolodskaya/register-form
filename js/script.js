function printError(elemId, hintMsg) {
    let error = document.getElementById(elemId);
    error.innerHTML = hintMsg;
}

// var x = document.getElementById("auth");
// var txt = "";
// var i;
// for (i = 0; i < x.length; i++) {
//   txt = txt + x.elements[i].value + "<br>";
// }
// document.getElementById("demo").innerHTML = txt;

function myFunction($name) {
    var inputVal = document.getElementById($name).value;
    document.getElementById("demo").innerHTML = inputVal;
    console.log(inputVal)
}

function validateForm() {
    var email = document.register.email.value;
    var name = document.register.username.value;
    var nameErr = emailErr = true;

    if (name == "") {
        printError("nameErr", "Username cannot be empty");
    }
    else if (name.length < 3) {
        printError("nameErr", "Invalid name length must be less then 3 letters");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(name) === false) {
            printError("nameErr");
        } else {
            printError("nameErr");
            nameErr = false;
        }
    }

    if (email == "") {
        printError("emailErr", "Email cannot be empty");
    } else {
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {
            printError("emailErr", "Invalid email format");
        } else {
            printError("emailErr");
            emailErr = false;
        }
    }

    if ((nameErr || emailErr) == true) {
        return false;
    }
};

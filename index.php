<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Test</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
        </ul>
        <span class="navbar-text"></span>
    </div>
</nav>
<div class="d-flex flex-md-column flex-nowrap h-100">
    <!-- <h1 class="title">Register Form</h1> -->
    <div class="d-flex justify-content-center shadow p-3 mb-5 mt-5 bg-white rounded formBlock" style="margin: 0 auto; width: 40%;">
        <form name="register" id="auth" class="p-lg-3" action="" method="post" onsubmit="return validateForm()"
              enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="inputName">Name:</label>
                <input 
                    type="text" 
                    name="username" 
                    class="form-control" 
                    id="inputName" 
                    aria-describedby="nameHelp"
                    onchange="myFunction('inputName')"
                >
                <div class="error" id="nameErr"></div>
            </div>

            <div class="form-group mb-3">
                <label for="inputEmail">Email:</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    id="inputEmail" 
                    aria-describedby="emailHelp"
                    onchange="myFunction('inputEmail')"
                       >
                <div class="error" id="emailErr"></div>
            </div>

            <div class="form-group mb-4">
                <button 
                    type="button" 
                    id="addInput" 
                    class='btn btn-secondary' 
                    onclick="addNode(this.parentNode)"
                >
                Add Phone +
                </button>
                <div class='error' id='phoneErr'></div>
            </div>

            <div class="form-group mb-4">
                <label for="inputAge">Age:</label>
                <input
                    type="number"
                    name="age"
                    class="form-control"
                    id="inputAge"
                    aria-describedby="ageHelp"
                    onchange="myFunction('inputAge')" 
                    onclick="(e) = {e.preventDefault(); e.stopPropagation();}"
                >
                <div class="error" id="ageErr"></div>
            </div>

            <div class="custom-file mb-5">
                <input type="file" class="custom-file-input" id="customFile" name="photo"
                       onchange="validateFileUpload()">
                <label class="custom-file-label" for="customFile">Choose file</label>
                <small id="passwordHelpInline" class="text-muted">
                    Upload image only jpeg, jpg and png formats
                </small>
                <div class="error" id="fileErr"></div>
            </div>
            <div id="imagePreview"></div>
            <div class="form-group mb-5">
                <label for="textareaSummary">Summary:</label>
                <textarea 
                    class="form-control" 
                    name="summary" 
                    id="textareaSummary" 
                    rows="3" 
                    onchange="myFunction('textareaSummary')"
                ></textarea>
                <div class="error" id="summaryErr"></div>
            </div>
            <div class="mt-5 wrapBtn">
                <input type="submit"class="btn btn-primary" name="submit" value="Submit">
            </div>

        </form>
    </div>
    <div class="card">
        <div class="card-body" id="demo">
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

<script>
$(document).ready(function () {
    bsCustomFileInput.init()
  });

  let counter = 0;

  function addNode(element) {
    counter++;
    const id = "phone-" + counter;

    const new_entry =
      "<div class='form-group block' id='addBlock'>"
      +"<div class='wrapInput'>"
      +"<input type='text' name='phone["+counter+"]' id='" + id + "' class='form-control phone' placeholder='Enter your phone' onchange='myFunction(\"" + id + "\")'>"
      +"<button class='btn btn-danger deleteBtn' style='margin-left: 20px;' name='delete' onclick='removeNode(this.parentNode)' >Delete</button>"
      +"</div>"
      +"<div class='error' id='phoneErr'></div>"
      +"</div>";

    element.insertAdjacentHTML("afterend",new_entry);
  }

  function removeNode(el) {
    el.remove();
  }


function validateFileUpload() {
    const fileInput = document.getElementById('customFile');
    const filePath = fileInput.value;
    const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
  
    if (!allowedExtensions.exec(filePath)) {
      alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
      fileInput.value = '';
      return false;
    } else {
      if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '" alt="" style="width: 100%; height: 235px;"/>';
        };
        reader.readAsDataURL(fileInput.files[0]);
      }
    }
    myFunction('imagePreview');
  }

  function printError(elemId, hintMsg) {
    let error = document.getElementById(elemId);
    error.innerHTML = hintMsg;
}


function myFunction($name) {
    const fileInput = document.getElementById('customFile');
    const file = fileInput.value.split("\\");
    const fileName = file[file.length - 1];

    const elem = "Name: " + document.register.username.value + "<br/>" +
        "Email: " + document.register.email.value + "<br/>" +
        "Phone: " + Object.values(document.getElementsByClassName('phone')).map(function (element) {
            return element.value
        }).join(', ') + "<br/>" +
        "Age: " + document.getElementById('inputAge').value + "<br/>" +
        "Photo: " + fileName + "<br/>" +
        "Summary: " + document.getElementById('textareaSummary').value.trim();
    document.getElementById("demo").innerHTML = elem;
}

function validateForm() {
    const email = document.register.email.value;
    const name = document.register.username.value;
    const age = document.getElementById('inputAge').value;
    const phones = Object.values(document.getElementsByClassName('phone'));
    const summary = document.getElementById('textareaSummary');
    let nameErr = emailErr = ageErr = summaryErr = phoneErr = true;
    let regex;

    if (name === "") {
        printError("nameErr", "Username cannot be empty");
    } else if (name.length < 3) {
        printError("nameErr", "Invalid name length must be less then 3 letters");
    } else {
        regex = /^[a-zA-Z]+$/;
        if (regex.test(name) === false) {
            printError("nameErr", "Name must have only letters");
        } else {
            nameErr = false;
        }
    }

    if (age === "") {
        printError("ageErr", "Please write your age");
    } else {
        ageErr = false;
    }

    if (email === "") {
        printError("emailErr", "Email cannot be empty");
    } else {
        regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {
            printError("emailErr", "Invalid email format");
        } else {
            emailErr = false;
        }
    }

    if (!phones.value) {
        printError("phoneErr", "Phone cannot be empty");
    }
    else if (phones.value) {
        regex = /^[+]?(1\-|1\s|1|\d{3}\-|\d{3}\s|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/g;
        if (regex.test(phones.value) === false) {
            printError("phoneErr", "Invalid phone format");
        } else {
            phoneErr = false;
        }
    }

    if (summary.value.trim() === '') {
        printError("summaryErr", "Summary cannot be empty");
    } else {
        summaryErr = false;
    }

    if ((nameErr || emailErr || ageErr || summaryErr || phoneErr) === true) {
        return false;
    }
}

</script>
</body>
</html>

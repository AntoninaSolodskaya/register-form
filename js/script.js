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
    const fileInput = document.getElementById('file');
    const file = fileInput.value.split("\\");
    const fileName = file[file.length - 1];

    const elem = "Name: " + document.register.username.value + "<br/>" +
        "Email: " + document.register.email.value + "<br/>" +
        "Phone: " + Object.values(document.getElementsByClassName('phone')).map(function (element) {
            return element.value
        }).join(', ') + "<br/>" +
        "Age: " + document.getElementById('age').value + "<br/>" +
        "Photo: " + fileName + "<br/>" +
        "Summary: " + document.getElementById('summary').value.trim();
    document.getElementById("demo").innerHTML = elem;
}

function validateForm() {
    const email = document.register.email.value;
    const name = document.register.username.value;
    const age = document.getElementById('ge').value;
    const phones = Object.values(document.getElementsByClassName('phone'));
    const summary = document.getElementById('summary');
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
